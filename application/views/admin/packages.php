<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Packages || Admin</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
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
      <div class="row mb-5">
      <div class="col-xl-12" style="margin:auto;">
         <!--begin::Contacts-->
         <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
               <!--begin::Card title-->
               <div class="card-title">
                  <i class="ki-duotone ki-badge fs-1 me-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                  <h2>Add Package  </h2>
               </div>
               <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
               <!--begin::Form-->
               <form id="kt_ecommerce_settings_general_form" class="form" action="#">
                  <!--begin::Input group-->
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Add Package Name</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid" name="packages" id="packages" value="" placeholder="Add Package Name">
                     <!--end::Input-->
                  </div>
                  <div class="fv-row mb-7">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                     <span class="required">Add Package Amount</span>
                     </label>
                     <!--end::Label-->
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid" name="amount" id="amount" value="" placeholder="Please Enter Amount in Dollars"  >
                  
                     <!--end::Input-->
                  </div>
 
                  <!--end::Input group-->
                  <!--begin::Input group-->
                  <!--begin::Action buttons-->
                  <div class="d-flex justify-content-end">
                     <!--begin::Button-->
                     <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">
                     Reset
                     </button>
                     <!--end::Button-->
                     <!--begin::Button-->
                     <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                     <span class="indicator-label">
                     Add
                     </span>
                     <span class="indicator-progress">
                     Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                     </span>
                     </button>
                     <!--end::Button-->
                  </div>
                  <!--end::Action buttons-->
               </form>
               <!--end::Form-->
               <!--begin::Contact group wrapper-->
            </div>
         </div>
         <!--end::Card body-->
      </div>
      
      </div>
      <div class="d-flex flex-column flex-lg-row-fluid">
            <div id="kt_app_content_container" class="container-xxxl ">
               <div class="card mb-5 mb-xl-8">
                  <!--begin::Header-->
                  <div class="card-header border-0 pt-5">
                     <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Packages List</span>
                         
                     </h3>
                     
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body py-3">
                     <!--begin::Table container-->
                     <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " >
                           <!--begin::Table head-->
                           <thead>
                              <tr class="fw-bold text-muted">
                                  
                                 <th class="min-w-150px">Sr No</th>
                                 <th class="min-w-140px">Package Name</th>
                                 <th class="min-w-120px">Package Amount </th>
                                 <th class="min-w-120px">Status</th>
                                 <th class="max-w-150px">Action</th>
                              </tr>
                           </thead>
                           <!--end::Table head-->
                           <!--begin::Table body-->
                           <tbody id="tableBody">
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
      <script>
         $(document).ready(function() {
    // Get the form element
    var form = $('#kt_ecommerce_settings_general_form');

    // Attach an event listener for form submission
    form.submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Create a new FormData object and append the form data
        var formData = new FormData(this);

          
 
        // Send the AJAX request
        $.ajax({
            url: baseurl + 'Ajax/add_packages',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // Show loading spinner or disable submit button
                $('.indicator-label').hide();
                $('.indicator-progress').show();
            },
            success: function(response) {
                // AJAX request succeeded

                if (response.status === 'error') {
                    // Handle form validation errors

                    var errors = response.message;
                    $('.text-danger').remove(); // Remove previous error messages

                    // Display error messages for each field
                    $.each(errors, function(field, message) {
                        var input = $('[name="' + field + '"]');
                        input.after('<div class="text-danger">' + message + '</div>');
                    });
                } else {
                    // Handle successful response
                    console.log('Data Inserted');
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                // AJAX request failed
                console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
            },
            complete: function() {
                // Hide loading spinner or enable submit button
                $('.indicator-progress').hide();
                $('.indicator-label').show();
            }
        });
    });
});

 // Define the updateStatus function in the global scope
function updateStatus(sr, status) {
    // Create an AJAX request
    $.ajax({
        url: baseurl + 'Ajax/update_package_status', // Replace with your server-side endpoint
        type: 'POST',
        data: { sr: sr, status: status },
        beforeSend: function() {
            // Show loading spinner or disable the button
        },
        success: function(response) {
            // Handle the success response
            if (response.status === 'success') {
               // Delete the row from the table or update the UI as needed
               alert(response.message);
               location.reload(); 
            } else {
               alert(response.message);
            } 
        },
        error: function(xhr, status, error) {
            // AJAX request failed
            console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
        },
        complete: function() {
            // Hide loading spinner or enable the button
        }
    });
}


   // AJAX function for deleting the package
   function deletePackage(sr) {
      // Perform an AJAX request to delete the package with the specified sr
      $.ajax({
         url: baseurl + 'Ajax/deletePackage',
         type: 'POST',
         data: { sr: sr },
         success: function(response) {
                  // Handle the success response
               if (response.status === 'success') {
                  // Delete the row from the table or update the UI as needed
                  alert(response.message);
                  location.reload(); 
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

$(document).ready(function() {
    // Function to fetch data and populate the table
    function populateTable() {
        $.ajax({
            url: baseurl + 'Ajax/fetch_packages',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var packages = response.data;
                    var tableBody = $('#tableBody');
                    tableBody.empty(); // Clear existing table rows
                    console.log(packages);
                    // Iterate over packages and generate table rows
                    $.each(packages, function(index, package) {
                     var row = '<tr>' +
                              
                              '<td>' + (index + 1) + '</td>' +
                              '<td>' + package.package_name + '</td>' +
                              '<td>' + package.package_amount + '</td>';
                         
                           if (package.package_status == 'Active') {
                              row += '<td> <span class="badge badge-light-success">' + package.package_status + '</span></td>';
                           } else {
                              row += '<td> <span class="badge badge-light-danger">' + package.package_status + '</span></td>';
                           }
                           row += '<td class="d-flex justify-content-evenly" style="gap:8px;">';

                           if (package.package_status == 'Active') {
                              row += '<button type="button" class="btn btn-danger p-2" onclick="updateStatus(' + package.sr + ', \'Inactive\')">Inactive</button>';
                           } else {
                              row += '<button type="button" class="btn btn-success p-2" onclick="updateStatus(' + package.sr + ', \'Active\')">Active</button>';
                           }

                           // Add the delete button
                           row += '<button type="button" class="btn btn-primary p-2" onclick="deletePackage(' + package.sr + ')">Delete</button>';

                           row += '</td>' +
                              '</tr>';


                        tableBody.append(row);

                      
                    });
                } else {
                    console.error('Failed to fetch packages.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed. Status: ' + status + ', Error: ' + error);
            }
        });
    }

    // Call the populateTable function on page load
    populateTable();
});

 
         
      </script>
   </body>
</html>
