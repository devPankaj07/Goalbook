<?php
class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->library('session'); // Load the Session library
        $user_data = $this->session->userdata('user_data');
        if (empty($user_data)) {
            // Destroy the session
            $this->session->unset_userdata('user_data');

            // Set flash data and redirect to the login page
            $this->session->set_flashdata('msg', 'Your Login Expired');
            redirect(base_url() . 'Auth/login');
        } 
        
        
        $this->db->where('member_id', $user_data['member_id']);
        $this->user_data = $this->db->get('users')->result_array();
        $this->load->model('User');
        
    }

    // Dashbboard Function 
    public function dashboard()
    {

        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data;
        
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
        
        // Member Sponsor ID 
        $sponsor_id = $user_data['sponsor_id'];
        $member_id = $user_data['member_id'];
        $this->load->library('LevelIncomeLibrary');  // Loading Library 
        $referralLibrary = new LevelIncomeLibrary();
        $maxLevel = 7; // Max to Maximum level of referrals,
        $referrals = $referralLibrary->getReferrals($member_id, 1, $maxLevel);
        
        $counts = array_fill(1, $maxLevel, array());        


        foreach ($referrals as $level => $levelReferrals) {
            foreach ($levelReferrals as $index => $referral) {
                $referralId = $referral['referralId'];
                $sponsorId = $referral['sponsorId'];
        
                if (!isset($counts[$level][$referralId])) {
                    $counts[$level][$referralId] = array(
                        'directReferrals' => 0, // Initialize the direct referrals count
                        'totalReferrals' => 0   // Initialize the total referrals count
                    );
                }
        
                // Increment the direct referrals count
                $counts[$level][$referralId]['totalReferrals']++;
        
                // Fetch the total referrals count for the sponsor
                $query = $this->db->select('COUNT(*) as totalReferrals')->where('sponsor_id', $referralId)->where('user_status', 'Active')->get('users');
                $result = $query->row();
                $totalReferrals = $result->totalReferrals;
        
                // Update the total referrals count
                $counts[$level][$referralId]['totalReferrals'] += $totalReferrals;
            }
        }

 

        $level = [
            1 => 9,
            2 => 81,
            3 => 729,
            4 => 6561,
            5 => 59049,
            6 => 531441,
            7 => 4782969,
 
        ];
         $levelTotalReferrals = [ ];

        // print_r($p);
        // exit;
     

        foreach ($counts as $currentLevel => $levelData) {
            $remainingReferrals = 0;
        
            foreach ($levelData as $userData) {
                $directReferrals = $userData['totalReferrals'] + $remainingReferrals  ;
        
                if ($directReferrals >= $level[$currentLevel]) {
                    $totalReferrals = $level[$currentLevel];
                    $remainingReferrals = $directReferrals - $level[$currentLevel];
                } else {
                    $totalReferrals = $directReferrals;
                    $remainingReferrals = 0;
                }
               
        
               $levelTotalReferrals[$currentLevel] = ($levelTotalReferrals[$currentLevel] ?? 0) + $totalReferrals;
                
                 
          
            }
        }
        
        // Distribute remaining referrals to next levels
        for ($i = 1; $i <= 10; $i++) {
            
           
            if (isset($levelTotalReferrals[$i]) && $levelTotalReferrals[$i] > $level[$i]) {
                $remainingReferrals = $levelTotalReferrals[$i] - $level[$i];
                $nextLevel = $i + 1;
        
                while (isset($level[$nextLevel])) {
                    $levelTotalReferrals[$nextLevel] = ($levelTotalReferrals[$nextLevel] ?? 0) + min($remainingReferrals, $level[$nextLevel]);
                    $remainingReferrals -= min($remainingReferrals, $level[$nextLevel]);
                    $nextLevel++;
                }
            }
        }
        
        // Ensure that the total referrals for each level do not exceed the corresponding value in the $level array
        for ($i = 1; $i <= 10; $i++) {
            if (isset($levelTotalReferrals[$i]) && $levelTotalReferrals[$i] > $level[$i]) {
                $levelTotalReferrals[$i] = $level[$i];
            }
        }
        
        $data['levels'] = $levelTotalReferrals;
 
        $this->load->view('user/dashboard', $data);
    }

    // Add Profile Details View Function 
    public function edit_profile()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/profile_edit', $data); // Pass the data array to the view
    }

     // Add Profile Details Function
    public function add_profile()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Set validation rules for each input field
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('house_no_plot', 'House No./Plot', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|callback_validate_gender');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('agree_terms', 'Terms and Conditions', 'required');
        $this->form_validation->set_rules('profile_image', 'Profile Photo', 'callback_validate_profile_image');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, return validation errors
            $errors = $this->form_validation->error_array();

            $response = array(
                'status' => 'error',
                'message' => $errors
            );
        } else {
            // Form validation succeeded, process the form submission
            $config['upload_path'] = 'assets/uploads/profile'; // Set the upload directory
            $config['allowed_types'] = 'jpeg|jpg|png'; // Set the allowed image types
            $config['max_size'] = 1024; // Set the maximum file size in kilobytes
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile_image')) {
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
                $user_dateofbirth = $this->input->post('date_of_birth');
                $formatted_date = date("Y-m-d", strtotime($user_dateofbirth));
                $array_data = array(
                    'dateofbirth' => $formatted_date,
                    'address' => $this->input->post('house_no_plot'),
                    'gender' => $this->input->post('gender'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'profile_image' => $image_path // Save the image path to the database
                );

                // Process the data or save it to the database
                // ...
                $user_data = $this->session->userdata('user_data');
                $data['user_data'] = $user_data;
                $member_id = $user_data['member_id'];
                $this->db->where('member_id', $member_id);

                if ($this->db->update('users', $array_data)) {
                    // Data update succeeded
                    // Redirect or return success message
                    $response = array(
                        'status' => 'success',
                        'message' => 'Profile details added successfully'
                    );
                } else {
                    // Failed to update the data
                    $response = array(
                        'status' => 'error',
                        'message' => 'Failed to update profile details'
                    );
                }
            }
        }

        // Send the JSON response back to the client
        $this->output->set_output(json_encode($response));
    }

    // Custom callback function to validate profile_image
    public function validate_profile_image($file)
    {
        if (!empty($_FILES['profile_image']['name'])) {
            return TRUE; // File is selected, validation passed
        } else {
            $this->form_validation->set_message('validate_profile_image', 'The {field} field is required.');
            return FALSE; // File is not selected, validation failed
        }
    }

    public function validate_gender($gender) {
        if ($gender == 'Select') {
            $this->form_validation->set_message('validate_gender', 'Please select a valid gender.');
            return false;
        }
        return true;
    }
 

    // Add Bank Details View Function 
    public function bank_details()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        if (!$user_data) {
            // Session variable doesn't exist, restart the session
            $this->session->sess_destroy();
            $this->session->sess_create();
        }
        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        // Load the model for interacting with the database


        // Retrieve bank details based on member_id
        $bankDetails = $this->User->getBankDetailsByMemberId($user_data['member_id']);

        $data['bank_details'] = $bankDetails; // Pass the retrieved bank details to the view

        $this->load->view('user/bankdetails', $data); // Pass the data array to the view
    }

    // Add Bank Details View Function 
    public function changepassword()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/change-password', $data); // Pass the data array to the view
    }

    // Add KYC Details View Function 
    public function kyc()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $data['documents'] = $this->db->get_where('kyc_documents', ['member_id' => $user_data['member_id']])->row_array();

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/kyc', $data); // Pass the data array to the view
    }


    // View Profiel Details View Function 
    public function profile()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
      
        // $data['user_data'] = $user_data; // Store user_data in an array
        $data['user_data'] = $user_data = $this->user_data;
        $this->db->where('member_id', $user_data[0]['member_id']);
        $data['user_data'] = array_shift($data['user_data']);
        //  print_r($data);
        //  die;
        $bank_data = $this->db->get('bank_details')->result_array();
        $data['bank_data'] = $bank_data;
       
        $this->load->view('user/profile', $data); // Pass the data array to the view
    }

    // View Profiel Details View Function 
    public function business_card()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/business_card', $data); // Pass the data array to the view
    }
    // View Profiel Details View Function 
    public function id_card()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/i-card', $data); // Pass the data array to the view
    }
    
      // View welcome_letter View Function 
    public function welcome_letter()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/welcome_letter', $data); // Pass the data array to the view
    }
    

    // View Profiel Details View Function 
    public function mydownlines()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');    
        $data['user_data'] = $user_data; // Store user_data in an array

         // Member Sponsor ID 
         $sponsor_id = $user_data['sponsor_id'];
         $member_id = $user_data['member_id'];
         $this->load->library('LevelIncomeLibrary');  // Loading Library 
         $referralLibrary = new LevelIncomeLibrary();
         $maxLevel = INF; // Max to Maximum level of referrals,
         $referrals = $referralLibrary->getReferrals($member_id, 1, $maxLevel);
         // $referrals[1][1] = array('referralId' => $member_id, 'sponsorId' => $sponsor_id);  // Set Level 1 referral as an array with the sponsor_id
         // print_r($referrals);
         $counts = array();
 
         foreach ($referrals as $level => $levelReferrals) {
             foreach ($levelReferrals as $index => $referral) {
                 $referralId = $referral['referralId'];
                 $sponsorId = $referral['sponsorId'];
         
                 if (!isset($counts[$level][$referralId])) {
                     $counts[$level][$referralId] = array(
                         'directReferrals' => 0, // Initialize the direct referrals count
                         'totalReferrals' => 0   // Initialize the total referrals count
                     );
                 }
         
                 // Increment the direct referrals count
                 $counts[$level][$referralId]['directReferrals']++;
         
                 // Fetch the total referrals count for the sponsor
                 $query = $this->db->select('COUNT(*) as totalReferrals')->where('sponsor_id', $referralId)->get('users');
                 $result = $query->row();
                 $totalReferrals = $result->totalReferrals;
         
                 // Update the total referrals count
                 $counts[$level][$referralId]['totalReferrals'] += $totalReferrals;
             }
         }
        
       

         $data['levels'] = $counts;

         
     

        $this->load->view('user/downline', $data); // Pass the data array to the view
    }

    // View Profiel Details View Function 
    public function myrefferals()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        $this->db->where('sponsor_id', $user_data['member_id']);
        $direct_data = $this->db->get('users')->result();
        $data['direct_data'] = $direct_data;

        
        $this->load->view('user/my-refferals', $data); // Pass the data array to the view
    }


    // View Profiel Details View Function 
    public function ewalletreport()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('e_wallet_history');
        $amount = $query->result_array(); // Getting E_Wallet_history Table 
          // US to INR Conversation Helper Function
        // $this->load->helper('conversion');
        // $data['roi_income'] = usd_to_inr_array($data['roi_income']);

        // $this->db->where('member_id', $user_data['member_id'])
        // ->where('amount_for', 'ROI Amount');
        // $query = $this->db->get('e_wallet_history');
        // $data['roi_income'] = $query->result(); // Getting E_Wallet_history Table 
        
        // $this->db->where('member_id', $user_data['member_id'])
        // ->where('amount_for', 'Level Amount');
        // $query = $this->db->get('e_wallet_history');
        // $data['level_income'] = $query->result(); // Getting E_Wallet_history Table 
        
        $combined_array = array(
            'amount' => 0,
            'description' => '',
            'date_of_income' => ''
        );
        $descriptions = array(); // Array to store individual descriptions
        foreach ($amount as $key => $value) {
            $combined_array['amount'] += $value['amount'];
            $descriptions[] = $value['amount_for']; // Add each description to the array
            $combined_array['date_of_income'] = $value['created_at'];
        }
        $combined_array['description'] = implode(', ', $descriptions); // Combine descriptions with a comma
        
        $data['amount'] = $combined_array; // Convert the array to an object
        
 

        

        $this->load->view('user/ewallet', $data); // Pass the data array to the view
    }

    // View Profiel Details View Function 
    public function dailyincomereport()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array

        $this->load->view('user/dailyincome', $data); // Pass the data array to the view
    }

    // View Profiel Details View Function 
    public function fundrequest()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');

        $this->load->helper('form');

        $data['user_data'] = $user_data; // Store user_data in an array
        
        // Getting Packages Data from the Table 
        $query = $this->db->get('packages');
        $data['packages'] = $query->result_array(); 

        $this->load->view('user/fundrequest', $data); // Pass the data array to the view
    }

    // View Profiel Details View Function 
    public function fundrequesttable()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('fundrequest');
        $data['fundrequest'] = $query->result(); // Getting Fundrequest Table 
        // print_r($data);
        // die;
        $this->load->view('user/fundrequesttable', $data); // Pass the data array to the view
    }


    public function activate_id()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        // $this->db->where('member_id', $user_data['member_id']);
        // $query = $this->db->get('fundrequest');
        // $data['fundrequest'] = $query->result(); // Getting Fundrequest Table 
        // print_r($data);
        // die;
        $this->load->view('user/activate-id', $data); // Pass the data array to the view
    }

    public function daily_income_report()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        // $this->db->where('member_id', $user_data['member_id']);
        // $query = $this->db->get('fundrequest');
        // $data['fundrequest'] = $query->result(); // Getting Fundrequest Table 
        // print_r($data);
        // die;
        $this->load->view('user/daily_income_report', $data); // Pass the data array to the view
    }

    public function direct_income()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        $this->db->where('member_id', $user_data['member_id'])
        ->where('amount_for', 'Direct Bonus');
        $query = $this->db->get('e_wallet_history');
        $data['direct_amount'] = $query->result(); // Getting E_Wallet_history Table 
        
        // US to INR Conversation Helper Function
        $this->load->helper('conversion');
        $data['roi_income'] = usd_to_inr_array($data['direct_amount']);

        $this->load->view('user/direct_income', $data); // Pass the data array to the view
    }

    public function roi_income()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        $this->db->where('member_id', $user_data['member_id'])
        ->where('amount_for', 'ROI Income');
        $query = $this->db->get('e_wallet_history');
        $data['roi_income'] = $query->result(); // Getting E_Wallet_history Table 
        
        
        // US to INR Conversation Helper Function
        $this->load->helper('conversion');
        $data['roi_income'] = usd_to_inr_array($data['roi_income']);
        // print_r($data);
        // die;
        $this->load->view('user/roi_income', $data); // Pass the data array to the view
    }

    public function my_rewards()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        
        $this->load->view('user/my_reward', $data); // Pass the data array to the view
    }

    public function payout_system()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        
        $this->load->view('user/payout_system', $data); // Pass the data array to the view
    }

    public function incentive_details()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('e_wallet_history');
        $data['wallet_history'] = $query->result(); // Getting E_Wallet_history Table 
        $this->load->helper('conversion');
        
        $this->load->view('user/incentive_details', $data); // Pass the data array to the view
    }

    public function level_income_report()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('e_wallet_history');
        $data['level_income'] = $query->result(); // Getting E_Wallet_history Table 

        // US to INR Conversation Helper Function
        $this->load->helper('conversion');
        $data['roi_income'] = usd_to_inr_array($data['level_income']);

        $this->load->view('user/level_income_report', $data); // Pass the data array to the view
    }

    
    public function complaints()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        
        $this->load->view('user/complaint', $data); // Pass the data array to the view
    }
    
            
    public function fundhistory()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array
        
        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('topup_history');
        $data['fundhistory'] = $query->result_array(); // Getting E_Wallet_history Table 
        
        $this->load->view('user/fund_history', $data); // Pass the data array to the view
    }
    
     public function fund_trasnfer_member()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('pins');
        $data['pins'] = $query->result(); // Getting Topup Table 
        
 

        $this->load->view('user/fund_transfer_member', $data); // Pass the data array to the view
    }



    public function Add_regFee()
    {
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('sponser_id', 'Sponsor ID', 'required');
        $this->form_validation->set_rules('amount', 'Registration Fees Amount', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $this->load->view('your_view_name'); // Replace 'your_view_name' with the actual name of your view file
        } else {

            $user_data = $this->session->userdata('user_data');

            $data['user_data'] = $user_data;

            $user_data['sponsor_id'];




            // Insert the amount details into the new table
            $data2 = array(
                'member_id' =>  $user_data['member_id'],
                'joining_package' => $this->input->post('amount'),

            );




            // Calculate the referral commission (5% of the registration fee)
            $referralCommission = $data2['joining_package'] * 0.05;

            // Retrieve the current bonus amount from the database
            $existingBonusAmt = $this->db->get_where('amount_data', ['member_id' => $user_data['sponsor_id']])->row()->bonus;

            // Calculate the new bonus amount
            $newBonusAmt = $existingBonusAmt + $referralCommission;

            // Update the row in the database with the new bonus amount
            $this->db->set('bonus', $newBonusAmt);
            $this->db->where('member_id',  $user_data['sponsor_id']);
            $this->db->update('amount_data');


            $this->db->insert('amount_data', $data2);


            // Redirect to success page or display a success message
            $data['message'] = 'Payment successful';
            echo $data['message'];
        }
    }
    
        
     public function topup_history()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        $this->db->where('member_id', $user_data['member_id']);
        $query = $this->db->get('e_wallet_process');
        $data['topup_history'] = $query->result_array(); // Getting Topup Table 
        
 

        $this->load->view('user/topup_history', $data); // Pass the data array to the view
    }
    
        
     public function invoice()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        
        
 

        $this->load->view('user/invoice', $data); // Pass the data array to the view
    }
    
    
    
     public function receipt()
    {
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');
        $data['user_data'] = $user_data; // Store user_data in an array

        
        
 

        $this->load->view('user/receipt', $data); // Pass the data array to the view
    }
    
   // Controller function
public function add_ccform_cat() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    // Define the validation rules if needed
    // For example:
    // $this->form_validation->set_rules('textarea_1', 'Textarea 1', 'required');
    // $this->form_validation->set_rules('textarea_2', 'Textarea 2', 'required');

    // Load the ccformscat_data (replace this with your data source)
    $ccformscat_data = $this->load_your_data_here();

    if ($this->form_validation->run() == FALSE) {
        // Form validation failed, return validation errors
        $errors = $this->form_validation->error_array();
        $response = array(
            'status' => 'error',
            'message' => $errors
        );
    } else {
        // Data to be inserted into the database
        $data = array();
        foreach ($ccformscat_data as $value) {
            $question = $value['questions'];
            $textarea_value = $this->input->post('textarea_' . $value['id']);

            $data[] = array(
                'questions' => $question,
                'textarea_value' => $textarea_value
            );
        }

        // Assuming your database table is named 'ccformsmain'
        if ($this->db->insert_batch('ccformsmain', $data)) {
            // Data insert succeeded
            $response = array(
                'status' => 'success',
                'message' => 'Questions added successfully'
            );
        } else {
            // Failed to insert data
            $response = array(
                'status' => 'error',
                'message' => 'Failed to insert questions'
            );
        }

        // Set a flash message and redirect
        $this->session->set_flashdata('message', $response);
        redirect('Main/dashboard');
    }
}


     
     


 

}
