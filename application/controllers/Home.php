<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('home');
        $this->load->view('include/footer');
    }

    public function login(){
        $this->load->view('include/header');
        $this->load->view('login');
        $this->load->view('include/footer');
    }

    public function register(){

        $this->load->library('form_validation');

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
                $this->session->set_flashdata('message', "You have successfully register, you can now login!");
                redirect("register", 'refresh');
            }else{
                $this->session->set_flashdata('message', "Something went wrong!");
                redirect("register", 'refresh');
            }

        }else{

            $this->session->set_flashdata('message', validation_errors());

            $this->load->view('include/header');
            $this->load->view('register');
            $this->load->view('include/footer');

        }

    }
}
