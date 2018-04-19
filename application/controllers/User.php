<?php


class User extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "Please login first");
            redirect("auth/Login");
        }
    }

    public function profile()
    {
        $this->load->view('profile');
    }

    public function members()
    {
        $this->load->view('members');
        $this->load->model('functions');
    }

    public function profileform()
    {
        $this->load->view('profileform');
    }

    public function update(){
        
        $this->load->model('updateprofile');
    }
}