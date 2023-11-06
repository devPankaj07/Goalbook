<?php
// Define the JSON data as an object (associative array)
$states_data = array(
   "AP" => array("Name" => "Andhra Pradesh", "Code" => "AP"),
   "AM" => array("Name" => "Assam", "Code" => "AM"),
   "BH" => array("Name" => "Bihar", "Code" => "BH"),
   "CG" => array("Name" => "Chandigarh", "Code" => "CG"),
   "CH" => array("Name" => "Chhatisgarh", "Code" => "CH"),
   "DL" => array("Name" => "Delhi", "Code" => "DL"),
   "GJ" => array("Name" => "Gujarath", "Code" => "GJ"),
   "GA" => array("Name" => "Goa", "Code" => "GA"),
   "HR" => array("Name" => "Haryana", "Code" => "HR"),
   "JK" => array("Name" => "Jammu & Kashmir", "Code" => "JK"),
   "JD" => array("Name" => "Jharkhand", "Code" => "JD"),
   "KA" => array("Name" => "Karnataka", "Code" => "KA"),
   "KL" => array("Name" => "Kerala", "Code" => "KL"),
   "MP" => array("Name" => "Madhya Pradesh", "Code" => "MP"),
   "MH" => array("Name" => "Maharashtra", "Code" => "MH"),
   "OR" => array("Name" => "Odisha", "Code" => "OR"),
   "PB" => array("Name" => "Punjab", "Code" => "PB"),
   "RJ" => array("Name" => "Rajasthan", "Code" => "RJ"),
   "TN" => array("Name" => "Tamil Nadu", "Code" => "TN"),
   "TL" => array("Name" => "Telangana", "Code" => "TL"),
   "TR" => array("Name" => "Tripura", "Code" => "TR"),
   "UK" => array("Name" => "Uttarakhand", "Code" => "UK"),
   "UP" => array("Name" => "Uttar Pradesh", "Code" => "UP"),
   "WB" => array("Name" => "West Bengal", "Code" => "WB")
);

?>
<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
   <title>Edit Profile || Dashboard</title>
   <?php require_once(__DIR__ . '/../includes/head.php'); ?>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css">
   <style>
      .uploaded-img{
         margin-top: 1em ;
height: 57%;
 
 
display: flex;
justify-content: center;
      }
      .form-floating > .bi-calendar-date + .datepicker_input + label {
  padding-left: 3.5rem;
  z-index: 3;
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
               <div class="row gy-5 ">
                  <div class="col-xxl-12">

                     <!--begin::Tables Widget 9-->
                     <div class="card card-xxl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                           <h3 class="card-title align-items-start flex-column">
                              <span class="card-label fw-bold fs-3 mb-1">Edit Profile</span>


                           </h3>


                        </div>
                        <!--end::Header-->
                        
                        <!--begin::Body-->
                        <div class="card-body py-3">
                           <div class="element-box">

                              <?php echo form_open('Main/add_profile', 'id="profile_form"'); ?>

                              <div class="row">
                                 <div class="col-lg-3">
                                    
                                   
                                          <div class="input-box  ">
                                             <label for="" class="fw-bold me-5 my-1">Upload Photo</label>
                                             <input type="file" class="form-file form-control" name="profile_image" id="profile_image" <?= !empty($user_data['profile_image']) ? 'disabled' : '' ?> onchange="upload()" onload="addphoto(e)">
                                          </div>

                                        
                                          <?php if (!empty($user_data['profile_image'])) { ?>
                                             <div class="uploaded-img">
                                             <img src="<?= base_url('assets/uploads/profile/' . $user_data['profile_image']) ?>" alt="Profile Image" style="width: 10em;">
                                             </div>
                                          <?php } else { ?>
                                            <div class="uploaded-img">
                                            <canvas id="canv1"></canvas>
                                            </div>

                                          <?php }; ?>
                                        

                                    
                                 </div>
                                 <div class="col-lg-9">
                                    <div class="row">

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1">First Name</label>
                                             <?php
                                             $first_name = isset($user_data['first_name']) ? $user_data['first_name'] : '';
                                             $input_attributes = array(
                                                'name' => 'first_name',
                                                'class' => 'form-control',
                                                'placeholder' => 'First Name',
                                                'value' => $first_name,

                                             );
                                             if (!empty($first_name)) {
                                                $input_attributes['disabled'] = 'disabled';
                                             }
                                             echo form_input($input_attributes);
                                             if (empty($first_name)) {
                                                // echo form_error('first_name', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1">Last Name</label>
                                             <?php
                                             $last_name = isset($user_data['last_name']) ? $user_data['last_name'] : '';
                                             $input_attributes = array(
                                                'name' => 'last_name',
                                                'class' => 'form-control',
                                                'placeholder' => 'Last Name',
                                                'value' => $last_name,

                                             );
                                             if (!empty($last_name)) {
                                                $input_attributes['disabled'] = 'disabled';
                                             }
                                             echo form_input($input_attributes);

                                             if (empty($last_name)) {
                                                // echo form_error('last_name', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>

                                        <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1"> Date of Birth</label>
                                             <div class="date-input">
                                                <?php
                                                $formatted_date = date("d/m/Y", strtotime(str_replace("/", "-", $user_data['dateofbirth'])));
                                                $date_of_birth = isset($formatted_date) ? $formatted_date : '';
                                                $input_attributes = array(
                                                   'type' => 'text',
                                                   'name' => 'date_of_birth',
                                                   'class' => 'datepicker_input form-control border-2',
                                                   'placeholder' => 'DD/MM/YYYY',
                                                   'value' => $date_of_birth,
                                                   'id' => 'date_of_birth',
                                                );


                                                if (!empty($date_of_birth)) {
                                                   $input_attributes['disabled'] = 'disabled';
                                                }

                                                echo form_input($input_attributes);

                                                if (empty($date_of_birth) && !empty(form_error('date_of_birth'))) {
                                                   // echo form_error('date_of_birth', '<div class="error text-danger">', '</div>');
                                                }
                                                ?>

                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="gender" class="fw-bold me-5 my-1">Select Gender</label>
                                             <?php
                                             $gender_options = [
                                                'Select' => 'Select',
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                                'Other' => 'Other'
                                             ];

                                             $selected_gender = isset($user_data['gender']) ? $user_data['gender'] : '';

                                             // Add the 'disabled' attribute if a value exists in $selected_gender
                                             $dropdown_attributes = 'class="form-control" id="gender"';
                                             if (!empty($selected_gender)) {
                                                $dropdown_attributes .= ' disabled';
                                             }

                                             echo form_dropdown('gender', $gender_options, $selected_gender, $dropdown_attributes);
                                             ?>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1"> Mobile No.</label>
                                             <?php
                                             $mobile_number = isset($user_data['mobile_number']) ? $user_data['mobile_number'] : '';
                                             $input_attributes = array(
                                                'name' => 'mobile_number',
                                                'class' => 'form-control',
                                                'placeholder' => 'Mobile No.',
                                                'value' => $mobile_number,
                                             );
                                             if (!empty($mobile_number)) {
                                                $input_attributes['disabled'] = 'disabled';
                                             }
                                             echo form_input($input_attributes);
                                             if (empty($mobile_number)) {
                                                // echo form_error('mobile_number', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1"> Email address</label>
                                             <?php
                                             $email = isset($user_data['email']) ? $user_data['email'] : '';
                                             $input_attributes = array(
                                                'name' => 'email',
                                                'class' => 'form-control',
                                                'placeholder' => 'Enter email',
                                                'type' => 'email',
                                                'value' => $email,
                                             );
                                             if (!empty($email)) {
                                                $input_attributes['disabled'] = 'disabled';
                                             }
                                             echo form_input($input_attributes);
                                             if (empty($email)) {
                                                // echo form_error('email', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="country" class="fw-bold me-5 my-1">Select Country</label>
                                        <?php
$country = isset($user_data['country']) ? $user_data['country'] : '';

// Country options array
$country_options = array(
    '' => 'Select a country', // Add the "Select a country" option as the first option
    'India' => 'India', // Add other countries here if needed
);

if(empty($country)){
    // Output the country dropdown
    echo '<select name="country" class="form-control" id="country">';
}else{
    // Output the country dropdown
    echo '<select name="country" class="form-control" id="country" disabled>';
}

foreach ($country_options as $value => $label) {
    // Add the "selected" attribute to the existing value to display it as selected
    $selected = ($value === $country) ? 'selected' : '';

    // Add the "disabled" attribute to the existing value to make it non-editable
    $disabled = ($value === $country) ? 'disabled' : '';

    // Output the option with the appropriate attributes
    echo '<option value="' . $value . '" ' . $selected . ' ' . $disabled . '>' . $label . '</option>';
}

echo '</select>';
?>


                                          </div>
                                       </div>



                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="state" class="fw-bold me-5 my-1">Select State</label>
                                             <?php
                                             $state = isset($user_data['state']) ? $user_data['state'] : '';

                                             // Convert the JSON data to a JSON string using json_encode
                                             $states_json = json_encode($states_data);

                                             // Convert the JSON string back to an associative array using json_decode
                                             $states = json_decode($states_json, true);

                                             // Generate the state dropdown options
                                             $state_dropdown = '<select name="state" id="state" class="form-control"';
 

                                             $state_dropdown .= '>';
                                             $state_dropdown .= '<option value="">Select a state</option>';
                                             foreach ($states as $state_code => $state_info) {
                                                $selected = ($state_code == $state) ? 'selected' : '';
                                                $state_dropdown .= '<option value="' . $state_code . '" ' . $selected . '>';

                                                // Print the state name and code in the dropdown option
                                                $state_dropdown .= $state_info['Name'] . ' (' . $state_info['Code'] . ')';
                                                $state_dropdown .= '</option>';
                                             }
                                             $state_dropdown .= '</select>';

                                             // Output the state dropdown
                                             echo $state_dropdown;

                                             if (empty($state)) {
                                                // echo form_error('state', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>




                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1"> City</label>
                                             <?php
                                             $city = isset($user_data['city']) ? $user_data['city'] : '';
                                             $input_attributes = array(
                                                'name' => 'city',
                                                'class' => 'form-control',
                                                'id' => 'city',
                                                'placeholder' => 'City',
                                                'value' => $city,
                                             );
                                             if (!empty($city)) {
                                                $input_attributes['disabled'] = 'disabled';
                                             }
                                             echo form_input($input_attributes);
                                             if (empty($city)) {
                                                // echo form_error('city', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="" class="fw-bold me-5 my-1"> Address</label>
                                             <?php
                                             $house_no_plot = isset($user_data['address']) ? $user_data['address'] : '';
                                             $input_attributes = array(
                                                'name' => 'house_no_plot',
                                                'class' => 'form-control',
                                                'id' => 'house_no_plot',
                                                'placeholder' => 'Address',
                                                'value' => $house_no_plot,
                                             );
                                             if (!empty($house_no_plot)) {
                                                $input_attributes['disabled'] = 'disabled';
                                             }

                                             echo form_input($input_attributes);
                                             if (empty($house_no_plot)) {
                                                // echo form_error('house_no_plot', '<div class="error text-danger">', '</div>');
                                             }
                                             ?>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                              </div>






                              <div class="form-check mb-4 mt-4">
                                 <label class="form-check-label">
                                    I agree to terms and conditions
                                    <?php echo form_checkbox('agree_terms', '1', (!empty($user_data['profile_image']) ? TRUE : FALSE), 'class="form-check-input" id="agree_terms"' . (!empty($user_data['profile_image']) ? 'checked disabled' : '')); ?>
                                 </label>


                              </div>
                              <div class="form-buttons-w text-center">
                                 <?php echo form_submit('submit', 'Update', 'class="btn btn-primary" ' . (!empty($user_data['profile_image']) ? 'disabled' : '')); ?>
                              </div>


                              <?php echo form_close(); ?>
                           </div>
                        </div>
                        <!--begin::Body-->
                     </div>
                     <!--end::Tables Widget 9-->
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
   <?php require_once(__DIR__ . '/../includes/foot.php'); ?>'
   <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
</body>
<!--end::Body-->

</html>
<style>
   canvas {
      height: 100%;
      border-style: solid;
      border-width: 1px;
      width: 75%;
   }
</style>
<script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js">
</script>
<script>
   function upload() {
      var imgcanvas = document.getElementById("canv1");
      var fileinput = document.getElementById("profile_image");
      console.log(fileinput);
      var image = new SimpleImage(fileinput);
      image.drawTo(imgcanvas);
   }

   function addphoto(e) {
      console.log(e);
   }
   /* Bootstrap 5 JS included */
/* vanillajs-datepicker 1.1.4 JS included */

const getDatePickerTitle = elem => {
  // From the label or the aria-label
  const label = elem.nextElementSibling;
  let titleText = '';
  if (label && label.tagName === 'LABEL') {
    titleText = label.textContent;
  } else {
    titleText = elem.getAttribute('aria-label') || '';
  }
  return titleText;
}

const elems = document.querySelectorAll('.datepicker_input');
for (const elem of elems) {
  const datepicker = new Datepicker(elem, {
    'format': 'dd/mm/yyyy', // UK format
    title: getDatePickerTitle(elem)
  });
}
</script>

<script>
   $(document).ready(function() {
      $('#profile_form').submit(function(e) {
         e.preventDefault(); // Prevent the default form submission

         var formData = new FormData(this); // Get the form data
         console.log(formData)
         $.ajax({
            url: baseurl + 'Main/add_profile', // URL to submit the form data
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
                     window.location.href = baseurl + 'profile';
                  });

               }
            },
            error: function(xhr, status, error) {
               // Handle the error response
               console.log(error);
            }
         });
      });
   });
</script>