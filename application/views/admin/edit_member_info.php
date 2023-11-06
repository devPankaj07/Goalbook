<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member Info || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>

</head>

<body>

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
                <!--start::Sidebar-->
                <?php include_once('sidebar.php') ?>
                <!--end::Sidebar-->
                <!--begin::Main-->

                <div class="row gy-4 justify-content-center mt-5" style="gap: 1em;">
                    <!--begin::Tables Widget 9-->
                    <div class="card  mb-5 col-xl-10">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Edit Member Info</span>

                                <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">Enter id you want to edit. </div>
                            </h3>


                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <div class="element-wrapper  ">

                                <div class="element-box">
                                    <div class="card card-flush h-lg-100" id="kt_contacts_main">

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
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1">
                                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" name="name" value="">
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->

                                                <!--begin::Action buttons-->
                                                <div class="d-flex justify-content-end">
                                                    <!--begin::Button-->
                                                    <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">
                                                        Reset
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
                                                        <h2>Member Info</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->

                                                <!--begin::Card body-->
                                                <div class="card-body pt-5 ">
                                                    <!--begin::Contact groups-->
                                                    <div class="d-flex flex-column gap-5 member-info">

                                                    </div>
                                                    <!--end::Contact groups-->

                                                    <!--begin::Separator-->
                                                    <div class="separator my-7"></div>
                                                    <!--begin::Separator-->


                                                    <!--end::Add new contact-->

                                                </div>
                                                <!--end::Card body-->

                                                <!--begin::Card header-->
                                                <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>Member Bank Details</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->

                                                <!--begin::Card body-->
                                                <div class="card-body pt-5">
                                                    <!--begin::Contact groups-->
                                                    <div class="d-flex flex-column gap-5 member-bank">

                                                    </div>
                                                    <!--end::Contact groups-->




                                                    <!--end::Add new contact-->

                                                </div>
                                                <!--end::Card body-->

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Body-->
                    </div>

                    <!--end::Tables Widget 9-->
                </div>

                <!-- Last Div  -->

                <!--end:::Main-->
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->



        <?php require_once(__DIR__ . '/../includes/foot.php'); ?>

    </body>

    <script>
        $(document).ready(function() {

            $('form').submit(function(event) {
                event.preventDefault(); // Prevent form submission
                $('.member-info').empty(); // Remove existing content
                $('.member-bank').empty();
                var memberId = $('input[name="name"]').val(); // Get the entered member ID

                // Make an AJAX request to the server
                $.ajax({
                    url: baseurl + 'Ajax/getMemberDetails', // Replace with the actual URL of your CodeIgniter controller
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
                        console.log(response)
                        var usersData = response.users;
                        if (usersData.length > 0) {
                            var usersFormHtml = '<div class="col-10">' +
                                '<form  id="updateMemberForm" method="POST"  >' +

                                '<div class="row mb-3">' +
                                '<label for="firstName" class="col-sm-4 col-form-label">First Name</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="firstName" name="firstName" value="' + usersData[0].first_name + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="lastName" class="col-sm-4 col-form-label">Last Name</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="lastName" name="lastName" value="' + usersData[0].last_name + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="email" class="col-sm-4 col-form-label">Email</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="email" class="form-control" id="email" name="email" value="' + usersData[0].email + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="mobileNumber" class="col-sm-4 col-form-label">Mobile Number</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="' + usersData[0].mobile_number + '">' +
                                '</div>' +
                                '</div>' +

                                '<div class="row mb-3">' +
                                '<label for="dateOfBirth" class="col-sm-4 col-form-label">Date of Birth</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" value="' + usersData[0].dateofbirth + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="gender" class="col-sm-4 col-form-label">Gender</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="gender" name="gender" value="' + usersData[0].gender + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="address" class="col-sm-4 col-form-label">Address</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="address" name="address" value="' + usersData[0].address + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="city" class="col-sm-4 col-form-label">City</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="city" name="city" value="' + usersData[0].city + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="state" class="col-sm-4 col-form-label">State</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="state" name="state" value="' + usersData[0].state + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="country" class="col-sm-4 col-form-label">Country</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="country" name="country" value="' + usersData[0].country + '">' +
                                '</div>' +
                                '</div>' +

                                '<div class="row mb-3">' +
                                '<div class="col-sm-4"></div>' +
                                '<div class="col-sm-8">' +
                                '<input type="submit" class="btn btn-primary" value="Update"  >' +
                                '</div>' +
                                '</div>' +
                                '</form>' +
                                '</div>';



                        } else {
                            var usersFormHtml = '<div class="col-10">' +
                                '<p>No bank details found.</p>' +
                                '</div>';
                        }

                        $('.member-info').append(usersFormHtml);


                        $('#updateMemberForm').submit(function(event) {
                            event.preventDefault(); // Prevent form submission

                            // Serialize the form data
                            var formData = $(this).serialize();
                            formData += '&memberId=' + usersData[0].member_id;
                            // Make an AJAX request to update the member information
                            $.ajax({
                                url: baseurl + 'Ajax/update_member_info', // Replace with the actual URL of your CodeIgniter controller
                                method: 'POST',
                                data: formData,
                                dataType: 'json',
                                beforeSend: function() {
                                    // Display a loading indicator while the request is being processed
                                    // $('.indicator-label').hide();
                                    // $('.indicator-progress').show();
                                },
                                success: function(response) {
                                    // Handle the response from the server
                                    console.log(response);
                                    // Handle success scenario
                                      Swal.fire(
                                                    'Profile Details Updated',
                                                    'success'
                                                )
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

                        var bankDetailsData = response.bank_details
                        if (bankDetailsData.length > 0) {
                            var bankUsersFormHtml = '<div class="col-10">' +


                                '<form id="updateBankData" method="POST">' +
                                '<div class="row mb-3">' +
                                '<label for="bankName" class="col-sm-4 col-form-label">Bank Name</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="bankName" name="bankName" value="' + bankDetailsData[0].bank_name + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="accountNumber" class="col-sm-4 col-form-label">Account Number</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="accountNumber" name="accountNumber" value="' + bankDetailsData[0].account_number + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="fullName" class="col-sm-4 col-form-label">Full Name</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="fullName" name="fullName" value="' + bankDetailsData[0].fullname + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="ifscCode" class="col-sm-4 col-form-label">IFSC Code</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="ifscCode" name="ifscCode" value="' + bankDetailsData[0].IFSC_code + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="googlePay" class="col-sm-4 col-form-label">Google Pay</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="googlePay" name="googlePay" value="' + bankDetailsData[0].google_pay + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="phonePay" class="col-sm-4 col-form-label">Phone Pay</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="phonePay" name="phonePay" value="' + bankDetailsData[0].phone_pay + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="usdtAddress" class="col-sm-4 col-form-label">USDT Address</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="usdtAddress" name="usdtAddress" value="' + bankDetailsData[0].USDT_address + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<label for="country" class="col-sm-4 col-form-label">Country</label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" class="form-control" id="country" name="country" value="' + bankDetailsData[0].country + '">' +
                                '</div>' +
                                '</div>' +
                                '<div class="row mb-3">' +
                                '<div class="col-sm-4"></div>' +
                                '<div class="col-sm-8">' +
                                '<input type="button" class="btn btn-primary" value="Update Bank Info" id="submitButton" >' +
                                '</div>' +
                                '</div>' +
                                '</form>' +
                                '</div>';


                            $('.member-bank').append(bankUsersFormHtml);
                            
                            // tach the event listener for form submission
                            $('#submitButton').click(function(event) {
                             
                                event.preventDefault(); // Prevent form submission

                                // Serialize the form data
                                var formData = $('#updateBankData').serialize();
                                    formData += '&memberId=' + memberId;
                                // Make an AJAX request to update the bank details
                                $.ajax({
                                    url: baseurl + 'Ajax/update_bank_details',
                                    method: 'POST',
                                    data: formData,
                                    dataType: 'json',
                                    beforeSend: function() {
                                        // Display a loading indicator while the request is being processed
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        // Handle success scenario
                                         Swal.fire(
                                                    'Bank Details Updated',
                                                    'success'
                                                )
                                    },
                                    error: function() {
                                        alert('An error occurred during the request. Please try again.');
                                    },
                                    complete: function() {
                                        $('.indicator-progress').hide();
                                        $('.indicator-label').show();
                                    }
                                });
                            });

                        } else {
                            var bankUsersFormHtml = '<div class="col-10">' +
                                '<p>No bank details found.</p>' +
                                '</div>';
                            $('.member-bank').append(bankUsersFormHtml);
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
    </script>

</html>