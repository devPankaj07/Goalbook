<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> Welcome Letter || Dashboard</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    <style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border-bottom: 1px solid black;
    padding: 8px;
    text-align: left;
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
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-lg-row-fluid"  id="printableAreas">
                        <div id="kt_app_content_container" class="container-xxxl ">
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Welcome Letter</span>


                                    </h3>

                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body py-3">
                                     <div class="welcome-letter-logo mb-5">
                                         <img class="navbar-brand-item" src="<?php echo base_url()?>assets/publicpage/assets/images/newlogo.png" alt="Logo">
                                     </div>
                                      <div class="row mb-5">
                                         <div class="col-lg-6">
                                            <div class="table-responsive">
                                                 <table>
                                              <tr>
                                                <th>Member ID</th>
                                                <td><?= $user_data['member_id'] ?></td>
                                             
                                              </tr>
                                              <tr>
                                                <th>Name</th>
                                                <td><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?></td>
                                             
                                              </tr>
                                              <tr>
                                                <th>Mobile Number</th>
                                                <td><?= $user_data['mobile_number'] ?></td>
                                             
                                              </tr>
                                              <tr>
                                                <th>State Name</th>
                                                <td><?= $user_data['state'] ?></td>
                                             
                                              </tr>
                                            </table>
                                            </div>
                                          
                                         </div>
                                              <div class="col-lg-6">
                                            <div class='table-responsive'>
                                                 <table>
                                              <tr>
                                                <th>Joining Date</th>
                                                <td><?= $user_data['created_date'] ?></td>
                                             
                                              </tr>
                                              <tr>
                                                <th>Sponsor ID</th>
                                                <td><?= $user_data['sponsor_id'] ?></td>
                                             
                                              </tr>
                                              <tr>
                                                <th>Sponsor Name</th>
                                                <td><?php 
                                                     $query = $this->db->select('first_name, last_name')
                                                      ->from('users') // Replace 'your_table_name' with the actual table name
                                                      ->where('member_id', $user_data['sponsor_id'])
                                                      ->get();
                                                       $result = $query->row_array(); // Get the first matching row as an array
                                                       echo $result['first_name'] . ' ' . $result['last_name']
                                                      
                                                ?></td>
                                             
                                              </tr>
                                              <tr>
                                                <th>Address</th>
                                                <td><?= $user_data['address'] ?></td>
                                             
                                              </tr>
                                            </table>
                                            </div>
                                         </div>
                                     
                                     </div>
                                     <div class="welcome-letter-text mb-5"><p class="text-danger mb-3">Dear <?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?>,<br>
  Congratulations on your decision to soar sky high with us.
</p>
<p class="mb-3">You are now a part of the opportunity of the millennium. Sunstar Wealth Management is an exciting people business. A business that has the potential to turn your dreams into reality. As you build your business, you will establish lifelong friendships and develop a support system unparalleled in any other business.
</p>
<p class="mb-3">Sunstar Wealth Management is here to H.E.L.P. (High Energy Level Participation) you to be successful. We pledge our best effort to provide the level of continuing support necessary to help make your business a total success.
</p>
<p class="mb-3">You are in this business for yourself but by your fortune. We have developed an effective and proven step-by-step plan to help you launch a profitable business of your own. You determine your own level of commitment so you can fit it around your lifestyle and personal goals. And the rewards for those who can put forth the effort necessary to build a solid organization, one from which you can potentially benefit for the rest of your life.
</p>
<p class="mb-3">The bottom line of Sunstar Wealth Management - When you network with us, we all together stand to win and ensure that we affect many hundreds and thousands of lives in a positive manner by spreading the total success attitude.
</p>
<p class="mb-3">We are confident that you will get a lot of satisfaction from your involvement with Sunstar Wealth Management and we wish you every success!
</p>
<p class="mb-3">Winning Regards, <br> Sunstar Wealth Management
</p>
</div>
                                   <div id="printButtonWrapper">
  <input id="printButton" class="btn btn-primary remove-hide" type="button" onclick="printAndHide();" value="Print" />
</div>                                </div>
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
          <style>
/* Hide the print button when the page is being printed */
@media print {
  #printButtonWrapper {
    display: none;
  }
 
  #kt_app_sidebar {
    display: none ;

  }
  #kt_app_header{
   display: none;
  }
}
</style>
    <!--end::App-->
    <?php include_once('customize.php') ?>


    <?php include_once('notification.php') ?>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    <script>
function printAndHide() {
  // Call the window.print() function to trigger the print dialog
  window.print();

  // Hide the print button after it's clicked
  
}
</script>
</body>
<!--end::Body-->

</html>