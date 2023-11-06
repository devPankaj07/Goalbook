<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Pending List || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
</head>
<?php
if (isset($_GET['memberid'])) {
    $memberid_from_url = $_GET['memberid'];
}
?>
<style>
    #bank-details {
  display: flex;
  flex-direction: column;
  background-color: #f0f0f0;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.bank-detail {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.label {
  font-weight: bold;
  width: 150px;
}

.value {
  flex: 1;
  margin-left: 10px;
}

#image {
  transition: transform 0.3s ease;
}

.rotated {
  transform: rotate(90deg);
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
                            <span class="card-label fw-bold fs-3 mb-1">KYC Pending Requested History</span>
                            <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                        </h3>

                    </div>
                    <!------------------------------------card section start---------------------------->
                     <div class="card-body py-3">
                               <!-- Add Bootstrap card components for filtering -->
                               <div class="row mt-3 mb-8" >
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
                                        <th class="min-w-140px">Fullname</th>
                                        <th class="min-w-140px">Mobile Number</th>
                                        <th class="min-w-150px">Pan Card</th>
                                        <th class="min-w-120px">Status</th>
                                        <th class="min-w-150px">Cheque Book</th>
                                        <th class="min-w-120px">Status</th>
                                        <th class="min-w-150px">Remark</th>
                                        <th class="min-w-120px">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                              <tbody id="tableBody">
    <?php
    $sr = 0;
    foreach ($kyc as $value) {
   
        if ($value['pan_card_status'] == 'Pending' || $value['cheque_book_status'] == 'Pending') {
                 $sr++;
    ?>
            <tr id="row-<?php echo $value['member_id']; ?>">
                <?php
                $name = $this->db->select('*')->where('member_id', $value['member_id'])->get('users')->result_array();
                 $bank = $this->db->select('*')->where('member_id', $value['member_id'])->get('bank_details')->result_array();
                 $bank_json = json_encode($bank);
                ?>
                <td><?= $sr ?></td>
                <td><?= $value['member_id']; ?></td>
                <td><?= $name[0]['first_name'] . ' ' . $name[0]['last_name']; ?></td>
                <td><?= $name[0]['mobile_number'] ?></td>
                <td> <a href="#" class="btn btn-primary" onclick="openimgmodal('<?php echo $value['panCard'] ?>')">View Pan Card</a> </td>
                <td>
                    <div class="fv-row fv-plugins-icon-container" data-select2-id="select2-data-122-btz5">
                        <div class="w-100" data-select2-id="select2-data-121-1bcj">
                            <!--begin::Select2-->
                            <select id="pancard-status-<?php echo $value['member_id'] ?>" name="pancard-status" class="select2-selection select2-selection--single form-select form-select-solid">
                                <option value="<?php echo $value['pan_card_status'] ?>"><?php echo $value['pan_card_status'] ?></option>
                                <option value="Approved">Approved</option>
                                <option value="Reject">Reject</option>
                            </select>
                            <div class="error-container text-danger pancard-error-<?php echo $value['member_id']; ?>"></div>
                            <!--end::Select2-->
                        </div>
                    </div>
                </td>
                <script>
                var bankData = <?php echo $bank_json; ?>;
                </script>
                <td> <a href="#" class="btn btn-primary" onclick="openimgmodal('<?php echo $value['chequeBook'] ?>', bankData)">View Cheque Book</a> </td>
                <td>
                    <div class="fv-row fv-plugins-icon-container" data-select2-id="select2-data-122-btz5">
                        <div class="w-100" data-select2-id="select2-data-121-1bcj">
                            <!--begin::Select2-->
                            <select id="cheque-status-<?php echo $value['member_id'] ?>" name="cheque-status" class="select2-selection select2-selection--single form-select form-select-solid">
                                <option value="<?php echo $value['pan_card_status'] ?>"><?php echo $value['pan_card_status'] ?></option>
                                <option value="Approved">Approved</option>
                                <option value="Reject">Reject</option>
                            </select>
                            <div class="error-container text-danger cheque-error-<?php echo $value['member_id']; ?>"></div>
                            <!--end::Select2-->
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fv-row">
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="reason" id="reason-<?php echo $value['member_id'] ?>" placeholder="Please Enter Remark">
                        <div class="error-container text-danger reason-error-<?php echo $value['member_id']; ?>"></div>
                        <!--end::Input-->
                    </div>
                </td>
                <td>
                    <a href="#" class="btn btn-primary er fs-6 px-8 py-4"  onclick="updatekycinfo('<?php echo $value['member_id']; ?>')">Submit</a>
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
                        <img src="" alt="" id="modalImage" style="height: 80%;width: 80%;margin: auto;">
                        <button id="turn" class="btn btn-primary m-auto d-flex mt-4 mb-4">Turn the Image</button>
                        <div id="bank-details">
                             
                        </div>
                    </div>
                    <div class="modal-footer p-1">
                        <button type="button" class="btn btn-secondary cls-modal" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <script>
 
     function openimgmodal(imgurl, bank) {
    var url = baseurl + 'assets/uploads/kyc/' + imgurl;
    $('#modalImage').attr('src', url);

    // Clear any previous content from the bank-details container
    var container = document.getElementById("bank-details");
    container.innerHTML = '';

    // Define the mapping between keys and headings
    var keyHeadings = {
        "member_id": "Member ID",
        "bank_name": "Bank Name",
        "account_number": "Account Number",
        "fullname": "Full Name",
        "IFSC_code": "IFSC Code",
        "google_pay": "Google Pay",
        "phone_pay": "Phone Pay",
        "account_type": "Account Type",
        "country": "Country"
        // Add more key-heading pairs as needed
    };

    // Check if the bank object is defined and not empty
    if (bank && bank.length > 0) {
        for (var i = 0; i < bank.length; i++) {
            var obj = bank[i];

            // Loop through each property (key-value pair) of the object
            for (var key in obj) {
                if (obj.hasOwnProperty(key) && key !== "created_at" && key !== "id") {
                    var value = obj[key];

                    // Get the corresponding heading from the keyHeadings mapping
                    var heading = keyHeadings[key];

                    // Create a bank-detail div for each key-value pair
                    var bankDetailDiv = document.createElement("div");
                    bankDetailDiv.classList.add("bank-detail");

                    // Create a div for the label and another div for the value
                    var labelDiv = document.createElement("div");
                    labelDiv.classList.add("label");
                    labelDiv.textContent = heading + ":";

                    var valueDiv = document.createElement("div");
                    valueDiv.classList.add("value");
                    valueDiv.textContent = value;

                    // Append the label and value divs to the bank-detail div
                    bankDetailDiv.appendChild(labelDiv);
                    bankDetailDiv.appendChild(valueDiv);

                    // Append the bank-detail div to the bank-details container
                    container.appendChild(bankDetailDiv);
                }
            }
        }
    } else {
        // If bank is undefined or empty, display a message or take appropriate action
         
    }

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
    <script>
         $('#turn').on('click', function() {
  var angle = ($('#modalImage').data('angle') + 90) || 90;
  $('#modalImage').toggleClass('rotated', angle % 180 === 90);
  $('#modalImage').data('angle', angle);
});

 
     $('.cls-modal').on('click', function() {
         console.log('clicked');
    // Reset the image source to its original value
       $('#modalImage').removeClass('rotated');
});


    </script>
</body>

</html>