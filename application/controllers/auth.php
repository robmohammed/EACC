<?php


class auth extends CI_Controller
{


    public function home()
    {
        $this->load->view('Home');
        
    }

    public function members()
    {
        $this->load->view('Members');
        
    }

    public function about()
    {
        $this->load->view('About');
        
    }

    public function contact()
    {
        $this->load->view('Contact');
        
    }

    public function events()
    {
        $this->load->view('Events');
        
    }

    public function newEvent()
    {
        $this->load->view('ViewEvent');
        
    }

    public function Event()
    {
        // $this->load->model('blogmodels');
        // $id = $this->uri->segment(3);
         
        // // Get data from model
        // $data['post'] = $this->post->getById($id);
        $this->load->view('Event');
        
    }
    
    public function register()
    {
        $query = $this->db;
        if(isset($_POST['register'])){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if($this->form_validation->run() == TRUE){
                echo 'form validated';

                $data = array(
                    'Email' => $_POST['email'],
                    'First_Name' => $_POST['fname'],
                    'Last_Name' => $_POST['lname'],
                    'Password' => md5($_POST['password']),
                    'Date_Created' => date('Y-m-d'),
                );

                $data2 = array(
                    'Email' => $_POST['email'],
                    'First_Name' => $_POST['fname'],
                    'Last_Name' => $_POST['lname'],
                );
                $query->insert('members', $data);
                $query->insert('personal', $data2);

                echo "<script>alert('Account Created Successfully.')</script>";
                
                redirect("auth/Login");

                
            }
        }
        
        $this->load->view('Register');

        
    }

    public function login()
    {





        $this->load->view('Login');
    }


    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        redirect("auth/Login", "refresh");
    }
}