<?php

class LevelIncomeLibrary {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->database();
    }

    public function getReferrals($memberId, $level = 1, $maxLevel = 10) {
        $referrals = array();

        // Recursive function to fetch referrals
        $this->fetchReferrals($memberId, $referrals, $level, $maxLevel);

        return $referrals;
    }

    protected function fetchReferrals($sponsorId, &$referrals, $level, $maxLevel) {
        if ($level > $maxLevel) {
            return;
        }
        
        $query = $this->CI->db->select('member_id, sponsor_id')->where('sponsor_id', $sponsorId)->where('user_status', 'Active')->get('users');
        $results = $query->result();
    
        if (!empty($results)) {
            foreach ($results as $result) {
                $referralId = $result->member_id;
                $sponsorId = $result->sponsor_id;
                
                // Check if referral already exists in the same level
                $isDuplicate = false;
                if (isset($referrals[$level])) {
                    foreach ($referrals[$level] as $referral) {
                        if ($referral['referralId'] == $referralId && $referral['sponsorId'] == $sponsorId) {
                            $isDuplicate = true;
                            break;
                        }
                    }
                }
    
                if ($isDuplicate) {
                    continue; // Skip adding duplicate referral
                }
    
                // Add referral to the respective level
                if (!isset($referrals[$level])) {
                    $referrals[$level] = array();
                }
    
                $referrals[$level][] = array('referralId' => $referralId, 'sponsorId' => $sponsorId);
    
                // Recursive call to fetch referrals of the referral
                $this->fetchReferrals($referralId, $referrals, $level + 1, $maxLevel);
            }
        }
    }
}

?>
