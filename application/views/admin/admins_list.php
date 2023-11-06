<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admins List || Admin</title>
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
   <body>
      <?php
         $permissions = array(
          array('category' => 'Dashboard', 'option_name' => 'Dashboard'),
          array('category' => 'Members', 'option_name' => 'Total Member List'),
          array('category' => 'Members', 'option_name' => 'Active Member'),
          array('category' => 'Members', 'option_name' => 'InActive Member'),
          array('category' => 'Members', 'option_name' => 'Add Packages'),
          array('category' => 'Members', 'option_name' => 'Edit Member Info'),
          array('category' => 'Wallet', 'option_name' => 'Add Debit Fund'),
          array('category' => 'Wallet', 'option_name' => 'Fund Request History'),
          array('category' => 'KYC', 'option_name' => 'KYC Pending Requested'),
          array('category' => 'KYC', 'option_name' => 'KYC Approved Records'),
          array('category' => 'Payouts', 'option_name' => 'Payout Report'),
          array('category' => 'Payouts', 'option_name' => 'Direct Income Payouts'),
          array('category' => 'Deduction', 'option_name' => 'Total TDS'),
          array('category' => 'Support', 'option_name' => 'Inbox')
         );
            ?>
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
                        <span class="card-label fw-bold fs-3 mb-1"> Admins List</span>
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
                                 <th class="min-w-140px">Name</th>
                                 <th class="min-w-120px">Username</th>
                                 <th class="min-w-120px">Password</th>
                                 <th class="min-w-120px">Role</th>
                                 <th class="min-w-150px">Created Date</th>
                                 <th class="min-w-120px">Status</th>
                                 <th class="min-w-150px">Action</th>
                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody id="tableBody" class="text-center">
                              <!-- Loop to display the data -->
                              <?php foreach ($admin_list as $value) :
                                if($value['username'] != 'Admin'){
                              ?>
                              <tr>
                                 <!-- Display other table data -->
                                 <td><?= $value['name']; ?></td>
                                 <td><?= $value['username']; ?></td>
                                 <td><?= $value['password']; ?></td>
                                 <td><?= $value['role']; ?></td>
                                 <td><?= $value['created']; ?></td>
                                 <td>
                                    <?php if ($value['status'] == 'Active') : ?>
                                    <button class="btn btn-sm btn-success" onclick="changeStatus(<?= $value['sr']; ?>, 'Inactive')">Active</button>
                                    <?php elseif ($value['status'] == 'Inactive') : ?>
                                    <button class="btn btn-sm btn-warning" onclick="changeStatus(<?= $value['sr']; ?>, 'Active')">Inactive</button>
                                    <?php endif; ?>
                                 </td>
                                 <!-- Update button with popup -->
                                 <td>
                                    <!-- Update Button -->
                                    <button type="button" class="btn btn-sm btn-primary update-btn"
                                       data-bs-toggle="modal" data-bs-target="#updateModal"
                                       data-sr="<?= $value['sr']; ?>"
                                       data-name="<?= $value['name']; ?>"
                                       data-role="<?= $value['role']; ?>"
                                       data-username="<?= $value['username']; ?>"
                                       data-password="<?= $value['password']; ?>"
                                       data-access-limits="<?= htmlspecialchars(json_encode($value['access_limits'])); ?>"
                                       >Update</button>
                                     <button class="btn btn-sm btn-danger" onclick="deleteAdminUser(<?= $value['sr']; ?>)">Delete</button>
                                 </td>
                              </tr>
                              <?php } endforeach; ?>
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
         <!-- Modal -->
         <!-- Modal -->
         <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form action="#" method="post" id="updateForm">
                        <!-- Your form fields here -->
                        <input type="hidden" id="sr" name="sr">
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="name">
                           <span class="required">Name:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="name" name="name">
                           <div class="error-message text-danger" id="name-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="role">
                           <span class="required">Role:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="role" name="role">
                           <div class="error-message text-danger" id="role-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="username">
                           <span class="required">Username:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="username" name="username" readonly>
                           <div class="error-message text-danger" id="username-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="password">
                           <span class="required">Password:</span>
                           </label>
                           <input class="form-control form-control-solid" type="password" id="password" name="password">
                           <div class="error-message text-danger" id="password-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="access_limits">
                           <span class="required">Access Limits:</span>
                           </label>
                           <?php
                              $currentCategory = '';
                              foreach ($permissions as $permission) {
                                  // Check if a new category has started, and add a label for it
                                  if ($currentCategory !== $permission['category']) {
                                      if ($currentCategory !== '') {
                                          echo '</div>'; // Close the previous category div
                                      }
                                      $currentCategory = $permission['category'];
                                      echo '<label class="form-check-label fw-bold">' . $currentCategory . '</label>';
                                      echo '<div class="ms-5">'; // Create a new category div
                                  }
                              
                                  // Render the option as a checkbox
                                  echo '<div class="form-check mb-2">';
                                  echo '<input class="form-check-input" type="checkbox" name="permissions[]" value="' . $permission['option_name'] . '">';
                                  echo '<label class="form-check-label">' . $permission['option_name'] . '</label>';
                                  echo '</div>';
                              
                                  // Add error message div for each checkbox
                                  echo '<div class="error-message" id="' . $permission['option_name'] . '-error"></div>';
                              }
                              
                              if ($currentCategory !== '') {
                                  echo '</div>'; // Close the last category div
                              }
                              ?>
                        </div>
                     </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary"   data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                     <button type="button" class="btn btn-primary"  id="saveChangesBtn">Save changes</button>
                  </div>
               </div>
            </div>
         </div>
         <!--end::Content-->
      </div>
      <style>
      </style>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
      <script>
         // Create the updateModal variable in the global scope
         var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
         
         
                   // Show the backdrop when the modal is shown
         function closeModal(){
         var modalBackdrop = document.querySelector('.modal-backdrop');
         modalBackdrop.classList.remove('modal-backdrop');
         }
         
          document.querySelectorAll('.update-btn').forEach(function(button) {
              button.addEventListener('click', function() {
                  var sr = this.getAttribute('data-sr');
                  var name = this.getAttribute('data-name');
                  var role = this.getAttribute('data-role');
                  var username = this.getAttribute('data-username');
                  var password = this.getAttribute('data-password');
                 var accessLimits = JSON.parse(this.getAttribute('data-access-limits'));
         
                  // Populate the modal fields with user data
                  document.getElementById('sr').value = sr;
                  document.getElementById('name').value = name;
                  document.getElementById('role').value = role;
                  document.getElementById('username').value = username;
                  document.getElementById('password').value = password;
         
                 // Check checkboxes based on access limits
              var checkboxes = document.querySelectorAll('input[name="permissions[]"]');
              checkboxes.forEach(function(checkbox) {
                  checkbox.checked = accessLimits.includes(checkbox.value);
              });
              
             // Call saveChanges() with the 'sr' as the parameter
             document.getElementById('saveChangesBtn').addEventListener('click', function () {
             saveChanges(sr);
             });
         
                  // Open the modal
                  var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
                  updateModal.show();
         
         
              });
          });
          // Function to handle the "Save changes" button click
            function saveChanges() {
              // Get the form data using jQuery serialize
              var formData = $('#updateForm').serialize();
             

              $.ajax({
                url: baseurl + 'Ajax/update_admin_data',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                            if (response.success) {
                             
                                 Swal.fire({
                             icon: 'success',
                             title: 'Success!',
                             text: 'Sub-Admin Data updated successfully!',
                            
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 location.reload();
                             }
                         });
                                closeModal();
                             // Optionally, redirect to another page or perform additional actions
                         } else {
                             var errors = response.errors;
                             $.each(errors, function(key, value) {
                                $('#'+key+'-error').text(value); 
                             });
                         }
            
                  // Close the modal after successful save
           
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  // Handle any error that occurs during the AJAX request
                  console.error('Error:', errorThrown);
                }
              });
            }
            
            // Status Change 
            function changeStatus(sr, status) {
            // Create an AJAX request
            $.ajax({
               url: baseurl + 'Ajax/update_admin_status', // Replace with your server-side endpoint
               type: 'POST',
               data: { sr: sr, status: status },
               beforeSend: function () {
                     // Show loading spinner or disable the button
                     // For example, you can show a spinner using a library like Bootstrap
                     $('#spinner').show();
                     $('#updateButton').prop('disabled', true);
               },
               success: function (response) {
                     // Handle the success response
                     if (response.status === 'success') {
                        // Update the UI or display a success message

                        Swal.fire({
                             icon: 'success',
                             title: 'Success!',
                             text: response.message,
                            
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 location.reload();
                             }
                         });
                         
                     } else {
                        // Display an error message
                        alert(response.message);
                     }
               },
               error: function (xhr, status, error) {
                     // AJAX request failed
                     console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
               },
               complete: function () {
                     // Hide loading spinner or enable the button
                     $('#spinner').hide();
                     $('#updateButton').prop('disabled', false);
               }
            });
         }

          // AJAX function for deleting the Admin User
         function deleteAdminUser(sr) {
            // Perform an AJAX request to delete the package with the specified sr
            $.ajax({
               url: baseurl + 'Ajax/deleteAdminUser',
               type: 'POST',
               data: { sr: sr },
               success: function(response) {
                        // Handle the success response
                     if (response.status === 'success') {
                        // Delete the row from the table or update the UI as needed
                        
                        Swal.fire({
                             icon: 'success',
                             title: 'Success!',
                             text: response.message,
                            
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 location.reload();
                             }
                         });
                     } else {
                        alert(response.message);
                     }
               },
               error: function(xhr, status, error) {
                     // Handle the error response
                     // You can display an error message or perform any other necessary actions
               }
            });
         }
      </script>
   </body>
</html>
