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
            .admindetails .col-lg-4{
                padding-bottom:15px;
                margin: auto;
               
            }
            .easyaccess .col-lg-2{
                padding-bottom:15px;
                width:120px;
                margin:auto;
                
            }
            .easyaccess .col-lg-2 .card-body{
                height: 110px;
                background: #f3cccc;
                border-radius: 20px;
            }
            .colockround .col-lg-2{
                display:flex;
            }
            .colockround{
                margin: -20px;
            }

        }
        
        
        .overlapimg {
    position: relative; /* Set the container as the positioning context */
    width: 200px; /* Set the width of the container */
    height: 200px; /* Set the height of the container */
}

/* Styling for the images */
.overlapimg img {
    position: absolute; /* Position the images relative to the container */
    top: 0; /* Position from the top edge of the container */
    left: 0; /* Position from the left edge of the container */
    

}

.overlapimg .clockimg {
    position: absolute; /* Position the images relative to the container */
    top: 0; /* Position from the top edge of the container */
    left: 0; /* Position from the left edge of the container */
    animation: rotateClockwise 5s linear infinite; /* Apply the rotation animation */

}

@keyframes rotateClockwise {
    0% {
        transform: rotate(0deg); /* Start the rotation from 0 degrees */
    }
    100% {
        transform: rotate(360deg); /* End the rotation at 360 degrees (one full circle) */
    }
}
.colockround{
    overflow:hidden;
}
.admindetails{
    overflow:hidden;
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
 

            <!-- -------------------------------------card section start----------------------------- -->
               <div class="text-dark fw-bold fs-2 mb-2 mt-5">Sunstar Admin Details</div>

            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                           

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                <?php print_r(count($users)) ?>
                            </div>

                            <div class="fw-semibold text-white">
                                TOTAL JOININGS </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>

                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                             

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                <?php
                   
                                $activeUsersCount = 0;

                                foreach ($users as $key => $value) {
                                    if ($value['user_status'] == 'Active') {
                                        $activeUsersCount++;
                                    }
                                }
                                
                                echo $activeUsersCount;
                                 ?>

                            </div>

                            <div class="fw-semibold text-white">
                                TOTAL ACTIVE ACCOUNTS </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>

                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                           
                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                            <?php
                   
                                $inactiveUsersCount = 0;

                                foreach ($users as $key => $value) {
                                    if ($value['user_status'] == 'Inactive') {
                                        $inactiveUsersCount++;
                                    }
                                }
                                
                                echo $inactiveUsersCount;
                            ?>
                            </div>

                            <div class="fw-semibold text-white">
                                TOTAL INACTIVE ACCOUNTS </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="<?php echo base_url()?>Admin/kyc" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                           

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                <?php 
                                $pendingKYC = 0;

                                foreach ($kyc as $item) {
                                    if ($item['pan_card_status'] == 'Pending' && $item['cheque_book_status'] == 'Pending') {
                                        $pendingKYC++;
                                    }
                                }
                                
                                echo $pendingKYC;
                                ?>
                            </div>

                            <div class="fw-semibold text-white">
                                TOTAL KYC REQUESTED PENDING</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <div class="row g-5 g-xl-8">


                <div class="col-xl-3 ">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8 homecard ">
                        <!--begin::Body-->
                        <div class="card-body">
                            

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                            <?php 
                                $ttl_toptup_wallet_amt = 0;

                                foreach ($topup_wallet as $item) {
                                    
                                        $ttl_toptup_wallet_amt += $item['amount'];
                                    
                                }
                                
                                echo '$' . $ttl_toptup_wallet_amt;
                                ?>
                            </div>

                            <div class="fw-semibold text-white">
                                Total Activation Wallet Balance </div>
                              
                            <div class="fw-semibold text-white">
                                Only Used for ID Activation and Topup </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">

                <!--begin::Statistics Widget 5-->
                <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        

                        <div class="text-white fw-bold fs-2 mb-2 mt-5">
                        <?php 
                                $ttl_ewallet_amt = 0;

                                foreach ($e_wallet as $item) {
                                    
                                        $ttl_ewallet_amt += $item['amount'];
                                    
                                }
                                
                                echo '$' . $ttl_ewallet_amt;
                                ?>
                        </div>

                        <div class="fw-semibold text-white">
                            Total E Wallet Balance </div>
                            <div class="fw-semibold text-white">
                                Total Pauout Member Balance Pending</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
                </div>
                    <div class="col-xl-3">

                <!--begin::Statistics Widget 5-->
                <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        

                        <div class="text-white fw-bold fs-2 mb-2 mt-5">
                         
                        </div>

                        <div class="fw-semibold text-white">
                            Last 24 Hrs Closing Balance </div>
                           
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
                </div>
             
     

                <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                <?php 
                                 $ttl_today_business = 0;
                                 $today = date('Y-m-d');
                                 foreach ($users as $item) {
                                    $activatedDate = $item['activated_date'];
                                    $dateOnly = date('Y-m-d', strtotime($activatedDate));
                                     if ($dateOnly == $today) {
                                        $ttl_today_business += $item['activated_package'];
                                     }
                                 }
                                 
                                 echo '$' . $ttl_today_business;
                                 ?>
                            </div>

                            <div class="fw-semibold text-white">
                                Today Sunstar Compnay Business </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <div class="row g-5 g-xl-8">


                <div class="col-xl-3 ">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8 homecard">
                        <!--begin::Body-->
                        <div class="card-body">
                            

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                <?php 
                                 $ttl_business = 0;

                                 foreach ($users as $item) {
                                     
                                         $ttl_business += $item['activated_package'];
                                     
                                 }
                                 
                                 echo '$' . $ttl_business;
                                 ?>
                            </div>

                            <div class="fw-semibold text-white">
                                Total Sunstar Compnay Business</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                   <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="<?php echo base_url()?>Admin/tax_charges?key=tds" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                           

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                 <?php 
                                 $dollar = 80;
                                 $inr_amount = $dollar * $total_amount_for_tds_service;
                                 $inr_amount = round($inr_amount * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                 $dollar_amount = round($total_amount_for_tds_service * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                 echo '₹' . $inr_amount . ' ' . '$'. $dollar_amount;
                                 ?>
                            </div>

                            <div class="fw-semibold text-white">
                                Total TDS Charge Collected </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                   <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="<?php echo base_url()?>Admin/inactive_lis" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                           

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                <?php 
                                 $dollar = 80;
                                 $inr_amount = $dollar * $total_amount_for_tds_service;
                                 $inr_amount = round($inr_amount * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                 $dollar_amount = round($total_amount_for_tds_service * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places
                                 echo '₹' . $inr_amount . ' ' . '$'. $dollar_amount;
                                 ?>
                            </div>

                            <div class="fw-semibold text-white">
                                Total Service Charge Collected </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                   <div class="col-xl-3">

                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                           

                            <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                5000
                            </div>

                            <div class="fw-semibold text-white">
                                SMS LEFT </div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <!-- -------------------------------------card section end----------------------------- -->
            
 
        </div>
        <?php }else{ ?>
        <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center">
 

            <!-- -------------------------------------card section start----------------------------- -->
                
            <h1 class="card-label fw-bold fs-3 mb-1">Welcome to the Sunstar Dashbaord</h1>
            <!-- -------------------------------------card section end----------------------------- -->
 
        </div>
        
 
        
        <?php } ?>
      <div class="text-dark fw-bold fs-2 mb-2 mt-5">Welcome to Sunstar Super Admin </div>
   <div class="row admindetails pb-15 pt-10">
      <div class="col-lg-4">
   <div class="card uicard" style="border: 1px solid #db4437; border-radius: 20px; box-shadow: rgba(219, 68, 55, 0.25) 0px 54px 55px, rgba(219, 68, 55, 0.12) 0px -12px 30px, rgba(219, 68, 55, 0.12) 0px 4px 6px, rgba(219, 68, 55, 0.17) 0px 12px 13px, rgba(219, 68, 55, 0.09) 0px -3px 5px;" data-aos="fade-down-right">
      <div class="card-body" style="padding: 0px;">
         <div class="cardlineone">
            <h5 class="card-title text-center m-0 pt-2 pb-2">Your Monthly Maintenance</h5>
         </div>
         <div class="cardlinetwo" style="background-color: #fff7f9;">
            <h5 class="card-title text-center m-0 pt-2 pb-2 text-danger">₹ 2100</h5>
         </div>
         <div class="cardlinethree" style="background-color: #fff0f3; border-radius: 0px 0px 20px 20px;">
            <h5 class="card-title text-center m-0 pt-1 pb-1" style="font-weight: 700; font-size: 20px; color: #db4437">23 d 45 m 19 s</h5>
         </div>
      </div>
   </div>
</div>

      <div class="col-lg-4">
   <div class="card uicard" style="border: 1px solid #4285f4; border-radius: 20px; box-shadow: rgba(66, 133, 244, 0.25) 0px 54px 55px, rgba(66, 133, 244, 0.12) 0px -12px 30px, rgba(66, 133, 244, 0.12) 0px 4px 6px, rgba(66, 133, 244, 0.17) 0px 12px 13px, rgba(66, 133, 244, 0.09) 0px -3px 5px;" data-aos="fade-down">
      <div class="card-body" style="padding: 0px;">
         <div class="cardlineone">
            <h5 class="card-title text-center m-0 pt-2 pb-2">Yearly Renewal Time Remaining</h5>
         </div>
         <div class="cardlinetwo" style="background-color: #edf4ff;">
            <h5 class="card-title text-center m-0 pt-2 pb-2" style="color: #336dcd;">Domain | Server</h5>
         </div>
         <div class="cardlinethree" style="background-color: #d3e4ff; border-radius: 0px 0px 20px 20px;">
            <h5 class="card-title text-center m-0 pt-1 pb-1" style="font-weight: 700; font-size: 20px; color: #4285f4;">365 d 45 m 19 s</h5>
         </div>
      </div>
   </div>
</div>

      <div class="col-lg-4">
   <div class="card uicard" style="border: 1px solid #0f9d58; border-radius: 20px; box-shadow: rgba(15, 157, 88, 0.25) 0px 54px 55px, rgba(15, 157, 88, 0.12) 0px -12px 30px, rgba(15, 157, 88, 0.12) 0px 4px 6px, rgba(15, 157, 88, 0.17) 0px 12px 13px, rgba(15, 157, 88, 0.09) 0px -3px 5px;" data-aos="fade-down-left">
      <div class="card-body" style="padding: 0px;">
         <div class="cardlineone">
            <h5 class="card-title text-center m-0 pt-2 pb-2">Upgrade Your Sunstar System</h5>
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
</div>
<div>
<div class="text-dark fw-bold fs-2 mb-2  pb-5" style="padding-left=40px;">Easy Access Options</div>


<div class="row colockround " >
    <div class="col-lg-2"><a href="<?php echo base_url()?>Admin/member_list">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/totalm.png" alt="Image 2">
        </div></a>
        <a href="<?= base_url()?>Admin/admins_list">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/adminlist.png" alt="Image 2">
        </div></a>
        <a href="<?php echo base_url()?>Admin/payout_direct_income">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/directincome.png" alt="Image 2">
        </div></a>
    </div>
    <div class="col-lg-2"><a href="<?php echo base_url()?>Admin/active_list">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/activemember.png" alt="Image 2">
        </div></a>
        <a href="<?php echo base_url()?>Admin/fundrequest">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/adddebitfund.png" alt="Image 2">
        </div></a>
        <a href="#">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/tds.png" alt="Image 2">
        </div></a>
    </div>
    <div class="col-lg-2"><a href="<?php echo base_url()?>Admin/inactive_list">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/inactivemember.png" alt="Image 2">
        </div></a>
        <a href="<?php echo base_url()?>Admin/fundrequest_history">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/fundrequesthistory.png" alt="Image 2">
        </div></a>
    </div>
    <div class="col-lg-2"><a href="<?php echo base_url('Admin/packges')?>">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/addpackeges.png" alt="Image 2">
        </div></a>
        <a href="<?php echo base_url()?>Admin/kyc">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/kycp.png" alt="Image 2">
        </div></a>
    </div>
    <div class="col-lg-2"><a href="<?php echo base_url()?>Admin/edit_member_info">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/editmemberinfo.png" alt="Image 2">
        </div></a>
        <a href="<?php echo base_url()?>Admin/kyc_approved">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/kycapproved.png" alt="Image 2">
        </div></a>
    </div>
    <div class="col-lg-2"><a href="<?= base_url()?>Admin/create_admins">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/createadmin.png" alt="Image 2">
        </div></a>
        <a href="<?php echo base_url() ?>Admin/payouts">
        <div class="overlapimg">
            <!-- First image -->
            <img class="clockimg" src="<?php echo base_url()?>assets/img/backring.png" alt="Image 1">
            <!-- Second image -->
            <img src="<?php echo base_url()?>assets/img/payoutreport.png" alt="Image 2">
        </div></a>
    </div>
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
  AOS.init();
</script>

</body>
<!--end::Body-->

</html>