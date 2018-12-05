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
        $this->load->model('hoteldestinations_model');

        $data['codes'] = $this->airports_model->as_array()->get_all();
        $data['hotelcodes'] = $this->hoteldestinations_model->as_array()->get_all();

//        print_r($data); exit;


        $this->load->view('include/header');
        $this->load->view('home',$data);
        $this->load->view('include/footer');
    }

    public function hotels(){
        $this->load->model('hotels_model');
        $this->load->model('hoteldestinations_model');

        $data = array();

        $data['hotelcodes'] = $this->hoteldestinations_model->as_array()->get_all();

        if($this->input->get()){

            $inputs = $this->input->get();
            $this->form_validation->set_data($inputs);

            $this->form_validation->set_rules('destination','Destination ', 'required');
            $this->form_validation->set_rules('checkin_date','Checkin Date ', 'required');
            $this->form_validation->set_rules('checkout_date','Checkout Date ', 'required');
            $this->form_validation->set_rules('no_people','No of People', 'required');
            $this->form_validation->set_rules('no_rooms','No of Rooms', 'required');

            if ($this->form_validation->run() === TRUE){


                $start = strtotime($inputs['checkin_date']);
                $end = strtotime($inputs['checkout_date']);
                $start = date( "Y-m-d", $start);
                $end =  date( "Y-m-d", $end);

                $query = $this->db->query("SELECT * FROM hotels WHERE destination = '".$inputs['destination']."'");
                $data['hotels'] = $query->result_array();


//                echo $this->db->last_query();

//                echo "<pre>"; print_r($data); exit;


            }else{
                $data['errors'] = validation_errors();

            }

        }

        $this->load->view('include/header');
        $this->load->view('hotels',$data);
        $this->load->view('include/footer');

    }

    public function bookhotel(){

        $inputs = $this->input->post();


        if(!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('errors', 'Please login to book Hotels!');
            redirect('login','refresh');
        }


//       echo "<pre>"; print_r($inputs); exit;

        if(isset($inputs['hotelid'])){
            $user = $this->ion_auth->user()->row();
            $this->load->model('hotelorders_model');
            $this->load->model('hotels_model');

            $hotelDetails = $this->hotels_model->get($inputs['hotelid']);

//            echo "<pre>"; print_r($hotelDetails); exit;

            $amount = $inputs['no_rooms'] * $hotelDetails->cost;
            $fee = $amount * HOTELS_FEE;
            $totalamount = $amount + $fee;

            $fhotelsid = (isset($inputs['fhotelsid'])) ? $inputs['fhotelsid'] : 0;

            $insert = array(
                'hotel_id' => $inputs['hotelid'],
                'userid' => $user->id,
                'no_rooms' => $inputs['no_rooms'],
                'no_people' => $inputs['no_people'],
                'amount' => $amount,
                'fee' => $fee,
                'totalamount' => $totalamount,
                'checkin_date' => $inputs['checkin_date'],
                'checkout_date' => $inputs['checkout_date'],
                'status' => HOTELS_STATUS1,
                'fhotelsid' => $fhotelsid,
            );

            $id = $this->hotelorders_model->insert($insert);

            if(isset($inputs['fhotelsid'])){
                $url = base_url('payment')."?type=fhotel&horderId=".$id."&forderId=".$fhotelsid;
            }else{
                $url = base_url('payment')."?type=hotel&orderId=".$id;
            }
            redirect($url,'refresh');

        }else{
            redirect('Home','refresh');
        }

    }

    public function deals(){
        $this->load->model('hotels_model');
        $this->load->model('hoteldestinations_model');

        $data = array();

        $data['hotelcodes'] = $this->hoteldestinations_model->as_array()->get_all();

        if($this->input->get()){

            $inputs = $this->input->get();
            $this->form_validation->set_data($inputs);

            $this->form_validation->set_rules('destination','Destination ', 'required');
            $this->form_validation->set_rules('checkin_date','Checkin Date ', 'required');
            $this->form_validation->set_rules('checkout_date','Checkout Date ', 'required');
            $this->form_validation->set_rules('no_people','No of People', 'required');
            $this->form_validation->set_rules('no_rooms','No of Rooms', 'required');

            if ($this->form_validation->run() === TRUE){


                $start = strtotime($inputs['checkin_date']);
                $end = strtotime($inputs['checkout_date']);
                $start = date( "Y-m-d", $start);
                $end =  date( "Y-m-d", $end);

                $query = $this->db->query("SELECT * FROM hotels WHERE destination = '".$inputs['destination']."'");
                $data['hotels'] = $query->result_array();


//                echo $this->db->last_query();

//                echo "<pre>"; print_r($data); exit;


            }else{
                $data['errors'] = validation_errors();

            }

        }

        $this->load->view('include/header');
        $this->load->view('hotels',$data);
        $this->load->view('include/footer');

    }

    public function flights(){
        $this->load->model('flights_model');
        $this->load->model('airports_model');
        $this->load->model('hoteldestinations_model');

        $data = array();

        $data['codes'] = $this->airports_model->as_array()->get_all();
        $data['hotelcodes'] = $this->hoteldestinations_model->as_array()->get_all();

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
                $data['errors'] = validation_errors();
            }

        }

        $this->load->view('include/header');
        $this->load->view('flights',$data);
        $this->load->view('include/footer');
    }

    public function bookflight(){

        $this->load->model('flights_model');

        $inputs = $this->input->post();


        if(!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('errors', 'Please login to book flights!');
            if(isset($_POST['currenturl'])){
                $url = base_url('login')."?ref=".$_POST['currenturl'];
                redirect($url,'refresh');
            }else{
                redirect('login','refresh');
            }
        }

        if($inputs['type'] == 'dep'){
            $this->session->set_userdata('departure_flight', $inputs['departure_flight']);
            $getData = $inputs;
            $getData['source'] = $inputs['destination'];
            $getData['destination'] = $inputs['source'];
            $getData['type'] = 'ret';

            $url = base_url('flights')."?".http_build_query($getData);
            redirect($url,'refresh');

        }else if($inputs['type'] == 'ret' && !isset($inputs['fhotels'])){
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

        }else if($inputs['type'] == 'ret' && isset($inputs['fhotels'])){
            $this->session->set_userdata('destination_hotel', $inputs['destination_hotel']);
            $this->session->set_userdata('no_rooms', $inputs['no_rooms']);

            $departureDetails = $this->flights_model->as_array()->get($_SESSION['departure_flight']);
            $returnDetails = $this->flights_model->as_array()->get($_SESSION['return_flight']);

//            echo "<pre>"; print_r($inputs); exit;

            if(isset($_SESSION['departure_flight']) && isset($_SESSION['return_flight'])) {
                $user = $this->ion_auth->user()->row();
                $this->load->model('flightorders_model');
                $insert = array(
                    'travelers' => $inputs['travelers'],
                    'departure_flight' => $_SESSION['departure_flight'],
                    'return_flight' => $_SESSION['return_flight'],
                    'userid' => $user->id,
                    'fhotels' => 1,
                    'status' => 'processing'
                );

              $id = $this->flightorders_model->insert($insert);

              $start = strtotime($departureDetails['arrival']);
              $end = strtotime($returnDetails['departure']);

              $fhotelsInputs['checkin_date'] = date( "Y-m-d", $start);
              $fhotelsInputs['checkout_date'] = date( "Y-m-d", $end);
              $fhotelsInputs['destination'] = $inputs['destination_hotel'];
              $fhotelsInputs['no_rooms'] = $inputs['no_rooms'];
              $fhotelsInputs['no_people'] = $inputs['travelers'];
              $fhotelsInputs['fhotelsid'] = $id;

              $url = base_url('hotels')."?".http_build_query($fhotelsInputs);

              redirect($url, 'refresh');
            }
        }
        else{
            redirect('Home','refresh');
        }

    }

    public function payment(){
        $this->load->model('flightorders_model');
        $this->load->model('users_model');
        $this->load->model('hotelorders_model');
        $this->load->model('hotels_model');
        $this->load->model('flights_model');
        $user = $this->ion_auth->user()->row();

        if(isset($_POST['success']) && $_POST['type'] == 'flight'){
            $this->flightorders_model->update(array('status' => 'Confirmed'),$this->input->post('orderId'));
            $orderDetails = $this->flightorders_model->as_array()->get($this->input->post('orderId'));
            $this->users_model->update(array('miles' => $user->miles + $orderDetails['totalmiles']),$user->id);
            redirect('dashboard','refresh');
        }

        if(isset($_POST['redeem']) && $_POST['type'] == 'flight'){
            $this->flightorders_model->update(array('status' => 'Confirmed'),$this->input->post('orderId'));
            $orderDetails = $this->flightorders_model->as_array()->get($this->input->post('orderId'));
            $this->users_model->update(array('miles' => $user->miles - INTERNATIONAL_MILEAGE_REDEEM),$user->id);
            redirect('dashboard','refresh');
        }

        if(isset($_POST['success']) && $_POST['type'] == 'hotel'){
            $this->hotelorders_model->update(array('status' => 'Confirmed'),$this->input->post('orderId'));
            redirect('dashboard/hotelorders','refresh');
        }

        if(isset($_POST['success']) && $_POST['type'] == 'fhotel'){

            $this->flightorders_model->update(array('status' => 'Confirmed'),$this->input->post('forderId'));
            $orderDetails = $this->flightorders_model->as_array()->get($this->input->post('forderId'));
            $this->users_model->update(array('miles' => $user->miles + $orderDetails['totalmiles']),$user->id);

            $this->hotelorders_model->update(array('status' => 'Confirmed'),$this->input->post('horderId'));

//            echo "<pre>"; print_r($_POST); exit;

            redirect('dashboard','refresh');
        }

        $id = (isset($_GET['orderId'])) ? $_GET['orderId'] : 0;
        $type = $_GET['type'];

        $data = array();
        if($type == 'flight'){
            $orderDetails = $this->flightorders_model->as_array()->get($id);

//                      echo "<pre>"; print_r($orderDetails); exit;


            $data['depFlight'] = $this->flights_model->with_source()->with_destination()->as_array()->get($orderDetails['departure_flight']);
            $data['retFlight'] = $this->flights_model->with_source()->with_destination()->as_array()->get($orderDetails['return_flight']);
            $data['travelers'] = $orderDetails['travelers'];
            $total = $data['depFlight']['twoway'] * $orderDetails['travelers'];
            $data['amount'] =  $total;
            $data['fee'] = ($total / 100) * 15;
            $data['total'] =  $total + (($total / 100) * 15);
            $data['totalMiles'] = ($data['depFlight']['miles'] + $data['retFlight']['miles']) * $orderDetails['travelers'];
            $data['userData'] = $user;
            $data['orderId'] = $id;
            $data['type'] = $type;


            $this->flightorders_model->update(array('totalmiles' => $data['totalMiles'], 'totalamount' => $data['total']),$this->input->get('orderId'));


        }else if($type == 'hotel'){

            $orderDetails = $this->hotelorders_model->as_array()->get($id);

//            echo "<pre>"; print_r($orderDetails); exit;

            $data['userData'] = $user;
            $data['orderId'] = $id;
            $data['type'] = $type;
            $data['orderDetails'] = $orderDetails;
            $data['hotelDetails'] = $this->hotels_model->as_array()->get($orderDetails['hotel_id']);


//            echo "<pre>"; print_r($data); exit;

        }else if($type == 'fhotel'){

            $orderDetails = $this->flightorders_model->as_array()->get($_GET['forderId']);

            $data['forderId'] = $_GET['forderId'];
            $data['horderId'] = $_GET['horderId'];
            $data['userData'] = $user;
            $data['depFlight'] = $this->flights_model->with_source()->with_destination()->as_array()->get($orderDetails['departure_flight']);
            $data['retFlight'] = $this->flights_model->with_source()->with_destination()->as_array()->get($orderDetails['return_flight']);
            $data['travelers'] = $orderDetails['travelers'];
            $flight_total = $data['depFlight']['twoway'];
            $data['total'] =  $flight_total + (($flight_total / 100) * 15);
            $data['totalMiles'] = $data['depFlight']['miles'] + $data['retFlight']['miles'];

            $this->flightorders_model->update(array('totalmiles' => $data['totalMiles'], 'totalamount' => $data['total']),$this->input->post('orderId'));

            $orderDetails = $this->hotelorders_model->as_array()->get($_GET['horderId']);

//            echo "<pre>"; print_r($orderDetails); exit;

            $data['orderId'] = $id;
            $data['type'] = $type;
            $data['orderDetails'] = $orderDetails;
            $data['hotelDetails'] = $this->hotels_model->as_array()->get($orderDetails['hotel_id']);

            $data['total'] = $flight_total + $orderDetails['amount'];
            $data['discount'] = $data['total'] * FLIGHTS_HOTELS_DISCOUNT;
            $data['totalAfterDiscount'] = $data['total'] - $data['discount'];
            $data['fee'] = $data['totalAfterDiscount'] * FLIGHTS_HOTELS_FEE;
            $data['amount'] = $data['totalAfterDiscount'] + $data['fee']; //final


//            echo "<pre>"; print_r($data); exit;


        }

        $this->load->view('include/header');
        $this->load->view('payment',$data);
        $this->load->view('include/footer');

    }


    public function login(){

        if($this->ion_auth->logged_in() == TRUE){
            redirect('dashboard','refresh');
        }

        $this->form_validation->set_rules('username','username', 'required');
        $this->form_validation->set_rules('password','Password ', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $remember = false;

            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
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
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username','Username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
        $this->form_validation->set_rules('address', 'Address', 'trim');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('state', 'State', 'trim');
        $this->form_validation->set_rules('country', 'Country', 'trim');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim');
        $this->form_validation->set_rules('cardno', 'Card No', 'trim');
        $this->form_validation->set_rules('expirymonth', 'Expiry Month', 'trim');
        $this->form_validation->set_rules('expiryyear', 'Expiry Year', 'trim');
        $this->form_validation->set_rules('cvv', 'cvv', 'trim');


        if ($this->form_validation->run() === TRUE)
        {
            $email = strtolower($this->input->post('email'));
            $identity = $this->input->post('username');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'zipcode' => $this->input->post('zipcode'),
                'cardno' => $this->input->post('cardno'),
                'expmonth' => $this->input->post('expirymonth'),
                'expyear' => $this->input->post('expiryyear'),
                'cvv' => $this->input->post('cvv'),
            );

            if($this->ion_auth->register($identity, $password, $email, $additional_data)){
                $this->session->set_flashdata('messages', "You have successfully register, you can now login!");
                redirect("login", 'refresh');
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

        $query = $this->db->query("SELECT DISTINCT(airline) FROM flights ");
        $data['airlines'] = $query->result_array();

//                    echo "<pre>"; print_r($data); exit;


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
            $this->load->view('flightstatus',$data);
            $this->load->view('include/footer');
        }

    }
}
