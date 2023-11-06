<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Fund Request List || Admin</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
   </head>
 
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
                        <span class="card-label fw-bold fs-3 mb-1">Available Pins</span>
                        <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
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
  
                                 <th class="min-w-150px">Sr No</th>
                                 <th class="min-w-140px">Pin</th>
                                 <th class="min-w-120px">Package Amount</th>
                                 <th class="min-w-120px">Pin Status</th>

                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody id="tableBody">
                               <?php
                            //   print_r($user_data);
                                $sr = 0;
                              foreach ($pins as $value) {
                                   $sr++;
                         
                               ?>
                               
                               <tr>
                                <!-- <?php 
                                 $name = $this->db->select('*')->where('member_id', $value->member_id)->get('users')->result_array(); 
                              
                                ?> -->
                               <td><?=$sr ?></td>
                               <td><?= $value['pin'] ;?></td>
                               <td><?=$value['package_amount']?></td>
                               <td><?= $value['pin_status'] ?></td>
                   
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
      
      <!--end::Content-->
      </div>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    
   </body>
</html>
