<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();

        if($this->ion_auth->logged_in() == FALSE){
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $data['user'] = $this->ion_auth->user()->row();

        $this->load->view('include/header');
        $this->load->view('d_main',$data);
        $this->load->view('include/footer');
    }

    public function flightorders()
    {
        $user = $this->ion_auth->user()->row();
        $data = array();

        $this->load->model('flightorders_model');
        $this->load->model('flights_model');
        $orderDetails = $this->flightorders_model->as_array()->where('userid',$user->id)->get_all();


        if(is_array($orderDetails) == true && count($orderDetails) > 0) {
            foreach ($orderDetails as $key => $value) {
                $orderDetails[$key]['departure_flight_details'] = $this->flights_model->with_source()->with_destination()->as_array()->get($value['departure_flight']);
                $orderDetails[$key]['return_flight_details'] = $this->flights_model->with_source()->with_destination()->as_array()->get($value['return_flight']);

            }
        }

        $data['orders'] = $orderDetails;
        $this->load->view('include/header');
        $this->load->view('d_flightorders',$data);
        $this->load->view('include/footer');
    }

    public function hotelorders()
    {
        $user = $this->ion_auth->user()->row();
        $data = array();

        $this->load->model('hotelorders_model');
        $this->load->model('hotels_model');
        $orderDetails = $this->hotelorders_model->as_array()->where('userid',$user->id)->get_all();

        if(is_array($orderDetails) == true && count($orderDetails) > 0){
            foreach ($orderDetails as $key => $value){
                $orderDetails[$key]['hotelDetails'] = $this->hotels_model->as_array()->get($value['hotel_id']);
            }
        }

//        echo "<pre>"; print_r($orderDetails); exit;


        $data['orders'] = $orderDetails;
        $this->load->view('include/header');
        $this->load->view('d_hotelorders',$data);
        $this->load->view('include/footer');
    }

}
