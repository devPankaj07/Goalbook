<!DOCTYPE html>
 
<html lang="en">
<!--begin::Head-->

<head>
    <title>Bank Details || Dashboard</title>
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
            <div class="app-wrapper  flex-column" id="kt_app_wrapper">
                <!--start::Sidebar-->
                <?php include_once('sidebar.php') ?>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="row gy-5  m-auto justify-content-center">
                        <div class="col-xxl-12">

                            <!--begin::Tables Widget 9-->
                            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-2 mb-1">Add Bank Details</span>
                                         <div class="d-flex flex-wrap fw-semibold mb-4 fs-6 text-danger">Note - Please take extra care to accurately enter your bank details, as once submitted, they cannot be edited. If you require any modifications, reach out to the admin for assistance. Before finalizing the submission, make sure to thoroughly review your bank information to prevent any possible loss of funds.</div>

                                        <!--<div class="d-flex flex-wrap fw-semibold mb-4 fs-6 text-danger">Note - Enter your bank details accurately as they cannot be edited once submitted. If you need to make changes, contact the admin for assistance. Double-check your bank details before submitting to avoid any potential loss of funds</div>-->
                                    </h3>


                                </div>
                                <!--end::Header-->
                          
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <div class="element-wrapper  ">
                                     
                                        <div class="element-box">
                                            <form id="bank_details_form">
                                                <h5 class="form-header"></h5>

                                                <fieldset class="form-group">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1"> Member ID</label>
                                                                <input class="form-control" value="<?= $user_data['member_id'] ?>" placeholder="Member ID" name="member_id" id="member_id" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1"> Bank Name</label>
                                                                <input class="form-control" placeholder="Bank Name" name="bank_name" id="bank_name" value="<?= !empty($bank_details) ? $bank_details[0]['bank_name'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">Account Number</label>
                                                                <input class="form-control" placeholder="Account Number" name="account_number" id="account_number" value="<?= !empty($bank_details) ? $bank_details[0]['account_number'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">Confirm Account Number</label>
                                                                <input class="form-control" placeholder="Confirm Account Number" name="conform_account_number" id="conform_account_number" value="<?= !empty($bank_details) ? $bank_details[0]['account_number'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">FullName as per Bank</label>
                                                                <input class="form-control" placeholder="FullName as per Bank" name="fullname" id="fullname" value="<?= !empty($bank_details) ? $bank_details[0]['fullname'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                       <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">Bank Branch</label>
                                                                <input class="form-control" placeholder="Bank Branch Name" name="branch" id="branch" value="<?= !empty($bank_details) ? $bank_details[0]['branch'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">IFSC Code</label>
                                                                <input class="form-control" placeholder="IFSC Code" name="IFSC_code" id="IFSC_code" value="<?= !empty($bank_details) ? $bank_details[0]['IFSC_code'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">Choose Account Type</label>
                                                                <select class="form-control" name="account_type" id="account_type">
                                                                    <option value="1">Saving Account</option>
                                                                    <option value="2">Current Account</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">Add Your Google Pay Number for Emergency Payout</label>
                                                                <input class="form-control" placeholder="Google Pay" name="google_pay" id="google_pay" value="<?= !empty($bank_details) ? $bank_details[0]['google_pay'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="" class="fw-bold me-5 my-1">Add Your Phone Pay Number for Emergency Payout</label>
                                                                <input class="form-control" placeholder="Phone pay" name="phone_pay" id="phone_pay" value="<?= !empty($bank_details) ? $bank_details[0]['phone_pay'] : ''; ?>" <?= !empty($bank_details) ? 'readonly' : ''; ?> />
                                                            </div>
                                                        </div>
                                                 
                                                     
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">

                                                        </div>
                                                    </div>
                                                </fieldset>
                                        
                                                <div class="form-check  mb-4 mt-4">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox" <?= !empty($bank_details[0]['account_number']) ? 'checked disabled' : ''; ?> />
                                                        I agree to terms and conditions
                                                    </label>
                                                </div>
                                                <div class="form-buttons-w text-center">
                                                    <button class="btn btn-primary" type="submit" name="submit" id="submit" <?= !empty($bank_details[0]['account_number']) ? 'disabled' : ''; ?>>Add Bank Account</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 9-->
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
        <?php include_once('customize.php')?>
 
 
        <?php include_once('notification.php')?>
        <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
</body>
<!--end::Body-->
<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();

            // Clear previous error messages
            $('.error').removeClass('error');
            $('.error-message').remove();

            // Validate form fields
            var valid = true;

            // Bank Name validation
            var bankName = $('#bank_name').val().trim();
            if (bankName === '') {
                valid = false;
                $('#bank_name').addClass('error');
                $('#bank_name').after('<div class="error-message text-danger">Please enter the bank name</div>');
            }

            // Account Number validation
            var accountNumber = $('#account_number').val().trim();
            if (accountNumber === '') {
                valid = false;
                $('#account_number').addClass('error');
                $('#account_number').after('<div class="error-message text-danger">Please enter the account number</div>');
            }

            // Confirm Account Number validation
            var confirmAccountNumber = $('#conform_account_number').val().trim();
            if (confirmAccountNumber === '') {
                valid = false;
                $('#conform_account_number').addClass('error');
                $('#conform_account_number').after('<div class="error-message text-danger">Please enter the confirm account number</div>');
            } else if (accountNumber !== confirmAccountNumber) {
                valid = false;
                $('#conform_account_number').addClass('error');
                $('#conform_account_number').after('<div class="error-message text-danger">Account numbers do not match</div>');
            }

            // FullName validation
            var fullName = $('#fullname').val().trim();
            if (fullName === '') {
                valid = false;
                $('#fullname').addClass('error');
                $('#fullname').after('<div class="error-message text-danger">Please enter your full name</div>');
            }

            // IFSC Code validation
            var ifscCode = $('#IFSC_code').val().trim();
            if (ifscCode === '') {
                valid = false;
                $('#IFSC_code').addClass('error');
                $('#IFSC_code').after('<div class="error-message text-danger">Please enter the IFSC code</div>');
            }

            // Google Pay validation
            // var googlePay = $('#google_pay').val().trim();
            // if (googlePay === '') {
            //     valid = false;
            //     $('#google_pay').addClass('error');
            //     $('#google_pay').after('<div class="error-message text-danger">Please enter your Google Pay details</div>');
            // }

            // Phone Pay validation
            // var phonePay = $('#phone_pay').val().trim();
            // if (phonePay === '') {
            //     valid = false;
            //     $('#phone_pay').addClass('error');
            //     $('#phone_pay').after('<div class="error-message text-danger">Please enter your Phone Pay details</div>');
            // }

            // USDT Address validation
            var usdtAddress = $('#account_type').val().trim();
            if (usdtAddress === '') {
                valid = false;
                $('#account_type').addClass('error');
                $('#account_type').after('<div class="error-message text-danger">Please enter your Account Type</div>');
            }

            // Branch validation
            var branch = $('#branch').val().trim();
            if (branch === '') {
                valid = false;
                $('#branch').addClass('error');
                $('#branch').after('<div class="error-message text-danger">Please enter your country</div>');
            }

            // Checkbox validation
            var checkbox = $('#checkbox').is(':checked');
            if (!checkbox) {
                valid = false;
                $('.form-check').addClass('error');
                $('.form-check').after('<div class="error-message text-danger">Please agree to the terms and conditions</div>');
            }

            // If the form is valid, submit the data via AJAX
            if (valid) {
                console.log($('#bank_details_form').serialize())
                $.ajax({
                    url: '<?php echo base_url('Ajax/addBankDetails'); ?>',
                    type: 'POST',
                    data: $('#bank_details_form').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        // Handle the response from the server
                        if (response.status === 'success') {
                            // Success message
                            // alert(response.message);
                                  // Redirect or display a success message
               Swal.fire(
                  'Bank Details Added!',
                  'Bank Details Added has been completed successfully.!',
                  'success'
                ).then(function() {
                    window.location.href = baseurl + 'profile';
                });
                            
                
               
                        } else if (response.status === 'error') {
                            // Error message
                            // Parse the HTML error message
                            var errorMessages = $(response.message).text();

                            // Display the error messages to the user
                            alert('Validation errors:\n' + errorMessages);
                        }
                    }
                });
            }
        });
    });
</script>
</html>