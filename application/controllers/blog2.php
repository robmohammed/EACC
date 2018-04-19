<?php

class blog2 extends CI_Controller{

    function blog()
    {
        parent::Controller();
        $this->load->helper('url');
        $this->load->helper('form');

    }

    function index()
    {

    
        $data['query'] = $this->db->get('events');

        $this->load->view('blog_view', $data);
}

public function newEvent()
    {
        $this->load->view('AddEvent');
        
    }

function viewevent()
    {
        $this->db->where('EventTitle', $this->uri->segment(3));
        $data['query'] = $this->db->get('events');

        $this->load->view('ViewEvent1', $data);
}



}
?>



