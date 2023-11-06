<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate ID || Admin</title>
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
                <div class="app-wrapper  flex-column" id="kt_app_wrapper">
                    <!--start::Sidebar-->
                    <?php include_once('sidebar.php') ?>
                    <!--end::Sidebar-->
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <div class="row gy-5  m-auto justify-content-center">
                            <div class="col-xxl-12">

                                <!--begin::Tables Widget 9-->
                                <div class="card   mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">Fund Transfer to Another Member</span>

                                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">Enter Member iD you want to trasnfer. </div>
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
                                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                                <!--begin::Number-->
                                                                <div class="d-flex align-items-center">
                                                                    <span>$ </span>
                                                                    <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="<?= $pins[0]->package_amount   ?> " data-kt-countup-prefix="$" data-kt-initialized="1"> <?= $pins[0]->package_amount ?> </div>
                                                                </div>
                                                                <!--end::Number-->

                                                                <!--begin::Label-->
                                                                <div class="fw-semibold fs-6 text-gray-400">Available Balance in Topup Wallet</div>
                                                                <!--end::Label-->
                                                            </div>
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
                                                                    <div class="d-flex flex-stack">
                                                                        <a href="getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary active">Member ID:</a>
                                                                        <div class="badge badge-light-primary">-</div>
                                                                    </div>
                                                                    <!--begin::Contact group-->
                                                                    <div class="d-flex flex-stack">
                                                                        <a href="getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary text-active-primary ">Name:</a>
                                                                        <div class="badge badge-light-primary">-</div>
                                                                    </div>
                                                                    <!--begin::Contact group-->
                                                                    <!--begin::Contact group-->
                                                                    <div class="d-flex flex-stack">
                                                                        <a href="getting-started.html" class="fs-6 fw-bold text-gray-800 text-hover-primary ">Mobile No:</a>
                                                                        <div class="badge badge-light-primary">-</div>
                                                                    </div>
                                                                    <!--begin::Contact group-->

                                                                    <!--begin::Contact group-->

                                                                    <!--begin::Contact group-->
                                                                    <!--begin::Contact group-->
                                                                    <!-- <div class="d-flex flex-stack">
                                                                        <a href="getting-started.html" class="fs-6 fw-bold text-danger text-hover-primary ">How Many Times Request </a>
                                                                        <div class="badge badge-light-danger">0</div>
                                                                    </div> -->
                                                                    <!--begin::Contact group-->
                                                                </div>
                                                                <!--end::Contact groups-->

                                                                <!--begin::Separator-->
                                                                <div class="separator my-7"></div>
                                                                <!--begin::Separator-->

                                                                             <!--begin::Add contact group-->
                                                                             <label class="fs-6 fw-semibold form-label">Select Pin</label>

<div class="input-group justify-content-around">

    <div id="package_radios" class="d-flex" style="gap: 10px; flex-wrap: wrap; justify-content: space-between;">
        <!-- Package checkboxes will be added dynamically -->
    </div>

</div>
                                                                <!--end::Add contact group-->

                                                                <!--begin::Separator-->
                                                                <div class="separator my-7"></div>
                                                                <!--begin::Separator-->

                                                                <!--begin::Add new contact-->
                                                                <button href="#" class="btn btn-primary d-flex m-auto" id="activateid">
                                                                    Send Pins
                                                                </button>

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
        <!--<?php print_r($user_data) ?>-->
    </body>

    <script>
        $(document).ready(function() {

            $('form').submit(function(event) {
                event.preventDefault(); // Prevent form submission

                var memberId = $('input[name="name"]').val(); // Get the entered member ID

                // Make an AJAX request to the server
                $.ajax({
                    url: baseurl + 'Ajax/fetchMemberDetailsAndPinsTransferred', // Replace with the actual URL of your CodeIgniter controller
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
                        if (response.success) {

                            // Update the details on the page
                            $('.card-body .badge').eq(0).text(response.member_id);
                            $('.card-body .badge').eq(1).text(response.name);
                            $('.card-body .badge').eq(2).text(response.mobileNo);
                            $('.card-body .badge').eq(3).text(response.amount_status);
                            $('.card-body .badge').eq(4).text(response.blocked);
                            $('#amount').val(response.amount_status);
                            $('#amount').val('');
                            $('.remove').remove();
                            // Populate the dropdown with pin count and package amount options
                            var pins = response.pins;

                            var packageRadios = $('#package_radios');
                            var selectedPinsInput = $('#selected_pins');
                            console.log(pins);
                            // Generate radio buttons for each package amount
                            $.each(pins, function(index, pin) {

                                var radioId = 'package_radio_' + index;
                                var radioLabel = pin.package_amount + '(' + pin.pin_count + ' Pins)';
                                var radioValue = pin.pin; // Use pin number as the radio button value

                                var radioDiv = $('<div class="form-check remove">').appendTo(packageRadios);

                                var radio = $('<input type="radio" class="form-check-input" name="package_radio">')
                                    .attr('id', radioId)
                                    .attr('value', radioValue) // Set the value to the pin number
                                    .appendTo(radioDiv);

                                $('<label class="form-check-label">')
                                    .attr('for', radioId)
                                    .text(radioLabel)
                                    .appendTo(radioDiv);
                            });

                            // Unbind previous event handlers
                            packageRadios.off('change', 'input[type="radio"]');

                            // Attach the change event handler to radio buttons
                            packageRadios.on('change', 'input[type="radio"]', function() {
                                var selectedPinNumber = $(this).val();
                                var selectedPin = pins.find(pin => pin.pin === selectedPinNumber);

                                if (selectedPin) {
                                    selectedPinsInput.val(selectedPin.package_amount + '(' + selectedPin.total_pin_count + ' Pins )');
                                } else {
                                    selectedPinsInput.val('');
                                }
                            });

                            if (response.status == 'Active') {
                                // console.log(response.activated_package);
                                var packageAmount = response.activated_package + response.fd_package
                                Swal.fire({
                                    title: '<strong>This Member ID ' + response.member_id + ' is Already Activated</strong>',
                                    icon: 'info',
                                    html: 'You Enter Member ID is Activated with <b>' + response.activated_package + '</b> Package Amount',
                                    showCloseButton: true,

                                    focusConfirm: false,

                                    confirmButtonText: 'Re-Topup!',

                                })
                            }


                            $('#activateid').on('click', function() {

                                var memberId = response.member_id;
                                var sponsorId = response.sponsor_id;
                                var pin = $('input[name="package_radio"]:checked').val();
                                console.log(pin);
                                // Check if an amount is selected
                                if (!pin) {
                                    Swal.fire(
                                        'Error',
                                        'Please Enter a pins to activate the ID.',
                                        'error'
                                    );
                                    return;
                                }

                                // Make an AJAX request to activate the ID
                                $.ajax({
                                    url: baseurl + 'Ajax/activateID',
                                    type: 'POST',
                                    data: {
                                        amount: pin,
                                        memberId: memberId,
                                        sponsorId: sponsorId,

                                    },
                                    beforeSend: function() {
                                        // Display a loading indicator while the request is being processed

                                        $('.ipre-loader-custom').show();

                                    },
                                    success: function(response) {
                                        // Handle the success response
                                        $('.ipre-loader-custom').hide();
                                        if (response.success == true) {
                                            Swal.fire(
                                                response.title,
                                                response.message,
                                                'success'
                                            ).then(function() {
                                                window.location.href = baseurl + 'Main/activate_id'; // Replace with the desired URL
                                            });
                                        } else {
                                            Swal.fire(
                                                response.title,
                                                response.message,
                                                'error'
                                            ).then(function() {
                                                window.location.href = baseurl + 'Main/activate_id'; // Replace with the desired URL
                                            });
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle the error response
                                        $('.ipre-loader-custom').hide();
                                        console.log('Error activating ID:', error);
                                    }
                                });
                            });

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
    </script>

</html>