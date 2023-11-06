<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Member List || Admin</title>
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
   <?php
      if (isset($_GET['memberid'])) {
          $memberid_from_url = $_GET['memberid']; 
      }  
      ?>
   <body>
      <?php include_once("header.php"); ?>
      <!--begin::Sidebar-->
      <?php include_once("sidebar.php"); ?>
      <!--begin::Content-->
      <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
      
      <div class="d-flex flex-column flex-lg-row-fluid">
            <div id="kt_app_content_container" class="container-xxxl ">
               <div class="card mb-5 mb-xl-8">
                  <!--begin::Header-->
                  <div class="card-header border-0 pt-5">
                     <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">InActive Members List</span>
                        <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
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
                        <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " >
                           <!--begin::Table head-->
                           <thead>
                              <tr class="fw-bold text-muted">
  
                                 <th class="min-w-130px">Sr No</th>
                                 <th class="min-w-150px">Member ID</th>
                                 <th class="min-w-120px">Fullname</th>
                                 <th class="min-w-120px">Sponsor ID</th>
                                 <th class="min-w-130px">Mobile Number</th>
                                 <th class="min-w-150px">Registration Date</th>

                                 <th class="min-w-120px">Status</th>
                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody id="tableBody">
                               <?php
                            //   print_r($user_data);
                                $n = 0;
                              foreach ($user_data as $value) {
                                   if($value['user_status'] != 'Active'){
                                   $n++;
                               ?>
                               
                               <tr>
                              
                               <td><?=$n ?></td>
                               <td><?= $value['first_name'] . ' ' . $value['last_name'] ;?></td>
                               <td><?= $value['member_id'] ;?></td>
                               <td><?= $value['sponsor_id'] ;?></td>
                               <td> <?= $value['mobile_number'] ;?> </td>
                                   <td> <?= $value['created_date'] ;?> </td>
                                <?php 
                                    if ($value['user_status'] == 'Active') {
                                        echo '<td><span class="badge badge-light-success">' . $value['user_status'] . '</span></td>';
                                    } else {
                                        echo '<td><span class="badge badge-light-danger">' . $value['user_status'] . '</span></td>';
                                    }
                                ?>

                           
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
      
      <!--end::Content-->
      </div>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    
   </body>
</html>
