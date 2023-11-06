<!-- ------------------header-------- -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dasboard</title>
   <?php require_once(__DIR__ . '/../includes/head.php'); ?>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <style>
      @media screen and (max-width: 467px) {
         .homecard {
            margin-top: 20px;
         }

         .admindetails .col-lg-4 {
            padding-bottom: 15px;
            margin: auto;
         }

         .easyaccess .col-lg-2 {
            padding-bottom: 15px;
            width: 120px;
            margin: auto;
         }

         .easyaccess .col-lg-2 .card-body {
            height: 110px;
            background: #f3cccc;
            border-radius: 20px;
         }

         .colockround .col-lg-2 {
            display: flex;
         }

         .colockround {
            margin: -20px;
         }
      }

      /* Styling for the container holding the images */
      .overlapimg {
         position: relative;
         /* Set the container as the positioning context */
         width: 200px;
         /* Set the width of the container */
         height: 200px;
         /* Set the height of the container */
      }

      /* Styling for the images */
      .overlapimg img {
         position: absolute;
         /* Position the images relative to the container */
         top: 0;
         /* Position from the top edge of the container */
         left: 0;
         /* Position from the left edge of the container */
      }

      .overlapimg .clockimg {
         position: absolute;
         /* Position the images relative to the container */
         top: 0;
         /* Position from the top edge of the container */
         left: 0;
         /* Position from the left edge of the container */
         animation: rotateClockwise 5s linear infinite;
         /* Apply the rotation animation */
      }

      @keyframes rotateClockwise {
         0% {
            transform: rotate(0deg);
            /* Start the rotation from 0 degrees */
         }

         100% {
            transform: rotate(360deg);
            /* End the rotation at 360 degrees (one full circle) */
         }
      }

      .colockround {
         overflow: hidden;
      }

      .admindetails {
         overflow: hidden;
      }
   </style>
   <!-- -------------------------------------new card css start------------------------------- -->
   <style>
      .cardbtn {
         width: 90%;
         background: #b1adad;
         background: #e6ecff;
         color: #3363ff;
         padding: 2px !important;
         border-radius: 24px;
         font-size: 20px;
         font-weight: 600;
         margin-top: 5px;
      }

      .cardbtn i {
         color: black;
         width: 20%;
         padding-left: 10%;
      }

      .cardbtn:hover,
      .cardbtn:active {
         background-color: #dce4ff;
      }

      #topcard .card {
         background: #f5f5f5;
         width: 100%;
      }

      #topcard h2 {
         font-size: 21px;
         font-weight: 500;
      }

      #topcard .card-body {
         padding: 0.5rem 0.5rem 0.5rem 0.5rem;
      }

      #topcard {
         padding: 5px;
      }

      .tab {
         display: none;
      }

      #topcard img {
         height: 100px;
      }

      /* -------------------------media query for the cards start----------------------------- */
      @media only screen and (max-width: 476px) {
         #topcard {
            width: 50% !important;
            max-width: 50% !important;
         }

         #topcard h2 {
            font-size: 10px;
            font-weight: 600;
         }

         #topcard .card-body {
            padding: 0.5rem 0rem 0.5rem 0rem;
         }

         .cardbtn {
            width: 100%;
            background: #b1adad;
            background: #e6ecff;
            color: #3363ff;
            padding: 0px !important;
            border-radius: 24px;
            font-size: 15px;
            font-weight: 600;
         }

         .tab {
            display: none;
         }

         .card-title {
            font-size: 22px !important;
            padding-top: 10px;
         }
      }

      @media only screen and (min-width: 477px) and (max-width: 768px) {
         #topcard {
            width: 50% !important;
            max-width: 50% !important;
         }

         .admindetails .col-lg-4 {
            padding-bottom: 15px;
         }

         .colockround .col-lg-2 {
            display: flex;
            margin-left: 10%;
         }

         .tab {
            display: block;
         }

         #topcard h2 {
            font-size: 27px;
            font-weight: 500;
         }

         .cardbtn {
            width: 100%
         }

         .card-title {
            font-size: 35px !important;
            padding-top: 20px;
         }

         .tophead {
            font-size: 29px;
         }
      }

      @media only screen and (min-width: 769px) and (max-width: 1024px) {
         #topcard {
            width: 50% !important;
            max-width: 50% !important;
         }

         .admindetails .col-lg-4 {
            padding-bottom: 15px;
         }

         .colockround .col-lg-2 {
            display: flex;
            margin-left: 10%;
         }

         .tab {
            display: block;
         }

         #topcard h2 {
            font-size: 25px;
            font-weight: 500;
         }

         .cardbtn {
            width: 100%
         }

         .card-title {
            font-size: 35px !important;
            padding-top: 20px;
         }

         .tophead {
            font-size: 29px;
         }
      }
   </style>
   <!-- -----------------------------------new top card css------------------------------- -->
   <style>
      #newtop .card {
         position: relative;
      }

      #newtop .card img {
         position: relative;
         border-radius: 10px;
      }

      #newtop .card-body {
         position: absolute;
         top: 5%
      }

      #newtop .card .card-body {
         padding: 10px;
      }
   </style>
</head>

<body>
   <?php include_once("header.php"); ?>
   <!--begin::Sidebar-->
   <?php include_once("sidebar.php"); ?>
   <!--end::Sidebar-->
   <!--begin::Main-->

   <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
      <!--begin::Content wrapper-->
      <?php $valuesToCheck = ['Dashboard']; ?>
      <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
         <div class="d-flex flex-column flex-column-fluid">

            <div class="text-dark fw-bold fs-2 mb-2 mt-5 tophead" style="    padding-left: 20px;">Welcome to Manved Enterprises Super Admin </div>
            <div class="row admindetails pb-15 pt-10">
               <div class="col-lg-4">
                  <div class="card uicard" style="border: 1px solid #db4437; border-radius: 20px; box-shadow: rgba(219, 68, 55, 0.25) 0px 10px 17px, rgba(219, 68, 55, 0.12) 0px -12px 30px, rgba(219, 68, 55, 0.12) 0px 0px 0px, rgba(219, 68, 55, 0.17) 0px 0px 0px, rgba(219, 68, 55, 0.09) 0px -3px 0px;" data-aos="fade-down-right">
                     <div class="card-body" style="padding: 0px;">
                        <div class="cardlineone">
                           <h5 class="card-title text-center m-0 pt-2 pb-2">Your Monthly Maintenance</h5>
                        </div>
                        <div class="cardlinetwo" style="background-color: #fff7f9;">
                           <h5 class="card-title text-center m-0 pt-2 pb-2 text-danger">₹ 900</h5>
                        </div>
                        <div class="cardlinethree" style="background-color: #fff0f3; border-radius: 0px 0px 20px 20px;">
                           <h5 class="card-title text-center m-0 pt-1 pb-1" style="font-weight: 700; font-size: 20px; color: #db4437">August 2023</h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card uicard" style="border: 1px solid #4285f4; border-radius: 20px; box-shadow: rgba(66, 133, 244, 0.25) 0px 10px 17px, rgba(66, 133, 244, 0.12) 0px -12px 30px, rgba(66, 133, 244, 0.12) 0px 0px 0px, rgba(66, 133, 244, 0.17) 0px 0px 0px, rgba(66, 133, 244, 0.09) 0px -3px 0px;" data-aos="fade-down">
                     <div class="card-body" style="padding: 0px;">
                        <div class="cardlineone">
                           <h5 class="card-title text-center m-0 pt-2 pb-2">Yearly Renewal Time Remaining</h5>
                        </div>
                        <div class="cardlinetwo" style="background-color: #edf4ff;">
                           <h5 class="card-title text-center m-0 pt-2 pb-2" style="color: #336dcd;">Domain | Server</h5>
                        </div>
                        <div class="cardlinethree" style="background-color: #d3e4ff; border-radius: 0px 0px 20px 20px;">
                           <h5 class="card-title text-center m-0 pt-1 pb-1" style="font-weight: 700; font-size: 20px; color: #4285f4;"> 11 Months Remaining</h5>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="card uicard" style="border: 1px solid #0f9d58; border-radius: 20px; box-shadow: rgba(15, 157, 88, 0.25) 0px 10px 17px, rgba(15, 157, 88, 0.12) 0px -12px 30px, rgba(15, 157, 88, 0.12) 0px 0px 0px, rgba(15, 157, 88, 0.17) 0px 0px 0px, rgba(15, 157, 88, 0.09) 0px -3px 0px;" data-aos="fade-down-left">
                     <div class="card-body" style="padding: 0px;">
                        <div class="cardlineone">
                           <h5 class="card-title text-center m-0 pt-2 pb-2">Upgrade Your Manved Enterprises System</h5>
                        </div>
                        <div class="d-flex" style="justify-content: space-around; background-color: #e1fff1; border-radius: 0px 0px 20px 20px;">
                           <div class="pt-3" style="justify-content: space-around;">
                              <div class="cardlinetwo" style="justify-content: space-around;">
                                 <input type="checkbox" id="myCheckbox1">
                                 <label for="myCheckbox1" style="color: #0f9d58;">Recharge Portal</label>
                              </div>
                              <div class="cardlinetwo" style="justify-content: space-around;">
                                 <input type="checkbox" id="myCheckbox2">
                                 <label for="myCheckbox2" style="color: #0f9d58;">E-commerce</label>
                              </div>
                           </div>
                           <div class="pb-3 pt-3" style="justify-content: space-around; border-radius: 0px 0px 20px 20px;">
                              <div class="cardlinetwo" style="justify-content: space-around;">
                                 <input type="checkbox" id="myCheckbox3">
                                 <label for="myCheckbox3" style="color: #0f9d58;">Payout Gateway</label>
                              </div>
                              <div class="cardlinetwo" style="justify-content: space-around;">
                                 <input type="checkbox" id="myCheckbox4">
                                 <label for="myCheckbox4" style="color: #0f9d58;">E-mail</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div>


               <!-- -------------------------------------card section start----------------------------- -->
               <div class="text-dark fw-bold fs-2 mb-2 mt-5 tophead">Manved Enterprises Admin Details</div>
               <div class="row bluecard">
                  <div class="col-lg-3 " id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/member_list">
                              <img src="<?php echo base_url() ?>assets/img/n1.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Total Joining</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php print_r(count($users)) ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/active_list">
                              <img src="<?php echo base_url() ?>assets/img/n2.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Total Active Account</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $activeUsersCount = 0;

                                                                                                               foreach ($users as $key => $value) {
                                                                                                                  if ($value['user_status'] == 'Active') {
                                                                                                                     $activeUsersCount++;
                                                                                                                  }
                                                                                                               }

                                                                                                               echo $activeUsersCount;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/inactive_lis">
                              <img src="<?php echo base_url() ?>assets/img/n3.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Total Inactive Account</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $inactiveUsersCount = 0;

                                                                                                               foreach ($users as $key => $value) {
                                                                                                                  if ($value['user_status'] == 'Inactive') {
                                                                                                                     $inactiveUsersCount++;
                                                                                                                  }
                                                                                                               }

                                                                                                               echo $inactiveUsersCount;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/kyc">
                              <img src="<?php echo base_url() ?>assets/img/n4.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Total KYC Request Pending</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $pendingKYC = 0;

                                                                                                               foreach ($kyc as $item) {
                                                                                                                  if ($item['pan_card_status'] == 'Pending' && $item['cheque_book_status'] == 'Pending') {
                                                                                                                     $pendingKYC++;
                                                                                                                  }
                                                                                                               }

                                                                                                               echo $pendingKYC;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="#">
                              <img src="<?php echo base_url() ?>assets/img/n5.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Activation wallet <br> Balance</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $ttl_toptup_wallet_amt = 0;

                                                                                                               foreach ($topup_wallet as $item) {

                                                                                                                  $ttl_toptup_wallet_amt += $item['amount'];
                                                                                                               }

                                                                                                               echo '₹' . $ttl_toptup_wallet_amt;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="#">
                              <img src="<?php echo base_url() ?>assets/img/n6.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Total E-wallet <br> Balance</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"> <?php
                                                                                                                  $ttl_ewallet_amt = 0;

                                                                                                                  foreach ($e_wallet as $item) {

                                                                                                                     $ttl_ewallet_amt += $item['amount'];
                                                                                                                  }

                                                                                                                  echo '₹' . $ttl_ewallet_amt;
                                                                                                                  ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="#">
                              <img src="<?php echo base_url() ?>assets/img/n7.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Closing <br> Balance</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;">000</h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/member_list">
                              <img src="<?php echo base_url() ?>assets/img/n8.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Manved Enterprises Company <br> Business</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;">1234</h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="#">
                              <img src="<?php echo base_url() ?>assets/img/n9.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Manved Enterprises Company Business</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $ttl_today_business = 0;
                                                                                                               $today = date('Y-m-d');
                                                                                                               foreach ($users as $item) {
                                                                                                                  $activatedDate = $item['activated_date'];
                                                                                                                  $dateOnly = date('Y-m-d', strtotime($activatedDate));
                                                                                                                  if ($dateOnly == $today) {
                                                                                                                     $ttl_today_business += $item['activated_package'];
                                                                                                                  }
                                                                                                               }

                                                                                                               echo '₹' . $ttl_today_business;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/tax_charges?key=tds">
                              <img src="<?php echo base_url() ?>assets/img/n10.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Total TDS Charges Collected</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $dollar = 80;
                                                                                                               $inr_amount = $dollar * $total_amount_for_tds_service;
                                                                                                               $inr_amount = round($inr_amount * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                                                                                               $dollar_amount = round($total_amount_for_tds_service * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                                                                                               echo '₹' . $inr_amount . ' ' . '₹' . $dollar_amount;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="<?php echo base_url() ?>Admin/tax_charges?key=admin">
                              <img src="<?php echo base_url() ?>assets/img/n11.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">Service Charges Collected</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;"><?php
                                                                                                               $dollar = 80;
                                                                                                               $inr_amount = $dollar * $total_amount_for_tds_service;
                                                                                                               $inr_amount = round($inr_amount * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                                                                                               $dollar_amount = round($total_amount_for_tds_service * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                                                                                               echo '₹' . $inr_amount . ' ' . '₹' . $dollar_amount;
                                                                                                               ?></h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3" id="newtop" data-aos="fade-right">
                     <div class="pt-5">
                        <div class="card">
                           <a href="#">
                              <img src="<?php echo base_url() ?>assets/img/n12.jpeg" class="card-img-top" alt="...">
                              <div class="card-body">
                                 <h2 class="card-title text text-white">SMS Left</h2>
                                 <h2 class="card-title" style="font-weight:600; font-size:20px;color:#FF5F1F;">1234</h2>
                              </div>
                        </div>
                        </a>
                     </div>
                  </div>
               </div>
          
               <!-- -------------------------------------card section end----------------------------- -->
            </div>
         <?php } else { ?>
            <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center">
               <!-- -------------------------------------card section start----------------------------- -->
               <h1 class="card-label fw-bold fs-3 mb-1">Welcome to the Manved Enterprises Dashbaord</h1>
               <!-- -------------------------------------card section end----------------------------- -->
            </div>
         <?php } ?>

         <div class="text-dark fw-bold fs-2 mb-2  pb-5 pt-10 tophead" style="    padding-left: 40px;">Easy Access Options</div>
         <div class="row colockround ">
            <div class="col-lg-2">
               <a href="<?php echo base_url() ?>Admin/member_list">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/totalm.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?= base_url() ?>Admin/admins_list">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/adminlist.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/payout_direct_income">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/directincome.png" alt="Image 2">
                  </div>
               </a>
            </div>
            <div class="col-lg-2">
               <a href="<?php echo base_url() ?>Admin/active_list">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/activemember.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/fundrequest">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/adddebitfund.png" alt="Image 2">
                  </div>
               </a>
               <a href="#">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/tds.png" alt="Image 2">
                  </div>
               </a>
            </div>
            <div class="col-lg-2">
               <a href="<?php echo base_url() ?>Admin/inactive_list">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/inactivemember.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/fundrequest_history">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/fundrequesthistory.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url('Admin/packges') ?>">
                  <div class="overlapimg tab">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/addpackeges.png" alt="Image 2">
                  </div>
               </a>
            </div>
            <div class="col-lg-2">
               <a href="<?php echo base_url('Admin/packges') ?>">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/addpackeges.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/kyc">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/kycp.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/kyc_approved">
                  <div class="overlapimg tab">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/kycapproved.png" alt="Image 2">
                  </div>
               </a>
            </div>
            <div class="col-lg-2">
               <a href="<?php echo base_url() ?>Admin/edit_member_info">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/editmemberinfo.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/kyc_approved">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/kycapproved.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/payouts">
                  <div class="overlapimg tab">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/payoutreport.png" alt="Image 2">
                  </div>
               </a>
            </div>
            <div class="col-lg-2">
               <a href="<?= base_url() ?>Admin/create_admins">
                  <div class="overlapimg">
                     <!-- First image -->Level Bonus
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/createadmin.png" alt="Image 2">
                  </div>
               </a>
               <a href="<?php echo base_url() ?>Admin/payout_direct_income">
                  <div class="overlapimg">
                     <!-- First image -->
                     <img class="clockimg" src="<?php echo base_url() ?>assets/img/backring.png" alt="Image 1">
                     <!-- Second image -->
                     <img src="<?php echo base_url() ?>assets/img/payoutreport.png" alt="Image 2">
                  </div>
               </a>
            </div>
         </div>
         </div>
         <!--end::Modal body-->
   </div>
   <!--end::Modal content-->
   </div>
   <!--end::Modal dialog-->
   </div>
   <!--end::Modal - Invite Friend-->
   <!--end::Modals-->
   <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
      // Initialize AOS when the page has fully loaded
      window.addEventListener('load', function() {
         AOS.init();
      });
   </script>
</body>
<!--end::Body-->

</html>