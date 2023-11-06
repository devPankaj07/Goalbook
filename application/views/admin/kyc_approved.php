<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Pending List || Admin</title>
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
              padding:8px 16px !important;
              
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
             #DataTables_Table_0_wrapper{
                     margin-left: 13px !important;

             }
             .clrmar{
                 margin:5px !important;
             }
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
                            <span class="card-label fw-bold fs-3 mb-1">KYC Approved Records</span>
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
                            <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 ">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted">

                                        <th class="min-w-80px">Sr No</th>
                                        <th class="min-w-100px">Member ID</th>
                                        <th class="min-w-150px">Fullname</th>
                                        <th class="min-w-150px">Mobile Number</th>
                                        <th class="min-w-150px">Pan Card</th>
                                        <th class="min-w-120px">Status</th>
                                        <th class="min-w-150px">Cheque Book</th>
                                        <th class="min-w-120px">Status</th>
                                        <th class="min-w-150px">Remark</th>
                                        
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                              <tbody id="tableBody">
    <?php
    $sr = 0;
    foreach ($kyc as $value) {
        $sr++;
        if ($value['pan_card_status'] == 'Approved' && $value['cheque_book_status'] == 'Approved') {
    ?>
            <tr id="row-<?php echo $value['member_id']; ?>">
                <?php
                $name = $this->db->select('*')->where('member_id', $value['member_id'])->get('users')->result_array();
               
                ?>
                <td><?= $sr ?></td>
                <td><?= $value['member_id']; ?></td>
                <td><?= $name[0]['first_name'] . ' ' . $name[0]['last_name']; ?></td>
                <td><?= $name[0]['mobile_number'] ?></td>
                <td> <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6" onclick="openimgmodal('<?php echo $value['panCard'] ?>')">View Pan Card</a> </td>
                <td>
                     <?php echo $value['pan_card_status'] ?>
                </td>
                <td> <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6 pointer" onclick="openimgmodal('<?php echo $value['chequeBook'];  ?>')">View Cheque Book </a> </td>
                <td>
                    <?php echo $value['pan_card_status'] ?>
                </td>
                <td>
                    <?php echo $value['reason'] ?>
                </td>
                
            </tr>
    <?php
        }
    }
    ?>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <img src="" alt="" id="modalImage">
                        <div id="bank-details">
                            
                        </div>
                    </div>
                    <div class="modal-footer p-1">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <script>
            function openimgmodal(imgurl) {
                var url = baseurl + 'assets/uploads/kyc/' + imgurl
                console.log();
                $('#modalImage').attr('src', url);
                $('#exampleModal').modal('show');
            }



            function updatekycinfo(memberID) {
     
                var pancardStatus = $('#pancard-status-' + memberID).val();
    var chequeStatus = $('#cheque-status-' + memberID).val();
    var reason = $('#reason-' + memberID).val();

    // Perform client-side validation using jQuery
    // ...

    // Validate pancard status
    if (pancardStatus === 'Pending') {
        $('.pancard-error').text('');
        $('.pancard-error-' + memberID).text('Please select a pancard status.');
        return;
    } else {
        $('.pancard-error-' + memberID).text('');
    }

    // Validate cheque status
    if (chequeStatus === 'Pending') {
        $('.cheque-error').text('');
        $('.cheque-error-' + memberID).text('Please select a cheque status.');
        return;
    } else {
        $('.cheque-error-' + memberID).text('');
    }

    // Validate reason
    if (reason === '') {
        $('.reason-error').text('');
        $('.reason-error-' + memberID).text('Please enter a remark.');
        return;
    } else {
        $('.reason-error-' + memberID).text('');
    }

    // Clear error messages
    $('.error-container').text('');

    // Construct the data object to send in the AJAX request
    var data = {
        pancardStatus: pancardStatus,
        chequeStatus: chequeStatus,
        reason: reason,
        memberID: memberID
    };

    console.log(data)
                $.ajax({
                    url: baseurl + 'Ajax/updatekyc',
                    type: 'POST',
                    data: data,
                    success: function(response) {

                        // Handle the response from the backend
                        if (response.status === 'success') {


                            // Handle the success response

                            Swal.fire(
                                'KYC Detail Updated',
                                response.message,
                                'success'
                            ).then(function() {
                                window.location.href = baseurl + 'Admin/kyc'; // Replace with the desired URL
                            });
                            // Perform any additional actions on success
                        } else {
                            alert('Error: ' + response.message);
                            // Perform any additional actions on error
                        }
                    },
                    error: function() {
                        console.log('Error occurred during AJAX request');
                    }
                });
            }
         
        </script>


        <!--end::Content-->
    </div>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>

</body>

</html>