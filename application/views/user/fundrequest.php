<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> Fund Request || Dashboard</title>
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
             
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main" style="margin-top:15px;">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-700px p-10 card">

                            <!--begin::Form-->
                            <div class="col-xl-12">

                                <!--begin::Contacts-->
                                <div class="card card-flush h-lg-100" id="kt_contacts_main" data-select2-id="select2-data-kt_contacts_main">
                                    <!--begin::Card header-->
                                    <div class="card-header pt-7 m-auto" id="kt_chat_contacts_header">
                                        <!--begin::Card title-->
                                        <div class="card-title">

                                            <h1>Fund Request</h1>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-5" data-select2-id="select2-data-125-pjtj">
                                        <div id="formContainer">
                                            <!--begin::Form-->
                                            <form id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#" data-select2-id="select2-data-kt_ecommerce_settings_general_form">

                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2" data-select2-id="select2-data-124-kpg9">
                                                    <!--begin::Col-->
                                                    <div class="col" data-select2-id="select2-data-123-kggo">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container" data-select2-id="select2-data-122-btz5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span class="">Request Mode</span>
                                                            </label>
                                                            <!--end::Label-->

                                                            <div class="w-100" data-select2-id="select2-data-121-1bcj">
                                                                <!--begin::Select2-->
                                                                <select id="request-mode" name="request-mode" class="select2-selection select2-selection--single form-select form-select-solid">
                                                                    <!--<option value="E-Walle">E-Wallet</option>-->
                                                                    <option value="Activation Wallet">Activation Wallet</option>
                                                                </select>
                                                                <div class="error-container"></div>
                                                                <!--end::Select2-->
                                                            </div>

                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--begin::Col-->
                                                    <div class="col" data-select2-id="select2-data-123-kggo">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container" data-select2-id="select2-data-122-btz5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span class="">Request Amount (Dollar)</span>
                                                            </label>
                                                            <!--end::Label-->

                                                            <div class="w-100" data-select2-id="select2-data-121-1bcj">
                                                                <!--begin::Select2-->
                                                                <select  id="request-amount" name="request-amount" class="select2-selection select2-selection--single form-select form-select-solid">
                                                                    <?php
                                                                         foreach ($packages as $package) {
                                                                            if($package['package_status'] == 'Active'){
                                                                                echo '<option value="' . $package['package_amount'] . '">'. '$' . $package['package_amount']. '</option>';
                                                                            }else{

                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="error-container"></div>
                                                                <!--end::Select2-->
                                                            </div>

                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Col-->


                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                                    <!--begin::Col-->
                                                    <div class="col" data-select2-id="select2-data-123-kggo">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7 fv-plugins-icon-container" data-select2-id="select2-data-122-btz5">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span class="">Deposite Mode</span>
                                                            </label>
                                                            <!--end::Label-->

                                                            <div class="w-100" data-select2-id="select2-data-121-1bcj">
                                                                <!--begin::Select2-->
                                                                <select  id="deposit-amount" name="deposit-amount" class="select2-selection select2-selection--single form-select form-select-solid">
                                                                    <option value="With Cheque/DD">With Cheque/DD</option>
                                                                    <option value="By Bank Transfer">By Bank Transfer</option>
                                                                    <option value="Cash Deposit in Bank">Cash Deposit in Bank</option>
                                                                    <option value="By Self">By Self</option>
                                                                </select>
                                                                <div class="error-container"></div>
                                                                <!--end::Select2-->
                                                            </div>

                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--begin::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span>Cheque/DD Or Tran No</span>

                                                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's phone number (optional)." data-bs-original-title="Enter the contact's phone number (optional)." data-kt-initialized="1">
                                                                    <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" name="cheque-dd" id="cheque-dd" value="" placeholder="Cheque/DD Or Tran No ">
                                                            <div class="error-container"></div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">


                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span>Bank Name</span>

                                                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's phone number (optional)." data-bs-original-title="Enter the contact's phone number (optional)." data-kt-initialized="1">
                                                                    <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" name="bank-name" id="bank-name" placeholder="Please Enter Your Bank Name">
                                                            <div class="error-container"></div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-semibold form-label mt-3">
                                                                <span>Branch Name</span>

                                                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's phone number (optional)." data-bs-original-title="Enter the contact's phone number (optional)." data-kt-initialized="1">
                                                                    <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                            </label>
                                                            <!--end::Label-->

                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid" name="branch-name" id="branch-name" placeholder="Please Enter Your Branch Name">
                                                            <div class="error-container"></div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold form-label mt-3">
                                                            <span>Branch City</span>

                                                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's phone number (optional)." data-bs-original-title="Enter the contact's phone number (optional)." data-kt-initialized="1">
                                                                <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                        </label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-solid" name="branch-city" id="branch-city" placeholder="Please Enter Your Branch City">
                                                        <div class="error-container"></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>



                                                <!--begin::Separator-->
                                                <div class="separator mb-6"></div>
                                                <!--end::Separator-->

                                                <!--begin::Action buttons-->
                                                <div class="d-flex justify-content-end">


                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                                        <span class="indicator-label">
                                                            Request Funds
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
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Contacts-->

                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
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
</body>
<!--end::Body-->

</html>
<script>
         var baseUrl = '<?php echo base_url(); ?>';
    $(document).ready(function() {
        // Handle form submission
        $('#kt_ecommerce_settings_general_form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Serialize the form data
            // var formData = $(this).serialize();
            var phpVariable = <?php echo json_encode($user_data['member_id']); ?>; // Assuming $phpVariable is the PHP variable you want to include

            var formData = $(this).serialize();

            // Send an AJAX request to the server
            $.ajax({
                url: '<?= base_url('Ajax/fundrequest')?>',
                type: 'POST',
                data: formData + '&phpVariable=' + encodeURIComponent(phpVariable),
                dataType: 'json',
                success: function(response) {
                    $('.text-danger').remove();
                    if (response.status === 'success') {
                        // Form submitted successfully, do something
                        // alert('Fund Request Sent to the Admin')
                                           Swal.fire(
                                          'Done!',
                                          'Request Has Been send to the Admin!',
                                          'success'
                                        ).then(function() {
                                         window.location.href = baseUrl + 'Main/fundrequesttable';
                                        });
                        
                    } else if (response.status === 'error') {
                        // Form validation failed, display the errors
                        var errors = response.message;
                        var errorContainer = $('#formContainer').find('.error-container');

                        // Clear previous error messages
                        errorContainer.html('');

                        // Display each error message
                        if ($.isArray(errors)) {
                     
                              // Iterate over the errors object
                            $.each(response.message, function(key, value) {
                                // Append the error message below the corresponding input field
                                $('#' + key).after('<div class="text-danger">' + value + '</div>');
                            });
                        } else {
                            // errorContainer.append('<p>' + errors + '</p>');
                            $.each(response.message, function(key, value) {
                                // Append the error message below the corresponding input field
                                $('#' + key).after('<div class="text-danger">' + value + '</div>');
                            });
                        }
                    } 
                },
                error: function() {
                    // Handle the AJAX request error
                    console.log('AJAX request error');
                }
            });
        });
    });
</script>