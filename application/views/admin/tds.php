<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Total TDS || Admin</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
 

<!-- Include Bootstrap Datepicker CSS and JS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css"> -->

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
                        <span class="card-label fw-bold fs-3 mb-1">
                        <?php
 
// Function to fetch the value names based on the key
function getValueName($key) {
    $data = array(
        // Including the single quotes in the key
        "tds" => 'TDS Charge Amount List',
        "admin" => 'Service Charge Amount List',
        // Add more key-value pairs as needed
    );

    // Check if the key exists in the data array
    if (array_key_exists($key, $data)) {
        return $data[$key];
    } else {
        return '';
    }
}

// Retrieving the value of the key from the URL
$keyFromURL = isset($_GET['key']) ? $_GET['key'] : '';

// Output the corresponding value name
echo getValueName($keyFromURL);
?>


                            
                        </span>
                        <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                     </h3>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body py-3">
               <!-- Add two input fields for date range -->
<!--               <div class="form-group">-->
<!--    <label for="from-date">From Date:</label>-->
<!--    <input type="date" class="form-control" id="from-date">-->
<!--</div>-->

<!--<div class="form-group">-->
<!--    <label for="to-date">To Date:</label>-->
<!--    <input type="date" class="form-control" id="to-date">-->
<!--</div>-->



                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " id='table' >
                           <!--begin::Table head-->
                          
      
                           <thead>
                              <tr class="fw-bold text-muted">
                                
                                  <th class="min-w-140px">Date & Time</th>
                                 <th class="min-w-120px">Sr No</th>
                                 <th class="min-w-120px">Fullname</th>
                                 <th class="min-w-140px">Member ID</th>
                                 <th class="min-w-140px">Type of Amount</th>
                                 <th class="min-w-140px">Amount (Dollar)</th>
                                 <th class="min-w-140px">Amount (INR)</th>
                                 <th class="min-w-140px">TDS Amount (Dollar)</th>
                                 <th class="min-w-140px">TDS Amount (INR)</th>
                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody id="tableBody">
                              <?php
                                 //   print_r($user_data);
                                     $sr = 0;
                                   foreach ($e_wallet_history as $value) {
                                        $sr++;
                                        $name = $this->db->select('*')->where('member_id', $value['member_id'])->get('users')->result_array();
                                    ?>
                              <tr>
                                  <td><?=  date("Y-m-d",strtotime($value['created_at']));?></td>
                                 <td><?=$sr ?></td>
                                 <td><?= $name[0]['first_name'] . ' ' . $name[0]['last_name'] ;?></td>
                                 <td><?= $value['member_id'] ;?></td>
                                 <td><?= $value['amount_for'] ;?></td>
                                 <td><?= '$' . $value['amount']; ?></td>
                                 <td><?php 
                                  $dollar = 80;
                                  $inr_amount = $dollar * $value['amount'];
                                   echo '₹' . $inr_amount;
                                  
                                  ?></td>
                                  <td><?php 
                                    
                                   $dollar = round($value['amount'] * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places 
                                   echo '$' . $dollar;
                                   ?></td>
                                 <td>
                                    <?php  $dollar = 80;
                                 $inr_amount = $dollar * $value['amount'];
                                 $inr_amount = round($inr_amount * 0.05, 2); // Calculate 5% of the converted amount and round to two decimal places 
                                 echo '₹' . $inr_amount;
                                 ?></td>
                                    
                                   </td>
                              </tr>
                              <?php }?>
                           </tbody>
                           <tbody id="table-totals">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td  class="total-usd-amount-2 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
        <td class="total-usd-amount text-dark fw-bold text-hover-primary fs-6">₹0.00</td>
        <td class="total-usd-amount-3 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
        <td class="total-usd-amount-1 text-dark fw-bold text-hover-primary fs-6">₹0.00</td>
        
         
   
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
         <!--end::Content-->
      </div>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
     
  
     <script>
   
// $(document).ready(function () {
//     let minDate, maxDate;

//     // Initialize the DataTable with the desired options
//     let table = $('#table').DataTable({
//         // Your DataTable options
//     });

//     // Custom filtering function which will search data in column one (index 0) between two values
//     $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
//         let min = minDate.value;
//         let max = maxDate.value;
//         let date = new Date(data[0]);

//         if (
//             (min === '' && max === '') ||
//             (min === '' && date <= new Date(max)) ||
//             (new Date(min) <= date && max === '') ||
//             (new Date(min) <= date && date <= new Date(max))
//         ) {
//             return true;
//         }
//         return false;
//     });

//     // Get the date inputs
//     minDate = document.getElementById('from-date');
//     maxDate = document.getElementById('to-date');

//     // Refilter the table when date inputs change
//     $('#from-date, #to-date').on('change', function () {
//         table.draw();
//         calculateTotals();
//     });
  
    
// });
 
// calculateTotals();

//     // Function to extract the numeric value from the amount string
//     function extractNumericValue(amountString) {
//         // Remove non-numeric characters and any leading/trailing whitespaces
//         var numericValue = parseFloat(amountString.replace(/[^0-9.-]+/g, '').trim());
//         return !isNaN(numericValue) ? numericValue : 0;
//     }

//     // Function to calculate totals
//     function calculateTotals() {
//         var totalAmountUSD = 0;
//         var totalAmountUSD1 = 0;
//         var totalAmountUSD3 = 0;
//         var totalAmountUSD4 = 0;
//         // Iterate through each row in the table body (excluding the totals row)
//         $('#table tbody tr').each(function () {

//             var data = $(this).find('td');
//             // Assuming the total amount in USD is in the 6th column (data[5])
//             var amountUSD3 = extractNumericValue($(data[5]).text());
//             totalAmountUSD3 += amountUSD3;

//             // Assuming the total amount in USD is in the 7th column (data[6])
//             var amountUSD = extractNumericValue($(data[6]).text());
//             totalAmountUSD += amountUSD;

//             // Assuming the total amount in USD is in the 8th column (data[7])
//             var amountUSD4 = extractNumericValue($(data[7]).text());
//             totalAmountUSD4 += amountUSD4;

//             // Assuming the total amount in USD is in the 9th column (data[8])
//             var amountUSD1 = extractNumericValue($(data[8]).text());
//             totalAmountUSD1 += amountUSD1;
//         });

//         // Update the totals row
//         $('.total-usd-amount').text('₹' + totalAmountUSD.toFixed(2));
//         $('.total-usd-amount-1').text('₹' + totalAmountUSD1.toFixed(2));
//         $('.total-usd-amount-2').text('$' + totalAmountUSD3.toFixed(2));
//         $('.total-usd-amount-3').text('$' + totalAmountUSD4.toFixed(2));
//     }

$(document).ready(function () {
    // let minDate, maxDate;

    // // Initialize the DataTable with the desired options
    // let table = $('#table').DataTable({
    //     // Your DataTable options
    // });

    // // Custom filtering function which will search data in column one (index 0) between two values
    // $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    //     let min = minDate.value;
    //     let max = maxDate.value;
    //     let date = new Date(data[0]);

    //     if (
    //         (min === '' && max === '') ||
    //         (min === '' && date <= new Date(max)) ||
    //         (new Date(min) <= date && max === '') ||
    //         (new Date(min) <= date && date <= new Date(max))
    //     ) {
    //         return true;
    //     }
    //     return false;
    // });

    // // Get the date inputs
    // minDate = document.getElementById('from-date');
    // maxDate = document.getElementById('to-date');

    // Call the calculateTotals function initially to display the totals
    calculateTotals();

    // // Refilter the table when date inputs change
    // $('#from-date, #to-date').on('change', function () {
    //     table.draw();
    //     calculateTotals();
    // });

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
        var totalAmountUSD3 = 0;
        var totalAmountUSD4 = 0;
        var totalRows = 0; // To keep track of the total number of rows

        // Iterate through each row in the table body (excluding the totals row)
        $('#table tbody tr').each(function () {
            if ($(this).is(':visible')) {
                var data = $(this).find('td');
                // Assuming the total amount in USD is in the 6th column (data[5])
                var amountUSD3 = extractNumericValue($(data[5]).text());
                totalAmountUSD3 += amountUSD3;

                // Assuming the total amount in USD is in the 7th column (data[6])
                var amountUSD = extractNumericValue($(data[6]).text());
                totalAmountUSD += amountUSD;

                // Assuming the total amount in USD is in the 8th column (data[7])
                var amountUSD4 = extractNumericValue($(data[7]).text());
                totalAmountUSD4 += amountUSD4;

                // Assuming the total amount in USD is in the 9th column (data[8])
                var amountUSD1 = extractNumericValue($(data[8]).text());
                totalAmountUSD1 += amountUSD1;

                totalRows++; // Increment total rows count
            }
        });

        // Update the totals row only if there are filtered rows
        if (totalRows > 0) {
            $('.total-usd-amount').text('₹' + totalAmountUSD.toFixed(2));
            $('.total-usd-amount-1').text('₹' + totalAmountUSD1.toFixed(2));
            $('.total-usd-amount-2').text('$' + totalAmountUSD3.toFixed(2));
            $('.total-usd-amount-3').text('$' + totalAmountUSD4.toFixed(2));
        } else {
            // If no rows are visible after filtering, reset the totals to 0
            $('.total-usd-amount').text('₹0.00');
            $('.total-usd-amount-1').text('₹0.00');
            $('.total-usd-amount-2').text('$0.00');
            $('.total-usd-amount-3').text('$0.00');
        }
    }
});

    
   </script>
   </body>
</html>
