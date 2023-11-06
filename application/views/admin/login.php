<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>Login || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
    
    
    <style>
        @media only screen and (max-width: 476px) {
            .adlogfour{
               padding:0 !important;
            }
            .adlogone{
                padding:0 !important;
            }
            .adlogtwo{
                padding:0 !important;
                width:100% !important;
                height: 425px;

            }
            .adlogwid{
                width:170% !important;
            }
            
        }

    </style>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
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

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('<?= base_url() ?>/assets/media/auth/bg10.jpeg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?= base_url() ?>/assets/media/auth/bg10-dark.jpeg');
            }
        </style>
        <!--end::Page bg image-->

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100 adlogfour">
                    <!--begin::Image-->
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= base_url() ?>assets/img/logo.png" alt="">
                    <!--end::Image-->

                    <!--begin::Title-->
                    <!--<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">-->
                    <!--    Fast, Efficient and Productive-->
                    <!--</h1>-->
                    <!--end::Title-->

                    
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->

            <!--begin::Body-->
             <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 adlogone">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10 adlogtwo">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px adlogthree">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <!--begin::Title-->
                            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7 ">
                                Admin Login
                            </h1>
                            <!--end::Title-->
                            <div class="text-gray-500 fw-semibold fs-4 w-100">
                           <?php
                                $msg = $this->session->flashdata('msg');
                                if (!empty($msg)) {
                                    echo '<div class="text-light text-center bg-danger pt-1 pb-1"> '. $msg .'</div>';
                                }
                            ?>
                            <?php if (isset($error_message) && !empty($error_message)): ?>
                                <div class="text-light text-center bg-danger pt-1 pb-1"><?= $error_message; ?></div>
                            <?php endif; ?>
                           </div>
                           
                            <!-- Add form open tag with form helper -->
                            <?php echo form_open('AdminAuth/login_process', 'class="form w-100 adlogwid" novalidate="novalidate" id="kt_sign_in_form"'); ?>

                            <!-- Add form validation errors -->


                            <div class="text-center mb-11">
                                <!-- Add title or heading if needed -->
                            </div>

                            <!-- Email field with form helper -->
                            <div class="fv-row mb-8">
                                <?php
                                $email_attributes = array(
                                    'type' => 'text',
                                    'placeholder' => 'Username',
                                    'name' => 'email',
                                    'autocomplete' => 'off',
                                    'class' => 'form-control bg-transparent',
                                    'value' => set_value('email', isset($email) ? $email : '') // Update this line
                                );
                                echo form_input($email_attributes);
                                ?>
                                <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <!-- Print email validation error -->


                            <!-- Password field with form helper -->
                            <div class="fv-row mb-8">
                                <?php
                                $password_attributes = array(
                                    'type' => 'password',
                                    'placeholder' => 'Password',
                                    'name' => 'password',
                                    'autocomplete' => 'off',
                                    'class' => 'form-control bg-transparent',
                                    'value' => set_value('password', isset($password) ? $password : '') // Update this line
                                );
                                echo form_input($password_attributes);
                                ?>
                                <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <!-- Print password validation error -->


                            <div class="d-grid mb-10">
                                <!-- Submit button with form helper -->
                                <?php
                                $submit_attributes = array(
                                    'type' => 'submit',
                                    'id' => 'kt_sign_in_submit',
                                    'class' => 'btn btn-primary'
                                );
                                echo form_button($submit_attributes, 'Sign In');
                                ?>
                            </div>

                            <?php echo form_close(); ?>


                        </div>
                        <!--end::Wrapper-->

                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "/metronic8/demo1/assets/";
    </script>

    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
</body>
<!--end::Body-->

</html>