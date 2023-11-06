<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> Direct Bonus || Dashboard</title>
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
             #table_wrapper{
                     margin-left: 13px !important;

             }
             .clrmar{
                 margin:5px !important;
             }
         }
         .totalua{
             background:#d5ffe0 !important;
             text-align:center;
         }
         
    </style>

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
     
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--begin::Header-->
            <?php include_once('header.php') ?>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <!--start::Sidebar-->
                <?php include_once('sidebar.php') ?>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-lg-row-fluid">
                        <div id="kt_app_content_container" class="container-xxxl ">
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Direct Bonus</span>


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
                                        <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="table">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bold text-muted">
                                                    <th class="min-w-30px">Sr No</th>
                                                    <th class="min-w-150px">Credited Date & Time</th>
                                                    <th class="min-w-150px">My Member ID</th>
                                                    <th class="min-w-150px">Description</th>
                                                    <th class="min-w-150px">Amount </th>
                                          
                                                    <th class="min-w-150px">TDS Charges (10%)</th>
                                                    <th class="min-w-150px">Service Charges (10%)</th>
                                                    <th class="min-w-150px">Net Amount</th>
                                                    <th class="min-w-120px">Paid Status</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody id="tableBody">

                                                <?php
                                                $sr = 0;
                                                foreach ($direct_amount as $row) :
                                                    $sr++;
                                                    $ttl_amt = $row->amount;
                                                    $percentage = 10;
                                                    $percentage2 = 10;
                                                    $deduction = $ttl_amt * ($percentage / 100); // Calculate 5% of $ttl_amt
                                                    $deduction2 = $ttl_amt * ($percentage2 / 100); // Calculate 5% of $ttl_amt
                                                    $net_amount = max($ttl_amt - $deduction - $deduction2 , 0); // Ensure the net amount is not negative
                                                    $net_amount_formatted = number_format($net_amount, 2, '.', '');
                                                    
                                             
 
                                                ?>
                                                    <tr>

                                                        <td>
                                                            <a href="#" class="text-dark fw-bold text-hover-primary fs-6"><?php echo $sr; ?></a>
                                                        </td>
                                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo  $row->created_at; ?></a>
                                                        </td>

                                                        <td>
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo $row->member_id; ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php
                                                            $string = $row->amout_received_from;
                                                         
                                                       


                                                                                                                        // Using preg_match to extract the substring starting with "SSWM"
if (preg_match('/NAP\w+/', $string, $matches)) {
    $extractedString = $matches[0];
    
    $query = $this->db
        ->select('*')
        ->from('users')
        ->where('member_id', $extractedString)
        ->get();
    $resultArray = $query->result_array();

    if (!empty($resultArray) && isset($resultArray[0])) {
        echo 'Direct Bonus from ' . $resultArray[0]['first_name'] . ' ' . $resultArray[0]['last_name'] . '(' . $extractedString  . ')' .  ' ' . '₹' . $resultArray[0]['activated_package'];
    } else {
        echo "No Description.";
    }
}  
                                                                                                                                        
                                                                                                                                        ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-dark fw-bold text-primary d-block mb-1 fs-6 g-blue"><?php echo '₹' . $row->amount; ?></a>
                                                        </td>
                                               
                                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 g-red"><?php echo '₹' . $deduction2   ?></a>
                                                        </td>
                                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 g-red"><?php echo '₹' .  $deduction  ?></a>
                                                        </td>
                                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 g-green "><?php echo '₹' . $net_amount_formatted; ?></a>
                                                        </td>
                                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                                                                <?php 
                                                                    if($row->amount_status == ''){
                                                                        echo '<span class="badge badge-danger">Pending</span>';
                                                                    }else{
                                                                        echo '<span class="badge badge-success">Paid</span>';
                                                                    }
                                                                ?>
                                                            </a>
                                                        </td>


                                                    </tr>
                                                <?php endforeach; ?>


                                            </tbody>
                                                                                       <tbody id="table-totals">
    <tr class="totalua">
        <td colspan="4" class="fw-bold">Total</td>
       
        <!-- Add more empty cells for other columns as needed -->
        
        <td class="total-usd-amount text-dark fw-bold text-hover-primary fs-6 ">₹0.00</td>
        <td class="total-usd-amount-1 text-dark fw-bold text-hover-primary fs-6 ">₹0.00</td>
        <td class="total-usd-amount-2 text-dark fw-bold text-hover-primary fs-6 ">₹0.00</td>
        <td class="total-usd-amount-4 text-dark fw-bold text-hover-primary fs-6 ">₹0.00</td>
        <td class="total-usd-amount-3 text-dark fw-bold text-hover-primary fs-6 "></td>
        <td></td>
 
    </tr>
</tbody>
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
                    <!-- Last Div  -->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <?php include_once('customize.php') ?>


    <?php include_once('notification.php') ?>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
<!-- Initialize DataTable and Calculate Totals -->
 <script>
         // Call the calculateTotals function initially to display the totals
    calculateTotals();
    // Function to extract the numeric value from the amount string
    function extractNumericValue(amountString) {
        // Remove non-numeric characters and any leading/trailing whitespaces
        var numericValue = parseFloat(amountString.replace(/[^0-9.-]+/g, '').trim());
        return !isNaN(numericValue) ? numericValue : 0;
    }
   
    // Function to calculate totals
    function calculateTotals() {
        var totalAmountUSD = 0;
        var totalAmountUSD1 = 0;
        var totalAmountUSD2 = 0;
        var totalAmountUSD3 = 0;
        // Iterate through each row in the table body (excluding the totals row)
        $('#table tbody tr').each(function () {
     
            var data = $(this).find('td');
        
            // Assuming the total amount in USD is in the 6th column (data[5])
            var amountUSD = extractNumericValue($(data[4]).text());
            totalAmountUSD += amountUSD;

            // Assuming the total amount in INR is in the 7th column (data[6])
            var amountUSD1 = extractNumericValue($(data[5]).text());
            totalAmountUSD1 += amountUSD1;
            
            // // Assuming the total amount in INR is in the 7th column (data[6])
            var amountUSD2 = extractNumericValue($(data[7]).text());
            totalAmountUSD2 += amountUSD2;
            
             // Assuming the total amount in INR is in the 7th column (data[6])
            var amountUSD3 = extractNumericValue($(data[6]).text());
            totalAmountUSD3 += amountUSD3;
         
        });

        // Update the totals row
        $('.total-usd-amount').text('₹ ' + totalAmountUSD.toFixed(2));
        $('.total-usd-amount-1').text('₹ ' + totalAmountUSD1.toFixed(2));
        $('.total-usd-amount-4').text('₹ ' + totalAmountUSD2.toFixed(2));
        $('.total-usd-amount-2').text('₹' + totalAmountUSD3.toFixed(2));
    }

   

    // Listen to DataTables draw event to recalculate totals after any table manipulation (e.g., filtering, pagination, sorting)
    // $('#table').on('draw.dt', function () {
    //     calculateTotals();
          
    // });
</script>
</body>
<!--end::Body-->

</html>