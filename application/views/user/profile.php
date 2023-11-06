<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>Profile || Dashboard</title>
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
    <!--<?php print_r($user_data) ?>-->
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
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Main-->
                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                        <!--begin::Header-->
                        <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="animation-duration: 0.3s;">
                            <div id="kt_app_toolbar_container" class="mb-5  container-xxl d-flex flex-stack ">


                                <!--end::Page title-->
                                <!--begin::Actions-->

                            </div>
                            <!--begin::Container-->
                            <div class=" container-xxl  d-flex align-items-center justify-content-between" id="kt_header_container">


                                <!--begin::Wrapper-->
                                <div class="d-flex d-lg-none align-items-center ms-n4 me-2">

                                    <!--begin::Aside mobile toggle-->
                                    
                                    <!--end::Aside mobile toggle-->

                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Toolbar wrapper-->
                                <div class="d-flex flex-shrink-0">

                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                           
                            <!--begin::Container-->
                            <div class=" container-xxxl " id="kt_content_container">

                                <!--begin::Navbar-->
                                <div class="card mb-5 mb-xl-">
                                    <div class="card-body pt-9 pb-0">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap flex-sm-nowrap">
                                            <!--begin: Pic-->
                                            <div class="me-7 mb-4">
                                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                                    <?php if (empty($user_data['profile_image'])) : ?>
                                                        <img src="<?= base_url('assets/img/persons.png') ?>" alt="User Profile">
                                                    <?php else : ?>
                                                        <img src="<?= base_url('assets/uploads/profile/' . $user_data['profile_image']) ?>" alt="User Profile">
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                            <!--end::Pic-->

                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <!--begin::Title-->
                                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                    <!--begin::User-->
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Name-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?></a>

                                                            <?php if ($user_data['user_status'] == 'Active') : ?>
                                                                <a href="#"><i class="ki-duotone ki-verify fs-1 text-success"><span class="path1"></span><span class="path2"></span></i></a>
                                                            <?php endif; ?>


                                                        </div>
                                                        <!--end::Name-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                                <i class="ki-duotone ki-profile-circle fs-4 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Member ID :- <?= $user_data['member_id'] ?>
                                                            </a>

                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->

                                                    <!--begin::Actions-->
                                                    <div class="d-flex my-4">

                                                        <div class="ip-adress">
                                                            <p class="btn-label fs-5 fw-semibold text-gray-800"> You Logged in with IP Address</p>
                                                            <h1 class="text-center text-success fw-bold my-0 fs-2"><?php // Function to get the client IP address
                                                                                                                    function get_client_ip()
                                                                                                                    {
                                                                                                                        $ipaddress = '';
                                                                                                                        if (isset($_SERVER['HTTP_CLIENT_IP']))
                                                                                                                            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                                                                                                                        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                                                                                                                            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                                                                                                        else if (isset($_SERVER['HTTP_X_FORWARDED']))
                                                                                                                            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                                                                                                                        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
                                                                                                                            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                                                                                                                        else if (isset($_SERVER['HTTP_FORWARDED']))
                                                                                                                            $ipaddress = $_SERVER['HTTP_FORWARDED'];
                                                                                                                        else if (isset($_SERVER['REMOTE_ADDR']))
                                                                                                                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                                                                                                                        else
                                                                                                                            $ipaddress = 'UNKNOWN';
                                                                                                                        return $ipaddress;
                                                                                                                    }
                                                                                                                    echo get_client_ip();
                                                                                                                    ?></h1>
                                                        </div>

                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Title-->

                                                <!--begin::Stats-->
                                                <div class="d-flex flex-wrap flex-stack">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                                        <!--begin::Stats-->
                                                        <!--<div class="d-flex flex-wrap">-->
                                                            <!--begin::Stat-->
                                                        <!--    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">-->
                                                                <!--begin::Number-->
                                                        <!--        <div class="d-flex align-items-center">-->
                                                        <!--            <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>-->
                                                        <!--            <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">$4,500</div>-->
                                                        <!--        </div>-->
                                                                <!--end::Number-->

                                                                <!--begin::Label-->
                                                        <!--        <div class="fw-semibold fs-6 text-gray-400">Total Earnings</div>-->
                                                                <!--end::Label-->
                                                        <!--    </div>-->
                                                            <!--end::Stat-->

                                                            <!--begin::Stat-->
                                                        <!--    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">-->
                                                                <!--begin::Number-->
                                                        <!--        <div class="d-flex align-items-center">-->
                                                        <!--            <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span class="path1"></span><span class="path2"></span></i>-->
                                                        <!--            <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="80" data-kt-initialized="1">80</div>-->
                                                        <!--        </div>-->
                                                                <!--end::Number-->

                                                                <!--begin::Label-->
                                                        <!--        <div class="fw-semibold fs-6 text-gray-400">My DownLines</div>-->
                                                                <!--end::Label-->
                                                        <!--    </div>-->
                                                            <!--end::Stat-->

                                                            <!--begin::Stat-->
                                                        <!--    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">-->
                                                                <!--begin::Number-->
                                                        <!--        <div class="d-flex align-items-center">-->
                                                        <!--            <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>-->
                                                        <!--            <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1">60</div>-->
                                                        <!--        </div>-->
                                                                <!--end::Number-->

                                                                <!--begin::Label-->
                                                        <!--        <div class="fw-semibold fs-6 text-gray-400">My Direct</div>-->
                                                                <!--end::Label-->
                                                        <!--    </div>-->
                                                            <!--end::Stat-->
                                                        <!--</div>-->
                                                        <!--end::Stats-->
                                                    </div>
                                                    <!--end::Wrapper-->

                                                    <!--begin::Progress-->
                                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                            <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                                            <span class="fw-bold fs-6">50%</span>
                                                        </div>

                                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                            <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <!--end::Progress-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Info-->
                                        </div>


                                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-active-primary ms-0 me-10 py-5 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-active-primary ms-0 me-10 py-5" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Bank Info</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-active-primary ms-0 me-10 py-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">KYC </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-active-primary ms-0 me-10 py-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact1" aria-selected="false">I-Card </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-active-primary ms-0 me-10 py-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact2" aria-selected="false">Welcome Letter </button>
                                            </li>
                                        </ul>



                                    </div>
                                </div>
                                <!--end::Navbar-->

                                <div class="card">


                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Tab Content-->
                                        <div class="tab-content">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="row g-6 g-xl-9 m-auto justify-content-center">
                                                        <div class="col-md-12 col-xl-12">
                                                            <form id="profile_form" method="post" accept-charset="utf-8">


                                                                <fieldset class="form-group">



                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">First Name</label>  
                                                                                <input type="text" name="first_name" value="<?= !empty($user_data['first_name']) ? $user_data['first_name'] : ''; ?>" class="form-control" placeholder="First Name" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Last Name</label>
                                                                                <input type="text" name="last_name" value="<?= !empty($user_data['last_name']) ? $user_data['last_name'] : ''; ?>" class="form-control" placeholder="Last Name" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> Date of Birth</label>
                                                                                <div class="date-input">
                                                                                    <input type="date" name="date_of_birth" value="<?= !empty($user_data['dateofbirth']) ? $user_data['dateofbirth'] : ''; ?>" class="form-control" placeholder="Date of Birth" readonly>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> Mobile No.</label>
                                                                                <input type="text" name="mobile_number" value="<?= !empty($user_data['mobile_number']) ? $user_data['mobile_number'] : ''; ?>" class="form-control" placeholder="Mobile No." readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1 disabled" readonly>Gender</label>
                                                                                <select name="gender" class="form-control">
                                                                                    <option value="<?= !empty($user_data['gender']) ? $user_data['first_name'] : ''; ?>"><?= !empty($user_data['gender']) ? $user_data['first_name'] : ''; ?></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> Address</label>
                                                                                <input type="text" name="house_no_plot" value="<?= !empty($user_data['address']) ? $user_data['address'] : ''; ?>" class="form-control" placeholder="Address" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> City</label>
                                                                                <input type="text" name="city" value="<?= !empty($user_data['city']) ? $user_data['city'] : ''; ?>" class="form-control" placeholder="City" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> State</label>
                                                                                <input type="text" name="state" value="<?= !empty($user_data['state']) ? $user_data['state'] : ''; ?>" class="form-control" placeholder="State" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> Country</label>
                                                                                <input type="text" name="country" value="<?= !empty($user_data['country']) ? $user_data['country'] : ''; ?>" class="form-control" placeholder="Country" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="form-group">
                                                                    <label for="" class="fw-bold me-5 my-1"> Email address</label>
                                                                    <input type="email" name="email" value="<?= !empty($user_data['email']) ? $user_data['email'] : ''; ?>" class="form-control" placeholder="Enter email" readonly>
                                                                </div>


                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <div class="row g-6 g-xl-9 m-auto justify-content-center">
                                                        <div class="col-md-12 col-xl-12">
                                                            <form id="bank_details_form">
                                                          
                                                                <h5 class="form-header"></h5>

                                                                <fieldset class="form-group">
                                                                                                                
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> Member ID</label>
                                                                                <input class="form-control" value="<?= !empty($bank_data[0]['member_id']) ? $bank_data[0]['member_id'] : ''; ?>" placeholder="Member ID" name="member_id" id="member_id" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1"> Bank Name</label>
                                                                                <input class="form-control" value="<?= !empty($bank_data[0]['bank_name']) ? $bank_data[0]['bank_name'] : ''; ?>" placeholder="Bank Name" name="bank_name" id="bank_name"  readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Account Number</label>
                                                                                <input class="form-control" value="<?= !empty($bank_data[0]['account_number']) ? $bank_data[0]['account_number'] : ''; ?>" placeholder="Account Number" name="account_number" id="account_number" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Confirm Account Number</label>
                                                                                <input class="form-control" value="<?= !empty($bank_data[0]['account_number']) ? $bank_data[0]['account_number'] : ''; ?>" placeholder="Confirm Account Number" name="conform_account_number" id="conform_account_number" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">FullName as per Bank</label>
                                                                                <input class="form-control" value="<?= !empty($bank_data[0]['fullname']) ? $bank_data[0]['fullname'] : ''; ?>" placeholder="FullName as per Bank" name="fullname" id="fullname" readonly="">
                                                                            </div>
                                                                        </div>
                                                                           <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Branch</label>
                                                                                <input class="form-control"  value="<?= !empty($bank_data[0]['branch']) ? $bank_data[0]['branch'] : ''; ?>" placeholder="Branch" name="country" id="country" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">IFSC Code</label>
                                                                                <input class="form-control"  value="<?= !empty($bank_data[0]['IFSC_code']) ? $bank_data[0]['IFSC_code'] : ''; ?>" placeholder="IFSC Code" name="IFSC_code" id="IFSC_code" readonly="">
                                                                            </div>
                                                                        </div>
                                                                           <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Acount Type</label>
                                                                                <input class="form-control"  value="<?= !empty($bank_data[0]['account_type']) ? $bank_data[0]['account_type'] : ''; ?>" placeholder="Acount Type" name="country" id="country" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Google Pay</label>
                                                                                <input class="form-control"  value="<?= !empty($bank_data[0]['google_pay']) ? $bank_data[0]['google_pay'] : ''; ?>" placeholder="Google Pay" name="google_pay" id="google_pay" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Phone Pay</label>
                                                                                <input class="form-control"  value="<?= !empty($bank_data[0]['phone_pay']) ? $bank_data[0]['phone_pay'] : ''; ?>" placeholder="Phone Pay" name="phone_pay" id="phone_pay" readonly="">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                     
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="" class="fw-bold me-5 my-1">Bank Details Registred Date</label>
                                                                                <input class="form-control"  value="<?= !empty($bank_data[0]['created_at']) ? $bank_data[0]['created_at'] : ''; ?>" placeholder="Country Address" name="country" id="country" readonly="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">

                                                                        </div>
                                                                    </div>
                                                                </fieldset>


                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">KYC</div>
                                                <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab">I-Card</div>
                                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">Welcome Letter</div>
                                            </div>
                                        </div>
                                        <!--end::Tab Content-->
                                    </div>
                                    <!--end::Card body-->
                                </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Content-->

                       
                        
                    </div>
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