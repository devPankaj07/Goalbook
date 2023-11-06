<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');      
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}


    public function roi_income_process()
	{
		// get the tabel roi inome process 

		$table = $this->db->get('e_wallet_process')->result_array();
		foreach ($table as $value) {
			$currentDate = date('Y-m-d');
			$created_on = $value['created_on'];
			$created_on = date('Y-m-d', strtotime($created_on));
			// print_r( $value);
			if ($currentDate == $created_on ) {
				echo 'ROI Dont Distrubute';
				echo '<br>';
			}else{
			
			echo 'ROI Distrubute';
			echo '<br>';

			$member_id = $value['member_id'];
			$sponsor_id = $value['sponsor_id'];
			$roi_amount = $value['roi_amount'];
			$roi_registration_amt = $value['registration_fees'];
			// echo 	$roi_registration_amt;
			$roi = array(
				'100.00' => 0.4,  // 180
				'200.00' => 0.8,  // 360
				'300.00' => 1.2,  // 540
				'400.00' => 1.6,  // 720
				'500.00' => 2.0,  // 900
				'800.00' => 2.8,  // 1260
				'1000.00' => 3.6, // 1620
				'1300.00' => 4.8, // 2160
				'1500.00' => 6.0, // 2700 
			);
			$roi_value = 0;
			if (isset($roi[$roi_registration_amt])) {
				$roi_value = $roi[$roi_registration_amt];
			 
			} else {
				echo "ROI value for $roi_registration_amt not found";
			}

			// Get Daily Amount for 15 Months ROI
			// $months = 15;
			// $days_in_month = 30;
			// $total_days = $months * $days_in_month;
			// $amount = $roi_amount / $total_days;
			$amount = $roi_value;
			$result = $this->db->where('member_id', $member_id)->where('registration_fees', $roi_registration_amt)
				->set('roi_amount',  $roi_amount - $amount)
				->update('e_wallet_process');

			if ($result == true) {
				 
				$query = $this->db->where('member_id', $member_id)->get('e_wallet');
				if ($query->num_rows() > 0) {
					// Update amount in E Wallet Table
					$this->db->where('member_id', $member_id)
						->set('amount', "amount + $amount", false)
						->update('e_wallet');
				} else {
					// Create a New record 
					$data = array(
						'member_id' => $member_id,
						'amount' => $amount,
						'created_at' => date('Y-m-d H:i:s') // Current datetime,
					);

					$this->db->insert('e_wallet', $data);
				}

				// Add record in e_wallet_history history

				$data = array(
					'member_id' => $member_id,
					'amount' => $amount,
					'amount_for' => "ROI Income",
					'created_at' =>  date('Y-m-d H:i:s') // Current datetime,
				);

				$this->db->insert('e_wallet_history', $data);


				// Sponsor's Sponsors Id Getting & ROI Calculation Logic 
				$this->load->library('ReferralLibrary');
				$referralLibrary = new ReferralLibrary();
				$maxLevel = 10; // Maximum level of referrals

				$referrals = $referralLibrary->getReferrals($sponsor_id, 1, $maxLevel);
				$referrals[1][1] = array('referralId' => $member_id, 'sponsorId' => $sponsor_id);  // Set Level 1 referral as an array with the sponsor_id

				$counts = array(); // Array to store the sponsor and referral counts
 

				$results = [];

				foreach ($counts as $key => $value) {
					$results[$key] = $value['directReferrals'];
					// $reversedArray = array_flip($results);
				}
			
 
				$commissionTable = array(
					1 => 10,
					2 => 10,
					3 => 7,
					4 => 7,
					5 => 5,
					6 => 5,
					7 => 3,
					8 => 3,
					9 => 2,
					10 => 2
				);

			 
				$counts = array(); // Array to store the sponsor and referral counts

				$userDirectReferrals = array(); // Array to store user direct referrals

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
						$counts[$sponsorId]['directReferrals']++;
						// print_r($counts);
						// Fetch the total referrals count for the sponsor
						$query = $this->db->select('COUNT(*) as totalReferrals')->where('sponsor_id', $sponsorId)->get('users');
						$result = $query->row();
						$totalReferrals = $result->totalReferrals;

						// Update the total referrals count
						$counts[$sponsorId]['totalReferrals'] += $totalReferrals;
						// print_r($counts[$sponsorId]['directReferrals']);
						if ($level <= 10 && !empty($sponsorId)) {
							// Ensure referral level is within the commissionTable range
							// and Sponsor ID is not empty

							if (!isset($userDirectReferrals[$sponsorId])) {
								$userDirectReferrals[$sponsorId] = 0;
							}

							$userDirectReferrals[$sponsorId]++; // Increment the direct referrals count for the user
							// echo $counts[$sponsorId]['totalReferrals'];
							if ($level <= 10 && !empty($sponsorId) && $counts[$sponsorId]['totalReferrals'] >= $level) {

								// Store the payment date
								$paymentDate = date('Y-m-d H:i:s');

								// Store the payment date in the database
								$data = array(
									'member_id' => $referralId,
									'sponsor_id' => $sponsorId,
									'level' => 'Level ' . $level,
									'payment_created_on' => $paymentDate
								);
								 
								$this->db->insert('level_income_data', $data);
								// Retrieve the payment date from the database
							
								$query = $this->db	
									->select('*')
									->where('member_id', $member_id)
									->where('activated_packages', $roi_registration_amt)
									->get('user_activated_packages');

								$result = $query->row();
								 
								$paymentDate = $result->created_at;
								$paymentDate = date('Y-m-d', strtotime($paymentDate));
								$currentDate = date('Y-m-d');
								// Check if 183 days have passed since the payment date
								$paymentDatePlus183 = date('Y-m-d', strtotime('+6 months', strtotime($paymentDate)));
								// echo '<br>';
								// echo $paymentDate;
								// echo '<br>';
								// echo $paymentDatePlus183;
								// echo '<br>';
								// echo $currentDate;
								// echo '<br>';
								// echo $sponsorId;
								// echo '<br>';
								// if ($currentDate <= $paymentDatePlus183) {
								// 	echo 'He Will Get';
								// } else {
								// 	echo 'He Will Not Get';
								// }
								// $paymentDatePlus183 = '2023-07-09';
							 
								if ($currentDate  <= $paymentDatePlus183) {
									$commissionPercentage = $commissionTable[$level];
									$commission = ($commissionPercentage / 100) * $amount;

									echo "Referral ID: $referralId<br>";
									echo "Sponsor ID: $sponsorId<br>";
									echo "Level: $level<br>";
									echo "Commission Percentage: $commissionPercentage<br>";
									echo "Commission Amount: $commission<br>";
									echo "<br>";

									// Update amount in E Wallet Table
									$this->db->where('member_id', $sponsorId)
										->set('amount', "amount + $commission", false)
										->update('e_wallet');

									// Add record in e_wallet_history history
									$data = array(
										'member_id' => $sponsorId,
										'amount' => $commission,
										'amount_for' => "Level Income",
										'amout_received_from' => "Amount from " . $referralId,
										'created_at' => date('Y-m-d H:i:s') // Current datetime,
									);

									$this->db->insert('e_wallet_history', $data);
								}else{
									echo 'Date Perioed is Expired';
								}
		
							} else {
								echo "User $sponsorId does not have $level direct referrals.<br>";
							}
						}
					}
				}
				echo '<br>';
				print_r($counts);
				echo '<br>';
			} else {
				echo 'not Updated';
			}
			}
			
		}
	}

	public function royalty_check() {
		$designations = [
			'Executive',
			'Silver Exe.',
			'Gold Exe.',
			'Pearl Exe.',
			'Platinum',
		];
	
		$royaltyAchievers = $this->db->get('royalty_achievers')->result_array();
		$royalty = $this->db->get('royalty')->row_array(); // Assuming there's only one row
	
		foreach ($royaltyAchievers as $value) {
			if (in_array($value['designation'], $designations)) {
				$designation = $value['designation'];
				$designationKey = str_replace(' ', '_', strtolower($designation)); // Convert to lowercase and replace spaces with underscores
	
				$this->db->where('designation', $designation);
				$designatedMembers = $this->db->get('royalty_achievers')->result_array();
				$designatedCount = count($designatedMembers);
	
				if ($royalty && isset($royalty[$designationKey])) {
					$royaltyAmount = $royalty[$designationKey];
					$amount = $royaltyAmount / $designatedCount;
	
					$data = array(
						'member_id' => $value['member_id'],
						'amount' => $amount,
						'amount_for' => "Royalty Income",
						'amout_received_from' => "Amount for $designation",
						'created_at' => date('Y-m-d H:i:s'), // Current datetime,
					);
 
					$this->db->insert('e_wallet_history', $data);

				}
			}
		}
	}
	
	
}
