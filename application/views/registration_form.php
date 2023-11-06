<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Register Now </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/newui/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/newui/css/utility.css">
        <link rel="icon" type="image/png" href="https://goldbook1.soonx.co.in/assets/newui/img/logos/fav-gb.png">
    <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/bootstrap-icons%401.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">
    <script defer="defer" data-domain="webpixels.works" src="../plausible.io/js/script.outbound-links.js"></script>
</head>
<?php

$sponsorId = isset($_GET['sponsorid']) ? $_GET['sponsorid'] : set_value('sponsor_id');

?>

<body >
    
     <div class="row g-0 justify-content-center gradient-bottom-right start-purple middle-indigo end-pink">
        <div
            class="col-md-6 col-lg-5 col-xl-5 position-fixed start-0 top-0 vh-100 overflow-y-hidden d-none d-lg-flex flex-lg-column">
            <div class="p-12 py-xl-10 px-xl-20"><a class="d-block" href="dashboard.php"><img
                        src="https://goldbook1.soonx.co.in/assets/newui/img/logos/white.png" class="h-rem-10" alt="..."></a>
                <!-- <div class="mt-16">
                    <h1 class="ls-tight fw-bolder display-6 text-white mb-5">Trade the world’s top assets and cryptos
                    </h1>
                    <p class="text-white text-opacity-75 pe-xl-24">Create beautiful websites that are supported by
                        rock-solid design principles.</p>
                </div> -->
            </div>
            <div class="mt-auto ps-16 ps-xl-20"><img src="https://goldbook1.soonx.co.in/assets/newui/img/marketing/shot-1.png"
                    class="img-fluid rounded-top-start-4" alt="..."></div>
        </div>
         <div
            class="col-12 col-md-12 col-lg-7 offset-lg-5 min-vh-100 overflow-y-auto d-flex flex-column justify-content-center position-relative bg-body rounded-top-start-lg-4 border-start-lg shadow-soft-5">
            <div class="w-md-50 mx-auto px-10 px-md-0 py-10">
                <div class="mb-10"><a class="d-inline-block d-lg-none mb-10" href="dashboard.php"><img
                            src="../img/logos/logo.png" class="h-rem-6" alt="..."></a>
                    <h1 class="ls-tight fw-bolder h3">Get started. It&#39;s your dream</h1>
                    <div class="mt-3 text-sm text-muted"><span>Already have an account?</span> <a href="<?= base_url('login')?>"
                            class="fw-semibold" style="color: #715cfa; text-decoration-line: underline">Login</a> to
                        your account.</div>
                </div>
                
                  <!--begin::Form-->
                  <form id="registration-form">
                     <!-- <?php echo form_open('Auth/process_registration', array('id' => 'registration-form')); ?> -->
                     <!--begin::Heading-->
                   
                         
                      
                      <div class="col-sm-12"><label class="form-label">First name</label> 
                       <input class="form-control" placeholder="Enter First Name" type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" />
                        <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                      
                      </div>
                      <div class="col-sm-12"><label class="form-label">Last name</label> 
                         <input class="form-control" placeholder="Enter Last Name" type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" />
                        <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                                 </div>
                   
            
                    <div class="col-sm-12"><label class="form-label">Mobile Number</label> 
                        <input class="form-control" placeholder="Mobile Number" type="text" name="mobile_number" id="mobile_number" value="<?php echo set_value('email'); ?>" />
                        <div id="mobile_number_error" class="text-danger"></div>
                        <?php echo form_error('mobile_number', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                     </div>
                    <div class="col-sm-12"><label class="form-label">Email</label> 
                        <input class="form-control" placeholder="E-Mail" type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" />
                        <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                     </div>
                    <div class="col-sm-12"><label class="form-label">Password</label> 
                        <input class="form-control" placeholder="Enter Your password" type="password" name="password" id="password" />
                        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-fingerprint"></div>
                     </div>
                    <div class="col-sm-12"><label class="form-label">Confirm Password</label> 
                        <input class="form-control" placeholder="Confirm Your Password" type="password" name="confirm_password" id="confirm_password" />
                        <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        <div class="password-match-error"></div> <!-- Add this element for displaying the password match error message -->
                     </div>
                       <div class="col-sm-12"><label class="form-label">Referral ID (Optional)</label> 
                           <input class="form-control" placeholder="Referral ID" type="text" id="sponsor_id" name="sponsor_id" <?php echo !empty($sponsorId) ? 'readonly' : ''; ?> value="<?= $sponsorId; ?>" />
                        <?php echo form_error('sponsor_id', '<div class="text-danger">', '</div>'); ?>
                         <div class="sponser_id_wrong d-flex align-items-center">
                           <p class="text-danger m-0"></p>
                           <a href="#" class="icon" style=" display:none;"><i class="ki-duotone ki-verify fs-1 text-success"><span class="path1"></span><span class="path2"></span></i></a>

                        </div>
                         </div>
                        <div class="col-sm-12"><label class="form-label">Referral Name</label> 
                        <input class="form-control" placeholder="Referral Name" type="text" name="sponser_name" id="referrer_name" value="<?php echo set_value('sponser_name', ''); ?>" readonly />
                        <?php echo form_error('sponser_name', '<div class="text-danger">', '</div>'); ?>
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                        </div>
                        <div class="mt-3 text-sm text-muted">
                             <input class="form-check-input" type="checkbox" name="check_required" id="check_required">
                           <span >
                              By creating an account, I agree to <b>My GoalBook</b> Terms of Service and Privacy Policy.
                             
                           </span>
                        </label>
                     </div>
               <br>
                     <!--end::Accept-->
                     <!--begin::Submit button-->
                     <div class="d-grid mb-8">
                       
                        <div class="col-sm-12"><button type="submit" id="kt_sign_up_submit" class="btn btn-dark w-100">Register now</button></div>

                     </div>
                     <!--end::Submit button-->
                 
                     <!-- <?php echo form_close(); ?> -->
                  </form>
                  <!--end::Form-->
 
               </div>

            </div>
            <!--end::Card-->
         </div>
         <!--end::Body-->
      </div>
      <!--end::Authentication - Sign-up-->
   </div>

</body>
<?php require_once(__DIR__ . '/includes/foot.php'); ?>
<script>
   // Variable of Ajax Request
   var baseUrl = '<?php echo base_url(); ?>';


   // Geting Referrer Name  
   $(document).ready(function() {
      // Extract the sponsorID from the URL
      var urlParams = new URLSearchParams(window.location.search);
      var sponsorID = urlParams.get('sponsorid');

      // Set the initial value of the sponsor ID input field
      $('#sponsor_id').val(sponsorID);

      // Function to fetch the referrer's name using AJAX
      function getReferrerName(sponsorID) {
         $.ajax({
            url: baseUrl + 'Ajax/get_referrer_name',
            type: 'POST',
            data: {
               sponsor_id: sponsorID
            },
            dataType: 'json',
            success: function(response) {
               console.log(response); // Check the response in the browser console

               if (response.success && response.referrer_name.length > 0) {
                  var firstName = response.referrer_name[0].first_name;
                  var lastName = response.referrer_name[0].last_name;
                  $('#referrer_name').val(firstName + ' ' + lastName);
                  $('.sponser_id_wrong p').text('Verified');
                  $('.sponser_id_wrong p').addClass('text-success');
                  $('.sponser_id_wrong p').removeClass('text-danger');
                  $('.sponser_id_wrong a').css('display', 'block');
               } else {
                  $('.sponser_id_wrong p').text('Please Enter Valid Sponsor ID');
                  $('.sponser_id_wrong p').addClass('text-danger');
                  $('.sponser_id_wrong p').removeClass('text-success');
                  $('.sponser_id_wrong a').css('display', 'none');
                //   $('#sponsor_id').val('')
               }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown); // Check for any error messages in the browser console
               $('#referrer_name').text('Error occurred while fetching the referrer\'s name.');
            }
         });
      }

      // Call the getReferrerName function initially with the retrieved sponsorID
      if (sponsorID && (sponsorID.length == 5 || sponsorID.length > 0)) {
         getReferrerName(sponsorID);
      }

      // Listen to the input event on the sponsor ID field
      $('#sponsor_id').on('input', function() {
         var sponsorID = $(this).val();

         if (sponsorID && (sponsorID.length == 5 || sponsorID.length > 0)) {
            getReferrerName(sponsorID);
         } else {
            $('.sponser_id_wrong p').text('Please Enter Valid Sponsor ID');
            $('.sponser_id_wrong p').addClass('text-danger');
            $('.sponser_id_wrong p').removeClass('text-primary');
            $('.sponser_id_wrong a').css('display', 'none');
         }
      });
   });


   document.getElementById('mobile_number').addEventListener('input', function() {
      var mobileNumber = document.getElementById('mobile_number').value;
      var errorElement = document.getElementById('mobile_number_error');

      if (!(/^\d+$/.test(mobileNumber))) {
         errorElement.textContent = 'The Mobile Number must be a valid number.';
         document.getElementById('mobile_number').value = ''; // Clear the input field value
      } else if (mobileNumber.length !== 10) {
         errorElement.textContent = 'The Mobile Number must be exactly 10 digits long.';

      } else {
         errorElement.textContent = '';
      }
   });

   $(document).ready(function() {
      // Function to validate if password and confirm password match
      function validatePasswordMatch() {
         var password = $('#password').val();
         var confirmPassword = $('#confirm_password').val();

         if (password !== confirmPassword) {
            // Passwords do not match, show an error message
            $('.password-match-error').text('Passwords do not match');
            $('.password-match-error').addClass('text-danger')
            $('.password-match-error').removeClass('text-success')
            $('.shdw').removeClass('text-success')
            $('#signUpButton').prop('disabled', true);
         } else {
            // Passwords match, clear the error message
            $('.password-match-error').text('Passwords matched');
            $('.password-match-error').addClass('text-success')
            $('.password-match-error').removeClass('text-danger')
            $('#signUpButton').prop('disabled', false);
         }
      }

      // Event handler for input changes in the "Confirm Password" field
      $('#confirm_password').on('input', function() {
         validatePasswordMatch();
      });

      // Event handler for input changes in the "Password" field
      $('#password').on('input', function() {
         validatePasswordMatch();
      });
   });

   $(document).ready(function() {
      // Handle form submission
      $("#registration-form").submit(function(event) {
         event.preventDefault(); // Prevent default form submission

         // Remove previous error messages
         $('.text-danger').remove();

         // Get form data
         var formData = $(this).serialize();

         // Perform AJAX request
         $.ajax({
            type: "POST",
            url: "<?= base_url() ?>Auth/process_registration", // Replace with your server-side endpoint
            data: formData,
            success: function(response) {
               console.log(response);

               // Clear any previous error messages
               $('.text-danger').remove();

               // Check if there are any validation errors
               if (response.status === "error") {
                  // Iterate over the errors object
                  $.each(response.message, function(key, value) {


                     // Append the error message below the corresponding input field
                     $('#' + key).after('<div class="text-danger">' + value + '</div>');
                  });
               } else {
                  window.location.href = 'auth/welcome_letter';
               }
            },
            error: function(xhr, status, error) {
               // Handle error response
               console.log(xhr.responseText);

               // Parse the response JSON to get the validation errors
               var errors = JSON.parse(xhr.responseText);

               // Loop through the errors and display them below the respective input fields
               $.each(errors, function(field, errorMessage) {
                  var errorElement = $('<div class="text-danger">' + errorMessage + '</div>');
                  $('#' + field + '_error').remove(); // Remove any existing error message
                  $('#' + field).after(errorElement); // Display the new error message
               });
            }
         });
      });
   });
</script>


</html>