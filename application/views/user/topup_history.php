 
<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> Topup History || Dashboard</title>
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
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <!--start::Sidebar-->
                <?php include_once('sidebar.php') ?>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main" style="margin-top:15px;">
                    <div class="d-flex flex-column flex-lg-row-fluid">
                        <div id="kt_app_content_container" class="container-xxxl ">
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Fund History </span>

                                       
                                    </h3>
                                   
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                            <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " >
                           <!--begin::Table head-->
                                               <thead>
                                                  <tr class="fw-bold text-muted">
                      
                                                     <th class="min-w-50px">Sr No</th>
                                                     <th class="min-w-150px">Member ID</th>
                                                     <th class="min-w-150px">Topup Amount in $</th>
                                                     
                                                  </tr>
                                               </thead>
                                               <!--end::Table head-->
                                               <!--begin::Table body-->
                                               <tbody id="tableBody" class="text-center">
                                                   <?php
                                               
                                                    $sr = 0;
                                                  foreach ($topup_history as $value) {
                                                       $sr++;
                                                       
                                                    // $member = preg_replace("/[^A-Za-z0-9]/", "",$value['member_id'] );
                                                    //  $name = $this->db->select('*')->where('member_id', $member)->get('users')->result_array(); 
                                                    //  print_r($name);
                                                    ?>
                                                   <tr>
                                                  
                                                   <td><?=$sr ;?></td>
                                                   <td><?= $value['member_id'] ;?></td>
                                                    <td><?= $value['registration_fees'] ;?></td>
                        
                                                </tr>
                                                <?php }?>
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
</body>
<!--end::Body-->

</html>