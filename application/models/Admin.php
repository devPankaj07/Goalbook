<?php

class Admin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_email($email) {
        $this->db->where('username', $email);
        $query = $this->db->get('admin');
        return $query->row();
    }

}
?>