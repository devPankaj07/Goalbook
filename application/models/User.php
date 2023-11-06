<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function insert_registration($data) {
        $this->db->insert('registrations', $data);
        return $this->db->insert_id(); // Return the ID of the inserted record
    }

    public function getReferrerName($sponsorID) {
        // Query the database to retrieve the referrer's name based on the sponsor ID
        $this->db->select(['first_name', 'last_name']);
        $this->db->from('users');
        $this->db->where('member_id', $sponsorID);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $result_array = $query->result_array();
            // Use the $result_array as needed
            return $result_array;
        } else {
            // No matching rows found
            return array();
        }
    }
    
   

    public function get_user_by_username($username) {
        $query = $this->db->get_where('users', array('member_id' => $username));
        return $query->row_array();
    }

    public function getUserByMemberId($memberId)
    {
        $this->db->where('member_id', $memberId);
        $query = $this->db->get('users');
        return $query->row(); // Return the member if found, or false if not found
    }

    public function getBankDetailsByMemberId($memberId) {
        // Perform the database query to retrieve bank details
        $query = $this->db->get_where('bank_details', array('member_id' => $memberId));

        // Check if any results were found
        if ($query->num_rows() > 0) {
            // Return the retrieved bank details
            return $query->result_array();
        } else {
            // No bank details found
            return array();
        }
    }


    // MLM Tree 
    // public function getUsers($memberId) {
         
    //     $this->db->where('member_id', $memberId['member_id']);
    //     $query = $this->db->get('users');
    //     $users = $query->result();

    //     if (count($users) > 0) {
    //         $tree = $this->buildMlmTree($users[0]->id);
    //         return $tree;
    //     } else {
    //         return null;
    //     }
    // }

    // private function buildMlmTree($parentId) {
    //     $tree = array();
    //     $this->db->where('sponsor_id', $parentId);
    //     $query = $this->db->get('users');
    //     $users = $query->result();

    //     foreach ($users as $user) {
    //         $child = new stdClass();
    //         $child->user = $user;
    //         $child->children = $this->buildMlmTree($user->id);
    //         $tree[] = $child;
    //     }

    //     return $tree;
    // }

}
?>