<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints || Dashboard</title>
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
                        <div class="row gy-5  justify-content-center">
                            <div class="col-xxl-12">

                                <!--begin::Tables Widget 9-->
                                <div class="card   mb-5 mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">Compaints</span>

                                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">Enter id you want to activate. </div>
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
                                                                    <span class="required">We are happy to help you</span>
                                                                    <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1">
                                                                        <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> </span>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control form-control-solid" name="name" value="<?= $user_data['member_id']?>">
                                                                <!--end::Input-->
                                                            </div>
                                                            <div class="fv-row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                                    <span class="required">Add your complaints or feedback</span>
                                                                    <span class="ms-1" data-bs-toggle="tooltip" aria-label="Enter the contact's name." data-bs-original-title="Enter the contact's name." data-kt-initialized="1">
                                                                        <i class="ki-duotone ki-information fs-7">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Textarea-->
                                                                <textarea class="form-control form-control-solid" name="name"></textarea>
                                                                <!--end::Textarea-->
                                                            </div>


                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->

                                                            <!--begin::Action buttons-->
                                                            <div class="d-flex justify-content-end">
                                                                <!--begin::Button-->
                                                               
                                                                <!--end::Button-->
                                                                <!--begin::Button-->
                                                                <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                                                    <span class="indicator-label">
                                                                        Send
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

    </body>



</html>