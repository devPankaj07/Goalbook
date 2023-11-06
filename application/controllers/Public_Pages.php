<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        // Your constructor code here
    }

    public function index()
    {
        $this->load->view('index.php');
    }

    public function aboutus()
    {
        // Another method in the controller
        $this->load->view('about-us.php');
    }

    public function product()
    {
        // Another method in the controller
        $this->load->view('product-1.php');
    }

    public function reward()
    {
        // Another method in the controller
        $this->load->view('rewards.php');
    }

    
    public function contact()
    {
        // Another method in the controller
        $this->load->view('contact.php');
    }

    // Add more methods as needed

}
