<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> Cashback Bonus || Dashboard</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    <style>
        .totalua{
             background:#d5ffe0 !important;
             text-align:center;
         }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<style>

</style>
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
                                        <span class="card-label fw-bold fs-3 mb-1">Daily Cashback Income Bonus Report</span>
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
                                            <thead>
                                                <tr class="fw-bold text-dark text-center">
                                                <th class="min-w-30px">Sr No</th>
                                                    <th class="max-w-100px">Credited Date & Time</th>
                                                    <th class="min-w-100px">My Member ID</th>
                                                    <th class="min-w-100px">Description</th>
                                                    <th class="min-w-100px">Amount (Dollar)</th>
                                                    <th class="min-w-100px">Amount (INR)</th>
                                                    <th class="min-w-100px">Net Amount</th>
                                                    <th class="min-w-100px">Paid Status</th>
        
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody>
                                            <!-- roi_income -->
                            
                                            <?php
                                                $sr = 0;
                                                foreach ($roi_income as $row) :
                                                    $sr++;
                                                    $ttl_amt = $row->amount;
                                                    $percentage = 0;
                                                    $deduction = $ttl_amt * ($percentage / 100); // Calculate 5% of $ttl_amt
                                                    $net_amount = max($ttl_amt - $deduction, 0); // Ensure the net amount is not negative
                                                    $net_amount_formatted = number_format($net_amount, 2, '.', '');
                                                    
                                             

                                                // Fixed conversion rate (as an example)
                                                $conversionRate = 80;

                                                // Convert dollars to rupees
                                                $taxrupeeAmount = $deduction * $conversionRate;

                                                $netrupeeAmount = $net_amount_formatted * $conversionRate;

                                                ?>
                                                    <tr class="text-center">

                                                        <td>
                                                            <a href="#" class="text-dark  text-hover-primary fs-6"><?php echo $sr; ?></a>
                                                        </td>
                                                        <td class="text-dark  text-hover-primary fs-6">
                                                            <a href="#" class="text-darktext-hover-primary d-block mb-1 fs-6"><?php echo  $row->created_at; ?></a>
                                                        </td>

                                                        <td>
                                                            <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6"><?php echo $row->member_id; ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6"><?php $string = $row->amout_received_from;


                                                                                                                                       $string = $row->amout_received_from;
echo $string;

// Using preg_match to extract the substring starting with "SMWW"
if (preg_match('/SMWW\w+/', $string, $matches)) {
    $extractedString = $matches[0];
    
    $query = $this->db
        ->select('*')
        ->from('users')
        ->where('member_id', $extractedString)
        ->get();
    $resultArray = $query->result_array();

    if (!empty($resultArray) && isset($resultArray[0])) {
        echo 'Direct Income from ' . $resultArray[0]['first_name'] . ' ' . $resultArray[0]['last_name'] . '(' . $extractedString  . ')' .  ' ' . '$' . $resultArray[0]['activated_package'] . ' (5%)';
    } else {
        echo "No results found.";
    }
} else {
    echo "Daily Cashback Bonus";
}

                                                                                                                                        ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-dark text-primary d-block mb-1 fs-6 g-blue"><?php echo '$' . $row->amount; ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6 g-blue"><?php echo '₹' . $row->inr_amount; ?></a>
                                                        </td>

                                                        <td class="text-dark text-hover-primary fs-6">
                                                            <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6 g-green "><?php echo  '₹' . $netrupeeAmount; ?></a>
                                                        </td>
                                                        <td class="text-dark text-hover-primary fs-6">
                                                            <a href="#" class="text-dark text-hover-primary d-block mb-1 fs-6"><span class="badge badge-danger">Pending</span>
</a>
                                                        </td>


                                                    </tr>
                                                <?php endforeach; ?>


                                            </tbody>
                                    <tbody id="table-totals">
    <tr class="totalua">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="total-usd-amount text-dark fw-bold text-hover-primary fs-6">$0.00</td>
        <td class="total-usd-amount-1 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
        <td class="total-usd-amount-2 text-dark fw-bold text-hover-primary fs-6">$0.00</td>
 
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
    <?php include_once('customize.php') ?>


    <?php include_once('notification.php') ?>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    
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
        // var totalAmountUSD3 = 0;
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
            var amountUSD2 = extractNumericValue($(data[6]).text());
            totalAmountUSD2 += amountUSD2;
            
            //  // Assuming the total amount in INR is in the 7th column (data[6])
            // var amountUSD3 = extractNumericValue($(data[7]).text());
            // totalAmountUSD3 += amountUSD3;
         

        });

        // Update the totals row
        $('.total-usd-amount').text('$' + totalAmountUSD.toFixed(2));
        $('.total-usd-amount-1').text('₹' + totalAmountUSD1.toFixed(2));
        $('.total-usd-amount-2').text('₹' + totalAmountUSD2.toFixed(2));
        // $('.total-usd-amount-3').text('$' + totalAmountUSD3.toFixed(2));
    }
 
 

 
</script>
</body>
<!--end::Body-->

</html>