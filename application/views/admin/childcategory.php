<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child-Category || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    <style>
        @media only screen and (max-width: 476px) {
            .card .card-body {
                padding: 0;

            }
        }

        #tableBody td {
            text-align: center;
        }

        .loginbtntab a {
            padding: 8px 16px !important;

        }
    </style>
    <style>
        .countertable {
            font-size: 1.5em;
            font-weight: bold;
        }

        .card .card-body {
            justify-content: center;
        }

        @media only screen and (max-width: 476px) {


            .incomecrd {
                width: 50%;
            }

            .clickhere {
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

        .incomecrd {
            width: 50%;
            padding: 5px;

        }

        .wh {
            width: 100%;
            height: 100%;
        }


        .clickhere {
            transition: all .5s ease;
            color: #fff;

            font-family: 'Montserrat', sans-serif;
            text-align: center;
            color: black;
            line-height: 1;
            font-size: 14px;
            background-color: white;
            padding: 4px 15px;
            opacity: 0.5;
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
            #DataTables_Table_0_wrapper {
                margin-left: 13px !important;

            }

            .clrmar {
                margin: 5px !important;
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
                            <span class="card-label fw-bold fs-3 mb-1">Child Category</span>
                            
                            
                            <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                        </h3>
                        <button type="button" class="btn btn-sm btn-primary update-btn"
                                       data-bs-toggle="modal" data-bs-target="#addnewModal"
                                      
                                       >Add New child-Category</button>

                    </div>
                    <!------------------------------------card section start---------------------------->

                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 ">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bold text-muted">

                                        <th class="min-w-10px">Sr No</th>
                                       
                                        <th class="min-w-80px">Image</th>
                                        <th class="min-w-80px">Category Name</th>
                                        <th class="min-w-80px">Sub-Category Name</th>
                                        <th class="min-w-80px">Child-Category Name</th>
                                        
                                        
                                        <th class="min-w-120px">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody id="tableBody">
                                    <?php
                                   // print_r($maincat_data);
                                   // exit;
                                    foreach ($childcat_data as $value) { 
                                       
                                    $sr++
                                    ?>
                                        
                                      
                                                
                                                <td><?= $sr ?></td>
                                                <td> <?php if (!empty($value['child_image'])) { ?>
                                             <div class="uploaded-img">
                                             <img src="<?= base_url('assets/uploads/categoryimage/' . $value['child_image']) ?>" alt="Profile Image" style="width: 50px;height: 50px;">
                                             </div>
                                          <?php } else { ?>
                                            <div class="uploaded-img">
                                            <canvas id="canv1"></canvas>
                                            </div>

                                          <?php }; ?></td>
                                                    <td><?= $value['mainid']; ?></td>
                                                       <td><?= $value['subcatid']; ?></td>
                                                  <td><?= $value['childname']; ?></td>
                                                 <td>
                                    <!-- Update Button -->
                                    <button type="button" class="btn btn-sm btn-primary update-btn"
                                       data-bs-toggle="modal" data-bs-target="#updateModal"
                                       data-sr="<?= $value['sr']; ?>"
                                       data-name="<?= $value['subname']; ?>"
                                       data-image="<?= $value['sub_image']; ?>"
                                      
                                      
                                       >Update</button>
                                     <button class="btn btn-sm btn-danger" onclick="deleteMainCar(<?= $value['subid']; ?>)">Delete</button>
                                 </td>


                                            </tr>
                                    <?php
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <img src="" alt="" id="modalImage">
                        <div id="bank-details">

                        </div>
                    </div>
                    <div class="modal-footer p-1">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>




        <!--end::Content-->
        
        <!-- Addmodal-->
         <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel"><b>Add New Child-Category</b></h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form action="add_child_cat" method="post" id="addchildcatForm" enctype="multipart/form-data">
                        <!-- Your form fields here -->
                   <div class="fv-row mb-3">
    <label class="fs-6 fw-semibold form-label" for="mainid">
        <span class="required">Main Category:</span>
    </label>
    <select class="form-control form-control-solid" id="mainid" name="mainid">
        <option value=""></option>
        <?php foreach ($maincat_data as $row): ?>
            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="fv-row mb-3">
    <label class="fs-6 fw-semibold form-label" for="subcatid">
        <span class="required">Sub Category:</span>
    </label>
    <select class="form-control form-control-solid" id="subcatid" name="subcatid">
        <option value=""></option>
        <?php foreach ($subcat_data as $row): ?>
            <option value="<?= $row['subid']; ?>" data-main-category="<?= $row['mainid']; ?>"><?= $row['subname']; ?></option>
        <?php endforeach; ?>
    </select>
</div>



                    <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="childname">
                           <span class="required">Name:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="childname" name="childname">
                           <div class="error-message text-danger" id="name-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           
                                    
                                   
                                          <div class="input-box  ">
                                          
                                             <label for="" class="fw-bold me-5 my-1">Upload Photo</label>
                                             <input type="file" class="form-file form-control" name="child_image" id="child_image" <?= !empty($user_data['child_image']) ? 'disabled' : '' ?> onchange="upload()" onload="addphoto(e)">
                                        </div>
                        </div>
                      
                   
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary"   data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                     <button type="submit" class="btn btn-primary"  id="saveChangesBtn">Save changes</button>
                  </div>
                    </form>
               </div>
            </div>
         </div>
         <!-- end addmodal-->
         
         <!-- updatemodal-->
         <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel"><b>Update Category</b></h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form action="#" method="post" id="addsubcatForm">
                        <!-- Your form fields here -->
                        <input type="hidden" id="id" name="id">
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="name">
                           <span class="required">Name:</span>
                           </label>
                           <input class="form-control form-control-solid" type="text" id="name" name="name">
                           <div class="error-message text-danger" id="name-error"></div>
                        </div>
                        <div class="fv-row mb-3">
                           <label class="fs-6 fw-semibold form-label" for="image">
                           <span class="required">Image:</span>
                           </label>
                           <input class="form-control form-control-solid" type="file" id="image" name="image">
                           <div class="error-message text-danger" id="image-error"></div>
                        </div>
                      
                     </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary"   data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                     <button type="button" class="btn btn-primary"  id="">Update changes</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- end updatemodal-->
    </div>
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
    
    <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js">
 <script>
 
    function upload() {
      var imgcanvas = document.getElementById("canv1");
      var fileinput = document.getElementById("sub_image");
      console.log(fileinput);
      var image = new SimpleImage(fileinput);
      image.drawTo(imgcanvas);
   }

   function addphoto(e) {
      console.log(e);
   } 
   
   
         // Create the updateModal variable in the global scope
         var addnewModal = new bootstrap.Modal(document.getElementById('addnewModal'));
         
         
                   // Show the backdrop when the modal is shown
         function closeModal(){
         var modalBackdrop = document.querySelector('.modal-backdrop');
         modalBackdrop.classList.remove('modal-backdrop');
         }
         
          document.querySelectorAll('.addnew-btn').forEach(function(button) {
              button.addEventListener('click', function() {
                  var sr = this.getAttribute('data-sr');
                  var name = this.getAttribute('data-name');
                  var image = this.getAttribute('data-image');
                 
         
                  // Populate the modal fields with user data
                  document.getElementById('sr').value = sr;
                  document.getElementById('name').value = name;
                  document.getElementById('image').value = image;
                
                 
            
              
             // Call saveChanges() with the 'sr' as the parameter
             document.getElementById('saveChangesBtn').addEventListener('click', function () {
             saveChanges(sr);
             });
         
                  // Open the modal
                  var addnewModal = new bootstrap.Modal(document.getElementById('addnewModal'));
                  addnewModal.show();
         
         
              });
          });
</script>
      <script>
                    // Function to handle the "Save changes" button click
           $(document).ready(function() {
      $('#addchildcatForm').submit(function(e) {
         e.preventDefault(); // Prevent the default form submission

         var formData = new FormData(this); // Get the form data
         console.log(formData)

            $.ajax({
            url: baseurl + 'Admin/add_child_cat', // URL to submit the form data
            type: 'POST', // HTTP method (POST in this case)
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
               // Handle the success response
               $('.text-danger').remove();
               var jsonData = JSON.parse(response); // Parse the JSON response
               if (jsonData.status === 'error') {
                  $.each(jsonData.message, function(key, value) {
                     // Append the error message below the corresponding input field
                     $('#' + key).after('<div class="text-danger">' + value + '</div>');
                  });
               } else {
                  // Form submission was successful
                  //   alert(jsonData.message)
                  // Redirect or display a success message
                  Swal.fire(
                     'Profile Updated!',
                     'Profile update has been completed successfully.!',
                     'success'
                  ).then(function() {
                     window.location.href = baseurl + 'Admin/subcategory';
                  });

               }
            },
            error: function(xhr, status, error) {
               // Handle the error response
               console.log(error);
            }
         });
            }
      </script>
      <script>
          // AJAX function for deleting the Admin User
         function deleteMainCar(id) {
            // Perform an AJAX request to delete the package with the specified sr
            $.ajax({
               url: baseurl + 'Ajax/deleteMainCar',
               type: 'POST',
               data: { id: id },
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
      <script>
    // Get references to the main category and sub-category select elements
    const mainCategorySelect = document.getElementById('mainid');
    const subCategorySelect = document.getElementById('subcatid');

    // Add an event listener to the main category select element
    mainCategorySelect.addEventListener('change', function () {
        // Get the selected main category value
        const selectedMainCategory = mainCategorySelect.value;

        // Loop through sub-category options and show/hide based on the selected main category
        const subCategoryOptions = subCategorySelect.querySelectorAll('option');
        subCategoryOptions.forEach(option => {
            if (option.dataset.mainCategory === selectedMainCategory || option.dataset.mainCategory === '') {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });
</script>
</body>

</html>

<style>
   canvas {
      height: 100%;
      border-style: solid;
      border-width: 1px;
      width: 75%;
   }
</style>