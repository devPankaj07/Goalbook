<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Pins || Admin</title>
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
                    <div class="card  mb-5 col-xl-5">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Generate Pins</span>

                                <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">Enter pins you want to add. </div>
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
                                            <form id="kt_ecommerce_settings_general_form" class="form">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Select Package Amount</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1">
                                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-control form-control-solid" name="package_amount">
                                                        <?php foreach ($packages_data as $package) : ?>
                                                            <option value="<?php echo $package->package_amount; ?>"><?php echo $package->package_amount; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                    <!--end::Input-->
                                                    <!--end::Input-->
                                                </div>
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mt-3">
                                                        <span class="required">Enter Pins</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1">
                                                            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" name="numbers" id="numbers" value="">


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
                                                            Submit
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
                                </div>
                            </div>
                        </div>
                        <!--begin::Body-->
                    </div>
                    <div class="card  mb-5 col-xl-6">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Total Available Pins</span>

                                <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">Available pins of respective Packages Amount. </div>
                            </h3>


                        </div>
                        <div class="card-body py-3 d-flex flex-wrap">
                            <!--begin::Table container-->

                            <?php foreach ($pins_data as $data) : ?>
                                <div class="col-lg-5">
                                    <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <!--begin::Title-->
                                            <div class="card-title d-flex flex-column">
                                                <!--begin::Info-->
                                                <span class="text-gray-400 pt-1 fw-semibold fs-6">Total Available Pins</span>
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Amount-->
                                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?= $data['not_used_count'] ?></span>
                                                    <!--end::Amount-->

                                                    <!--begin::Badge-->
                                                    <span class="badge badge-light-success fs-base">
                                                        Package Amount of <?= $data['package_amount'] ?>
                                                    </span>
                                                    <!--end::Badge-->
                                                </div>
                                                <!--end::Info-->

                                                <!--begin::Subtitle-->

                                                <!--end::Subtitle-->
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->

                                        <!--end::Card body-->
                                    </div>
                                </div>
                            <?php endforeach; ?>



                            <!--end::Table container-->
                        </div>
                        <!--end::Header-->


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
    $('#kt_ecommerce_settings_general_form').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var form = $(this);
        var formData = form.serialize(); // Serialize form data

        // Validate the input field
        var numbersInput = $('#numbers');
        if (numbersInput.val() === '') {
            numbersInput.addClass('is-invalid'); // Add 'is-invalid' class to show validation error state
            return; // Stop form submission if the field is empty
        } else {
            numbersInput.removeClass('is-invalid'); // Remove 'is-invalid' class if the field is not empty
        }

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: baseurl + 'Ajax/generate_pins',
            data: formData,
            beforeSend: function() {
                // Display loading spinner or disable submit button
                $('.indicator-label').hide();
                $('.indicator-progress').show();
            },
            success: function(response) {
                // Handle the response from the server
                console.log(response);

                // Reset form or perform other actions
                form.trigger('reset');

                // Hide loading spinner or enable submit button
                $('.indicator-label').show();
                $('.indicator-progress').hide();

                // Display Swal alert with the response message
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message
                });
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);

                // Hide loading spinner or enable submit button
                $('.indicator-label').show();
                $('.indicator-progress').hide();

                // Display Swal alert with an error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.'
                });
            }
        });
    });
});

    </script>

</html>