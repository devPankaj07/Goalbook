<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Pins Summary || Admin</title>
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
                        <span class="card-label fw-bold fs-3 mb-1">Pins Summary</span>
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
                                 <th class="min-w-140px">Pin Number</th>
                                 <th class="min-w-140px">Pin Type</th>
                                 <th class="min-w-120px">Package Amount</th>
                                 <th class="min-w-120px">Member Name</th>
                                 <th class="min-w-120px">Member ID</th>
                                 <th class="min-w-120px">Pin Transfered Status</th>
                                 <th class="min-w-120px">Pin Status</th>
                                 <th class="min-w-120px">Pin Generated Date & Time</th>
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
                         
                               <td><?=$sr ?></td>
                               <td><?= $value['pin'] ;?></td>
                               <td><span class="badge <?= ($value['pin_type'] === 'Normal') ? 'bg-success' : 'bg-warning' ?>">
                <?= $value['pin_type'] ?>
            </span>
</td>
                               <td><?=$value['package_amount']?></td>
                                      <?php 
                                 $name = $this->db->select('*')->where('member_id', $value['member_id'])->get('users')->result_array(); 
                                 if (!empty($name)) {
                                    // The query returned results, so you can access the data
                                    echo '<td>' . $name[0]['first_name'] . ' ' . $name[0]['last_name'] . '</td>';
                                } else{
                                    echo '<td>  </td>';
                                }  
                                 ?>
                              
                               <td><?= $value['member_id'] ?></td>
                               <td><?= (!empty($value['transfer_status'] )) ? $value['transfer_status'] : 'not transferred' ?></td>
                               <td><?= $value['pin_status'] ?></td>
                               <td><?= $value['created_at'] ?></td>
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
