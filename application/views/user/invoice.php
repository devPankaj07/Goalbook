<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title> Invoice Details || Dashboard</title>
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
               <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                  <div class="d-flex flex-column flex-lg-row-fluid">
                     <!--<div id="kt_app_content_container" class="container-xxxl ">-->
                         
                     <!--</div>-->
                     <div class=" container ">
			<!-- begin::Card-->
<div class="card card-custom overflow-hidden">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                    <h1 class="display-4 font-weight-boldest mb-10">INVOICE</h1>
                    <div class="d-flex flex-column align-items-md-end px-0">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5">
                            <img src="<?php echo base_url()?>assets/img/logo.png" alt="">
                        </a>
                        <!--end::Logo-->
                      
                    </div>
                </div>
                <div class="border-bottom w-100"></div>
                <div class="d-flex justify-content-between pt-6">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">DATA</span>
                        <span class="opacity-70">Dec 12, 2017</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">INVOICE NO.</span>
                        <span class="opacity-70">GS 000014</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                        <span class="opacity-70"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] . ' (' . $user_data['member_id'] . ') ' . '<br>' . $user_data['address'] . ',' . $user_data['city'] . ',' . $user_data['state'] . ',' . $user_data['country'] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Invoice header-->

        <!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted  text-uppercase">Description</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Hours</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Rate</th>
                                <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="font-weight-boldest">
                                <td class="pl-0 pt-7">Creative Design</td>
                                <td class="text-right pt-7">80</td>
                                <td class="text-right pt-7">$40.00</td>
                                <td class="text-danger pr-0 pt-7 text-right">$3200.00</td>
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Front-End Development</td>
                                <td class="border-top-0 text-right py-4">120</td>
                                <td class="border-top-0 text-right py-4">$40.00</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">$4800.00</td>
                            </tr>
                            <tr class="font-weight-boldest border-bottom-0">
                                <td class="border-top-0 pl-0 py-4">Back-End Development</td>
                                <td class="border-top-0 text-right py-4">210</td>
                                <td class="border-top-0 text-right py-4">$60.00</td>
                                <td class="text-danger border-top-0 pr-0 py-4 text-right">$12600.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: Invoice body-->

        <!-- begin: Invoice footer-->
        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="font-weight-bold text-muted  text-uppercase">BANK</th>
                                <th class="font-weight-bold text-muted  text-uppercase">ACC.NO.</th>
                                <th class="font-weight-bold text-muted  text-uppercase">DUE DATE</th>
                                <th class="font-weight-bold text-muted  text-uppercase">TOTAL AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="font-weight-bolder">
                                <td>BARCLAYS UK</td>
                                <td>12345678909</td>
                                <td>Jan 07, 2018</td>
                                <td class="text-danger font-size-h3 font-weight-boldest">20,600.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: Invoice footer-->

        <!-- begin: Invoice action-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                </div>
            </div>
        </div>
        <!-- end: Invoice action-->

        <!-- end: Invoice-->
    </div>
</div>
<!-- end::Card-->
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
      >
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
           <script>
    $(document).ready(function() {
      $('.table').each(function() {
        // Destroy any existing DataTable instance
        if ($.fn.DataTable.isDataTable(this)) {
          $(this).DataTable().destroy();
        }

        // Initialize DataTable with all options set to false
        $(this).DataTable({
          searching: false,
          paging: false,
          info: false,
          ordering: false,
          lengthChange: false,
          dom: 'Bfrtip',
          buttons: []
        });
      });
    });
</script>
   </body>
   <!--end::Body-->
</html>
