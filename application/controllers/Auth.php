<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $user_data = $this->session->unset_userdata('user_data');
        if (!empty($user_data)) {
            $this->session->set_flashdata('msg', 'Your Login Expired');
             
        }
        #Load necessary libraries and helpers
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User');
    }

    public function registration() {
        $this->load->helper('form');
        $this->load->view('registration_form');
    }

 
    public function process_registration() {
        $this->load->library('form_validation');
    
        // Set validation rules
        $this->form_validation->set_rules('sponsor_id', 'Sponsor ID', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|exact_length[10]', array(
            'required' => 'The Mobile Number field is required.',
            'exact_length' => 'The Mobile Number must be exactly 10 digits long.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('check_required', 'Check Box', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $errors = array(
                'status' => 'error',
                'message' => $this->form_validation->error_array()
            );
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($errors));
                } else {
                    // Form validation passed
        $memberid = 'BHA' . sprintf('%05d', rand(0, 9999));
        // Check if the generated member ID already exists in the database
        $existingMember = $this->User->getUserByMemberId($memberid);

        if ($existingMember) {
            // Member ID already exists, generate a new one
            $memberid = 'BHA' . sprintf('%05d', rand(0, 9999999));
        }

        
        $data = array(
            'member_id' => $memberid,
            'sponsor_id' => $this->input->post('sponsor_id'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'mobile_number' => $this->input->post('mobile_number'),
            'password' => $this->input->post('password'),
            'user_status' => 'Inactive',
            'created_date' => date('Y-m-d H:i:s') // Current datetime
        );
        $data2 = array(
            'password_print' => $this->input->post('password'),
        );

        // Insert the data into the 'users' table
        $this->db->insert('users', $data);

        // Check if the data was successfully inserted
        if ($this->db->affected_rows() > 0) {
            // Data was inserted successfully
            $response = array(
                'status' => 'success',
                'message' => 'Registration successful'
            );
            $this->session->set_userdata('registration_data', $data);
            $this->session->set_userdata('password_data', $data2);
              redirect(base_url('Auth/welcome_letter')); // Use base_url() function
      
      
        }else{
            // Failed to insert the data
            $response = array(
                'status' => 'error',
                'message' => 'Failed to register'
            );
            // You can handle the error case accordingly
        }

        // Send the JSON response back to the client
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }

    }
     


    public function welcome_letter(){
        $registrationData = $this->session->userdata('registration_data');
        $passwordData = $this->session->userdata('password_data');
        $merged_array = array_merge($registrationData, $passwordData);
        $this->load->view('welcome_letter', $merged_array); 
    }
    
    public function login() {
        $this->load->helper('form');
        $this->load->view('login');
    }

    public function login_auth() {
    // Check if the login URL has parameters
    $params = $this->input->get();
    if (!empty($params) && isset($params['username']) && isset($params['password'])) {
        // Parameters exist in the URL, use them for login
        $username = $params['username'];
        $password = $params['password'];

        $user = $this->User->get_user_by_username($username);
      if ($user['block_status'] === '0') {
        if ($user && isset($user['password'])) {
            // Check if the password is hashed
            if (password_verify($password, $user['password'])) {
                // Authentication successful, store user data in session
                $user_data = array(
                    'user_id' => $user['id'],
                    'sponsor_id' => $user['sponsor_id'],
                    'member_id' => $user['member_id'],
                    'profile_image' => $user['profile_image'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user['email'],
                    'mobile_number' => $user['mobile_number'],
                    'dateofbirth' => $user['dateofbirth'],
                    'gender' => $user['gender'],
                    'address' => $user['address'],
                    'city' => $user['city'],
                    'state' => $user['state'],
                    'country' => $user['country'],
                    'user_status' => $user['user_status'],
                    'password' => $user['password'],
                    'activated_package' => $user['activated_package'],
                    'activated_date' => $user['activated_date'],
                    'created_date' => $user['created_date'],
                    'logged_in' => TRUE
                );

                if (isset($user['username'])) {
                    $user_data['username'] = $user['username'];
                }

                $this->session->set_userdata('user_data', $user_data);

                // Redirect to the dashboard or home page
                redirect(base_url('Main/dashboard'));
            } else if ($password === $user['password']) {
                // Authentication successful (when the password is not hashed), store user data in session
                $user_data = array(
                    'user_id' => $user['id'],
                    'sponsor_id' => $user['sponsor_id'],
                    'member_id' => $user['member_id'],
                    'profile_image' => $user['profile_image'],
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user['email'],
                    'mobile_number' => $user['mobile_number'],
                    'dateofbirth' => $user['dateofbirth'],
                    'gender' => $user['gender'],
                    'address' => $user['address'],
                    'city' => $user['city'],
                    'state' => $user['state'],
                    'country' => $user['country'],
                    'user_status' => $user['user_status'],
                    'password' => $user['password'],
                    'activated_package' => $user['activated_package'],
                    'activated_date' => $user['activated_date'],
                    'created_date' => $user['created_date'],
                    'logged_in' => TRUE
                );

                if (isset($user['username'])) {
                    $user_data['username'] = $user['username'];
                }

                $this->session->set_userdata('user_data', $user_data);

                // Redirect to the dashboard or home page
                redirect(base_url('Main/dashboard'));
            } else {
                // Password is neither hashed nor matching the plain text
                // Authentication failed, show error message
                $data['error_message'] = 'Invalid username or password';
                $this->load->view('login', $data);
            }
        } else {
            // Authentication failed, show error message
            $data['error_message'] = 'Invalid username or password';
            $this->load->view('login', $data);
        }
      } else {
            // Authentication failed, show error message
            $data['error_message'] = 'You Entered Member ID is Blocked';
            $this->load->view('login', $data);
        } 
        
    } else {
        // Proceed with form validation
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, show the login form again with error messages
            $this->load->helper('form');
            $data['validation_errors'] = validation_errors();
            $this->load->view('login', $data);
        } else {
            // Form validation passed, check the user credentials
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User->get_user_by_username($username);
            if ($user['block_status'] === '0') {
            if ($user && isset($user['password'])) {
                // Check if the password is hashed
                if (password_verify($password, $user['password'])) {
                    // Authentication successful, store user data in session
                    $user_data = array(
                        'user_id' => $user['id'],
                        'sponsor_id' => $user['sponsor_id'],
                        'member_id' => $user['member_id'],
                        'profile_image' => $user['profile_image'],
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email' => $user['email'],
                        'mobile_number' => $user['mobile_number'],
                        'dateofbirth' => $user['dateofbirth'],
                        'gender' => $user['gender'],
                        'address' => $user['address'],
                        'city' => $user['city'],
                        'state' => $user['state'],
                        'country' => $user['country'],
                        'user_status' => $user['user_status'],
                        'password' => $user['password'],
                        'activated_package' => $user['activated_package'],
                        'activated_date' => $user['activated_date'],
                        'created_date' => $user['created_date'],
                        'logged_in' => TRUE
                    );

                    if (isset($user['username'])) {
                        $user_data['username'] = $user['username'];
                    }

                    $this->session->set_userdata('user_data', $user_data);

                    // Redirect to the dashboard or home page
                    redirect(base_url('Main/dashboard'));
                } else if ($password === $user['password']) {
                    // Authentication successful (when the password is not hashed), store user data in session
                    $user_data = array(
                        'user_id' => $user['id'],
                        'sponsor_id' => $user['sponsor_id'],
                        'member_id' => $user['member_id'],
                        'profile_image' => $user['profile_image'],
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email' => $user['email'],
                        'mobile_number' => $user['mobile_number'],
                        'dateofbirth' => $user['dateofbirth'],
                        'gender' => $user['gender'],
                        'address' => $user['address'],
                        'city' => $user['city'],
                        'state' => $user['state'],
                        'country' => $user['country'],
                        'user_status' => $user['user_status'],
                        'password' => $user['password'],
                        'activated_package' => $user['activated_package'],
                        'activated_date' => $user['activated_date'],
                        'created_date' => $user['created_date'],
                        'logged_in' => TRUE
                    );

                    if (isset($user['username'])) {
                        $user_data['username'] = $user['username'];
                    }

                    $this->session->set_userdata('user_data', $user_data);

                    // Redirect to the dashboard or home page
                    redirect(base_url('Main/dashboard'));
                } else {
                    // Password is neither hashed nor matching the plain text
                    // Authentication failed, show error message
                    $data['error_message'] = 'Invalid username or password';
                    $this->load->view('login', $data);
                }
            } else {
                // Authentication failed, show error message
                $data['error_message'] = 'Invalid username or password';
                $this->load->view('login', $data);
            }
            }else{

            // Authentication failed, show error message
            $data['error_message'] = 'You Entered Member ID is Blocked';
            $this->load->view('login', $data);
        }
        }
    }
}


    public function logout() {
        // Clear user data from session and redirect to login page
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg', 'Your Session End Successfully');
        redirect('auth/login');
    }

}
?>