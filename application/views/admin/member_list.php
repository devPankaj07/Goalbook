<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Member List || Admin</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
      <style>
          @media only screen and (max-width: 476px){
                .card .card-body{
                padding:0;
                    
                }
          }
          
          #tableBody td{
              text-align:center;
          }
          .loginbtntab a{
              padding:3px 10px !important;
              
          }
      </style>
       <style>
        .countertable{
            font-size: 1.5em;
            font-weight: bold;
        }
        .card .card-body{
            justify-content:center;
        }
        
       @media only screen and (max-width: 476px) {
           
         
          .incomecrd{
              width:50%;
          }
          .clickhere{
              font-family: 'Montserrat', sans-serif;
    text-align: center;
    color: black;
    line-height: 1;
    font-size: 10px !important;
    background-color: white;
    padding: 4px 13px;
    opacity: 0.5;
    outline: none;
    border-radius: 18px;
    float: right;
    box-shadow: 0 2px 4px rgba(255, 255, 255, 0.4);
    transition: box-shadow 0.3s ease-in-out;
          }
           
       }
        .incomecrd{
              width:50%;
              padding: 5px;

          }
          .wh{
              width:100%;
              height:100%;
          }
          
          
          .clickhere {
        transition: all .5s ease;
    color: #fff;
    
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    color:black;
    line-height: 1;
    font-size: 14px;
    background-color: white;
    padding: 4px 15px;
    opacity:0.5;
    outline: none;
    border-radius: 18px;
    float: right;
     box-shadow: 0 2px 4px rgba(255, 255, 255, 0.4);
      transition: box-shadow 0.3s ease-in-out;
}
.clickhere:hover {
    color: #001F3F;
    background-color: #fff;
}

        
  
    </style>
    <style>
         @media only screen and (max-width: 476px) {
             #myTable_wrapper{
                     margin-left: 13px !important;

             }
             .clrmar{
                 margin:5px !important;
             }
         }
         .pinkbtn{
             padding:3px 15px !important;
         }
         
    </style>
   </head>
   <?php
      if (isset($_GET['memberid'])) {
          $memberid_from_url = $_GET['memberid']; 
      }  
      ?>
   <body>
      <?php include_once("header.php"); ?>
      <!--begin::Sidebar-->
      <?php include_once("sidebar.php"); ?>
      <!--begin::Content-->
      <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
         <div class="d-flex flex-column flex-lg-row-fluid">
            <div id="kt_app_content_container" class="container-xxxl ">
               <div class="card mb-5 mb-xl-8">
                  
                  <!--begin::Header-->
                  <div class="card-header border-0 pt-5">
                     <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Total Members List</span>
                        <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                     </h3>
                  </div>
                  
                   <!------------------------------------card section start---------------------------->
                     <div class="card-body py-3">
                               <!-- Add Bootstrap card components for filtering -->
                               <div class="row mt-3 mb-8 clrmar" >
                                  <div class="col-sm-6 d-flex p-0">
                                     
                                        <div class="incomecrd">
                                           <div class="card cursor-pointer wh"  >
                                              <div class="card-body rounded border shadow-sm " style="padding:10px !important; background: linear-gradient(to right, #1A2980, #26D0CE); opacity:80%;">
                                                 <h5 class="card-title text text-white">Total Members</h5>
                                                 <p class="card-text text text-white"><span class="countertable" id="ttlPendingCount">71</span></p>
                                                 <button class="clickhere" onclick="showAllData() ">Click here</button>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="incomecrd">
                                     <div class="card cursor-pointer wh" >
                                        <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#EB3349, #F45C43 );">
                                           <h5 class="card-title text text-white">Total Inactive Members</h5>
                                           <p class="card-text text text-white"><span class="countertable" id="payCount">25</span></p>
                                           <button class="clickhere" onclick="filterTableByStatus('Pay Payout')">Click here</button>
                                        </div>
                                     </div>
                                  </div>
                                       
                                     </div>
                                     <div class="col-sm-6 d-flex p-0">
                                     <div class="incomecrd">
                                        <div class="card cursor-pointer wh" >
                                           <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#11998e, #38ef7d);">
                                              <h5 class="card-title text text-white">Total Active Member</h5>
                                              <p class="card-text text text-white"><span class="countertable" id="paidCount">46</span></p>
                                              <button class="clickhere" onclick="filterTableByStatus('Paid')">Click here</button>
                                           </div>
                                        </div>
                                     </div>
                                  
                                  
                                  <div class="incomecrd">
                                           <div class="card cursor-pointer wh" >
                                              <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#FF8008, #FFC837); padding-right:0px">
                                                 <h5 class="card-title text text-white">KYC Pending Member</h5>
                                                 <p class="card-text text text-white"><span class="countertable" id="kycPendingCount">0</span></p>
                                                 <button class="clickhere" onclick="filterTableByStatus('KYC 100% Pending')" style="margin-right:10px;">Click here</button>
                                              </div>
                                           </div>
                                        </div>
                                  </div>
                               </div>
                               
                               <!-- Add more cards for other status values if needed -->
                            </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body py-3">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " id='myTable' >
                           <!--begin::Table head-->
                           <thead>
                              <tr class="fw-bold text-muted">
                                 <th class="min-w-130px">Action</th>
                                 <th class="min-w-130px">Block/Unblock</th>
                                 <th class="min-w-130px">Sr.No</th>
                                 <th class="min-w-150px">Fullname</th>
                                 <th class="min-w-150px">Member ID</th>
                                 <th class="min-w-150px">Password</th>
                                 <th class="min-w-150px">Sponsor ID</th>
                                 <th class="min-w-150px">Mobile Number</th>
                                 <th class="min-w-150px">Activation Date</th>
                                 <th class="min-w-150px">Registration Date</th>
                                 <th class="min-w-150px">KYC Status</th>
                                 <th class="min-w-150px">Bank Status</th>
                         
                                 <th class="min-w-120px">User Status</th>
                             
                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody id="tableBody">
                              <?php
                                 //   print_r($user_data);
                                     $sr = 0;
                                   foreach ($user_data as $value) {
                                        $sr++;
                                    ?>
                              <tr>
                                 <td class="text-center  text-white loginbtntab"> <a href="<?= base_url('Auth/login_auth') ?>?username=<?= $value['member_id'] ?>&password=<?= $value['password'] ?>" target="_blank" class="m-auto btn btn-primary p-3">Login</a> </td>
                                  <td class='text-center'>
                                    <?php if ($value['block_status'] == 0) : ?>
                                       <button class="btn btn-sm btn-danger pinkbtn" onclick="changeBlockStatus('<?= $value['member_id']; ?>', 1)">Block</button>
                                    <?php elseif ($value['block_status'] == 1) : ?>
                                       <button class="btn btn-sm btn-success" onclick="changeBlockStatus('<?= $value['member_id']; ?>', 0)">Unblock</button>
                                    <?php endif; ?>
                                 </td>
                                 <td><?=$sr ?></td>
                                 <td><?= $value['first_name'] . ' ' . $value['last_name'] ;?></td>
                                 <td><?= $value['member_id'] ;?></td>
                                 <td><?= $value['password'] ;?></td>
                                 <td><?= $value['sponsor_id'] ;?></td>
                                 <td> <?= $value['mobile_number'] ;?> </td>
                                 <td> <?= ($value['activated_date'] === "0000-00-00 00:00:00") ? '<span class="badge badge-light-danger">Inactive</span>' : $value['activated_date']; ?> </td>
                                 <td> <?= $value['created_date'] ;?> </td>
                                 <td> <?php
                                    $member_id = $value['member_id'];
                                    
                                    $kyc_data = $this->db->where('member_id', $member_id)->get('kyc_documents')->result_array();
                                    
                                    if (!empty($kyc_data) && isset($kyc_data[0])) {
                                    if ($kyc_data[0]['pan_card_status'] === 'Pending' && $kyc_data[0]['cheque_book_status'] === 'Pending') {
                                    echo 'KYC Approval <span class="badge badge-light-warning">Pending</span> from <span class="badge badge-light-warning">Admin</span>'; echo '<br>';
                                    echo '<a href="' . base_url('Admin/kyc') . '" class="badge badge-primary">Click here to go to KYC History</a>';
                                    } elseif (empty($kyc_data[0]['panCard']) && empty($kyc_data[0]['chequeBook'])) {
                                    echo 'Not Uploaded KYC   <span class="badge badge-light-danger">Pending</span>';
                                    } elseif (
                                    ($kyc_data[0]['pan_card_status'] === 'Pending' && $kyc_data[0]['cheque_book_status'] === 'Approved') ||
                                    ($kyc_data[0]['pan_card_status'] === 'Approved' && $kyc_data[0]['cheque_book_status'] === 'Pending')
                                    ) {
                                    // echo 'KYC 50% Done';
                                    if($kyc_data[0]['pan_card_status'] == 'Reject'){
                                        echo 'Pan Card is <td><span class="badge badge-light-danger">Rejected</span></td>';
                                    }
                                    if($kyc_data[0]['cheque_book_status'] == 'Reject'){
                                        echo 'Cheque Book/Passbook is <td><span class="badge badge-light-danger">Rejected</span></td>';
                                    }
                                    } elseif ($kyc_data[0]['pan_card_status'] === 'Approved' && $kyc_data[0]['cheque_book_status'] === 'Approved') {
                                    echo 'Pancard & Bank Details <span class="badge badge-light-success">Done</span>';
                                    
                                    }
                                    echo '<br>';
                                    } else {
                                    echo 'Not Uploaded KYC <span class="badge badge-light-danger">Pending</span>';
                                    }
                                    
                                        
                                    ?> </td>
                                 <td> 
                                    <?php
                                       $bank_data = $this->db->where('member_id', $member_id)->get('bank_details')->result_array();
                                              if (!empty($kyc_data) && isset($kyc_data[0])) {
                                                  echo 'Bank Details Added <span class="badge badge-light-success">Done</span>';
                                              } else {
                                       echo 'Member Not Added Bank Details <span class="badge badge-light-danger">Pending</span>';
                                       }
                                       
                                       ?>
                                 </td>
                               
                                
                                 <?php 
                                    if ($value['user_status'] == 'Active') {
                                        echo '<td><span class="badge badge-light-success">' . $value['user_status'] . '</span></td>';
                                    } else {
                                        echo '<td><span class="badge badge-light-danger">' . $value['user_status'] . '</span></td>';
                                    }
                                    ?>
                                     
                              </tr>
                              <?php }?>
                           </tbody>
                           <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                     </div>
                     <!--end::Table container-->
                  </div>
                  <!--begin::Body-->
               </div>
               <!--end::Col-->
            </div>
         </div>
         <!--end::Content-->
      </div>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
 <script>
      
         // Status Change 
         function changeBlockStatus(memberID, status) {
            // Create an AJAX request
            $.ajax({
               url: baseurl + 'Ajax/updateUserBlockStatus', // Replace with your server-side endpoint
               type: 'POST',
               data: {
                  memberID: memberID,
                  status: status
               },
               beforeSend: function() {
                  // Show loading spinner or disable the button
                  // For example, you can show a spinner using a library like Bootstrap
                  $('#spinner').show();
                  $('#updateButton').prop('disabled', true);
               },
               success: function(response) {
                  // Handle the success response
                  if (response.status === 'success') {
                     // Update the UI or display a success message

                     Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,

                     }).then((result) => {
                        if (result.isConfirmed) {
                           location.reload();
                        }
                     });

                  } else {
                     // Display an error message
                     alert(response.message);
                  }
               },
               error: function(xhr, status, error) {
                  // AJAX request failed
                  console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
               },
               complete: function() {
                  // Hide loading spinner or enable the button
                  $('#spinner').hide();
                  $('#updateButton').prop('disabled', false);
               }
            });
         }
 
   </script>
   </body>
</html>
