<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title> My Downlines || Dashboard</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
     <style>
          @media only screen and (max-width: 476px){
                .card .card-body{
                padding:0;
                    
                }
          }
          
          #tableBody td{
              text-align:center;
          }
          .loginbtntab a{
              padding:8px 16px !important;
              
          }
      </style>
      <style>
        .countertable{
            font-size: 1.5em;
            font-weight: bold;
        }
        .card .card-body{
            justify-content:center;
        }
        
       @media only screen and (max-width: 476px) {
           
         
          .incomecrd{
              width:50%;
          }
          .clickhere{
              font-family: 'Montserrat', sans-serif;
    text-align: center;
    color: black;
    line-height: 1;
    font-size: 10px !important;
    background-color: white;
    padding: 4px 13px;
    opacity: 0.5;
    outline: none;
    border-radius: 18px;
    float: right;
    box-shadow: 0 2px 4px rgba(255, 255, 255, 0.4);
    transition: box-shadow 0.3s ease-in-out;
          }
           
       }
        .incomecrd{
              width:50%;
              padding: 5px;

          }
          .wh{
              width:100%;
              height:100%;
          }
          
          
          .clickhere {
        transition: all .5s ease;
    color: #fff;
    
    font-family: 'Montserrat', sans-serif;
    text-align: center;
    color:black;
    line-height: 1;
    font-size: 14px;
    background-color: white;
    padding: 4px 15px;
    opacity:0.5;
    outline: none;
    border-radius: 18px;
    float: right;
     box-shadow: 0 2px 4px rgba(255, 255, 255, 0.4);
      transition: box-shadow 0.3s ease-in-out;
}
.clickhere:hover {
    color: #001F3F;
    background-color: #fff;
}

        
  
    </style>
    <style>
         @media only screen and (max-width: 476px) {
             #DataTables_Table_0_wrapper{
                     margin-left: 13px !important;

             }
             .clrmar{
                 margin:5px !important;
             }
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
                    <div class="d-flex flex-column flex-lg-row-fluid">
                        <div id="kt_app_content_container" class=" container-xxxl ">
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">My Downline</span>

                                    
                                    </h3>
                               
                                </div>
                                <!------------------------------------card section start---------------------------->
                     <div class="card-body py-3">
                               <!-- Add Bootstrap card components for filtering -->
                               <div class="row mt-3 mb-8 clrmar" >
                                  <div class="col-sm-6 d-flex p-0">
                                     
                                        <div class="incomecrd">
                                           <div class="card cursor-pointer wh"  >
                                              <div class="card-body rounded border shadow-sm " style="padding:10px !important; background: linear-gradient(to right, #1A2980, #26D0CE); opacity:80%;">
                                                 <h5 class="card-title text text-white">Total Members</h5>
                                                 <p class="card-text text text-white"><span class="countertable" id="ttlPendingCount">71</span></p>
                                                 <button class="clickhere" onclick="showAllData() ">Click here</button>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="incomecrd">
                                     <div class="card cursor-pointer wh" >
                                        <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#EB3349, #F45C43 );">
                                           <h5 class="card-title text text-white">Total Inactive Members</h5>
                                           <p class="card-text text text-white"><span class="countertable" id="payCount">25</span></p>
                                           <button class="clickhere" onclick="filterTableByStatus('Pay Payout')">Click here</button>
                                        </div>
                                     </div>
                                  </div>
                                       
                                     </div>
                                     <div class="col-sm-6 d-flex p-0">
                                     <div class="incomecrd">
                                        <div class="card cursor-pointer wh" >
                                           <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#11998e, #38ef7d);">
                                              <h5 class="card-title text text-white">Total Active Member</h5>
                                              <p class="card-text text text-white"><span class="countertable" id="paidCount">46</span></p>
                                              <button class="clickhere" onclick="filterTableByStatus('Paid')">Click here</button>
                                           </div>
                                        </div>
                                     </div>
                                  
                                  
                                  <div class="incomecrd">
                                           <div class="card cursor-pointer wh" >
                                              <div class="card-body rounded border shadow-sm " style="padding:10px; background: linear-gradient(to right,#FF8008, #FFC837); padding-right:0px">
                                                 <h5 class="card-title text text-white">KYC Pending Member</h5>
                                                 <p class="card-text text text-white"><span class="countertable" id="kycPendingCount">0</span></p>
                                                 <button class="clickhere" onclick="filterTableByStatus('KYC 100% Pending')" style="margin-right:10px;">Click here</button>
                                              </div>
                                           </div>
                                        </div>
                                  </div>
                               </div>
                               
                               <!-- Add more cards for other status values if needed -->
                            </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body py-3">

                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fw-bold text-muted">
                                                    <th class="min-w-30px">Sr No</th>
                                                    <th class="min-w-140px">Member ID</th>
                                                    <th class="min-w-150px">Member Name</th>
                                                    <th class="min-w-120px">Package Amount</th>
                                                    <th class="min-w-120px">Activation Status</th>
                                                    <th class="min-w-150px">Level</th>
                                                    <th class="min-w-150px text-end">Date of Activation</th>
                                                    <th class="min-w-150px text-end">Date of Joining</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody id="tableBody">
                                                <?php
                                                          $sr = 0;
                                                $member_id_array = [];
                                                foreach ($levels as $levelNumber => $levelData) {
                                                    $memberIds = array_keys($levelData);
                                                    $member_id_array[$levelNumber] = $memberIds;
                                                }
                                   
                                                foreach ($member_id_array as $key => $value) {
                                                    $memberIds = $member_id_array[$key];
                                                   
                                                    echo '<br>';
                                                    // print_r($memberIds);
                                                    $data = 0;
                                          
                                                    foreach ($memberIds as $index => $memberId) {
                                                        $sr++;
                                                        $query = $this->db
                                                            ->from('users')
                                                            ->where('member_id', $memberId)
                                                            ->get();

                                                        $result = $query->result_array();
                                                        $data = $result;
                                                        // echo '<br>';
                                                        // print_r($data);
                                                        // print_r($key);
                                                        // echo '<br>';
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-dark fw-bold text-hover-primary fs-6"><?php echo $sr; ?></a>
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo $data[0]['member_id'] ; ?></a>
                                                                <!-- <span class="text-muted fw-semibold text-muted d-block fs-7">Code: PH</span> -->
                                                            </td>

                                                            <td>
                                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo $data[0]['first_name'] . ' ' . $data[0]['last_name']; ?></a>
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo '$' . $data[0]['activated_package']; ?></a>
                                                                <!-- <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                                            </td>

                                                            <td class="text-dark fw-bold text-hover-primary fs-6">
                                                                <?php if($data[0]['user_status'] == "Active") {?>
                                                                <span class="badge badge-light-success">Active</span>
                                                                <?php } else{?>
                                                                <span class="badge badge-light-danger">Inactive</span>
                                                                <?php }?>
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6"><?php echo 'Level ' . $key; ?></a>
                                                            </td>
                                                            <td class="text-end">
                                                            <?php echo $data[0]['activated_date']; ?>
                                                            </td>
                                                            <td class="text-end">
                                                            <?php echo $data[0]['created_date']; ?>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>


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