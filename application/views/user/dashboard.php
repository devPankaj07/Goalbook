<!doctype html>
<html lang="en" data-theme="light">


<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Gold Book</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/newui/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/newui/css/utility.css">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/newui/img/logos/fav-gb.png">
    <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/bootstrap-icons%401.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f=satoshi@900,700,500,300,401,400&amp;display=swap">
    <script defer="defer" data-domain="webpixels.works" src="../plausible.io/js/script.outbound-links.js"></script>
</head>

<body class="bg-body-tertiary">
    <div class="d-flex flex-column flex-lg-row h-lg-100 gap-1">
        <?php include 'sidebar.php'; ?>

        <div class="flex-lg-fill overflow-x-auto ps-lg-1 vstack vh-lg-100 position-relative">

            <?php include 'header.php'; ?>
            
            <div class="flex-fill overflow-y-lg-auto scrollbar ">
                <main class="container-fluid px-3 py-5 p-lg-6 p-xxl-8">
                    <div class="mb-6 mb-xl-10">
                        <div class="row g-3 align-items-center">
                            <div class="col">

                            </div>

                        </div>

                        <div class="row g-3 main-card ">
                            <div class="col-md-3 col-sm-3  col-xs-12">
                                <div class="">
                                    <div class="card-body p-6">
                                        <h4 class="">Good Morning ,<span class="name-from-db"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?></span></h2>
                                            <p class="">Choose Your Goals Wisely </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="card border-primary-hover border-0 referal-box">
                                    <div class="card-body p-4  ">
                                        <div class="d-flex gap-2 mb-1">
                                            <h4 class="">Refer & Progress</h4>
                                            <h3 class="text-success">ID Code : G123456 </h3>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mt-1 text-xs">
                                            <div class="input-container">
                                                <input required="" value="<?= base_url() . 'registration?sponsorid=' . $user_data['member_id'] ?>" type="email">
                                                <button class="invite-btn" type="button">
                                                    Share
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="card border-primary-hover border-0 Community">
                                    <div class="card-body p-4 Community">
                                        <h4 class="">My Community</h4>
                                        <div
                                            class="d-flex justify-content-between align-items-center gap-2 mt-1 text-xs">
                                            <div class="text-lg fw-semibold mt-3">
                                                <h1 class="display-3">78</h1>
                                            </div>
                                            <div class="input-container view">
                                                <input required="" value="555" type="number">
                                                <button class="invite-btn" type="button">
                                                    View
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 ">
                                <div class="card border-0 badge">
                                    <div class="card-body p-4">
                                        <div class="d-flex gap-2">
                                            <div class=" d-flex justify-content-center verify-image">
                                                <img src="<?php echo base_url(); ?>assets/newui/img/badges/approved.png" class="" alt="..." />
                                            </div>
                                            <span>We trust your goal</span>
                                            <img src="<?php echo base_url(); ?>assets/newui/img/logos/logo.png" alt="">

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>

                    <div class="row g-3 g-xxl-6">
                        <div class="col-xxl-12">
                            <div class="vstack main-content gap-3 gap-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="px-4">My Dream Tracking</h2>
                                    </div>
                                </div>
                                <div class="card border-0 ">
                                    <div class="card-body ">

                                        <div class="row g-3">
                                            <div class="col-md-3 col-lg-4  col-xl-12 product-card">
                                                <div class="card border-0 border-primary-hover">

                                                    <div class="card-body p-4">
                                                        <div class="d-flex  gap-2">
                                                            <img src="<?php echo base_url(); ?>assets/newui/img/product/product1.png"
                                                                class="w-rem-32 flex-none" alt="..." />
                                                            <div class="product-title">
                                                                <a href="javascript:void(0);">Toyota innova crysta</a>
                                                                <h3>2,40,00,00</h3>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="col-md-3">
                                                            <div class="text-sm fw-semibold  text-secondary">
                                                                &#127881;Congratulations!!!
                                                                You did it
                                                            </div>
                                                            <div class="text-lg fw-semibold  text-success">35
                                                                Days
                                                                Remaining
                                                            </div>
                                                            <div class="text-sm fw-semibold w-lg-75">
                                                                <span>
                                                                    Your Dream Car Innova Crysta is only
                                                                    <br> <span class="text-success">45 days</span> away
                                                                    from you
                                                                </span>

                                                            </div>
                                                            <div class="progressbar align-items-center d-flex">
                                                                <div class="progress ">
                                                                    <div class="progress-bar bg-success m-2"
                                                                        role="progressbar" style="width: 85%"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                                <div class="range">
                                                                    <p class="">
                                                                        85%
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-3 col-sm-6 col-xl-3 product-card">
                                                <div class="card border-primary-hover">
                                                    <div class="card-body p-4">
                                                        <div class="d-flex  gap-2">
                                                            <img src="<?php echo base_url(); ?>assets/newui/img/product/product1.png"
                                                                class="w-rem-32 flex-none" alt="..." />
                                                            <div class="product-title">
                                                                <a href="javascript:void(0);" class="fw-600">Toyota
                                                                    innova crysta</a>
                                                                <h3 class="text-md">2,40,00,00</h3>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="col-md-3">
                                                            <div class="text-sm fw-semibold  text-secondary">
                                                                &#127881;Congratulations!!!
                                                                You did it
                                                            </div>
                                                            <div class="text-lg fw-semibold  text-success">35
                                                                Days
                                                                Remaining
                                                            </div>
                                                            <div class="text-sm fw-semibold w-lg-75">
                                                                <span>
                                                                    Your Dream Car Innova Crysta is only
                                                                    <br> <span class="text-success">45 days</span> away
                                                                    from you
                                                                </span>

                                                            </div>
                                                            <div class="progressbar align-items-center d-flex">
                                                                <div class="progress ">
                                                                    <div class="progress-bar bg-success m-2"
                                                                        role="progressbar" style="width: 85%"
                                                                        aria-valuenow="85" aria-valuemin="0"
                                                                        aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                                <div class="range">
                                                                    <p class="">
                                                                        85%
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-4 col-md-4">
                                        <div class="card">
                                            <div class="card-body product-list pb-0">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="product-list-head">
                                                        <h2 class="">Let's</h2>
                                                        <h2>Start</h2>
                                                    </div>

                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="product-list-subhead">
                                                        <p class="text-md">Prashant Tawde , Set your goals now</p>
                                                    </div>

                                                </div>

                                                <div class="search">
                                                    <input type="search" class="form-control"
                                                        placeholder="Seach Money Goal" aria-label="Search" />
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </div>


                                                <div class="container">
                                                    <div id="main-section">
                                                        <div class="row">
                                                        <?php foreach ($maincat_data  as $value) { ?>
                                                         <div class="col-md-4 col-xs-4 p-1 " >

     
                                                                <div class="card my-2">
                                                                    <?php if (!empty($value['ph_image'])) { ?>
                                                                        <div class="uploaded-img">
                                                                            <img class="card-img-top py-1"
                                                                                src="<?= base_url('assets/uploads/categoryimage/' . $value['ph_image']) ?>"
                                                                                alt="Card image cap" />
                                                                        </div>
                                                                    <?php } ?>
                                                
                                                                    <div class="card-body p-2">
                                                                        <h5 class="card-title text-center"><?= $value['name']; ?> </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                      <div class="hide " id="subsection-1">
                                                        <i class="fa-solid fa-arrow-left"></i>
                                                        <div class="row ">
                                                       <?php foreach ($subcat_data as  $value) { ?>
                                                                    <div class="col-md-4 col-xs-4 p-1  " data-main-category="<?= $value['mainid']; ?>">
                                                                          <div class="card my-2">
                                                                    <?php if (!empty($value['sub_image'])) { ?>
                                                                        <div class="uploaded-img">
                                                                            <img class="card-img-top py-1"
                                                                                src="<?= base_url('assets/uploads/categoryimage/' . $value['sub_image']) ?>"
                                                                                alt="Card image cap" />
                                                                        </div>
                                                                    <?php } ?>
                                                
                                                                    <div class="card-body p-2">
                                                                        <h5 class="card-title text-center"><?= $value['subname']; ?> </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class=" hide" id="subsection-2">
                                                        <i class="fa-solid fa-arrow-left"></i>

                                                        <div class="row ">
                                                            <?php foreach ($childcat_data as $value) { ?>
                                                            <div class="col-md-4 col-xs-4 p-1">
                                                                <div class="card my-2">
                                                                    <?php if (!empty($value['child_image'])) { ?>
                                                                        <div class="uploaded-img">
                                                                            <img class="card-img-top py-1"
                                                                                src="<?= base_url('assets/uploads/categoryimage/' . $value['child_image']) ?>"
                                                                                alt="Card image cap" />
                                                                        </div>
                                                                    <?php } ?>
                                                
                                                                    <div class="card-body p-2">
                                                                        <h5 class="card-title text-center"><?= $value['childname']; ?> </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class=" hide" id="subsection-3">
                                                        <i class="fa-solid fa-arrow-left"></i>

                                                        <div class="row">

                                                          
                                                            <form action="add_ccform_cat" method="post" id="addccformdata">
                                                                <div class="mb-3">
                                                                    <div>
                                                                        <?php foreach ($ccformscat_data as $value) { ?>
                                                                            <label for="textarea_<?= $value['id']; ?>" class="form-label">- <?= $value['questions']; ?></label>
                                                                            <textarea name="textarea_<?= $value['id']; ?>" class="form-control" rows="3" id="textarea_<?= $value['id'];?>"></textarea>
                                                                        <?php } ?>
                                                                    </div>
                                                            
                                                                  
                                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                            
                                                                    <div class="d-flex justify-content-center py-2">
                                                                        <button type="submit" class="btn text-white rounded-pill" style="background-color: #49a44c">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>


                                                        </div>
                                                       
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 col-md-4">
                                        <div class="card">
                                            <div class="card-body product-list pb-0">
                                                <div class="">
                                                    <div class="product-list-head">
                                                        <h2 class="">My</h2>
                                                        <h2 class="">Goal Preview</h2>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="product-list-subhead">
                                                            <p class="text-md"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?> , Set your goals now</p>
                                                        </div>

                                                    </div>
                                                    <div class="product-list-head-2">
                                                        <p class="">After editing here, the change will be applied to
                                                            the pdf, allowing you to download the most most up-to-date
                                                            version.</p>

                                                    </div>

                                                </div>

                                                <div class="row g-3">
                                                    <div class=" col-xl-12 product-card">
                                                        <div class="card border-0 border-primary-hover">

                                                            <div class="card-body p-4">
                                                                <div class="d-flex   gap-2">
                                                                    <img src="<?php echo base_url(); ?>assets/newui/img/product/product1.png"
                                                                        class="w-rem-24 flex-none" alt="..." />
                                                                    <div class="product-title">
                                                                        <div class="image">
                                                                            <a href="javascript:void(0);">Toyota innova
                                                                                crysta</a>
                                                                            <img src="<?php echo base_url(); ?>assets/newui/img/badges/approved.png"
                                                                                alt="" />
                                                                        </div>
                                                                        <h3>2,40,00,00</h3>
                                                                    </div>
                                                                </div>
                                                                <hr />
                                                                <div class="col-md-3">
                                                                    <div class="text-sm fw-semibold  text-secondary">
                                                                        &#127881;Congratulations!!!
                                                                        You did it
                                                                    </div>
                                                                    <div class="text-lg fw-semibold  text-success">35
                                                                        Days
                                                                        Remaining
                                                                    </div>
                                                                    <div class="text-sm fw-semibold">
                                                                        <span>
                                                                            Your Dream Car Innova Crysta is only
                                                                            <br> <span class="text-success">45
                                                                                days</span> away
                                                                            from you
                                                                        </span>

                                                                    </div>
                                                                    <div class="progressbar align-items-center d-flex">
                                                                        <div class="progress ">
                                                                            <div class="progress-bar bg-success m-2"
                                                                                role="progressbar" style="width: 85%"
                                                                                aria-valuenow="85" aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="range">
                                                                            <p class="">
                                                                                85%
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer  d-flex">
                                                                        <ul>
                                                                            <li>
                                                                                Everyday imagine that you are driving
                                                                                innova
                                                                            </li>
                                                                            <li>
                                                                                Feel that you are breaking and racing
                                                                                innova
                                                                            </li>
                                                                            <li>
                                                                                <?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?>, I trust you you will achieve
                                                                                innova on 15 feb 2023
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="editing-box">
                                                                        <div class="action-btn">
                                                                            <div class="card">
                                                                                <ul
                                                                                    class="d-flex justify-content-between ">
                                                                                    <li> <i class="bi bi-pencil"></i>
                                                                                    </li>
                                                                                    <li><i class="bi bi-trash"></i></li>
                                                                                    <li><i class="bi bi-check"></i></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-3 col-sm-6 col-xl-3 product-card">
                                                        <div class="card border-primary-hover">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex  gap-2">
                                                                    <img src="<?php echo base_url(); ?>assets/newui/img/product/product1.png"
                                                                        class="w-rem-32 flex-none" alt="..." />
                                                                    <div class="product-title">
                                                                        <a href="javascript:void(0);" class="fw-600">Toyota
                                                                            innova crysta</a>
                                                                        <h3 class="text-md">2,40,00,00</h3>
                                                                    </div>
                                                                </div>
                                                                <hr />
                                                                <div class="col-md-3">
                                                                    <div class="text-sm fw-semibold  text-secondary">
                                                                        &#127881;Congratulations!!!
                                                                        You did it
                                                                    </div>
                                                                    <div class="text-lg fw-semibold  text-success">35
                                                                        Days
                                                                        Remaining
                                                                    </div>
                                                                    <div class="text-sm fw-semibold w-lg-75">
                                                                        <span>
                                                                            Your Dream Car Innova Crysta is only
                                                                            <br> <span class="text-success">45 days</span> away
                                                                            from you
                                                                        </span>
        
                                                                    </div>
                                                                    <div class="progressbar align-items-center d-flex">
                                                                        <div class="progress ">
                                                                            <div class="progress-bar bg-success m-2"
                                                                                role="progressbar" style="width: 85%"
                                                                                aria-valuenow="85" aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="range">
                                                                            <p class="">
                                                                                85%
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
        
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 col-md-4">
                                        <div class="card">
                                            <div class="card-body product-list pb-0">
                                                <div class="">
                                                    <div class="product-list-head">
                                                        <h2 class="">My</h2>
                                                        <h2 class="">PDF Preview</h2>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="product-list-subhead">
                                                            <p class="text-md"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?>, Set your goals now</p>
                                                        </div>

                                                    </div>
                                                    <div class="product-list-head-2">


                                                    </div>

                                                </div>

                                                <div class="row g-3">
                                                    <div class=" col-xl-12 product-card">
                                                        <div class="card border-0 border-primary-hover">

                                                            <div class="card-body p-4">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>


    <div class="toast">
        <canvas height="1" id="confetti" width="1"></canvas>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 ">
                <div class="T-container">
                    <div class="d-flex p-0 justify-content-between">
                        <div class="left">
                            <div class="popper">
                                <img src="<?php echo base_url(); ?>assets/newui/img/logos/confetti.gif" class="w-rem-8" alt="">
                            </div>
                        </div>
                        <div class="middle">
                            <div class="d-flex">
                                <h6 class="mx-1">Welcome to mygoalbook</h6>
                                <img src="<?php echo base_url(); ?>assets/newui/img/logos/sparkles.svg" class="w-rem-5 " alt="">
                            </div>
                            <h4 class="mx-1"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?></h4>
                        </div>
<div class="right">
                            <div class="amount">
                                <h5>$10</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.main-category-card').click(function () {
            $('.sub-category-card').hide();
            var mainCategoryID = $(this).find('.sub-category-card').data('main-category');
            $('.sub-category-card[data-main-category="' + mainCategoryID + '"]').show();
        });
    });
</script>





   <script>
                    // Function to handle the "Save changes" button click
           $(document).ready(function() {
      $('#addccformdata').submit(function(e) {
         e.preventDefault(); // Prevent the default form submission

         var formData = new FormData(this); // Get the form data
         console.log(formData)

            $.ajax({
            url: baseurl + 'Main/add_ccform_cat', // URL to submit the form data
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
                     window.location.href = baseurl + 'Main/dashboard';
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
        var retina = window.devicePixelRatio,

            // Math shorthands
            PI = Math.PI,
            sqrt = Math.sqrt,
            round = Math.round,
            random = Math.random,
            cos = Math.cos,
            sin = Math.sin,

            // Local WindowAnimationTiming interface
            rAF = window.requestAnimationFrame,
            cAF = window.cancelAnimationFrame || window.cancelRequestAnimationFrame,
            _now = Date.now || function () { return new Date().getTime(); };

        // Local WindowAnimationTiming interface polyfill
        (function (w) {
            /**
                        * Fallback implementation.
                        */
            var prev = _now();
            function fallback(fn) {
                var curr = _now();
                var ms = Math.max(0, 16 - (curr - prev));
                var req = setTimeout(fn, ms);
                prev = curr;
                return req;
            }

            /**
                        * Cancel.
                        */
            var cancel = w.cancelAnimationFrame
                || w.webkitCancelAnimationFrame
                || w.clearTimeout;

            rAF = w.requestAnimationFrame
                || w.webkitRequestAnimationFrame
                || fallback;

            cAF = function (id) {
                cancel.call(w, id);
            };
        }(window));

        document.addEventListener("DOMContentLoaded", function () {
            var speed = 50,
                duration = (1.0 / speed),
                confettiRibbonCount = 11,
                ribbonPaperCount = 30,
                ribbonPaperDist = 8.0,
                ribbonPaperThick = 8.0,
                confettiPaperCount = 95,
                DEG_TO_RAD = PI / 180,
                RAD_TO_DEG = 180 / PI,
                colors = [
                    ["#df0049", "#660671"],
                    ["#00e857", "#005291"],
                    ["#2bebbc", "#05798a"],
                    ["#ffd200", "#b06c00"]
                ];

            function Vector2(_x, _y) {
                this.x = _x, this.y = _y;
                this.Length = function () {
                    return sqrt(this.SqrLength());
                }
                this.SqrLength = function () {
                    return this.x * this.x + this.y * this.y;
                }
                this.Add = function (_vec) {
                    this.x += _vec.x;
                    this.y += _vec.y;
                }
                this.Sub = function (_vec) {
                    this.x -= _vec.x;
                    this.y -= _vec.y;
                }
                this.Div = function (_f) {
                    this.x /= _f;
                    this.y /= _f;
                }
                this.Mul = function (_f) {
                    this.x *= _f;
                    this.y *= _f;
                }
                this.Normalize = function () {
                    var sqrLen = this.SqrLength();
                    if (sqrLen != 0) {
                        var factor = 1.0 / sqrt(sqrLen);
                        this.x *= factor;
                        this.y *= factor;
                    }
                }
                this.Normalized = function () {
                    var sqrLen = this.SqrLength();
                    if (sqrLen != 0) {
                        var factor = 1.0 / sqrt(sqrLen);
                        return new Vector2(this.x * factor, this.y * factor);
                    }
                    return new Vector2(0, 0);
                }
            }
            Vector2.Lerp = function (_vec0, _vec1, _t) {
                return new Vector2((_vec1.x - _vec0.x) * _t + _vec0.x, (_vec1.y - _vec0.y) * _t + _vec0.y);
            }
            Vector2.Distance = function (_vec0, _vec1) {
                return sqrt(Vector2.SqrDistance(_vec0, _vec1));
            }
            Vector2.SqrDistance = function (_vec0, _vec1) {
                var x = _vec0.x - _vec1.x;
                var y = _vec0.y - _vec1.y;
                return (x * x + y * y + z * z);
            }
            Vector2.Scale = function (_vec0, _vec1) {
                return new Vector2(_vec0.x * _vec1.x, _vec0.y * _vec1.y);
            }
            Vector2.Min = function (_vec0, _vec1) {
                return new Vector2(Math.min(_vec0.x, _vec1.x), Math.min(_vec0.y, _vec1.y));
            }
            Vector2.Max = function (_vec0, _vec1) {
                return new Vector2(Math.max(_vec0.x, _vec1.x), Math.max(_vec0.y, _vec1.y));
            }
            Vector2.ClampMagnitude = function (_vec0, _len) {
                var vecNorm = _vec0.Normalized;
                return new Vector2(vecNorm.x * _len, vecNorm.y * _len);
            }
            Vector2.Sub = function (_vec0, _vec1) {
                return new Vector2(_vec0.x - _vec1.x, _vec0.y - _vec1.y, _vec0.z - _vec1.z);
            }

            function EulerMass(_x, _y, _mass, _drag) {
                this.position = new Vector2(_x, _y);
                this.mass = _mass;
                this.drag = _drag;
                this.force = new Vector2(0, 0);
                this.velocity = new Vector2(0, 0);
                this.AddForce = function (_f) {
                    this.force.Add(_f);
                }
                this.Integrate = function (_dt) {
                    var acc = this.CurrentForce(this.position);
                    acc.Div(this.mass);
                    var posDelta = new Vector2(this.velocity.x, this.velocity.y);
                    posDelta.Mul(_dt);
                    this.position.Add(posDelta);
                    acc.Mul(_dt);
                    this.velocity.Add(acc);
                    this.force = new Vector2(0, 0);
                }
                this.CurrentForce = function (_pos, _vel) {
                    var totalForce = new Vector2(this.force.x, this.force.y);
                    var speed = this.velocity.Length();
                    var dragVel = new Vector2(this.velocity.x, this.velocity.y);
                    dragVel.Mul(this.drag * this.mass * speed);
                    totalForce.Sub(dragVel);
                    return totalForce;
                }
            }

            function ConfettiPaper(_x, _y) {
                this.pos = new Vector2(_x, _y);
                this.rotationSpeed = (random() * 600 + 800);
                this.angle = DEG_TO_RAD * random() * 360;
                this.rotation = DEG_TO_RAD * random() * 360;
                this.cosA = 1.0;
                this.size = 5.0;
                this.oscillationSpeed = (random() * 1.5 + 0.5);
                this.xSpeed = 40.0;
                this.ySpeed = (random() * 60 + 50.0);
                this.corners = new Array();
                this.time = random();
                var ci = round(random() * (colors.length - 1));
                this.frontColor = colors[ci][0];
                this.backColor = colors[ci][1];
                for (var i = 0; i < 4; i++) {
                    var dx = cos(this.angle + DEG_TO_RAD * (i * 90 + 45));
                    var dy = sin(this.angle + DEG_TO_RAD * (i * 90 + 45));
                    this.corners[i] = new Vector2(dx, dy);
                }
                this.Update = function (_dt) {
                    this.time += _dt;
                    this.rotation += this.rotationSpeed * _dt;
                    this.cosA = cos(DEG_TO_RAD * this.rotation);
                    this.pos.x += cos(this.time * this.oscillationSpeed) * this.xSpeed * _dt
                    this.pos.y += this.ySpeed * _dt;
                    if (this.pos.y > ConfettiPaper.bounds.y) {
                        this.pos.x = random() * ConfettiPaper.bounds.x;
                        this.pos.y = 0;
                    }
                }
                this.Draw = function (_g) {
                    if (this.cosA > 0) {
                        _g.fillStyle = this.frontColor;
                    } else {
                        _g.fillStyle = this.backColor;
                    }
                    _g.beginPath();
                    _g.moveTo((this.pos.x + this.corners[0].x * this.size) * retina, (this.pos.y + this.corners[0].y * this.size * this.cosA) * retina);
                    for (var i = 1; i < 4; i++) {
                        _g.lineTo((this.pos.x + this.corners[i].x * this.size) * retina, (this.pos.y + this.corners[i].y * this.size * this.cosA) * retina);
                    }
                    _g.closePath();
                    _g.fill();
                }
            }
            ConfettiPaper.bounds = new Vector2(0, 0);

            function ConfettiRibbon(_x, _y, _count, _dist, _thickness, _angle, _mass, _drag) {
                this.particleDist = _dist;
                this.particleCount = _count;
                this.particleMass = _mass;
                this.particleDrag = _drag;
                this.particles = new Array();
                var ci = round(random() * (colors.length - 1));
                this.frontColor = colors[ci][0];
                this.backColor = colors[ci][1];
                this.xOff = (cos(DEG_TO_RAD * _angle) * _thickness);
                this.yOff = (sin(DEG_TO_RAD * _angle) * _thickness);
                this.position = new Vector2(_x, _y);
                this.prevPosition = new Vector2(_x, _y);
                this.velocityInherit = (random() * 2 + 4);
                this.time = random() * 100;
                this.oscillationSpeed = (random() * 2 + 2);
                this.oscillationDistance = (random() * 40 + 40);
                this.ySpeed = (random() * 40 + 80);
                for (var i = 0; i < this.particleCount; i++) {
                    this.particles[i] = new EulerMass(_x, _y - i * this.particleDist, this.particleMass, this.particleDrag);
                }
                this.Update = function (_dt) {
                    var i = 0;
                    this.time += _dt * this.oscillationSpeed;
                    this.position.y += this.ySpeed * _dt;
                    this.position.x += cos(this.time) * this.oscillationDistance * _dt;
                    this.particles[0].position = this.position;
                    var dX = this.prevPosition.x - this.position.x;
                    var dY = this.prevPosition.y - this.position.y;
                    var delta = sqrt(dX * dX + dY * dY);
                    this.prevPosition = new Vector2(this.position.x, this.position.y);
                    for (i = 1; i < this.particleCount; i++) {
                        var dirP = Vector2.Sub(this.particles[i - 1].position, this.particles[i].position);
                        dirP.Normalize();
                        dirP.Mul((delta / _dt) * this.velocityInherit);
                        this.particles[i].AddForce(dirP);
                    }
                    for (i = 1; i < this.particleCount; i++) {
                        this.particles[i].Integrate(_dt);
                    }
                    for (i = 1; i < this.particleCount; i++) {
                        var rp2 = new Vector2(this.particles[i].position.x, this.particles[i].position.y);
                        rp2.Sub(this.particles[i - 1].position);
                        rp2.Normalize();
                        rp2.Mul(this.particleDist);
                        rp2.Add(this.particles[i - 1].position);
                        this.particles[i].position = rp2;
                    }
                    if (this.position.y > ConfettiRibbon.bounds.y + this.particleDist * this.particleCount) {
                        this.Reset();
                    }
                }
                this.Reset = function () {
                    this.position.y = -random() * ConfettiRibbon.bounds.y;
                    this.position.x = random() * ConfettiRibbon.bounds.x;
                    this.prevPosition = new Vector2(this.position.x, this.position.y);
                    this.velocityInherit = random() * 2 + 4;
                    this.time = random() * 100;
                    this.oscillationSpeed = random() * 2.0 + 1.5;
                    this.oscillationDistance = (random() * 40 + 40);
                    this.ySpeed = random() * 40 + 80;
                    var ci = round(random() * (colors.length - 1));
                    this.frontColor = colors[ci][0];
                    this.backColor = colors[ci][1];
                    this.particles = new Array();
                    for (var i = 0; i < this.particleCount; i++) {
                        this.particles[i] = new EulerMass(this.position.x, this.position.y - i * this.particleDist, this.particleMass, this.particleDrag);
                    }
                }
                this.Draw = function (_g) {
                    for (var i = 0; i < this.particleCount - 1; i++) {
                        var p0 = new Vector2(this.particles[i].position.x + this.xOff, this.particles[i].position.y + this.yOff);
                        var p1 = new Vector2(this.particles[i + 1].position.x + this.xOff, this.particles[i + 1].position.y + this.yOff);
                        if (this.Side(this.particles[i].position.x, this.particles[i].position.y, this.particles[i + 1].position.x, this.particles[i + 1].position.y, p1.x, p1.y) < 0) {
                            _g.fillStyle = this.frontColor;
                            _g.strokeStyle = this.frontColor;
                        } else {
                            _g.fillStyle = this.backColor;
                            _g.strokeStyle = this.backColor;
                        }
                        if (i == 0) {
                            _g.beginPath();
                            _g.moveTo(this.particles[i].position.x * retina, this.particles[i].position.y * retina);
                            _g.lineTo(this.particles[i + 1].position.x * retina, this.particles[i + 1].position.y * retina);
                            _g.lineTo(((this.particles[i + 1].position.x + p1.x) * 0.5) * retina, ((this.particles[i + 1].position.y + p1.y) * 0.5) * retina);
                            _g.closePath();
                            _g.stroke();
                            _g.fill();
                            _g.beginPath();
                            _g.moveTo(p1.x * retina, p1.y * retina);
                            _g.lineTo(p0.x * retina, p0.y * retina);
                            _g.lineTo(((this.particles[i + 1].position.x + p1.x) * 0.5) * retina, ((this.particles[i + 1].position.y + p1.y) * 0.5) * retina);
                            _g.closePath();
                            _g.stroke();
                            _g.fill();
                        } else if (i == this.particleCount - 2) {
                            _g.beginPath();
                            _g.moveTo(this.particles[i].position.x * retina, this.particles[i].position.y * retina);
                            _g.lineTo(this.particles[i + 1].position.x * retina, this.particles[i + 1].position.y * retina);
                            _g.lineTo(((this.particles[i].position.x + p0.x) * 0.5) * retina, ((this.particles[i].position.y + p0.y) * 0.5) * retina);
                            _g.closePath();
                            _g.stroke();
                            _g.fill();
                            _g.beginPath();
                            _g.moveTo(p1.x * retina, p1.y * retina);
                            _g.lineTo(p0.x * retina, p0.y * retina);
                            _g.lineTo(((this.particles[i].position.x + p0.x) * 0.5) * retina, ((this.particles[i].position.y + p0.y) * 0.5) * retina);
                            _g.closePath();
                            _g.stroke();
                            _g.fill();
                        } else {
                            _g.beginPath();
                            _g.moveTo(this.particles[i].position.x * retina, this.particles[i].position.y * retina);
                            _g.lineTo(this.particles[i + 1].position.x * retina, this.particles[i + 1].position.y * retina);
                            _g.lineTo(p1.x * retina, p1.y * retina);
                            _g.lineTo(p0.x * retina, p0.y * retina);
                            _g.closePath();
                            _g.stroke();
                            _g.fill();
                        }
                    }
                }
                this.Side = function (x1, y1, x2, y2, x3, y3) {
                    return ((x1 - x2) * (y3 - y2) - (y1 - y2) * (x3 - x2));
                }
            }
            ConfettiRibbon.bounds = new Vector2(0, 0);
            confetti = {};
            confetti.Context = function (id) {
                var i = 0;
                var canvas = document.getElementById(id);
                var canvasParent = canvas.parentNode;
                var canvasWidth = canvasParent.offsetWidth;
                var canvasHeight = canvasParent.offsetHeight;
                canvas.width = canvasWidth * retina;
                canvas.height = canvasHeight * retina;
                var context = canvas.getContext('2d');
                var interval = null;
                var confettiRibbons = new Array();
                ConfettiRibbon.bounds = new Vector2(canvasWidth, canvasHeight);
                for (i = 0; i < confettiRibbonCount; i++) {
                    confettiRibbons[i] = new ConfettiRibbon(random() * canvasWidth, -random() * canvasHeight * 2, ribbonPaperCount, ribbonPaperDist, ribbonPaperThick, 45, 1, 0.05);
                }
                var confettiPapers = new Array();
                ConfettiPaper.bounds = new Vector2(canvasWidth, canvasHeight);
                for (i = 0; i < confettiPaperCount; i++) {
                    confettiPapers[i] = new ConfettiPaper(random() * canvasWidth, random() * canvasHeight);
                }
                this.resize = function () {
                    canvasWidth = canvasParent.offsetWidth;
                    canvasHeight = canvasParent.offsetHeight;
                    canvas.width = canvasWidth * retina;
                    canvas.height = canvasHeight * retina;
                    ConfettiPaper.bounds = new Vector2(canvasWidth, canvasHeight);
                    ConfettiRibbon.bounds = new Vector2(canvasWidth, canvasHeight);
                }
                this.start = function () {
                    this.stop()
                    var context = this;
                    this.update();
                }
                this.stop = function () {
                    cAF(this.interval);
                }
                this.update = function () {
                    var i = 0;
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    for (i = 0; i < confettiPaperCount; i++) {
                        confettiPapers[i].Update(duration);
                        confettiPapers[i].Draw(context);
                    }
                    for (i = 0; i < confettiRibbonCount; i++) {
                        confettiRibbons[i].Update(duration);
                        confettiRibbons[i].Draw(context);
                    }
                    this.interval = rAF(function () {
                        confetti.update();
                    });
                }
            }
            var confetti = new confetti.Context('confetti');
            confetti.start();
            window.addEventListener('resize', function (event) {
                confetti.resize();

            });
        });

    </script>
<script>
        const clickbtn1 = document.querySelectorAll('#main-section .card');
        const clickbtn2 = document.querySelectorAll('#subsection-1 .card');
        const clickbtn3 = document.querySelectorAll('#subsection-2 .card');
        const clickbtn4 = document.querySelectorAll('#subsection-3 .card');
        const back1 = document.querySelector('#subsection-1 i');
        const back2 = document.querySelector('#subsection-2 i');
        const back3 = document.querySelector('#subsection-3 i');
        const section1 = document.getElementById('main-section');
        const section2 = document.getElementById('subsection-1');
        const section3 = document.getElementById('subsection-2');
        const section4 = document.getElementById('subsection-3');
        const counts1 = clickbtn1.length;
        const counts2 = clickbtn2.length;
        const counts3 = clickbtn3.length;
        const counts4 = clickbtn4.length;

        const prevSec1 = () =>{
            section2.classList.add("hide")
            section1.classList.remove("hide");
            section1.classList.add("display"); 
        }
        const prevSec2 = () =>{
            section3.classList.add("hide")
            section2.classList.remove("hide");
            section2.classList.add("display"); 
        }
        const prevSec3 = () =>{
            section4.classList.add("hide")
            section3.classList.remove("hide");
            section3.classList.add("display"); 
        }

        
        // console.log(clickbtn);
        
        const hideSection1 = () => {
            section1.classList.add("hide")
            section2.classList.remove("hide");
            section2.classList.add("display");


        }
        const hideSection2 = () => {
            section2.classList.add("hide")
            section3.classList.remove("hide");
            section3.classList.add("display");

        }
        const hideSection3 = () => {
            section3.classList.add("hide")
            section4.classList.remove("hide");
            section4.classList.add("display");

        }

        
        for (var i = 0; i < counts1; i++) {
            clickbtn1[i].addEventListener("click", hideSection1);
        }
        for (var i = 0; i < counts2; i++) {
            clickbtn2[i].addEventListener("click", hideSection2);
        }
        for (var i = 0; i < counts3; i++) {
            
            clickbtn3[i].addEventListener("click", hideSection3);
        }
        for (var i = 0; i < counts4; i++) {
            clickbtn4[i].addEventListener("click", hideSection4);
        }
        back1.addEventListener("click", prevSec1)
        back2.addEventListener("click", prevSec2)
        back3.addEventListener("click", prevSec3)

    </script>
      
<script>
 const clickbtn4 = document.querySelectorAll('#subsection-3 .card');
const back3 = document.querySelector('#subsection-3 i');
const section4 = document.getElementById('subsection-3');
const counts4 = clickbtn4.length;

const hideSection4 = () => {
    // Hide section 3 and show section 4
    section3.classList.add("hide");
    section4.classList.remove("hide");
    section4.classList.add("display");
}

for (var i = 0; i < counts4; i++) {
    clickbtn4[i].addEventListener("click", hideSection4);
}

back3.addEventListener("click", prevSec3); // Make sure `prevSec3` is defined elsewhere in your code

</script>

    <script>
        const toastContainer = document.querySelector(".T-container");
        const closeBtn = document.querySelector(".T-close");
        const toastLink = document.querySelector(".T-button");

        const hideToastFor30Days = () => {
            const currentDate = new Date();
            const expirationDate = new Date(currentDate.getTime() + 30 * 24 * 60 * 60 * 1000); // 30 days in milliseconds
            localStorage.setItem("toastExpirationDate", expirationDate.getTime());
            toastContainer.classList.remove("active");
        };

        if (!localStorage.getItem("toastExpirationDate") || new Date().getTime() > localStorage.getItem("toastExpirationDate")) {
            setTimeout(() => {
                toastContainer.classList.add("active");
            }, 1000);
        }

        // closeBtn.addEventListener("click", hideToastFor30Days);
        // toastLink.addEventListener("click", hideToastFor30Days);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tsparticles-engine@2/tsparticles.engine.min.js"></script>

    <script src="../../cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newui/js/main.js"></script>
     <!--<script src="../js/switcher.js"></script> -->
</body>

</html>