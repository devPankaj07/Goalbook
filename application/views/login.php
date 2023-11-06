<!doctype html>
<html lang="en" data-theme="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/newui/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/newui/css/utility.css">
        <link rel="icon" type="image/png" href="https://goldbook1.soonx.co.in/assets/newui/img/logos/fav-gb.png">
    <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/bootstrap-icons%401.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">
    <script defer="defer" data-domain="webpixels.works" src="../plausible.io/js/script.outbound-links.js"></script>
</head>
<body>
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
                            src="https://goldbook1.soonx.co.in/assets/newui/img/logos/logo.png" class="h-rem-6" alt="..."></a>
                    <h1 class="ls-tight fw-bolder h3">Sign in to your goal account</h1>
                    <div class="mt-3 text-sm text-muted"><span>Don't have an account?</span> <a href="<?= base_url()?>registration"
                            class="fw-semibold" style="color: #715cfa;text-decoration-line: underline">Register Now</a> for a free trial.</div>
                </div>
                  <!--begin::Form-->
                   <?= form_open('Auth/login_auth', array('class' => 'form w-100 logincont', 'novalidate' => 'novalidate', 'id' => 'kt_sign_up_form')) ?>
                        <!--begin::Heading-->
                        <div class="text-center mb-8">
                                                <!--begin::Subtitle-->
                           <div class="text-gray-500 fw-semibold fs-6">
                           <?php
                                $msg = $this->session->flashdata('msg');
                                if (!empty($msg)) {
                                    echo '<div class="text-light text-center bg-danger"> '. $msg .'</div>';
                                }
                            ?>
                            <?php if (isset($error_message) && !empty($error_message)): ?>
                                <div class="text-light text-center bg-danger"><?= $error_message; ?></div>
                            <?php endif; ?>
                           </div>
                           <!--end::Subtitle--->
                        </div>
                        <!--begin::Heading-->
                 
 
                        <!--begin::Input group--->
                        <div class="fv-row mb-8">
                           <!--begin::Email-->
                        <div class="mb-5"><label class="form-label" for="Userid">User ID</label>
                        <input class="form-control" placeholder="Enter your userId" type="text" name="username" id="username" />
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    <?php if (isset($validation_errors) && !empty($validation_errors)): ?>
                        <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                    <?php endif; ?>
                    </div>
                   
                           <!--end::Email-->
                        </div>
           
                        <!--end::Input group--->
                        <div class="fv-row mb-8">
                           <!--begin::Repeat Password-->
                             <!--<div class="d-flex justify-content-between gap-2 mb-2 align-items-center"><label-->
                             <!--   class="form-label mb-0" for="password"  >Password</label> <a href="#"-->
                             <!--   class="text-sm text-muted text-primary-hover text-underline">Forgot password?</a></div>-->
                      
                           <input class="form-control" placeholder="Enter your password" type="password" name="password" id="password" />
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                    <?php if (isset($validation_errors) && !empty($validation_errors)): ?>
                        <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                    <?php endif; ?>
                           <!--end::Repeat Password-->
                        </div>
                        <!--end::Input group--->
                        <!--begin::Accept-->
                        
                         <div class="mb-5">
                        <div class="form-check"><input class="form-check-input" type="checkbox" name="check_example"
                                id="check_example"> <label class="form-check-label" for="check_example">Keep me logged
                                in</label></div>
                    </div>
                        <!--end::Accept-->
                        <!--begin::Submit button-->
                          <div><button type="submit" class="btn btn-dark w-100">Login</button></div>
                      
                        <!--end::Submit button-->
                      
                        <?= form_close() ?>
                     <!--end::Form--> 
                <!-- <div class="py-5 text-center"><span class="text-xs text-uppercase fw-semibold">or</span></div>
                <div class="row g-2">

                    <div class="col-sm-12"><a href="#" class="btn btn-neutral w-100"><span
                                class="icon icon-sm pe-2"><img src="https://goldbook1.soonx.co.in/assets/newui/img/social/google.svg" alt="...">
                            </span>Google</a></div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- <div
        class="d-flex align-items-center gap-2 position-fixed bottom-0 end-0 mb-6 me-6 px-2 py-2 rounded-pill shadow-4 bg-white z-2">
        <img src="https://webpixels.s3.eu-central-1.amazonaws.com/public/brand/dark-sm.svg" class="avatar avatar-xs"> <a
            href="https://webpixels.io/?ref=satoshi" class="me-1 text-heading fw-bold text-xs ls-tight stretched-link"
            target="_blank">Built by Webpixels</a>
    </div> -->
    <script src="../js/main.js"></script>
</body>
</html>