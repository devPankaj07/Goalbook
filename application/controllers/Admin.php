<?php

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');        
        // Any initialization code or libraries can be loaded here
        $this->load->library('session'); // Load the Session library
        $this->load->database();
        $admin_data = $this->session->userdata('admin_data');
        if (empty($admin_data)) {
            // Destroy the session
            $this->session->unset_userdata('admin_data');
            
            // Set flash data and redirect to the login page
            $this->session->set_flashdata('msg', 'Your Login Expired');
            redirect(base_url() . 'AdminAuth/login');
        }
    }
    
       public function dashboard() {
        
        // Session Data 
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

        // Users data 
        $query = $this->db->get('users');
        $data['users'] = $query->result_array();

        // KYC Data
        $query = $this->db->get('kyc_documents');
        $data['kyc'] = $query->result_array();

    

        // E-Wallet Data
        $query = $this->db->get('e_wallet');
        $data['e_wallet'] = $query->result_array();
        
         // E-Wallet_History Amount for TDS, Service Charges,
        $query = $this->db->select_sum('amount')->get('e_wallet_history');
        $data['total_amount_for_tds_service'] = $query->row()->amount;
         // US to INR Conversation Helper Function
        // $this->load->helper('conversion');
        // $data['total_amount_for_tds_service_inr'] = usd_to_inr_array( $data['total_amount_for_tds_service']);
        // print_r($data);
        // die;
        // Fundrequested Data
        $query = $this->db->get('fundrequest');
        $data['fundrequest'] = $query->result();

 
        $this->load->view('admin/dashboard',$data);
    }


    public function fundrequest() {
        // The default method of the Admin controller
        $query = $this->db->get('fundrequest');
        $data['fundrequest'] = $query->result();

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            // print_r($data);
            // die;
        $this->load->view('admin/fundrequest',$data);
    }
   public function add_main_cat(){
     
        $this->load->helper('form');
        $this->load->library('form_validation');

      
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        
        $this->form_validation->set_rules('ph_image', 'Image', 'callback_validate_profile_image');
        

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, return validation errors
            $errors = $this->form_validation->error_array();

            $response = array(
                'status' => 'error',
                'message' => $errors
            );
        } else {
            // Form validation succeeded, process the form submission
            $config['upload_path'] = 'assets/uploads/categoryimage'; // Set the upload directory
            $config['allowed_types'] = 'jpeg|jpg|png'; // Set the allowed image types
           // $config['max_size'] = 1024; // Set the maximum file size in kilobytes
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ph_image')) {
                // Failed to upload the image
                $error = $this->upload->display_errors();
                $response = array(
                    'status' => 'error',
                    'message' => $error
                );
            } else {
                // Image uploaded successfully, process the data and save it to the database
                $image_data = $this->upload->data();
                $image_path = $image_data['file_name'];
               
                $data = array(
                   
                    'name' => $this->input->post('name'),
                    'ph_image' => $image_path // Save the image path to the database
                );
                        
                if ($this->db->insert('maincat', $data)) {
                    // Data update succeeded
                      
                    $response = array(
                        'status' => 'success',
                        'message' => 'Profile details added successfully'
                    );
                    redirect(base_url() . 'Admin/maincategory' ,$response);
                } else {
                    // Failed to update the data
                    $response = array(
                        'status' => 'error',
                        'message' => 'Failed to update profile details'
                        
                    );
                    redirect(base_url() . 'Admin/maincategory' ,$response);
                }
            }
        }

        // Send the JSON response back to the client
        $this->output->set_output(json_encode($response));
    }
    
    
       public function add_sub_cat(){
     
        $this->load->helper('form');
        $this->load->library('form_validation');

      
        $this->form_validation->set_rules('subname', 'Name', 'required');
        $this->form_validation->set_rules('sub_image', 'Image', 'callback_validate_sub_image');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, return validation errors
            $errors = $this->form_validation->error_array();

            $response = array(
                'status' => 'error',
                'message' => $errors
            );
        } else {
            // Form validation succeeded, process the form submission
            $config['upload_path'] = 'assets/uploads/categoryimage'; // Set the upload directory
            $config['allowed_types'] = 'jpeg|jpg|png|JPG'; // Set the allowed image types
           // $config['max_size'] = 1024; // Set the maximum file size in kilobytes
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('sub_image')) {
                // Failed to upload the image
                $error = $this->upload->display_errors();
                $response = array(
                    'status' => 'error',
                    'message' => $error
                );
            } else {
                // Image uploaded successfully, process the data and save it to the database
                $image_data = $this->upload->data();
                $image_path = $image_data['file_name'];
               
               
                $data = array(
                    'mainid' => $this->input->post('mainid'),
                   
                    'subname' => $this->input->post('subname'),
                  
                    
                    'sub_image' => $image_path // Save the image path to the database
                );
                        
                if ($this->db->insert('subcat', $data)) {
                    // Data update succeeded
                      
                    $response = array(
                        'status' => 'success',
                        'message' => 'Profile details added successfully'
                    );
                    redirect(base_url() . 'Admin/subcategory' ,$response);
                } else {
                    // Failed to update the data
                    $response = array(
                        'status' => 'error',
                        'message' => 'Failed to update profile details'
                        
                    );
                    redirect(base_url() . 'Admin/subcategory' ,$response);
                }
            }
        }

        // Send the JSON response back to the client
        $this->output->set_output(json_encode($response));
    }
         public function add_child_cat(){
     
        $this->load->helper('form');
        $this->load->library('form_validation');

      
        $this->form_validation->set_rules('childname', 'Name', 'required');
        $this->form_validation->set_rules('child_image', 'Image', 'callback_validate_child_image');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, return validation errors
            $errors = $this->form_validation->error_array();

            $response = array(
                'status' => 'error',
                'message' => $errors
            );
        } else {
            // Form validation succeeded, process the form submission
            $config['upload_path'] = 'assets/uploads/categoryimage'; // Set the upload directory
            $config['allowed_types'] = 'jpeg|jpg|png'; // Set the allowed image types
           // $config['max_size'] = 1024; // Set the maximum file size in kilobytes
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('child_image')) {
                // Failed to upload the image
                $error = $this->upload->display_errors();
                $response = array(
                    'status' => 'error',
                    'message' => $error
                );
            } else {
                // Image uploaded successfully, process the data and save it to the database
                $image_data = $this->upload->data();
                $image_path = $image_data['file_name'];
               
               
                $data = array(
                    'mainid' => $this->input->post('mainid'),
                    'subcatid' => $this->input->post('subcatid'),
                    'childname' => $this->input->post('childname'),
                  
                    
                    'child_image' => $image_path // Save the image path to the database
                );
                        
                if ($this->db->insert('childcat', $data)) {
                    // Data update succeeded
                      
                    $response = array(
                        'status' => 'success',
                        'message' => 'Profile details added successfully'
                    );
                    redirect(base_url() . 'Admin/childcategory' ,$response);
                } else {
                    // Failed to update the data
                    $response = array(
                        'status' => 'error',
                        'message' => 'Failed to update profile details'
                        
                    );
                    redirect(base_url() . 'Admin/childcategory' ,$response);
                }
            }
        }

        // Send the JSON response back to the client
        $this->output->set_output(json_encode($response));
    }
    
    public function add_form_cat() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('questions[]', 'Questions', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, return validation errors
        $errors = $this->form_validation->error_array();

        $response = array(
            'status' => 'error',
            'message' => $errors
        );
    } else {
        $questions = $this->input->post('questions');

        $data = array();
        foreach ($questions as $question) {
            $data[] = array(
                'mainid' => $this->input->post('mainid'),
                'subcatid' => $this->input->post('subcatid'),
                'childid' => $this->input->post('childid'),
                'questions' => $question,
            );
        }

        if ($this->db->insert_batch('ccforms', $data)) {
            // Data insert succeeded
            $response = array(
                'status' => 'success',
                'message' => 'Questions added successfully'
            );
            redirect(base_url() . 'Admin/ccforms' ,$response);
        } else {
            // Failed to insert data
            $response = array(
                'status' => 'error',
                'message' => 'Failed to insert questions'
            );
            redirect(base_url() . 'Admin/ccforms' ,$response);
        }
    }

    // Send the JSON response back to the client
    $this->output->set_output(json_encode($response));
}

    
     public function validate_profile_image($file)
    {
        if (!empty($_FILES['ph_image']['name'])) {
            return TRUE; // File is selected, validation passed
        } else {
            $this->form_validation->set_message('validate_profile_image', 'The {field} field is required.');
            return FALSE; // File is not selected, validation failed
        }
    }

    // Custom callback function to validate profile_image
    public function validate_sub_image($file)
    {
        if (!empty($_FILES['sub_image']['name'])) {
            return TRUE; // File is selected, validation passed
        } else {
            $this->form_validation->set_message('validate_sub_image', 'The {field} field is required.');
            return FALSE; // File is not selected, validation failed
        }
    }
    public function validate_child_image($file)
    {
        if (!empty($_FILES['child_image']['name'])) {
            return TRUE; // File is selected, validation passed
        } else {
            $this->form_validation->set_message('validate_child_image', 'The {field} field is required.');
            return FALSE; // File is not selected, validation failed
        }
    }
 
    public function packges() {
        // The default method of the Admin controller
        $query = $this->db->get('fundrequest');
        $data['fundrequest'] = $query->result();

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            // print_r($data);
            // die;
        $this->load->view('admin/packages',$data);
    }
    
        public function member_list() {
        // The default method of the Admin controller
     

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        $user_data = $this->db->get('users')->result_array();
        $data['user_data'] = $user_data;
           
        $this->load->view('admin/member_list',$data);
    }
    
        public function active_list() {
        // The default method of the Admin controller
     

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        $user_data = $this->db->get('users')->result_array();
        $data['user_data'] = $user_data;
           
        $this->load->view('admin/active_member_list',$data);
    }
        public function inactive_list() {
        // The default method of the Admin controller
     

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        $user_data = $this->db->get('users')->result_array();
        $data['user_data'] = $user_data;
           
        $this->load->view('admin/inactive_member_list',$data);
    }
   
       public function fundrequest_history() {
        // The default method of the Admin controller
        $query = $this->db->get('fundrequest');
        $data['fundrequest'] = $query->result();

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            
        $this->load->view('admin/fundrequest_history',$data);
    }
    
        public function payout_direct_income() {
        // The default method of the Admin controller
        
        $this->db->where('amount_for', 'Direct Bonus');
        $direct_income = $this->db->get('e_wallet_history')->result_array();
        $data['direct_income'] = $direct_income;


        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
      
        $this->load->view('admin/direct_income_payout',$data);
    }
    
        public function payouts() {
        // The default method of the Admin controller
 


        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
      
        $this->load->view('admin/payouts',$data);
    }
    
        
    public function kyc() {
        // The default method of the Admin controller
        $query = $this->db->get('kyc_documents');
        $data['kyc'] = $query->result_array();

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        
    

        $this->load->view('admin/kyc',$data);
    }
    
        public function kyc_approved() {
        // The default method of the Admin controller
        $query = $this->db->get('kyc_documents');
        $data['kyc'] = $query->result_array();

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        
    

        $this->load->view('admin/kyc_approved',$data);
    }
    
    public function edit_member_info() {

        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

        $query = $this->db->get('users');
        $data['user_data'] = $query->result();
            
        $this->load->view('admin/edit_member_info',$data);
    }
    
        public function create_admins() {

        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            
        $this->load->view('admin/create_admins',$data);
    } 
    
       public function admins_list() {

        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        
           // get Session Data  
        $query = $this->db->get('admin');
        $data['admin_list'] = $query->result_array();
            
        $this->load->view('admin/admins_list',$data);
    }
    
    public function tax_charges() {


        // E-Wallet History Data
        $query = $this->db->get('e_wallet_history');
        $data['e_wallet_history'] = $query->result_array();
        
        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
        
        $this->load->view('admin/tds',$data);
    }

    public function activateID() {

        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

        $this->db->where('user_status', 'Inactive');
        $query = $this->db->get('users');
        $data['members'] = $query->result();
            
        $this->load->view('admin/activate-id',$data);
    }

    

    public function generate_pins() {

        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

        $query = $this->db->get('packages');
        $data['packages_data'] = $query->result();
        
        $this->db->select('package_amount');
        $this->db->select("COUNT(IF(pin_status = 'not_used', 1, NULL)) AS not_used_count");
        $this->db->select("COUNT(IF(pin_status = 'used', 1, NULL)) AS used_count");
        $this->db->from('pins');
        $this->db->group_by('package_amount');
        $query = $this->db->get();
        $data['pins_data'] = $query->result_array();
        
        $this->load->view('admin/generate_pins',$data);
    }


    public function transfer_pins() {

        // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

        $query = $this->db->get('packages');
        $data['packages_data'] = $query->result();
        
        $this->db->select('package_amount');
        $this->db->select("SUM(CASE WHEN pin_status = 'not_used' THEN 1 ELSE 0 END) AS not_used_count");
        $this->db->select("SUM(CASE WHEN pin_status = 'used' THEN 1 ELSE 0 END) AS used_count");
        $this->db->from('pins');
        $this->db->group_by('package_amount');
        $query = $this->db->get();
        $data['pins_data'] = $query->result_array();
        
        $this->load->view('admin/transfer_pins',$data);
    }

    public function available_pins() {
        // The default method of the Admin controller
         
        $this->db->where('pin_status', 'not_used');
        $pins = $this->db->get('pins')->result_array();
        $data['pins'] = $pins;

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            
        $this->load->view('admin/available_pins',$data);
    }

    public function pins_summary() {
        // The default method of the Admin controller
         
        $pins = $this->db->get('pins')->result_array();
        $data['pins'] = $pins;

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            
        $this->load->view('admin/pin_summary',$data);
    }

    public function loanRequest() {
        // The default method of the Admin controller
         
        $loan = $this->db->get('loandata')->result_array();
        $data['loan'] = $loan;

        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
            
        $this->load->view('admin/loanRequest',$data);
    }
        public function dummyID() {
        // The default method of the Admin controller


        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

        $query = $this->db->get('packages');
        $data['packages'] = $query->result_array();

        $this->db->select('member_id');
        $query = $this->db->get('users');
        $data['memberIds'] = $query->result_array();

        
            
        $this->load->view('admin/dummyID',$data);
    }
    
    public function maincategory() {

           // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;

   
       
         $this->db->select('*');
       
        $this->db->from('maincat');
         
        $query = $this->db->get();
        $data['maincat_data']=  $query->result_array();
       
        
        $this->load->view('admin/maincategory',$data);
    }
    public function subcategory() {

            // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
         $this->db->select('*');
       
        $this->db->from('maincat');
         
        $query = $this->db->get();
        $data['maincat_data']=  $query->result_array();
   
       
         $this->db->select('*');
        
       
        $this->db->from('subcat');
         
        $query = $this->db->get();
        $data['subcat_data']=  $query->result_array();
       
        
        $this->load->view('admin/subcategory',$data);
    }
    
      public function childcategory() {

            // get Session Data  
        $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
         $this->db->select('*');
       
        $this->db->from('maincat');
         
        $query = $this->db->get();
        $data['maincat_data']=  $query->result_array();
        
         $this->db->select('*');
       
        $this->db->from('subcat');
         
        $query = $this->db->get();
        $data['subcat_data']=  $query->result_array();
       
         $this->db->select('*');
      
        $this->db->from('childcat');
         
        $query = $this->db->get();
        $data['childcat_data']=  $query->result_array();
       
        
        $this->load->view('admin/childcategory',$data);
    }
        public function ccforms() {

          $admin_data = $this->session->userdata('admin_data');
        $data['admin_data'] = $admin_data;
         $this->db->select('*');
       
        $this->db->from('maincat');
         
        $query = $this->db->get();
        $data['maincat_data']=  $query->result_array();
        
         $this->db->select('*');
       
        $this->db->from('subcat');
         
        $query = $this->db->get();
        $data['subcat_data']=  $query->result_array();
       
         $this->db->select('*');
       
        $this->db->from('childcat');
         
        $query = $this->db->get();
        $data['childcat_data']=  $query->result_array();
        
          $this->db->select('*');
    
        $this->db->from('ccforms');
         
        $query = $this->db->get();
        $data['ccformscat_data']=  $query->result_array();
       
        
        $this->load->view('admin/ccforms',$data);
    }


    
    
}
?>