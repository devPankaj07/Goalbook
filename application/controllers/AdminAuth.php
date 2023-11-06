<?php

class AdminAuth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $admin_data = $this->session->unset_userdata('admin_data');
        if (!empty($admin_data)) {
            $this->session->set_flashdata('msg', 'Your Login Expired');
             
        }
        // Any initialization code or libraries can be loaded here
        $this->load->library('form_validation');
        $this->load->model('Admin');
        
    }
    
    public function login() {
        // Logic for Admin login
        $this->load->helper('form');
        $this->load->view('admin/login');
    }

    public function login_process() {
        // Form validation rules
        $this->form_validation->set_rules('email', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the login view with validation errors
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->load->view('admin/login', $data);
        } else {
            // Validation successful, proceed with the login process
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Get the user record from the database based on the provided email
            $admin = $this->Admin->get_by_email($email);
        
             
        

            if ($admin && $password == $admin->password) {
                if ($admin && $admin->status === 'Active'){
                $permissions = explode(',', $admin->access_limits);
                // Password matches, user is authenticated
                // Set session data
                $admin_data = array(
                    'sr' => $admin->sr,
                    'name' => $admin->name,
                    'role' => $admin->role,
                    'username' => $admin->username,
                    'password' => $admin->password,
                    'status' => $admin->status,
                    'created' => $admin->created,
                    'access_limits' => $permissions
                );

                $this->session->set_userdata('admin_data', $admin_data);
                redirect('Admin/dashboard'); // Redirect to the dashboard page or any other desired location
                }else{
                    // if ID is Inactive then shwo msg
                    $data['error_message'] = 'Your ID is Deactived';
                    $this->load->view('admin/login', $data);
                }
            } else {
                // Password doesn't match or user doesn't exist
                $data['error_message'] = 'Invalid email or password';
                $this->load->view('admin/login', $data);
            }
   
        }
    }


    
    public function logout() {
       // Clear user data from session and redirect to login page
       $this->session->unset_userdata('admin_data');
       $this->session->sess_destroy();
       $this->session->set_flashdata('msg', 'Your Session End Successfully');
       redirect('AdminAuth/login');
    }
    
    // Add other methods for Admin authentication as needed
    
}
?>