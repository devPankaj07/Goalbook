<?php

class ReferralLibrary {
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

    protected function fetchReferrals($memberId, &$referrals, $level, $maxLevel, $sponsorId = null) {
        if ($level >= $maxLevel) {
            return;
        }
        
        $nextLevel = $level + 1;
        $query = $this->CI->db->select('member_id, sponsor_id')
                      ->where('member_id', $memberId)
                      ->where('user_status', 'Active')
                      ->where('block_status', 0)
                      ->get('users');
        $results = $query->result();
    
        if (!empty($results)) {
            foreach ($results as $result) {
                $referralId = $result->member_id;
                $sponsorId = $result->sponsor_id;
                
                // Add referral to the flat referrals array
                $referrals[] = array('referralId' => $referralId, 'sponsorId' => $sponsorId);
                
                // Recursive call to fetch referrals of the referral
                $this->fetchReferrals($sponsorId, $referrals, $nextLevel, $maxLevel);
            }
        }
    }
    
}

?>
