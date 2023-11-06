<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title> Change Password || Dashboard</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
      <style>
         .golden-btn + .golden-btn { margin-top: 1em; }
         .golden-btn {
         display: inline-block;
         outline: none;
         font-family: inherit;
         font-size: 1em;
         box-sizing: border-box;
         border: none;
         border-radius: .3em;
         height: 2.75em;
         line-height: 2.5em;
         text-transform: uppercase;
         padding: 0 1em;
         box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(110,80,20,.4),
         inset 0 -2px 5px 1px rgba(139,66,8,1),
         inset 0 -1px 1px 3px rgba(250,227,133,1);
         background-image: linear-gradient(160deg, #a54e07, #b47e11, #fef1a2, #bc881b, #a54e07);
         border: 1px solid #a55d07;
         color: rgb(120,50,5);
         text-shadow: 0 2px 2px rgba(250, 227, 133, 1);
         cursor: pointer;
         transition: all .2s ease-in-out;
         background-size: 100% 100%;
         background-position:center;
         }
         .golden-btn:focus,
         .golden-btn:hover {
         background-size: 150% 150%;
         box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23),
         inset 0 -2px 5px 1px #b17d10,
         inset 0 -1px 1px 3px rgba(250,227,133,1);
         border: 1px solid rgba(165,93,7,.6);
         color: rgba(120,50,5,.8);
         }
         .golden-btn:active {
         box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(110,80,20,.4),
         inset 0 -2px 5px 1px #b17d10,
         inset 0 -1px 1px 3px rgba(250,227,133,1);
         }
      </style>
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
               <div class="app-main flex-column flex-row-fluid" id="kt_app_main" style="padding-top:15px;">
                  <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                     <!--begin::Wrapper-->
                     <div class="w-lg-500px p-10 card">
                        <!--begin::Form-->
                        <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="/metronic8/demo7/../demo7/authentication/layouts/corporate/sign-in.html" action="#">
                           <!-- begin::Heading -->
                           <div class="text-center mb-10">
                              <!-- begin::Title -->
                              <h1 class="card-label fw-bold fs-3 mb-1">
                                 Setup New Password
                              </h1>
                              <!-- end::Title -->
                           </div>
                           <!-- end::Heading -->
                           <!-- begin::Input group -->
                           <div class="fv-row mb-3 fv-plugins-icon-container" data-kt-password-meter="true">
                              <!-- begin::Wrapper -->
                              <div class="mb-1">
                                 <!-- begin::Input wrapper -->
                                 <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="text" placeholder="Current Password" name="current_password" autocomplete="off">
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                    </span>
                                    <div class="text-danger current-password-error"></div>
                                    <!-- Separate element for current password error -->
                                 </div>
                                 <!-- end::Input wrapper -->
                                 <!-- begin::Input wrapper -->
                                 <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="New Password" name="new_password" autocomplete="off">
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-2"></i> <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                    </span>
                                    <div class="text-danger new-password-error"></div>
                                    <!-- Separate element for new password error -->
                                 </div>
                                 <!-- end::Input wrapper -->
                              </div>
                              <!-- end::Wrapper -->
                           </div>
                           <!-- end::Input group -->
                           <!-- begin::Input group -->
                           <div class="fv-row mb-3 fv-plugins-icon-container">
                              <!-- begin::Repeat Password -->
                              <input type="password" placeholder="Repeat Password" name="confirm_password" autocomplete="off" class="form-control bg-transparent">
                              <div class="text-danger confirm-password-error"></div>
                              <!-- Separate element for confirm password error -->
                           </div>
                           <!-- end::Input group -->
                           <!-- begin::Action -->
                           <div class="d-grid mb-10">
                              <button type="button" id="kt_new_password_submit" class="btn btn-primary d-flex m-auto" style="font-size:1.3em;">
                                 <!-- begin::Indicator label -->
                                 <span class="indicator-label">
                                 Submit
                                 </span>
                                 <!-- end::Indicator label -->
                                 <!-- begin::Indicator progress -->
                                 <span class="indicator-progress">
                                 Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                 </span>
                                 <!-- end::Indicator progress -->
                              </button>
                           </div>
                           <!-- end::Action -->
                        </form>
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
      <?php include_once('customize.php')?>
      <?php include_once('notification.php')?>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
      <script>
         $(document).ready(function() {
             $('#kt_new_password_submit').click(function(e) {
                 e.preventDefault();
                    // Clear previous error messages
                 $('.current-password-error').html('');
                 $('.new-password-error').html('');
                 $('.confirm-password-error').html('');
                 
                 var currentPassword = $('input[name="current_password"]').val();
                 var newPassword = $('input[name="new_password"]').val();
                 var confirmPassword = $('input[name="confirm_password"]').val();
               
                 $.ajax({
                     url: baseurl + 'Ajax/changePassword',
                     type: 'POST',
                     dataType: 'json',
                     data: {
                         current_password: currentPassword,
                         new_password: newPassword,
                         confirm_password: confirmPassword
                     },
                     beforeSend: function() {
                         // Show loading indicator or disable the submit button
                          $('#kt_new_password_submit').addClass('disabled').prop('disabled', true);
                     },
                     success: function(response) {
                         if (response.success) {
                             // Password changed successfully, show success message or redirect to another page
                            //  alert(response.message);
                                 Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Password updated successfully.'
                            });
                         } else {
                             // Password change failed, display the error messages
                           
                             
                              if (response.errors) {
                     $('.current-password-error').html(response.errors.current_password);
                     $('.new-password-error').html(response.errors.new_password);
                     $('.confirm-password-error').html(response.errors.confirm_password);
                 }
                         }
                     },
                     error: function(xhr, status, error) {
                         // Handle AJAX error
                         console.log(xhr.responseText);
                     },
                     complete: function() {
                         // Hide loading indicator or enable the submit button
                          $('#kt_new_password_submit').removeClass('disabled').prop('disabled', false);
                     }
                 });
             });
         });
      </script>
   </body>
   <!--end::Body-->
</html>
