<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('User');
    }

    public function get_referrer_name()
    {
        $sponsorID = $this->input->post('sponsor_id');

        $referrerName = $this->User->getReferrerName($sponsorID);

        if ($referrerName !== null) {
            if (!empty($referrerName)) {
                $response['success'] = true;
                $response['referrer_name'] = $referrerName;
            } else {
                $response['success'] = false;
                $response['referrer_name'] = 'NA';
            }
        } else {
            $response['success'] = false;
        }


        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function addBankDetails()
    {
        // Load the form validation library
        $this->load->library('form_validation');

        // Set validation rules for each form field
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('account_number', 'Account Number', 'required');
        $this->form_validation->set_rules('conform_account_number', 'Confirm Account Number', 'required|matches[account_number]');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('IFSC_code', 'IFSC Code', 'required');
        $this->form_validation->set_rules('google_pay', 'Google Pay', 'required');
        $this->form_validation->set_rules('phone_pay', 'Phone Pay', 'required');
        // $this->form_validation->set_rules('USDT_address', 'USDT Address', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('checkbox', 'Terms and Conditions', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        } else {
            // Form validation passed, store the data in the database
            $data = array(
                'member_id' => $this->input->post('member_id'),
                'bank_name' => $this->input->post('bank_name'),
                'account_number' => $this->input->post('account_number'),
                'fullname' => $this->input->post('fullname'),
                'IFSC_code' => $this->input->post('IFSC_code'),
                'google_pay' => $this->input->post('google_pay'),
                'phone_pay' => $this->input->post('phone_pay'),
                // 'USDT_address' => $this->input->post('USDT_address'),
                'branch' => $this->input->post('branch')
            );

            // Store the data in the database
            $this->db->insert('bank_details', $data);

            // Check if the data was successfully inserted
            if ($this->db->affected_rows() > 0) {
                // Data was inserted successfully
                $response = array(
                    'status' => 'success',
                    'message' => 'Bank details added successfully'
                );
            } else {
                // Failed to insert the data
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to add bank details'
                );
            }
        }

        // Send the JSON response back to the client
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function fundrequest()
    {
        // Load the form validation library
        $this->load->library('form_validation');

        // Set validation rules for each form field
        $this->form_validation->set_rules('request-mode', 'Request Mode', 'required');
        $this->form_validation->set_rules('request-amount', 'Request Amount', 'required|numeric');
        $this->form_validation->set_rules('deposit-amount', 'Deposite Mode', 'required');
        $this->form_validation->set_rules('cheque-dd', 'Cheque/DD', 'required');
        $this->form_validation->set_rules('bank-name', 'Bank Name', 'required');
        $this->form_validation->set_rules('branch-name', 'Branch Name', 'required');
        $this->form_validation->set_rules('branch-city', 'Branch City', 'required');

        // Validate the form data
        if ($this->form_validation->run() === FALSE) {
            // Form validation failed
            $response = array(
                'status' => 'error',
                'message' => $this->form_validation->error_array()
            );
        } else {
            // Form validation passed, store the data in the database
            $phpVariable = $_POST['phpVariable'];

            $data = array(
                'member_id' => $phpVariable,
                'request_Mode' => $this->input->post('request-mode'),
                'request_Amount' => $this->input->post('request-amount'),
                'deposite_Mode' => $this->input->post('deposit-amount'),
                'cheque_DD_TranNo' => $this->input->post('cheque-dd'),
                'bank_Name' => $this->input->post('bank-name'),
                'branch_Name' => $this->input->post('branch-name'),
                'branch_City' => $this->input->post('branch-city'),
                'status' => 'Pending',
                'created_at' => date('Y-m-d H:i:s') // Current datetime,
            );

            // Store the data in the database
            $this->db->insert('fundrequest', $data);

            // Check if the data was successfully inserted
            if ($this->db->affected_rows() > 0) {
                // Data was inserted successfully
                $response = array(
                    'status' => 'success',
                    'message' => 'Fund Request details added successfully'
                );
            } else {
                // Failed to insert the data
                $response = array(
                    'status' => 'error',
                    'message' => 'Fund Request details'
                );
            }
        }

        // Send the JSON response back to the client

        $this->output

            ->set_output(json_encode($response));
    }



    public function kyc_process()
    {
        // Check if the form is submitted
        if (isset($_FILES["panCard"]["name"]) && isset($_FILES["chequeBook"]["name"])) {
            $config['upload_path'] = './assets/uploads/kyc/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['size'] = 1048; // 1 MB = 1048 kilobytes
            $config["encrypt_name"] = true;

            $this->load->library('upload', $config);

            $filesToUpload = array("panCard", "chequeBook");
            $uploadErrors = array();
            $uploadedFiles = array();

            foreach ($filesToUpload as $fileInputName) {
                if (empty($_FILES[$fileInputName]["name"])) {
                    $uploadErrors[$fileInputName] = "Please select a file for " . $fileInputName;
                } else {
                    if (!$this->upload->do_upload($fileInputName)) {
                        $uploadErrors[$fileInputName] = $this->upload->display_errors();
                    } else {
                        $data = $this->upload->data();
                        // Access the uploaded file information if needed
                        // $data["file_name"]
                        $uploadedFiles[$fileInputName] = $data["file_name"];
                    }
                }
            }

            if (!empty($uploadErrors)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to upload files',
                    'files' => $uploadErrors
                );
            } else {
                // Store the uploaded file names in the database
                $memberID = $this->input->post('member_id'); // Assuming member_id is submitted via POST
                $this->db->insert('kyc_documents', array(

                    'panCard' => $uploadedFiles['panCard'],
                    'chequeBook' => $uploadedFiles['chequeBook'],
                    'pan_card_status' => 'Pending',
                    'cheque_book_status' => 'Pending',
                    'member_id' => $memberID
                ));

                $response = array(
                    'status' => 'success',
                    'message' => 'Files uploaded successfully',
                    'files' => $uploadedFiles
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Please select all the required files'
            );
        }

        // Send the JSON response back to the client
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function fetchMemberDetailsAndPins()
    {
        // Retrieve the member ID from the AJAX request
        $memberId = $this->input->post('memberId');

        // Example response data (replace with your actual data)
        $response = [
            'success' => false,
            'sponsor_id' => '',
            'member_id' => '',
            'name' => '',
            'mobileNo' => '',
            'status' => '',
            'pins' => [] // Array to store pin count for each package amount
        ];

        // Check if the member ID is valid
        if ($memberId) {
            // Perform your database queries to fetch member details based on the member ID

            // Example queries (replace with your actual queries)
            // Assuming you have a 'users' table with columns: member_id, name, mobile_no, status
            $this->db->select('users.*');
            $this->db->from('users');
            $this->db->where('users.member_id', $memberId);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $member = $query->row();

                // Perform the query to fetch pin count for each package amount


                $this->db->select('package_amount, pin, pin_type,  COUNT(*) AS total_pin_count');
                $this->db->from('pins');
                $this->db->where('pin_status', 'not_used');
                $this->db->group_by('package_amount');
                $query = $this->db->get();

                if ($query->num_rows() > 0) {
                    $pinData = $query->result_array();
                    $response['pin'] = $pinData;
                } else {
                    $response['pin'] = array(); // No data found
                }


                // Populate the response with the fetched member details
                $response['success'] = true;
                $response['sponsor_id'] = $member->sponsor_id;
                $response['member_id'] = $member->member_id;
                $response['name'] = $member->first_name . ' ' . $member->last_name;
                $response['mobileNo'] = $member->mobile_number;
                $response['status'] = $member->user_status;
            }
        }

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function fetchMemberDetailsAndPinsTransferred()
    {
        // Retrieve the member ID from the AJAX request
        $memberId = $this->input->post('memberId');

        // Example response data (replace with your actual data)
        $response = [
            'success' => false,
            'sponsor_id' => '',
            'member_id' => '',
            'name' => '',
            'mobileNo' => '',
            'status' => '',
            'pins' => [] // Array to store pin count for each package amount
        ];

        // Check if the member ID is valid
        if ($memberId) {
            // Perform your database queries to fetch member details based on the member ID

            // Example queries (replace with your actual queries)
            // Assuming you have a 'users' table with columns: member_id, name, mobile_no, status
            $this->db->select('users.*');
            $this->db->from('users');
            $this->db->where('users.member_id', $memberId);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $member = $query->row();

                // Perform the query to fetch pin count for each package amount


                $this->db->select('COUNT(*) AS pin_count, pin, package_amount');
                $this->db->from('pins');
                $this->db->where('member_id', $memberId);
                $this->db->where('pin_status', 'not_used');
                $this->db->group_by('package_amount');
                $query2 = $this->db->get();

                if ($query2->num_rows() > 0) {
                    $pinsData = $query2->result_array();

                    // Store the pin count and package name for each package amount in the response
                    $response['pins'] = $pinsData;
                }

                // Populate the response with the fetched member details
                $response['success'] = true;
                $response['sponsor_id'] = $member->sponsor_id;
                $response['member_id'] = $member->member_id;
                $response['name'] = $member->first_name . ' ' . $member->last_name;
                $response['mobileNo'] = $member->mobile_number;
                $response['status'] = $member->user_status;
            }
        }

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function fetchMemberDetailsforuser()
    {
        // Retrieve the member ID from the AJAX request
        $memberId = $this->input->post('memberId');
        

        // Perform necessary database queries to fetch member details
        // Replace this with your actual database queries

        // Example response data (replace with your actual data)
        $response = [
            'success' => false,
            'name' => '',
            'mobileNo' => '',
            'user_status' => '',
            'pendingApproval' => '',
            'blocked' => ''
        ];

        // Check if the member ID is valid
        if ($memberId) {
            // Perform your database queries to fetch member details based on the member ID

            // Example queries (replace with your actual queries)
            // Assuming you have a 'members' table with columns: id, name, mobile_no, status, pending_approval, blocked
            $this->db->select('users.*');
            $this->db->from('users');
            $this->db->where('users.member_id', $memberId);
            $query = $this->db->get();


            if ($query->num_rows() > 0) {
                $member = $query->row();

                // Populate the response with the fetched member details
                $response['success'] = true;
                $response['member_id'] = $member->member_id;
                $response['sponsor_id'] = $member->sponsor_id;
                $response['name'] = $member->first_name . ' ' . $member->last_name;
                $response['mobileNo'] = $member->mobile_number;
                $response['user_status'] = $member->user_status;
            }
        }

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function activateID()
    {

        $pin_code = $this->input->post('amount');
        $member_id = $this->input->post('memberId');
        $sponsor_id = $this->input->post('sponsorId');

 
 
        // Update the pinstomember table
        $this->db->set('pin_status', 'used');
        $this->db->set('member_id', $member_id);
        $this->db->where('pin', $pin_code);
        $this->db->where('pin_status', 'not_used');
        $this->db->update('pins');

        if ($this->db->affected_rows() > 0) {
            // Fetch the updated row from the pinstomember table
            
            if ($this->db->trans_status()) {
                // Store Package
                $this->db->select('package_amount, pin_type');
                $this->db->from('pins');
                $this->db->where('pin', $pin_code);
                $query = $this->db->get();
                $result =  $query->result_array();
                $amount = $result[0]['package_amount'];

                
                $this->check9matrix();
               
        
            

                $this->db->where('member_id', $member_id)->update('users', array('activated_package' => $amount));
                $this->db->where('member_id', $member_id)->update('users', array('user_status' => 'Active'));
                $this->db->where('member_id', $member_id)->update('users', array('activated_date' => date('Y-m-d H:i:s')));

                
                $response = array(
                    'success' => true,
                    'title' => 'Congratulations',
                    'message' => 'Your ID has been successfully activated!'
                );
            }
        }

 
        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function check9matrix()
    {
        $table = $this->db->get('users')->result_array();

        foreach ($table as $key => $value) {
            $sponsor_id = $value['member_id'];
            // echo $sponsor_id;
            $this->load->library('LevelIncomeLibrary');  // Loading Library 
                $referralLibrary = new LevelIncomeLibrary();
                $maxLevel = 7; // Max to Maximum level of referrals,
                $referrals = $referralLibrary->getReferrals($sponsor_id, 1, $maxLevel);
                // print_r($referrals);
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
                $levelTotalReferrals = [];

    
                $one = 1;

                foreach ($counts as $currentLevel => $levelData) {
                    $remainingReferrals = 0;
                
                    foreach ($levelData as $userData) {
                        $directReferrals = $userData['totalReferrals'] + $remainingReferrals + $one ;
                
                        if ($directReferrals >= $level[$currentLevel]) {
                            $totalReferrals = $level[$currentLevel];
                            $remainingReferrals = $directReferrals - $level[$currentLevel];
                        } else {
                            $totalReferrals = $directReferrals;
                            $remainingReferrals = 0;
                        }
                        $one = 0;
                
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
                
 

            $bonus = [
                9 => 40,
                81 => 30,
                729 => 20,
                6561 => 10,
                59049 => 5,
                531441 => 2,
                4782969 => 2,
          
            ];

            $newArray = [];
            $remainingValue = 0;
            $incomeDistribution = [];

            foreach ($levelTotalReferrals as $key => $value) {
                if (isset($level[$key])) {
                    $remainingValue += $value;
                    $condition = $level[$key];
                    $newValue = min($remainingValue, $condition);
                    $newArray[$key] = $newValue;
                    $remainingValue -= $newValue;
            
                    if (isset($bonus[$newValue])) {
                        $incomeDistribution[$key] = $bonus[$newValue];
                        unset($bonus[$newValue]); // Remove the matched value from $bonus
                    } else {
                        $incomeDistribution[$key] = 0;
                    }
                }
            }
            
            // print_r($incomeDistribution);

            // print_r($newArray);

            
            
            // $incomeDistribution = [];

            // foreach ($newArray as $key => $value) {
            //     if (isset($bonus[$value])) {
            //         $incomeDistribution[$key] = $bonus[$value];
            //     } else {
            //         $incomeDistribution[$key] = 0;
            //     }
            // }
            
            // print_r($incomeDistribution);

            foreach ($incomeDistribution as $level => $amount) {
                if ($amount != 0 && !empty($sponsor_id)) {
                    $check = $this->db
                    ->select('amount')
                    ->where('member_id', $sponsor_id)
                    ->where('level', $level)
                    ->get('e_wallet_history')
                    ->row();
                
                if (empty($check)) {
                    $data = array(
                        'member_id' => $sponsor_id, // Corrected column name
                        'level' => $level,
                        'amount' => $amount
                    );
                
                    // Check if the same data does not exist in the table before inserting
                    $existingData = $this->db
                        ->where('member_id', $sponsor_id)
                        ->where('level', $level)
                        ->get('e_wallet_history')
                        ->row();
                
                    if (empty($existingData)) {
                        $this->db->insert('e_wallet_history', $data);
                    }
                }
                  
                }
 
            }
        }
    }
 


    function transferfundstomember()
    {
        $amount = $this->input->post('amount');
        $reciever_memberId = $this->input->post('reciever_memberId');
        $sender_memberId = $this->input->post('sender_memberId');

        $result = $this->db->select('amount')->where('member_id', $sender_memberId)->get('topup_wallet')->row();
        if (empty($result) || $result->amount == 0.00) {
            $response = array(
                'title' => 'Insufficent Balance.',
                'message' => 'You do not have sufficient balance.',
                'status' => false
            );
        } else {
            // Begin transaction
            $this->db->trans_start();

            // Store the data in the database
            $data1 = array(
                'member_id' => $sender_memberId,
                'amount' =>  $amount,
                'used_for' =>  "Sended Money to " .  $reciever_memberId,
                'created_at' => date('Y-m-d H:i:s') // Current datetime,
            );
            $this->db->insert('topup_history', $data1);

            // Calculate new amount in topup_wallet
            $newAmount = $result->amount - $amount;
            $this->db->where('member_id', $sender_memberId)->update('topup_wallet', array('amount' => $newAmount));

            // Complete transaction
            $this->db->trans_complete();
            // Check if member wallet exists
            $query = $this->db->select('*')->where('member_id', $reciever_memberId)->get('topup_wallet');
            $data = array();
            if ($query->num_rows() > 0) {
                $row = $query->result_array();
                $balance_amt = $row[0]['amount'];
                $newAmount = $balance_amt + $amount;

                $this->db->where('member_id', $reciever_memberId)->update('topup_wallet', array('amount' => $newAmount));
                $response = array(
                    'title' => 'Fund Transfer Successfully Done!.',
                    'message' => 'FUnd Transfer to ' .  $reciever_memberId,
                    'status' => true
                );

                // echo 'have';
            } else {
                // echo 'not have';
                $data = array(
                    'member_id' => $reciever_memberId,
                    'amount' => $amount,
                    'created_on' => date('Y-m-d H:i:s') // Current datetime
                );

                $this->db->insert('topup_wallet', $data);
                $response = array(
                    'title' => 'Fund Transfer Successfully Done!.',
                    'message' => 'FUnd Transfer to ' .  $reciever_memberId,
                    'status' => true
                );
            }
        }

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function changePassword()
    {
        // Load the form validation library
        $this->load->library('form_validation');

        // Validate the form input
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[1]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed
            $response['success'] = false;
            $response['errors'] = $this->form_validation->error_array(); // Include the error keys as an array
        } else {
            // Form validation passed, update the password
            $user_data = $this->session->userdata('user_data'); // Assuming you have a logged-in user
            $member_id = $user_data['member_id'];
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            // Get the stored password from the database
            $this->db->select('password');
            $this->db->where('member_id', $member_id);
            $query = $this->db->get('users');

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $stored_password = $row->password;

                // Verify the entered password with the stored password (PLAIN TEXT)
                if ($current_password === $stored_password) {
                    // Password matches, update the password in the database (PLAIN TEXT)
                    $this->db->where('member_id', $member_id);
                    $this->db->update('users', array('password' => $new_password));

                    $response['success'] = true;
                    $response['message'] = 'Password updated successfully.';
                } else {
                    // Password does not match
                    $response['success'] = false;
                    $response['errors']['current_password'] = 'Current password is incorrect.'; // Add the error key
                }
            } else {
                // Member ID not found
                $response['success'] = false;
                $response['errors'] = 'Member ID not found.';
            }
        }

        // Send the JSON response
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function loanrequest(){
        $member_id = $_POST['memberId'];
        $loanType = $_POST['loanType'];

        $data = array(
            'member_id' => $member_id, 
            'loanType' =>  $loanType,
            'status' => 'Pending',
            'created_at' =>  date('Y-m-d H:i:s')
        );

        $result =   $this->db->insert('loanData', $data);

        if ($result == true) {
            $response['success'] = true;
            $response['message'] = 'Applied successfully';
        }else{
            $response['success'] = false;
            $response['errors'] = 'Applied not successfully';
        }
 
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


    public function updateLoanStatus(){
        $member_id = $_POST['memberID'];
        $selectedStatus = $_POST['selectedStatus'];
      

        $data = array(
            'status' => $selectedStatus,
            'updated_at' =>  date('Y-m-d H:i:s')
        );


        $this->db->where('member_id', $member_id);
        $result =  $this->db->update('loandata', $data);

        if ($result == true) {
            $response['success'] = true;
            $response['message'] = 'Loan '. $selectedStatus .' successfully';
        }else{
            $response['success'] = false;
            $response['errors'] = 'something is wrong';
        }
 
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


    
















    // Admin Ajax 

    public function fetchMemberDetails()
    {
        // Retrieve the member ID from the AJAX request
        $memberId = $this->input->post('memberId');

        // Perform necessary database queries to fetch member details
        // Replace this with your actual database queries

        // Example response data (replace with your actual data)
        $response = [
            'success' => false,
            'name' => '',
            'mobileNo' => '',
            'status' => '',
            'pendingApproval' => '',
            'blocked' => ''
        ];

        // Check if the member ID is valid
        if ($memberId) {
            // Perform your database queries to fetch member details based on the member ID

            // Example queries (replace with your actual queries)
            // Assuming you have a 'members' table with columns: id, name, mobile_no, status, pending_approval, blocked

            $this->db->select('users.*, SUM(fundrequest.request_Amount) AS total_amount,COUNT(fundrequest.request_Amount) AS total_Count');
            $this->db->from('users');
            $this->db->join('fundrequest', 'users.member_id = fundrequest.member_id');
            $this->db->where('users.member_id', $memberId);
            $this->db->where('fundrequest.status', 'Pending');
            $this->db->group_by('users.member_id');
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $member = $query->row();

                // Populate the response with the fetched member details
                $response['success'] = true;
                $response['member_id'] = $member->member_id;
                $response['name'] = $member->first_name . ' ' . $member->last_name;
                $response['mobileNo'] = $member->mobile_number;
                $response['amount_status'] = $member->total_amount;
                $response['blocked'] = $member->total_Count;
            }
        }

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function addamount()
    {
        $amount = $this->input->post('amount');
        $member_id = $this->input->post('memberId');


        // Validate the input
        if (empty($amount)) {
            $response = array(
                'success' => false,
                'message' => 'Amount cannot be blank.'
            );
        } else {
            // Perform database operations to store the data
            // Replace this with your actual database logic
            $data = array(
                'status' => 'Approved',
                'update_at' => date('Y-m-d H:i:s') // Current datetime,
            );

            $data1 = array(
                'member_id ' =>  $member_id,
                'amount ' =>  $amount,
                'created_at ' => date('Y-m-d H:i:s') // Current datetime,
            );

            $this->db->where('member_id', $member_id);
            $this->db->update('fundrequest', $data);

            // Store the data in the database

            // Check if member ID exists or not
            $query = $this->db->select('member_id')->where('member_id', $member_id)->get('topup_wallet');

            if ($query->num_rows() > 0) {
                $this->db->set('amount', "amount + $amount", false);
                if ($this->db->where('member_id', $member_id)->update('topup_wallet')) {
                    $response = array(
                        'success' => true,
                        'message' => 'Amount updated successfully.'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Failed to update amount.'
                    );
                }
            } else {
                if ($this->db->insert('topup_wallet', $data1)) {
                    $response = array(
                        'success' => true,
                        'message' => 'Amount added successfully.'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Failed to add amount.'
                    );
                }
            }
        }

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function add_packages()
    {
        // Load the form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('packages', 'Package Name', 'required');
        $this->form_validation->set_rules('amount', 'Package Amount', 'required|numeric|callback_check_amount');


        if ($this->form_validation->run() == false) {
            // Form validation failed, display errors
            $response = array(
                'status' => 'error',
                'message' => $this->form_validation->error_array()
            );
        } else {
            // Form validation passed, proceed with processing the data
            $packages = $this->input->post('packages');
            $amount = $this->input->post('amount');
            $benefit_amount = $this->input->post('benefit_amount');


            $data = array(
                'package_name' => $packages,
                'package_amount' => $amount,
                'package_status' => 'Active',
                'created_at' => date('Y-m-d H:i:s') // Current datetime,
            );

            // Perform additional operations or save the data to the database
            if ($this->db->insert('packages', $data)) {
                // Data insertion was successful
                $insertedData = $this->db->get('packages')->row();
                $response = array(
                    'status' => 'success',
                    'data' => $insertedData
                );
            } else {
                // Data insertion encountered a database error
                $response = array(
                    'status' => 'error',
                    'message' => 'Database error'
                );
            }
        }
        // Send the JSON response
        // Send the JSON response back to the client
        $this->output

            ->set_output(header('Content-Type: application/json'));
        $this->output

            ->set_output(json_encode($response));
    }


    // Custom callback function to check if the amount already exists in the database
    public function check_amount($amount)
    {
        $this->db->where('package_amount', $amount);
        $query = $this->db->get('packages');

        if ($query->num_rows() > 0) {
            // The amount already exists in the database, so the validation fails
            $this->form_validation->set_message('check_amount', 'This {field} already exists.');
            return false;
        }

        // The amount is unique, validation passes
        return true;
    }

    public function fetch_packages()
    {
        // Fetch packages from the database
        $packages = $this->db->get('packages')->result_array();

        if ($packages) {
            // Data retrieval was successful
            $response = array(
                'status' => 'success',
                'data' => $packages
            );
        } else {
            // No packages found
            $response = array(
                'status' => 'error',
                'message' => 'No packages found'
            );
        }

        // Send the JSON response back to the client
        $this->output->set_output(json_encode($response));
    }

    // Update Package Status Code
    public function update_package_status()
    {
        // Get the sr and status values from the AJAX request
        $sr = $this->input->post('sr');
        $status = $this->input->post('status');
        $data = array('package_status' => $status);
        if (!empty($sr) && !empty($status)) {
            if ($this->db->where('sr', $sr)->update('packages', $data)) {
                // Status updated successfully
                $response = array('status' => 'success', 'message' => 'Status updated successfully');
            } else {
                // Failed to update status
                $response = array('status' => 'error', 'message' => 'Failed to update status');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'The status is blank');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    // Delete Package Code
    public function deletePackage()
    {
        // Get the package Sr from the AJAX request
        $packageId = $this->input->post('sr');

        // Perform the delete operation
        $this->db->where('sr', $packageId);
        $this->db->delete('packages');


        if ($this->db->affected_rows() > 0) {
            $response = array('status' => 'success', 'message' => 'Package deleted successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to delete the package.');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    // Update KYC Information 
    public function updatekyc()
    {
        // Retrieve the data from the AJAX request
        $pancardStatus = $this->input->post('pancardStatus');
        $chequeStatus = $this->input->post('chequeStatus');
        $reason = $this->input->post('reason');
        $member_id = $this->input->post('memberID');
        // Update the data in the database
        $data = array(
            'pan_card_status' => $pancardStatus,
            'cheque_book_status' => $chequeStatus,
            'reason' => $reason
        );
        $this->db->where('member_id', $member_id); // Assuming you want to update the row with ID 1, adjust as needed
        $this->db->update('kyc_documents', $data);

        // Return a response
        $response = array('status' => 'success', 'message' => 'KYC information updated successfully');
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    // Send Money TO user Bank Account 
    public function sendmoney()
    {
        // Get the package Sr from the AJAX request
        $memberID = $this->input->post('memberID');
        $amount = $this->input->post('amount');
        $sr = $this->input->post('sr');


        $this->db->set('amount', 'amount - ' . $amount, FALSE);
        $this->db->where('member_id', $memberID);
        $this->db->update('e_wallet');

        $data = array(
            'amount_status' => 'Amount Sent',
            'payment_date' => date('Y-m-d H:i:s')
        );

        $this->db->where('sr', $sr);
        $this->db->update('e_wallet_history', $data);

        if ($this->db->affected_rows() > 0) {
            $response = array('status' => 'success', 'message' => 'Amount sent successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to sent amount.');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getMemberDetails()
    {
        $memberId = $this->input->post('memberId');
        $query = $this->db->select('*')->where('member_id', $memberId)->get('users');
        $query1 = $this->db->select('*')->where('member_id', $memberId)->get('bank_details');
        $response = array(
            'users' => $query->result_array(),
            'bank_details' => $query1->result_array()
        );

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function update_member_info()
    {
        $memberId = $this->input->post('memberId');
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $email = $this->input->post('email');
        $mobileNumber = $this->input->post('mobileNumber');
        $dateOfBirth = $this->input->post('dateOfBirth');
        $gender = $this->input->post('gender');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $country = $this->input->post('country');

        // Perform the update operation using the received data
        $data = array(
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'mobile_number' => $mobileNumber,
            'dateofbirth' => $dateOfBirth,
            'gender' => $gender,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'country' => $country
        );

        $this->db->where('member_id', $memberId);
        $this->db->update('users', $data);

        // Return the response as JSON
        $response = array('success' => true, 'message' => 'Member information updated successfully');
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function update_bank_details()
    {
        // Retrieve the form data
        $memberId = $this->input->post('memberId');
        $bankName = $this->input->post('bankName');
        $accountNumber = $this->input->post('accountNumber');
        $fullName = $this->input->post('fullName');
        $ifscCode = $this->input->post('ifscCode');
        $googlePay = $this->input->post('googlePay');
        $phonePay = $this->input->post('phonePay');
        $usdtAddress = $this->input->post('usdtAddress');
        $country = $this->input->post('country');

        // Perform the update operation using the received data
        $data = array(
            'bank_name' => $bankName,
            'account_number' => $accountNumber,
            'fullname' => $fullName,
            'IFSC_code' => $ifscCode,
            'google_pay' => $googlePay,
            'phone_pay' => $phonePay,
            'country' => $country
        );

        // Assuming you have a database table named 'bank_details'
        $this->db->where('member_id', $memberId);
        $this->db->update('bank_details', $data);

        // Return the response as JSON
        $response = array('success' => true, 'message' => 'Bank details updated successfully');
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function create_admins()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return error response via AJAX
            $response['success'] = false;
            $response['errors'] = $this->form_validation->error_array();
        } else {
            // Validation successful, proceed to insert data
            $permissions = $this->input->post('permissions');
            $admin_data = array(
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'created' => date('Y-m-d H:i:s'),
                'access_limits' =>  implode(',', $permissions)
            );

            // Insert data into the 'admin' table
            if ($this->db->insert('admin', $admin_data)) {
                // Data insertion successful
                $response['success'] = true;
                $response['message'] = 'Admin created successfully.';
            } else {
                // Database error occurred
                $response['success'] = false;
                $response['message'] = 'Database Error: ' . print_r($this->db->error(), true);
            }
        }

        echo json_encode($response);
    }

    public function update_admin_data()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return error response via AJAX
            $response['success'] = false;
            $response['errors'] = $this->form_validation->error_array();
        } else {
            // Validation successful, proceed to insert data
            $permissions = $this->input->post('permissions');
            $sr = $this->input->post('sr');

            $admin_data = array(
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'created' => date('Y-m-d H:i:s'),
                'access_limits' =>  implode(',', $permissions)
            );

            // Update data into the 'admin' table
            $this->db->where('sr', $sr);
            if ($this->db->update('admin', $admin_data)) {
                // Data update successful
                $response['success'] = true;
                $response['message'] = 'Admin updated successfully.';
            } else {
                // Database error occurred
                $response['success'] = false;
                $response['message'] = 'Database Error: ' . print_r($this->db->error(), true);
            }
        }

        echo json_encode($response);
    }


    // Update Package Status Code
    public function update_admin_status()
    {
        // Get the sr and status values from the AJAX request
        $sr = $this->input->post('sr');
        $status = $this->input->post('status');
        $data = array('status' => $status);
        if (!empty($sr) && !empty($status)) {
            if ($this->db->where('sr', $sr)->update('admin', $data)) {
                // Status updated successfully
                $response = array('status' => 'success', 'message' => 'Status updated successfully');
            } else {
                // Failed to update status
                $response = array('status' => 'error', 'message' => 'Failed to update status');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'The status is blank');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    // Delete adminUser Code
    public function deleteAdminUser()
    {
        // Get the package Sr from the AJAX request
        $userAdminSr = $this->input->post('sr');

        // Perform the delete operation
        $this->db->where('sr', $userAdminSr);
        $this->db->delete('admin');


        if ($this->db->affected_rows() > 0) {
            $response = array('status' => 'success', 'message' => 'Sub-Admin deleted successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to delete the user.');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    
    
    
     // Delete main category Code
    public function deleteMainCar()
    {
        // Get the package Sr from the AJAX request
        $mainCatSr = $this->input->post('id');

        // Perform the delete operation
        $this->db->where('id', $mainCatSr);
        $this->db->delete('maincat');


        if ($this->db->affected_rows() > 0) {
            $response = array('status' => 'success', 'message' => 'Main Category deleted successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to delete the main-category.');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


    // Update Block Status Code
    public function updateUserBlockStatus()
    {
        // Get the sr and status values from the AJAX request
        $member_id = $this->input->post('memberID');
        $status = $this->input->post('status');
        $data = array('block_status' => $status);

        if (!empty($member_id)) {
            if ($this->db->where('member_id', $member_id)->update('users', $data)) {
                // Status updated successfully
                $response = array('status' => 'success', 'message' => 'Status updated successfully');
            } else {
                // Failed to update status
                $response = array('status' => 'error', 'message' => 'Failed to update status');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'The status is blank');
        }


        // Send the JSON response back to the client
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function generate_pins()
    {
        $number = $this->input->post('numbers');
        $package_amount = $this->input->post('package_amount');

        $generatedNumbers = [];

        // Generate $number random numbers
        for ($i = 0; $i < $number; $i++) {
            do {
                // Generate a random alphanumeric string of 6 characters for each number
                $randomString = substr(str_shuffle('0123456789'), 0, 6);

                // Check if the generated string already exists in the table
                $existingPin = $this->db->get_where('pins', ['pin' => $randomString])->row();

                // Repeat the generation until a unique string is found
            } while ($existingPin);

            // Append the generated string to each number
            $generatedNumber = $number . $randomString;
            $generatedNumbers[] = $generatedNumber;

            // Store the generated PIN in the database

            $pin_type = '';
            if ($package_amount == 0.00) {
                $pin_type = 'Yellow';
            } else {
                $pin_type = 'Normal';
            }
            $data = [
                'pin' => $generatedNumber,
                'package_amount' => $package_amount,
                'pin_status' => 'not_used',
                'pin_type' =>  $pin_type
            ];
            $this->db->insert('pins', $data);
        }

        // Prepare the response
        $response = [
            'success' => true,
            'message' => 'PINs generated and stored successfully.',
        ];

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    public function transfer_pins()
    {
        $memberId = $this->input->post('member_id');
        $package = $this->input->post('package_amount');
        $numberOfPins = $this->input->post('numbers');
    


        // Count the number of available pins in the table
        $this->db->where('pin_status', 'not_used');
        $this->db->where('package_amount', $package);
        $query = $this->db->get('pins');
        $availablePinsCount = $query->num_rows();

        if ($availablePinsCount < $numberOfPins) {
            // Insufficient pins available
            $response = [
                'status' => true,
                'icon' => 'error',
                'title' => 'error',
                'message' => 'Insufficient pins available for transfer.'
            ];
        } else {
            // Fetch the required number of pins from the table
            $this->db->where('pin_status', 'not_used');
            $this->db->where('package_amount', $package);
            $this->db->limit($numberOfPins);
            $query = $this->db->get('pins');
            $pins = $query->result();
 
            // Update the pin_status to 'used' in the pins table
            $this->db->where('pin_status', 'not_used');
            $this->db->where('package_amount', $package);
            $this->db->where_in('pin', array_column($pins, 'pin'));
            $this->db->update('pins', ['transfer_status' => 'transfered', 'member_id' => $memberId]);

            $response = [
                'status' => true,
                'icon' => 'success',
                'title' => 'Success',
                'message' => 'Pins transferred successfully.'
            ];
        }

        // Send the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function getLevelsData(){
         
        // Retrieve the session data
        $user_data = $this->session->userdata('user_data');    
        // print_r($user_data);
        // exit;
        $data['user_data'] = $user_data; // Store user_data in an array

         // Member Sponsor ID 
         $sponsor_id = $user_data['sponsor_id'];
         $member_id = $user_data['member_id'];
         $this->load->library('LevelIncomeLibrary');  // Loading Library 
         $referralLibrary = new LevelIncomeLibrary();
         $maxLevel = 9; // Max to Maximum level of referrals,
         // print_r($user_data);
        // exit;
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
        
        // $levelNumber = isset($_GET['levelNumber']) ? intval($_GET['levelNumber']) : 1; // Get the level number from the query string, default to 1 if not provided
        //     $entriesPerPage = 9; // Define the number of entries to show per page
            
        //     if ($levelNumber == 1) {
        //         // Display only the first 9 entries for level 1
        //         $levelData = array_slice($counts[$levelNumber] ?? [], 0, $entriesPerPage);
        //     } else {
        //         // For other levels, calculate the starting index
        //         $start = ($levelNumber - 1) * $entriesPerPage;
        //         // Display data for the current level
        //         $levelData = array_slice($counts[$levelNumber] ?? [], $start, $entriesPerPage);
               
        //     }
            
        //     if (!empty($levelData)) {
        //         // Generate HTML content for the modal body
        //         $html = '<table class="table table-clrs text-center modal-table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">';
        //         $html .= ' <thead><tr><th>MemberID </th><th>Member Name</th><th>Status</th><th>Package</th></tr> </thead>';
        //         $html .= '<tbody>';
        //         foreach ($levelData as $memberId => $data) {
        //             // Replace this with your actual database queries
        //             $query = $this->db->select('first_name,last_name, user_status, activated_package')
        //                              ->where('member_id', $memberId)
        //                              ->get('users');
                               
        //             $result = $query->row();
        //             $memberName = $result->first_name . ' ' . $result->last_name;
        //             $activatedPackage = $result->activated_package;
        //             $status = $result->user_status;
        //             if ($status == 'Active') {
        //                 $statusBadge = '<span class="badge badge-light-success">Active</span>';
        //             } else {
        //                 $statusBadge = '<span class="badge badge-light-danger">Inactive</span>';
        //             }
            
        //             $html .= "<tr><td>$memberId</td><td>$memberName</td><td>$statusBadge</td><td>₹ $activatedPackage</td> </tr>";
        //         }
        //         $html .= '</tbody>';
        //         $html .= '</table>';
            
        //         echo $html;
        //     } else {
        //         echo "No data available for Level $levelNumber.";
        //     }

       
            $levelNumber = $_GET['levelNumber'];
          $levelData = $counts[$levelNumber] ?? null;
        
          if ($levelData) {
              // Generate HTML content for the modal body
              $html = '<table class="table table-clrs text-center modal-table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">';
              $html .= ' <thead><tr><th>MemberID </th><th>Member Name</th><th>Status</th><th>Package</th></tr> </thead>';
              $html .= '<tbody>';
              foreach ($levelData as $memberId => $data) {
                  // Replace this with your actual database queries
                  $query = $this->db->select('first_name,last_name, user_status, activated_package')
                                     ->where('member_id', $memberId)
                                     ->get('users');
                   
                  $result = $query->row();
                  $memberName = $result->first_name . ' ' . $result->last_name;
                  $activatedPackage = $result->activated_package;
                  $status = $result->user_status;
                  if ($status == 'Active') {
                      $statusBadge = '<span class="badge badge-light-success">Active</span>';
                  } else {
                      $statusBadge = '<span class="badge badge-light-danger">Inactive</span>';
                  }

                   
                  $html .= "<tr><td>$memberId</td><td>$memberName</td><td>$statusBadge</td><td>₹ $activatedPackage</td> </tr>";
              }
              $html .= '</tbody>';
              $html .= '</table>';
       
              echo $html;
          } else {
              echo "No data available for Level $levelNumber.";
          }

      }
      
          public function generateDummayIDs()
    {
        // Get the number from the form input
        $number = $this->input->post('number');
        $sponsor_id = $this->input->post('sponsored_id');
        $package = $this->input->post('package');
        $packageSplit = explode(' - ', $package);

        $packageName = $packageSplit[0];
        $amount = $packageSplit[1];

        // Initialize an array to store the generated names
        $data = [];

        for ($i = 0; $i < $number; $i++) {
            // Generate random first and last names
            $randomData = $this->generateRandomName();

            // Add the generated data to the array
            $data = [
                'first_name' => $randomData['fname'],
                'last_name' => $randomData['lname'],
                'member_id' => $randomData['member_id'],
                'sponsor_id' => $sponsor_id,
                'password' => '1'
            ];
            $this->db->insert('users', $data);
            $this->dummyActivateID($randomData['member_id'], $sponsor_id, $amount, $packageName);
            $data[] = $data;
        }


        // Now, $names contains an array of random names $number times

        // You can proceed to store $names and other data in the database
        // Your database logic goes here

        // Return a response to the AJAX request
        $response = [
            'status' => 'success',
            'message' => 'Data stored successfully!',

        ];

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function generateRandomName()
    {
        // List of sample first names and last names
        $firstNames = ['John', 'Jane', 'Alice', 'Bob', 'David'];
        $lastNames = ['Smith', 'Johnson', 'Doe', 'Williams', 'Brown'];

        $memberid = 'MAN' . sprintf('%05d', rand(0, 9999));

        // Check if the generated member ID already exists in the database
        $existingMember = $this->User->getUserByMemberId($memberid);

        if ($existingMember) {
            // Member ID already exists, generate a new one
            $memberid = 'MAN' . sprintf('%05d', rand(0, 9999999));
        }

        // Randomly select a first name and last name
        $randomFirstName = $firstNames[array_rand($firstNames)];
        $randomLastName = $lastNames[array_rand($lastNames)];

        // Concatenate the first name and last name
        // $randomName = $randomFirstName . ' ' . $randomLastName;

        return [
            'fname' => $randomFirstName,
            'lname' => $randomLastName,
            'member_id' => $memberid,
        ];
    }

    public function dummyActivateID($member_id, $sponsor_id, $amount, $packageName)
    {
        if ($packageName == 'RePurchase Package') {
            $data = array(
                'member_id' => $member_id,
                'amount' => $amount,
                'pin' => 0000000,
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('repurchase', $data);

            $commissionTable = array(
                1 => 20,
                2 => 10,
                3 => 10,
                4 => 5,
                5 => 5,
                6 => 5,
                7 => 5,
            );

            $this->load->library('ReferralLibrary');
            $referralLibrary = new ReferralLibrary();
            $maxLevel = 7; // Maximum level of referrals
            $referrals = $referralLibrary->getReferrals($sponsor_id, 1, $maxLevel);
            $referrals[1][1] = array('referralId' => $member_id, 'sponsorId' => $sponsor_id);  // Set Level 1 referral as an array with the sponsor_id

            ksort($referrals);
            $counts = array();
            foreach ($referrals as $level => $levelReferrals) {
                foreach ($levelReferrals as $index => $referral) {
                    $referralId = $referral['referralId'];
                    $sponsorId = $referral['sponsorId'];

                    if (!isset($counts[$sponsorId])) {
                        $counts[$sponsorId] = array(
                            'directReferrals' => 0, // Initialize the direct referrals count
                            'totalReferrals' => 0   // Initialize the total referrals count
                        );
                    }

                    // Increment the direct referrals count
                    $counts[$sponsorId]['directReferrals'];

                    // Fetch the total referrals count for the sponsor
                    $query = $this->db->select('COUNT(*) as totalReferrals')->where('sponsor_id', $sponsorId)->get('users');
                    $result = $query->row();
                    $totalReferrals = $result->totalReferrals;

                    // Update the total referrals count
                    $counts[$sponsorId]['totalReferrals'] += $totalReferrals;

                    $commissionAmount = $commissionTable[$level];

                    // Add record in e_wallet_history history
                    if (!empty($sponsorId)) {
                        $data = array(
                            'member_id' => $sponsorId,
                            'amount' => $commissionAmount,
                            'amount_for' => "Level Income",
                            'level' => $level,
                            'amountType' => 'Repurchase Amount',
                            'amout_received_from' => "Amount from " . $member_id,
                            'created_at' => date('Y-m-d H:i:s') // Current datetime,
                        );

                        $this->db->insert('e_wallet_history', $data);
                        $response = array(
                            'success' => true,
                            'title' => 'Congratulations',
                            'message' => $member_id . 'ID has been successfully repurchased!'
                        );
                    }
                }
            }
        } else {

            $this->db->where('member_id', $member_id)->update('users', array('activated_package' => $amount));
            $this->db->where('member_id', $member_id)->update('users', array('user_status' => 'Active'));
            $this->db->where('member_id', $member_id)->update('users', array('activated_date' => date('Y-m-d H:i:s')));

            $commissionTable = array(
                1 => 40,
                2 => 20,
                3 => 10,
                4 => 5,
                5 => 5,
                6 => 3,
                7 => 3,
            );

            $this->load->library('ReferralLibrary');
            $referralLibrary = new ReferralLibrary();
            $maxLevel = 7; // Maximum level of referrals
            $referrals = $referralLibrary->getReferrals($sponsor_id, 1, $maxLevel);
            $referrals[1][1] = array('referralId' => $member_id, 'sponsorId' => $sponsor_id);  // Set Level 1 referral as an array with the sponsor_id

            ksort($referrals);

            $counts = array();
            foreach ($referrals as $level => $levelReferrals) {
                foreach ($levelReferrals as $index => $referral) {
                    $referralId = $referral['referralId'];
                    $sponsorId = $referral['sponsorId'];

                    if (!isset($counts[$sponsorId])) {
                        $counts[$sponsorId] = array(
                            'directReferrals' => 0, // Initialize the direct referrals count
                            'totalReferrals' => 0   // Initialize the total referrals count
                        );
                    }

                    // Increment the direct referrals count
                    $counts[$sponsorId]['directReferrals'];

                    // Fetch the total referrals count for the sponsor
                    $query = $this->db->select('COUNT(*) as totalReferrals')->where('sponsor_id', $sponsorId)->get('users');
                    $result = $query->row();
                    $totalReferrals = $result->totalReferrals;

                    // Update the total referrals count
                    $counts[$sponsorId]['totalReferrals'] += $totalReferrals;

                    $commissionAmount = $commissionTable[$level];

                    // Add record in e_wallet_history history
                    if (!empty($sponsorId)) {
                        $data = array(
                            'member_id' => $sponsorId,
                            'amount' => $commissionAmount,
                            'amount_for' => "Level Income",
                            'level' => $level,
                            'amountType' => 'Normal Amount',
                            'amout_received_from' => "Amount from " . $member_id,
                            'created_at' => date('Y-m-d H:i:s') // Current datetime,
                        );

                        $this->db->insert('e_wallet_history', $data);
                    }
                }
            }
        }
    }

    public function repurchaseActivateID()
    {
        $member_ids = $this->input->post('memberIds');
        $package = $this->input->post('repurchase');
        $packageSplit = explode(' - ', $package);
   

        $packageName = $packageSplit[0];
        $amount = $packageSplit[1];

        foreach ($member_ids as $key => $value) {
            $member_id = $value;
            $this->db->select('sponsor_id');
            $this->db->from('users');
            $this->db->where('member_id', $member_id); // Move the where condition here
            $query = $this->db->get(); // Use get() to execute the query
            $result = $query->result_array();
            $sponsor_id = $result[0]['sponsor_id'];
            
            

            $this->db->where('member_id', $member_id)->update('users', array('activated_package' => $amount));
            $this->db->where('member_id', $member_id)->update('users', array('user_status' => 'Active'));
            $this->db->where('member_id', $member_id)->update('users', array('activated_date' => date('Y-m-d H:i:s')));

            $commissionTable = array(
                1 => 40,
                2 => 20,
                3 => 10,
                4 => 5,
                5 => 5,
                6 => 3,
                7 => 3,
            );

            $this->load->library('ReferralLibrary');
            $referralLibrary = new ReferralLibrary();
            $maxLevel = 7; // Maximum level of referrals
            $referrals = $referralLibrary->getReferrals($sponsor_id, 1, $maxLevel);
            $referrals[1][1] = array('referralId' => $member_id, 'sponsorId' => $sponsor_id);  // Set Level 1 referral as an array with the sponsor_id

            ksort($referrals);

            $counts = array();
            foreach ($referrals as $level => $levelReferrals) {
                foreach ($levelReferrals as $index => $referral) {
                    $referralId = $referral['referralId'];
                    $sponsorId = $referral['sponsorId'];

                    if (!isset($counts[$sponsorId])) {
                        $counts[$sponsorId] = array(
                            'directReferrals' => 0, // Initialize the direct referrals count
                            'totalReferrals' => 0   // Initialize the total referrals count
                        );
                    }

                    // Increment the direct referrals count
                    $counts[$sponsorId]['directReferrals'];

                    // Fetch the total referrals count for the sponsor
                    $query = $this->db->select('COUNT(*) as totalReferrals')->where('sponsor_id', $sponsorId)->get('users');
                    $result = $query->row();
                    $totalReferrals = $result->totalReferrals;

                    // Update the total referrals count
                    $counts[$sponsorId]['totalReferrals'] += $totalReferrals;

                    $commissionAmount = $commissionTable[$level];

                    // Add record in e_wallet_history history
                    if (!empty($sponsorId)) {
                        $data = array(
                            'member_id' => $sponsorId,
                            'amount' => $commissionAmount,
                            'amount_for' => "Level Income",
                            'level' => $level,
                            'amountType' => 'Normal Amount',
                            'amout_received_from' => "Amount from " . $member_id,
                            'created_at' => date('Y-m-d H:i:s') // Current datetime,
                        );

                        $this->db->insert('e_wallet_history', $data);
                    }
                }
            }
        }
    }
 
}
