<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>KYC || Dashboard</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>
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
        <div class="app-page  flex-column  " id="kt_app_page">
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
                    <div class="row gy-5  m-auto justify-content-center">
                        <div class="col-xxxl-6">
 
                            <!--begin::Tables Widget 9-->
                            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">KYC Update</span>

                                        <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">Note - As part of the mandatory regulatory requirements and to ensure the security and authenticity of your account, we kindly request you to complete the KYC process by submitting the following document</div>
                                    </h3>
                                    <form class="m-auto" id="kyc-document">
                                        <div class=" d-flex gap-10">
                                        

                                            <div class="form-group d-flex flex-column mb-3 w-50">
                                                <div class="input-label mb-3">
                                                    <label for="panCard" class="fw-bold me-5 my-1 pb-3">Pan Card</label><?php
                                                                                                                        if (!empty($documents)) {
                                                                                                                            $panCardStatus = $documents['pan_card_status'];
                                                                                                                            $statusLabel = '';

                                                                                                                            if ($panCardStatus == 'Pending') {
                                                                                                                                $statusLabel = '<span class="badge badge-danger blink">Pending</span>';
                                                                                                                            } elseif ($panCardStatus == 'Rejected') {
                                                                                                                                $statusLabel = '<span class="badge badge-warning blink">Rejected</span>';
                                                                                                                            } else {
                                                                                                                                $statusLabel = '<span class="badge badge-success ">Approved</span>';
                                                                                                                            }

                                                                                                                            echo $statusLabel;
                                                                                                                        }
                                                                                                                        ?>
                                                    <input class="form-control" type="file" name="panCard" id="panCard" accept="image/*" onchange="previewImage('panCard', 'panCardPreview')" <?php echo (!empty($panCardStatus) && ($panCardStatus == 'Pending' || $panCardStatus == 'Approved')) ? 'disabled' : ''; ?>>
                                                    <div class="text-danger"></div>
                                                </div>
                                                <div class="image-preview form-control">
                                                    <img id="panCardPreview" src="<?= base_url()?>assets/img/pan-card.png" alt="Preview">
                                                </div>
                                            </div>

                                            <div class="form-group d-flex flex-column mb-3 w-50">
                                                <div class="input-label mb-3">
                                                    <label for="chequeBook" class="fw-bold me-5 my-1 pb-3">Cheque Book</label><?php
                                                                                                                                if (!empty($documents)) {
                                                                                                                                    $chequeBookStatus = $documents['cheque_book_status'];
                                                                                                                                    $statusLabel = '';

                                                                                                                                    if ($chequeBookStatus == 'Pending') {
                                                                                                                                        $statusLabel = '<span class="badge badge-danger blink">Pending</span>';
                                                                                                                                    } elseif ($chequeBookStatus == 'Rejected') {
                                                                                                                                        $statusLabel = '<span class="badge badge-warning blink">Rejected</span>';
                                                                                                                                    } else {
                                                                                                                                        $statusLabel = '<span class="badge badge-success ">Approved</span>';
                                                                                                                                    }

                                                                                                                                    echo $statusLabel;
                                                                                                                                }
                                                                                                                                ?>
                                                    <input class="form-control" type="file" name="chequeBook" id="chequeBook" accept="image/*" onchange="previewImage('chequeBook', 'chequeBookPreview')" <?php echo (!empty($chequeBookStatus) && ($chequeBookStatus == 'Pending' || $chequeBookStatus == 'Approved')) ? 'disabled' : ''; ?>>
                                                    <div class="text-danger"></div>
                                                </div>
                                                <div class="image-preview form-control">
                                                    <img id="chequeBookPreview" src="<?= base_url()?>assets/img/PASSBOOK.png" alt="Preview">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary text-center m-auto d-flex">Upload</button>
                                    </form>

                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body py-3">

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
    <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
</body>
<!--end::Body-->

</html>
<style>
    .image-preview img {
        height: 15em;
        width: 100%;
    }
</style>
<script>
    function previewImage(inputId, previewId) {
        var fileInput = document.getElementById(inputId);
        var previewImage = document.getElementById(previewId);

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        }

        reader.readAsDataURL(file);
    }

    $(document).ready(function() {
        $('#kyc-document').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var member_id = <?php echo json_encode($user_data['member_id']); ?>; // Get the member_id value and include it in the JavaScript code
            var formData = new FormData(this); // Get the form data
            formData.append('member_id', member_id); // Append the member_id to the form data
            $.ajax({
                url: baseurl + 'Ajax/kyc_process', // Replace with the URL to your server-side script
                type: 'POST', // HTTP method (POST in this case)
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    // Additional actions after successful form submission

                    if (response.status === 'error') {
                        // Clear previous error messages
                        $('.text-danger').text('');

                        // Display the error message for each file input
                        $.each(response.files, function(inputName, errorMessage) {
                            // Assuming the input fields have IDs matching the file input names (e.g., 'aadharFront', 'aadharBack', etc.)
                            $('#' + inputName).closest('.form-group').find('.text-danger').text(errorMessage);
                        });
                    } else {
                        // Clear the error messages if needed
                        $('.text-danger').text('');
                        console.log('KYC Document Submited Succsfully')
                        // Reload the page
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(error);
                }
            });
        });
    });
 <?php if (!empty($documents)) { ?>
    $(document).ready(function() {
        // Assuming the image URLs are provided in the response object
        var panCardImage = 'assets/uploads/kyc/<?php echo $documents['panCard']; ?>';
        var chequeBookImage = 'assets/uploads/kyc/<?php echo $documents['chequeBook']; ?>';

        // Placeholder image URL from Unsplash (You can replace this with any other URL)
        var placeholderImageURL = 'https://via.placeholder.com/200x150?text=Upload+Photo';

        if (panCardImage !== '') {
            $('#panCardPreview').attr('src', panCardImage);
        } else {
            $('#panCardPreview').attr('src', placeholderImageURL);
        }

        if (chequeBookImage !== '') {
            $('#chequeBookPreview').attr('src', chequeBookImage);
        } else {
            $('#chequeBookPreview').attr('src', placeholderImageURL);
        }
    });
<?php } ?>

</script>