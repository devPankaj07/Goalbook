<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Create Admin || Admin</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
   </head>
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
                        <span class="card-label fw-bold fs-3 mb-1">Create Sub Admin's Form</span>
                        <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                     </h3>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body py-3">
                     <!--begin::Table container-->
                     <form action="#" method="post">
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="name">
                           <span class="required">Name:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="name" name="name">
                           <div class="error-message text-danger" id="name-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="name">
                           <span class="required">Role:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="role" name="role">
                           <div class="error-message text-danger" id="role-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="username">
                           <span class="required">Username:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="username" name="username">
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
                        <label class="fs-6 fw-semibold form-label">Status:</label>
                        <div class="form-check mb-2">
                           <input class="form-check-input" type="radio" name="status" value="Active" id="status_active">
                           <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="status" value="Inactive" id="status_inactive">
                           <label class="form-check-label" for="status_inactive">Inactive</label>
                        </div>
                        <div class="error-message text-danger" id="status-error"></div>
                     </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="access_limits">
                           <span class="required">Access Limits:</span>
                           </label>
                           <div class="form-check">
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
                        </div>
                        <div class="fv-row text-end">
                           <input class="btn btn-primary" type="submit" value="Create Admin">
                        </div>
                     </form>
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
      <script>
         $(document).ready(function() {
             $('form').submit(function(e) {
                 e.preventDefault();
                 var formData = $(this).serialize();
                 
                 $.ajax({
                     type: 'POST',
                     url:  baseurl + 'Ajax/create_admins',
                     data: formData,
                     dataType: 'json',
                     success: function(response) {
                         if (response.success) {
                             
                                 Swal.fire({
                             icon: 'success',
                             title: 'Success!',
                             text: 'Sub-Admin created successfully!',
                            
                         }).then((result) => {
                             if (result.isConfirmed) {
                                 location.reload();
                             }
                         });
                             // Optionally, redirect to another page or perform additional actions
                         } else {
                             var errors = response.errors;
                             $.each(errors, function(key, value) {
                                $('#'+key+'-error').text(value); 
                             });
                         }
                     },
                     error: function() {
                         alert('Error occurred during AJAX request.');
                     }
                 });
             });
         });
      </script>
   </body>
</html>
