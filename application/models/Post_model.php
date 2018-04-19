<?php

class Post_model extends CI_Model
{       
    public $id;
    public $title;
    public $description;
    public $location;
    public $participants;
    public $date;
    public $Poster;
    public $created;
     

 
    public function getAll()
    {
        $query = $this->db->get('events');
        return $query->result();
    }
     
    public function getById($id) 
    {
        $query = $this->db->get_where('events', array('EventID' => $id));
        return $query->row();
    }
 
    private function insert($post) 
    {
        return $this->db->insert('events', $this);
    }
     
    private function update($post) 
    {
        $this->db->set('EventTitle', $this->title);
        $this->db->set('content', $this->content);
        $this->db->where('id', $this->id);
        return $this->db->update('events');
    }
 
    public function delete() 
    {
        $this->db->where('EventID', $this->id);
        return $this->db->delete('events');
    }
     
    public function save() 
    {
        if (isset($this->id)) {  
            return $this->update();
        } else {
            return $this->insert();
        }
    }
}

?>