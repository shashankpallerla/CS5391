<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->model('airports_model');

        $data['codes'] = $this->airports_model->as_array()->get_all();

//        print_r($data); exit;


        $this->load->view('include/header');
        $this->load->view('home',$data);
        $this->load->view('include/footer');
    }

    public function flights(){
        $this->load->model('flights_model');
        $this->load->model('airports_model');

        $data = array();

        $data['codes'] = $this->airports_model->as_array()->get_all();

        if($this->input->get()){

            $inputs = $this->input->get();
            $this->form_validation->set_data($inputs);

            $this->form_validation->set_rules('source','Source', 'required');
            $this->form_validation->set_rules('destination','Destination ', 'required');
            $this->form_validation->set_rules('dep_date','Departure Date ', 'required');
            $this->form_validation->set_rules('return_date','Return Date ', 'required');
            $this->form_validation->set_rules('travelers','No of Travelers', 'required');

            if ($this->form_validation->run() === TRUE){

                if($inputs['type'] == 'dep'){
                    $start = strtotime($inputs['dep_date']);
                    $end = strtotime($inputs['dep_date']);
                    $start = date( "Y-m-d H:i:s", $start);
                    $end =  date( "Y-m-d H:i:s", $end + 86399 );
                    $query = $this->db->query("SELECT * FROM flights WHERE source = '".$inputs['source']."' AND destination = '" .$inputs['destination']. "' AND departure >= '" .$start. "' AND departure <= '" .$end. "'");
                    $data['flights'] = $query->result_array();

                }else{
                    $start = strtotime($inputs['return_date']);
                    $end = strtotime($inputs['return_date']);
                    $start = date( "Y-m-d H:i:s", $start);
                    $end =  date( "Y-m-d H:i:s", $end + 86399 );
                    $query = $this->db->query("SELECT * FROM flights WHERE source = '".$inputs['source']."' AND destination = '" .$inputs['destination']. "' AND departure >= '" .$start. "' AND departure <= '" .$end. "'");
                    $data['flights'] = $query->result_array();

                }
//                echo $this->db->last_query();

//                echo "<pre>"; print_r($test); exit;


            }else{
                echo validation_errors();

            }

        }else{



        }

        $this->load->view('include/header');
        $this->load->view('flights',$data);
        $this->load->view('include/footer');
    }

    public function bookflight(){

        $inputs = $this->input->post();

        if(!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('errors', 'Please login to book flights!');
            redirect('login','refresh');
        }

        if($inputs['type'] == 'dep'){
            $this->session->set_userdata('departure_flight', $inputs['departure_flight']);
            $getData = $inputs;
            $getData['source'] = $inputs['destination'];
            $getData['destination'] = $inputs['source'];
            $getData['type'] = 'ret';

            $url = base_url('flights')."?".http_build_query($getData);
            redirect($url,'refresh');

        }else if($inputs['type'] == 'ret'){
            $this->session->set_userdata('return_flight', $inputs['return_flight']);

            if(isset($_SESSION['departure_flight']) && isset($_SESSION['return_flight'])){
                $user = $this->ion_auth->user()->row();
                $this->load->model('flightorders_model');
                $insert = array(
                    'travelers' => $inputs['travelers'],
                    'departure_flight' => $_SESSION['departure_flight'],
                    'return_flight' => $_SESSION['return_flight'],
                    'userid' => $user->id,
                    'status' => 'processing'
                );

                $id = $this->flightorders_model->insert($insert);
                $url = base_url('payment')."?type=flight&orderId=".$id;
                redirect($url,'refresh');
            }

        }else{
            redirect('Home','refresh');
        }

    }

    public function payment(){
        $this->load->model('flightorders_model');
        $this->load->model('users_model');
        $user = $this->ion_auth->user()->row();

        if(isset($_POST['success'])){
//            print_r($_POST); exit;
            $this->flightorders_model->update(array('status' => 'Confirmed'),$this->input->post('orderId'));
            $orderDetails = $this->flightorders_model->as_array()->get($this->input->post('orderId'));
            $this->users_model->update(array('miles' => $user->miles + $orderDetails['totalmiles']),$user->id);
            redirect('dashboard','refresh');
        }

        $id = $_GET['orderId'];
        $type = $_GET['type'];

        $data = array();
        if($type == 'flight'){
            $this->load->model('flightorders_model');
            $this->load->model('flights_model');
            $orderDetails = $this->flightorders_model->as_array()->get($id);

            $data['depFlight'] = $this->flights_model->with_source()->with_destination()->as_array()->get($orderDetails['departure_flight']);
            $data['retFlight'] = $this->flights_model->with_source()->with_destination()->as_array()->get($orderDetails['return_flight']);
            $data['travelers'] = $orderDetails['travelers'];
            $total = $data['depFlight']['twoway'];
            $data['total'] =  $total + (($total / 100) * 15);
            $data['totalMiles'] = $data['depFlight']['miles'] + $data['retFlight']['miles'];
            $data['userData'] = $user;
            $data['orderId'] = $id;
            $data['type'] = $type;

            $this->flightorders_model->update(array('totalmiles' => $data['totalMiles'], 'totalamount' => $data['total']),$this->input->post('orderId'));

//          echo "<pre>"; print_r($data); exit;

        }


        $this->load->view('include/header');
        $this->load->view('payment',$data);
        $this->load->view('include/footer');

    }


    public function login(){

        if($this->ion_auth->logged_in() == TRUE){
            redirect('dashboard','refresh');
        }

        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_rules('password','Password ', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $remember = false;

            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
            {
              redirect('dashboard','refresh');
            }
            else
            {
                $this->session->set_flashdata('errors', $this->ion_auth->errors());
                redirect('login', 'refresh');
            }
        }


        $this->load->view('include/header');
        $this->load->view('login');
        $this->load->view('include/footer');
    }

    public function register(){

//        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $email = strtolower($this->input->post('email'));
            $identity = $email;
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
            );

            if($this->ion_auth->register($identity, $password, $email, $additional_data)){
                $this->session->set_flashdata('messages', "You have successfully register, you can now login!");
                redirect("register", 'refresh');
            }else{
                $this->session->set_flashdata('messages', "Something went wrong!");
                redirect("register", 'refresh');
            }

        }else{

            $this->session->set_flashdata('errors', validation_errors());

            $this->load->view('include/header');
            $this->load->view('register');
            $this->load->view('include/footer');

        }
    }

    public function logout(){
        $this->ion_auth->logout();
        redirect('home');
    }

    public function feedback(){
        $this->load->model('feedback_model');

        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('comments', 'Comments', 'trim|required');

        if ($this->form_validation->run() === TRUE)
        {
            $this->feedback_model->insert(array('rating' => $this->input->post('rating'),'comments' => $this->input->post('comments')));
            $this->session->set_flashdata('messages', "Feedback Successfully Submitted!");
            redirect('feedback','refresh');
        }else{
            $this->session->set_flashdata('errors', validation_errors());
            $this->load->view('include/header');
            $this->load->view('feedback');
            $this->load->view('include/footer');
        }

    }

    public function flightstatus(){
        $this->load->model('flights_model');

        $this->form_validation->set_rules('flightno', 'Flight No', 'trim|required');
        $this->form_validation->set_rules('airlinename', 'Airline Name', 'trim|required');
        $this->form_validation->set_rules('departuredate', 'Departure Date', 'trim|required');

        if ($this->form_validation->run() === TRUE)
        {
            $data['flightData'] = $this->flights_model->get($this->input->post('flightno'));

            $this->load->view('include/header');
            $this->load->view('flightstatus',$data);
            $this->load->view('include/footer');
        }else{
            $this->session->set_flashdata('errors', validation_errors());
            $this->load->view('include/header');
            $this->load->view('flightstatus');
            $this->load->view('include/footer');
        }

    }
}
