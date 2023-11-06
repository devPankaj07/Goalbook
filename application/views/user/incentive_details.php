<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title> Incentive Details || Dashboard</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
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
                                 <span class="card-label fw-bold fs-3 mb-1">Incentive Details</span>
                              </h3>
                           </div>
                           <!--end::Header-->
                           <!--begin::Body-->
                           <div class="card-body py-3">
                              <!--begin::Table container-->
                              <div class="table-responsive">
                                 <!--begin::Table-->
                                 <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="table">
                                    <!--begin::Table head-->
                                    <!--begin::Table head-->
                                    <thead>
                                       <tr class="fw-bold text-muted">
                                          <th class="min-w-150px">Date</th>
                                          <th class="min-w-140px">Sr</th>
                                          <th class="min-w-120px">Statement</th>
                                          <th class="min-w-120px">Payout Date</th>
                                          <th class="min-w-120px">ROI Level Bonus</th>
                                          <th class="min-w-120px">ROI Daily Bonus</th>
                                          <th class="min-w-120px">Total Amount</th>
                                          <th class="min-w-120px">TDS Charge(5%)</th>
                                          <th class="min-w-120px">Service Charge(5%)</th>
                                          <th class="min-w-150px">Net Payable</th>
                                          <th class="min-w-120px">Pay ID No.</th>
                                          <th class="min-w-120px">Pay Account No.</th>
                                          <th class="min-w-120px">Payment Status</th>
                                       </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-center">
                                       <?php
                                       $this->db->select('*');
$this->db->from('kyc_documents');
$this->db->join('bank_details', 'bank_details.member_id = kyc_documents.member_id');
$this->db->where('kyc_documents.member_id', $user_data['member_id']);
$kyc_data = $this->db->get()->result_array();
                                          // Initialize variables
                                          $sr = 0;
                                          $percentage = 5;
                                          $overall_total_inr = 0;
                                          $closing_dates = array('10', '20', '30');
                                          
                                          // Function to convert USD to INR
                                          function usd_to_inr($usd_amount)
                                          {
                                              $exchange_rate = 80; // Static exchange rate for demonstration purposes
                                              return $usd_amount * $exchange_rate;
                                          }
                                          
                                          // Initialize an array to store data for each date
                                          $amounts_by_date = array();
                                          
                                          // Loop through $wallet_history to group amounts by date
                                          foreach ($wallet_history as $key => $value) {
                                              if ($value->amount_for !== 'ROI Income' && $value->amount_for !== 'Level Income') {
                                                  continue;
                                              }
                                          
                                              $date = date('d-m-Y', strtotime($value->created_at));
                                          
                                              // Calculate the total amount for each date
                                              if (!isset($amounts_by_date[$date])) {
                                                  $amounts_by_date[$date] = array(
                                                      'roi_amt' => 0,
                                                      'level_bonus_amt' => 0,
                                                  );
                                              }
                                          
                                              if ($value->amount_for == 'ROI Income') {
                                                  $amounts_by_date[$date]['roi_amt'] += $value->amount;
                                              } 
                                              if ($value->amount_for == 'Level Income') {
                                                  $amounts_by_date[$date]['level_bonus_amt'] += $value->amount;
                                              }
                                             
                                          }
                                           $total_amounts_after_closing_date = array();
                                          
                                          // Display the records for each date and calculate the total amount for each closing date
                                              $running_total = 0; // To keep track of the running total for each closing date
                                          foreach ($amounts_by_date as $date => $amount_data) {
                                             $roi_amount = $amount_data['roi_amt'];
                                              $level_bonus_amount = $amount_data['level_bonus_amt'];
                                              $total_amount = $roi_amount + $level_bonus_amount;
                                              $deduction = $total_amount * ($percentage / 100);
                                              $net_amount = $total_amount - $deduction;
                                              $inr_amount = usd_to_inr($net_amount);
                                              // Check if the current date is one of the closing dates
                                              $is_closing_date = in_array(date('d', strtotime($date)), $closing_dates);
                                          
                                              // Accumulate total amount after each closing date
                                              if ($is_closing_date) {
                                                  if (!isset($total_amounts_after_closing_date[$date])) {
                                                      $total_amounts_after_closing_date[$date] = 0;
                                                  }
                                                  $total_amounts_after_closing_date[$date] += $running_total + $inr_amount;
                                                  $running_total = 0; // Reset the running total for the next closing date
                                              } else {
                                                  $running_total += $inr_amount; // Update the running total for the next date within the closing period
                                              }
                                          }
                                       
                                          // Initialize the final array to store the desired dates range
$desired_dates_range = array();

// Initialize a variable to keep track of the current closing date
$current_closing_date = null;
                                          // Display the records for each date and calculate the total amount for each closing date
                                          foreach ($amounts_by_date as $date => $amount_data) {
                                              $sr++;
                                              $roi_amount = $amount_data['roi_amt'];
                                              $level_bonus_amount = $amount_data['level_bonus_amt'];
                                              $total_amount = $roi_amount + $level_bonus_amount;
                                              $deduction = $total_amount * ($percentage / 100);
                                              $net_amount = $total_amount - $deduction;
                                              $inr_amount = usd_to_inr($net_amount);
                                          
                                              // Check if the current date is one of the closing dates
                                              $is_closing_date = in_array(date('d', strtotime($date)), $closing_dates);
                                          
                                              // Extract the day of the month from the date
    $current_day = date('j', strtotime($date));
 
    // Check if the day of the month matches any of the closing dates
    if (in_array($current_day, $closing_dates)) {
        // If it matches a closing date, update the current closing date
        $current_closing_date = $current_day;
    } else {
        // If it does not match a closing date and we have a current closing date
        // it means the date is within the desired range
        if ($current_closing_date !== null) {
            $desired_dates_range[] = $date;
        }
    }
                                  
                                              ?>
                                       <tr>
                                          <td><?= $date ?></td>
                                          <td>
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6"><?= $sr ?></a>
                                          </td>
                                          <td></td>
                                          <!-- Empty cell for the "Statement" column -->
                                          <td></td>
                                          <!-- Empty cell for the "Payout Date" column -->
                                          <td>
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                             <?php
                                                if ($roi_amount) {
                                                    echo '$' . $roi_amount;
                                                }
                                                ?>
                                             </a>
                                          </td>
                                          <td>
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                             <?php
                                                if ($level_bonus_amount) {
                                                    echo '$' . $level_bonus_amount;
                                                }
                                                ?>
                                             </a>
                                          </td>
                                          <td class="text-dark text-hover-primary fs-6">
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6"><?= '$' . $total_amount ?></a>
                                          </td>
                                          <td class="text-dark  text-hover-primary fs-6">
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6"><?= '$' . $deduction ?></a>
                                          </td>
                                          <td class="text-dark  text-hover-primary fs-6">
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6"><?= '$' . $net_amount ?></a>
                                          </td>
                                          <td class="text-dark  text-hover-primary fs-6">
                                             <a href="#" class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                             <?= '🇮🇳 ₹' . number_format($inr_amount, 2, '.', '') ?>
                                             </a>
                                          </td>
                                          <td></td>
                                          <!-- Empty cell for the "Pay ID No." column -->
                                          <td></td>
                                          <!-- Empty cell for the "Pay Account No." column -->
                                          <td></td>
                                          <!-- Empty cell for the "Payment Status" column -->
                                       </tr>
                                       <?php
                                          // Display the total amount for each closing date after the respective closing date row
                                          if ($is_closing_date) {
                                              ?>
                      
                                       <tr class='fw-bold' style='background-color: #f5952394;'>
                                         <td ><?= $date ?> </td>
                                         <td></td>
                                         <td><a href="<?= base_url()?>Main/invoice" target='_blank' class="text-dark  text-hover-primary d-block mb-1 fs-6">
                                             View
                                             </a> </td>
                                          <td></td>
                                          <td colspan="5" class='text-end'>Total Amount after <?= $date ?> closing date: </td>
                                          <td > <?= '🇮🇳 ₹' . number_format($total_amounts_after_closing_date[$date], 2, '.', '') ?></td>
                                          <td></td>
                                          <td></td>
                                          <td><?php if(number_format($total_amounts_after_closing_date[$date], 2, '.', '') <= 320.00){ echo 'You Dont Have Balance'; }
                                                
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
                                                        // echo '<span class="badge text-bg-danger text-white ">Pending</span>';
                                                        // Add your dropdown form for Money Sent or Hold here

                                                      
                                                        // if ($value['amount_status'] == 'Amount Sent') {
                                                        //     echo '<span class="badge bg-success">Paid</span>';
                                                        // }else{
                                                        //     echo '<button class="btn btn-sm btn-primary me-2" onclick="sendmoney(\'' . $value['member_id'] . '\', \'' . $net_amount_formatted . '\', \'' . $value['sr'] . '\')">Payout Paid</button>';
                                                        // }
                                                        
                                                        //   $data = array(
                                                        //         'member_id' => $user_data['member_id'],
                                                        //         'invoice_number' => '012346',
                                                        //         'amount' => number_format($total_amounts_after_closing_date[$date], 2, '.', ''),
                                                        //         'invoice_number' => 'Pending',
                                                        //         'from_date' => 
                                                        //         'to_date' => 
                                                        //         'created_at' => date('Y-m-d H:i:s'),
                                                                 
                                                        //  );
                                                        //  $this->db->insert('incentive_details', $data);
                                                        print_r($desired_dates_range);

                                                    }
                                                    echo '<br>';
                                                } else {
                                                    echo 'KYC 100% Pending';
                                                }

                                                 
                                          ?></td>
                                       </tr>
                                       <?php
                                          }
                                          }
                                          ?>
                                    </tbody>
                                    <tbody id="table-totals">
                                       <tr>
                                          <td></td>
                                          <td></td>
                                          <!-- Add more empty cells for other columns as needed -->
                                          <td></td>
                                          <td class="fw-bold text-dark text-hover-primary fs-6">Total Amount</td>
                                          <td class="total-usd-amount text-dark fw-bold text-hover-primary fs-6">$0.00</td>
                                          <td class="total-usd-amount-1 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
                                          <td class="total-usd-amount-2 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
                                          <td class="total-usd-amount-3 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
                                          <td class="total-usd-amount-4 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
                                          <td class="total-usd-amount-5 text-dark fw-bold text-hover-primary fs-6">₹0.00</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                       </tr>
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
                  <!-- Last Div  -->
               </div>
               <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::App-->
      >
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
      <!-- ... Previous code ... -->
      <!--end::Table body-->
      <!-- ... Remaining code ... -->
      <!-- Initialize DataTable and Calculate Totals -->
      <script>
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
             var totalAmountUSD4 = 0;
             var totalAmountUSD5 = 0;
             // Iterate through each row in the table body (excluding the totals row)
             $('#table tbody tr').each(function () {
          
                 var data = $(this).find('td');
             console.log(data)
                 // Assuming the total amount in USD is in the 6th column (data[5])
                 var amountUSD = extractNumericValue($(data[4]).text());
                 totalAmountUSD += amountUSD;
         
                 // Assuming the total amount in INR is in the 7th column (data[6])
                 var amountUSD1 = extractNumericValue($(data[5]).text());
                 totalAmountUSD1 += amountUSD1;
                 
                 // Assuming the total amount in INR is in the 7th column (data[6])
                 var amountUSD2 = extractNumericValue($(data[6]).text());
                 totalAmountUSD2 += amountUSD2;
                 
                  // Assuming the total amount in INR is in the 7th column (data[6])
                 var amountUSD3 = extractNumericValue($(data[7]).text());
                 totalAmountUSD3 += amountUSD3;
                  
                  // Assuming the total amount in INR is in the 7th column (data[6])
                 var amountUSD4 = extractNumericValue($(data[8]).text());
                 totalAmountUSD4 += amountUSD4;
                 
                 // Assuming the total amount in INR is in the 7th column (data[6])
                 var amountUSD5 = extractNumericValue($(data[9]).text());
                 totalAmountUSD5 += amountUSD5;
              
             });
         
             // Update the totals row
             $('.total-usd-amount').text('$' + totalAmountUSD.toFixed(2));
             $('.total-usd-amount-1').text('$' + totalAmountUSD1.toFixed(2));
             $('.total-usd-amount-2').text('$' + totalAmountUSD2.toFixed(2));
             $('.total-usd-amount-3').text('$' + totalAmountUSD3.toFixed(2));
             $('.total-usd-amount-4').text('$' + totalAmountUSD4.toFixed(2));
             $('.total-usd-amount-5').text('₹' + totalAmountUSD5.toFixed(2));
         }
         
         // Call the calculateTotals function initially to display the totals
         calculateTotals();
         //       $('#table').DataTable({
         //     "paging": false
         // });
         
      </script>
   </body>
   <!--end::Body-->
</html>
