<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direct Income Payouts List || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
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
        #myTable_wrapper{
            padding:2rem 2.25rem;
        }
    </style>
    <style>
         @media only screen and (max-width: 476px) {
             #myTable_wrapper{
                     margin-left: 5px !important;

             }
             .clrmar{
                 margin:5px !important;
             }
         }
         
    </style>
</head>

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
                            <span class="card-label fw-bold fs-3 mb-1">Direct Income Payouts List</span>
                        </h3>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                               <!-- Add Bootstrap card components for filtering -->
                               <div class="row mt-3 mb-8 clrmar" >
                                  <div class="col-sm-6 d-flex p-0">
                                     
                                        <div class="incomecrd">
                                           <div class="card cursor-pointer wh"  >
                                              <div class="card-body rounded border shadow-sm " style="padding:10px !important; background: linear-gradient(to right, #1A2980, #26D0CE); opacity:80%;">
                                                 <h5 class="card-title text text-white">Total Payouts</h5>
                                                 <p class="card-text text text-white"><span class="countertable" id="ttlPendingCount">0</span></p>
                                                 <button class="clickhere" onclick="showAllData() ">Click here</button>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="incomecrd">
                                           <div class="card cursor-pointer wh" >
                                              <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#FF8008, #FFC837); padding-right:0px">
                                                 <h5 class="card-title text text-white">KYC 100% Pending</h5>
                                                 <p class="card-text text text-white"><span class="countertable" id="kycPendingCount">0</span></p>
                                                 <button class="clickhere" onclick="filterTableByStatus('KYC 100% Pending')" style="margin-right:10px;">Click here</button>
                                              </div>
                                           </div>
                                        </div>
                                       
                                     </div>
                                     <div class="col-sm-6 d-flex p-0">
                                     <div class="incomecrd">
                                        <div class="card cursor-pointer wh" >
                                           <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#11998e, #38ef7d);">
                                              <h5 class="card-title text text-white">Paid</h5>
                                              <p class="card-text text text-white"><span class="countertable" id="paidCount">0</span></p>
                                              <button class="clickhere" onclick="filterTableByStatus('Paid')">Click here</button>
                                           </div>
                                        </div>
                                     </div>
                                  
                                  <div class="incomecrd">
                                     <div class="card cursor-pointer wh" >
                                        <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#EB3349, #F45C43 );">
                                           <h5 class="card-title text text-white">Payout Pending</h5>
                                           <p class="card-text text text-white"><span class="countertable" id="payCount">0</span></p>
                                           <button class="clickhere" onclick="filterTableByStatus('Pay Payout')">Click here</button>
                                        </div>
                                     </div>
                                  </div>
                                  </div>
                               </div>
                               
                               <!-- Add more cards for other status values if needed -->
                            </div>
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->



                            <table class="tables table-clrs exportoptions table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " id="myTable">
                                <!--begin::Table head-->
                                <?php

                                $this->db->where('amount_for', 'Direct Amount');
                                $direct_income = $this->db->get('e_wallet_history')->result_array();


                                ?>
                                <thead>
                                    <tr class="fw-bold text-muted">
                                        <th class="min-w-70px">Sr No</th>
                                        <th class="min-w-140px">Mmeber ID</th>
                                        <th class="min-w-150px">Fullname</th>
                                        <th class="min-w-120px">Amount($)</th>
                                        <th class="min-w-120px">Amount(₹)</th>
                                        <th class="min-w-150px">Bank Name</th>
                                        <th class="min-w-150px">Full Name as per Bank</th>
                                        <th class="min-w-150px">Account Number</th>
                                        <th class="min-w-150px">IFSC Code</th>
                                        <th class="min-w-100px">Account Type</th>
                                        <th class="min-w-150px">PhonePay / Gpay</th>
                                        <th class="min-w-150px">Date</th>
                                        <th class="min-w-150px">Status</th>


                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody id="tableBody" class="text-center">
                                    <?php

                                    function usd_to_inr($ttl_amt)
                                    {
                                        $exchange_rate = 80; // Static exchange rate for demonstration purposes

                                        $inr_amount = $ttl_amt * $exchange_rate;

                                        return $inr_amount;
                                    }
                                    $n = 0;

                                    foreach ($direct_income as $key => $value) {
                                        $n++;


                                        $ttl_amt = $value['amount'];
                                        $percentage = 15;
                                        $deduction = $ttl_amt * ($percentage / 100); // Calculate 5% of $ttl_amt
                                        $net_amount = max($ttl_amt - $deduction, 0); // Ensure the net amount is not negative
                                        $net_amount_formatted = number_format($net_amount, 2, '.', '');

                                     

                                        $inr_amount = usd_to_inr($net_amount_formatted);

                                        // Bank Data Fetch 
                                        $this->db->where('member_id', $value['member_id']);
                                        $bank_data = $this->db->get('bank_details')->result_array();

                                        // KYC Data Fetch
                                        $this->db->where('member_id', $value['member_id']);
                                        $kyc_data = $this->db->get('kyc_documents')->result_array();


                                    ?>
                                        <tr class="odd">

                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary fs-6"><?= $n ?></a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6"><?= $value['member_id'] ?></a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                   <?php
                                                            $this->db->where('member_id', $value['member_id']);
                                                            $user_data = $this->db->get('users')->result_array();
                                                            echo $user_data[0]['first_name'] . ' ' . $user_data[0]['last_name']
                                                            ?> 

                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6"><?= $net_amount_formatted ?></a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6"><?= $inr_amount ?></a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    if (!empty($bank_data) && isset($bank_data[0]['bank_name'])) {
                                                        echo $bank_data[0]['bank_name'];
                                                    } else {
                                                        echo "Not available";
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    if (!empty($bank_data) && isset($bank_data[0]['fullname'])) {
                                                        echo $bank_data[0]['fullname'];
                                                    } else {
                                                        echo "Not available";
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    if (!empty($bank_data) && isset($bank_data[0]['account_number'])) {
                                                        echo $bank_data[0]['account_number'];
                                                    } else {
                                                        echo "Not available";
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    if (!empty($bank_data) && isset($bank_data[0]['IFSC_code'])) {
                                                        echo $bank_data[0]['IFSC_code'];
                                                    } else {
                                                        echo "Not available";
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    if (!empty($bank_data) && isset($bank_data[0]['account_type'])) {
                                                        echo $bank_data[0]['account_type'];
                                                    } else {
                                                        echo "Not available";
                                                    }
                                                    ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    if (!empty($bank_data) && isset($bank_data[0]['phone_pay']) && isset($bank_data[0]['google_pay'])) {
                                                        echo $bank_data[0]['phone_pay'] . ' / ' . $bank_data[0]['google_pay'];
                                                    } elseif (isset($bank_data[0]['phone_pay'])) {
                                                        echo $bank_data[0]['phone_pay'] . ' / Not available';
                                                    } elseif (isset($bank_data[0]['google_pay'])) {
                                                        echo 'Not available / ' . $bank_data[0]['google_pay'];
                                                    } else {
                                                        echo "Not available";
                                                    }
                                                    ?>
                                                </a>
                                            </td>

                                            <td class="text-dark text-hover-primary fs-6">
                                                <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                                    <?php
                                                    $created_at = date('Y-m-d', strtotime($value['created_at']));
                                                    echo $created_at;
                                                    ?>
                                                </a>
                                            </td>

                                            <td class="text-dark text-hover-primary fs-6">

                                                <?php
                                                if (!empty($kyc_data) && isset($kyc_data[0])) {
                                                    if ($kyc_data[0]['pan_card_status'] === 'Pending' && $kyc_data[0]['cheque_book_status'] === 'Pending') {
                                                        echo 'KYC Approval Pedning from Admin';
                                                    } elseif (empty($kyc_data[0]['panCard']) && empty($kyc_data[0]['chequeBook'])) {
                                                        echo 'KYC 100% Pending';
                                                    } elseif (
                                                        ($kyc_data[0]['pan_card_status'] === 'Pending' && $kyc_data[0]['cheque_book_status'] === 'Approved') ||
                                                        ($kyc_data[0]['pan_card_status'] === 'Approved' && $kyc_data[0]['cheque_book_status'] === 'Pending')
                                                    ) {
                                                        echo 'KYC 50% Done';
                                                    } elseif ($kyc_data[0]['pan_card_status'] === 'Approved' && $kyc_data[0]['cheque_book_status'] === 'Approved') {
                                                        // echo 'KYC 100% Done';
                                                        // Add your dropdown form for Money Sent or Hold here


                                                        if ($value['amount_status'] == 'Amount Sent') {
                                                            echo '<span class="badge bg-success">Paid</span>';
                                                        } else {
                                                            echo '<button class="btn btn-sm btn-primary me-2" onclick="sendmoney(\'' . $value['member_id'] . '\', \'' . $net_amount_formatted . '\', \'' . $value['sr'] . '\')">Pay Payout</button>';
                                                        }
                                                    }
                                                    echo '<br>';
                                                } else {
                                                    echo 'KYC 100% Pending';
                                                }

                                                ?>

                                            </td>



                                        </tr>
                                    <?php  } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th class="text-dark fw-bold text-hover-primary fs-6" id="totalAmount"></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>

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

    </div>
    <!--end::Content-->
    </div>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        function toggleCardExpansion(card) {
            $(card).toggleClass('expanded');
        }
        // Function to filter the table by status
        function filterTableByStatus(status) {
            var table = $('.tables').DataTable();
            table.column(12).search(status).draw();
        }

        function showAllData() {
            var table = $('.tables').DataTable();
            var totalRowCount = table.rows().count(); // Get the total row count

            // Update the count on the "Total Payouts" card
            $('#ttlPendingCount').text(totalRowCount);

            // Remove applied search filters and show all data
            table.search('').columns().search('').draw();
        }
        $(document).ready(function() {
            var table = $('.tables').DataTable({
                searching: true,
                info: true,
                paging: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf']
            });

            showAllData();

            // Create the date range filter input
            var dateRangeInput = $('<input type="text" class="form-control form-control-sm" placeholder="Select date range"/>')
                .appendTo($('.dataTables_filter'))
                .on('change', function() {
                    var value = $(this).val();

                    // Apply the filter
                    table.column(11).search(value, true, false).draw();
                });

            // Initialize the date range picker
            dateRangeInput.daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true, // Set to true to select only a single date
                showDropdowns: true, // Enable year and month dropdowns
                locale: {
                    format: 'YYYY-MM-DD', // Set the desired date format
                    cancelLabel: 'Clear'
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
                $(this).trigger('change'); // Trigger the change event to apply the filter
            }).on('cancel.daterangepicker', function() {
                $(this).val('');
                $(this).trigger('change'); // Trigger the change event to apply the filter
            });

            // Function to update the status counts
            function updateStatusCounts() {
                var originalData = table.data();
                var totalCount = originalData.length;

                var paidCount = originalData.filter(function(value) {
                    return value[12].includes('Paid');
                }).length;

                var kycPendingCount = originalData.filter(function(value) {
                    return value[12].includes('KYC 100% Pending');
                }).length;

                var payCount = originalData.filter(function(value) {
                    return value[12].includes('Pay Payout');
                }).length;

                // Update the counts on the cards
                $('#paidCount').text(paidCount);
                $('#kycPendingCount').text(kycPendingCount);
                $('#payCount').text(payCount);

            }

            // Call the updateStatusCounts function on document ready and after filtering
            updateStatusCounts();
            $('.tables').on('draw.dt', function() {
                updateStatusCounts();
            });

            // Calculate total amount
            var totalAmount = 0;
            table.column(3).data().each(function(value) {
                var amount = parseFloat(value.replace(/[^0-9.-]+/g, ''));
                if (!isNaN(amount)) {
                    totalAmount += amount;
                }
            });

            console.log(totalAmount); // Display the total amount
        });
    </script>


    <script>
        function sendmoney(ID, Amount, Sr) {
            var memberID = ID;
            var amount = Amount;
            var sr = Sr;
            $.ajax({
                url: baseurl + 'Ajax/sendmoney', // Replace with your server endpoint URL
                type: 'POST', // Adjust the HTTP method if needed (e.g., GET, POST)
                data: {
                    memberID: memberID,
                    amount: amount,
                    sr: sr
                },
                dataType: 'json', // Set the expected data type of the response (e.g., json, xml)
                success: function(response) {
                    Swal.fire(
                        'Money Send!',
                        'Money has been Sent successfully to ' + memberID,
                        'success'
                    ).then(function() {
                        window.location.href = baseurl + 'Admin/payout_direct_income';
                    });
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the request
                    console.log(xhr.responseText); // Log the error response
                }
            });
        }
    </script>




    </script>
</body>

</html>