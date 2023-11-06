<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direct Income Payouts List || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
</head>

<body>
    <?php include_once("header.php"); ?>
    <!--begin::Sidebar-->
    <?php include_once("sidebar.php"); ?>
    <!--begin::Content-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

        <div class="d-flex flex-column flex-lg-row-fluid">
            <div id="kt_app_content_container" class="container-xxxl ">
                <div class="card mb-5 mb-xl-8 h-100">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Payouts</span>
                        </h3>
                                       </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3 m-auto">
                        <!--begin::Table container-->
                        <div class="d-flex align-items-center justify-content-center m-auto">
                                                             <span class="text-success fs-2hx fw-bold me-2 lh-1 ls- mt-5 blink">30 Days </span>
                                                        <!--end::Amount-->
                                                    </div>
                        <!--end::Table container-->
                         <p>The Payout system will start from after 45 Days </p>

                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Col-->
            </div>
        </div>

        <!--end::Content-->
    </div>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
//  <script>
//         $(document).ready(function() {
//             var table = $('.table').DataTable({
//                 searching: true,
//                 info: true,
//                 paging: true,
//                 dom: 'Bfrtip',
//                 buttons: ['copy', 'csv', 'excel', 'pdf']
//             });

//             // Create the date range filter input
//             var dateRangeInput = $('<input type="text" class="form-control form-control-sm" placeholder="Select date range"/>')
//                 .appendTo($('.dataTables_filter'))
//                 .on('change', function() {
//                     var value = $(this).val();

//                     // Apply the filter
//                     table.column(11).search(value, true, false).draw();
//                 });

//             // Initialize the date range picker
//             dateRangeInput.daterangepicker({
//                 autoUpdateInput: false,
//                 singleDatePicker: true, // Set to true to select only a single date
//                 showDropdowns: true, // Enable year and month dropdowns
//                 locale: {
//                     format: 'YYYY-MM-DD', // Set the desired date format
//                     cancelLabel: 'Clear'
//                 }
//             }).on('apply.daterangepicker', function(ev, picker) {
//                 $(this).val(picker.startDate.format('YYYY-MM-DD'));
//                 $(this).trigger('change'); // Trigger the change event to apply the filter
//             }).on('cancel.daterangepicker', function() {
//                 $(this).val('');
//                 $(this).trigger('change'); // Trigger the change event to apply the filter
//             });
//             // Calculate total amount
//             var totalAmount = 0;
//             table.column(3).data().each(function(value) {
//                 var amount = parseFloat(value.replace(/[^0-9.-]+/g, ''));
//                 if (!isNaN(amount)) {
//                     totalAmount += amount;
//                 }
//             });

//             console.log(totalAmount); // Display the total amount

//         })
//     </script>


//     <script>
//         function sendmoney(ID, Amount, Sr) {
//             var memberID = ID;
//             var amount = Amount;
//             var sr = Sr;
//             $.ajax({
//                 url: baseurl + 'Ajax/sendmoney', // Replace with your server endpoint URL
//                 type: 'POST', // Adjust the HTTP method if needed (e.g., GET, POST)
//                 data: {
//                     memberID: memberID,
//                     amount: amount,
//                     sr:sr
//                 },
//                 dataType: 'json', // Set the expected data type of the response (e.g., json, xml)
//                 success: function(response) {
//                          Swal.fire(
//                   'Money Send!',
//                   'Money has been Sent successfully to ' + memberID,
//                   'success'
//                 ).then(function() {
//                     window.location.href = baseurl + 'Admin/payout_direct_income';
//                 });
//                 },
//                 error: function(xhr, status, error) {
//                     // Handle any errors that occur during the request
//                     console.log(xhr.responseText); // Log the error response
//                 }
//             });
//         }
//     </script>




    </script>
</body>

</html>