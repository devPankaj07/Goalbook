<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Request || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    <style>
        @media only screen and (max-width: 476px) {
            .funreq{
                margin:0 !important;
                padding:10px;
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
    <div class="col-xl-6 funreq" style="margin:auto;">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                    <h2>Add / Debit Funds</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Form-->
                <form id="kt_ecommerce_settings_general_form" class="form" action="#">
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mt-3">
                            <span class="required">Enter Member ID</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Enter the contact's name.">
                                <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="name" value="<?= (!empty($memberid_from_url)) ? $memberid_from_url : ''; ?>">
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--begin::Action buttons-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">
                            Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Verify
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Action buttons-->
                </form>
                <!--end::Form-->
                <!--begin::Contact group wrapper-->
                <div class="card card-flush" id="details-card">
                    <!--begin::Card header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Details</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-5">
                        <!--begin::Contact groups-->
                        <div class="d-flex flex-column gap-5">
                            <!--begin::Contact group-->
                          
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Member ID</a>
                                <div class="badge badge-light-primary">-</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary ">Name</a>
                                <div class="badge badge-light-primary">-</div>
                            </div>
                            <!--begin::Contact group-->
         
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary ">Mobile Number</a>
                                <div class="badge badge-light-primary">-</div>
                            </div>
                            <!--begin::Contact group-->
                            <!--begin::Contact group-->
                            <div class="d-flex flex-stack">
                                <a href="getting-started.html" class="fs-6 fw-bold text-danger text-hover-primary ">Amount Requested</a>
                                <div class="badge badge-light-danger">0</div>
                            </div>
                            <!--begin::Contact group-->
                        </div>
                        <!--end::Contact groups-->

                        <!--begin::Separator-->
                        <div class="separator my-7"></div>
                        <!--begin::Separator-->

                        <!--begin::Add contact group-->
                        <label class="fs-6 fw-semibold form-label">Add Amount</label>

                        <div class="input-group">
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Amount To Add" id="amount">
                            <button type="button" class="btn btn-icon btn-light">
                                <i class="ki-duotone ki-plus-square fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </button>
                        </div>
                        <!--end::Add contact group-->

                        <!--begin::Separator-->
                        <div class="separator my-7"></div>
                        <!--begin::Separator-->

                        <!--begin::Add new contact-->
                        <a href="#" class="btn btn-primary w-35" onclick="addamount(this)">
                            <i class="ki-duotone ki-badge fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Add Amount
                        </a>
                        <a href="add-contact.html" class="btn btn-primary w-35">
                            <i class="ki-duotone ki-badge fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> Debit
                        </a>
                        <a href="debitaddtable.php" class="btn btn-primary w-35">
                            <i class="ki-duotone ki-badge fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i> History
                        </a>
                        <!--end::Add new contact-->

                    </div>
                    <!--end::Card body-->

                </div>

            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
    </div>
    <!--end::Content-->
    </div>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    <script>

        $(document).ready(function() {
            $("#details-card").css("display", "none");
            $('form').submit(function(event) {
                event.preventDefault(); // Prevent form submission

                var memberId = $('input[name="name"]').val(); // Get the entered member ID

                // Make an AJAX request to the server
                $.ajax({
                    url: baseurl +'Ajax/fetchMemberDetails', // Replace with the actual URL of your CodeIgniter controller
                    method: 'POST',
                    data: {
                        memberId: memberId
                    }, // Pass the member ID to the server
                    dataType: 'json',
                    beforeSend: function() {
                        // Display a loading indicator while the request is being processed
                        $('.indicator-label').hide();
                        $('.indicator-progress').show();
                    },
                    success: function(response) {
                        // Handle the response from the server
                        if (response.success) {
                            $("#details-card").css("display", "block");
                            // Update the details on the page
                            $('.card-body .badge').eq(0).text(response.member_id);
                            $('.card-body .badge').eq(1).text(response.name);
                            $('.card-body .badge').eq(2).text(response.mobileNo);
                            $('.card-body .badge').eq(3).text(response.amount_status);
                            $('.card-body .badge').eq(4).text(response.blocked);
                            $('#amount').val(response.amount_status);
                            // Clear the input field
                           

                            // Optionally, you can show a success message or perform other actions
                            // after updating the details.
                        } else {
                            // Display an error message if the request was not successful
                            alert('Failed to retrieve member details. Please try again.');
                        }
                    },
                    error: function() {
                        // Handle any errors that occurred during the AJAX request
                        alert('An error occurred during the request. Please try again.');
                    },
                    complete: function() {
                        // Reset the loading indicator after the request is complete
                        $('.indicator-progress').hide();
                        $('.indicator-label').show();
                    }
                });
            });
        });

        function addamount() {
    var amount = $('#amount').val(); // Get the amount value from the input field
  
    var memberId = $('input[name="name"]').val(); // Get the entered member ID
    // Remove existing error message, if any
    $('#amount').next('.text-danger').remove();
    
    // Validate the input
    if (amount === '' || amount === ' ') {
        // Show error message
        $('<span class="text-danger">Amount is required</span>').insertAfter('#amount');
        return; // Stop further execution
    }
    
    // AJAX request
    $.ajax({
        url: baseurl + 'Ajax/addamount', // Replace with the actual PHP file handling the backend logic
        method: 'POST',
        data: { amount: amount,  memberId: memberId}, // Send the amount as data
        dataType: 'json',
        beforeSend: function() {
            // Show a loading indicator or disable the button if needed
        },
        success: function(response) {
            // Handle the response from the server
            if (response.success) {
                // Amount added successfully
                alert('Amount added successfully!');
                
                // Update the amount display or perform any other necessary actions
                
                // Clear the input field
                $('#amount').val('');
            } else {
                // Amount addition failed
                alert('Failed to add amount. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            // Handle any errors during the AJAX request
            alert('An error occurred. Please try again later.');
        },
        complete: function() {
            // Perform any necessary cleanup or UI changes after the request is complete
        }
    });
}

    </script>
</body>

</html>