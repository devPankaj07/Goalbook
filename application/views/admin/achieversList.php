<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royalty Achievers List || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>


    <!-- Include Bootstrap Datepicker CSS and JS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css"> -->

</head>

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
                            <span class="card-label fw-bold fs-3 mb-1" style="text-transform: capitalize;">
                                <?php

                                // Function to fetch the value names based on the key
                                // function getValueName($key)
                                // {
                                     
 
                                // }

                                // Retrieving the value of the key from the URL
                                $keyFromURL = isset($_GET['key']) ? $_GET['key'] : '';
                                
                                // Get the current URL
                                $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                // Parse the URL to get its path
                                $urlPath = parse_url($currentUrl, PHP_URL_PATH);

                                // Get the last segment of the path
                                $lastSegment = basename($urlPath);

                                // Output the last segment (e.g., "executive")
                                echo $lastSegment;
 

                                ?>



                            </span>
                            <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!-- Add two input fields for date range -->
                        <!--               <div class="form-group">-->
                        <!--    <label for="from-date">From Date:</label>-->
                        <!--    <input type="date" class="form-control" id="from-date">-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--    <label for="to-date">To Date:</label>-->
                        <!--    <input type="date" class="form-control" id="to-date">-->
                        <!--</div>-->



                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table text-center table-clrs table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 " id='table'>
                                <!--begin::Table head-->


                                <thead>
                                    <tr class="fw-bold text-muted">

         
                                        <th class="min-w-120px">Sr No</th>
                                        <th class="min-w-120px">Fullname</th>
                                        <th class="min-w-140px">Member ID</th>
                                        <th class="min-w-140px">Date</th>
                                         
                                        <th class="min-w-140px">Amount</th>
                                       
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody id="tableBody">
                                    <?php
                                    //   print_r($user_data);
                                    $sr = 0;
                                    foreach ($achievers as $value) {
                                        $sr++;
                                        $name = $this->db->select('*')->where('member_id', $value['member_id'])->get('users')->result_array();
                                        $amount = $this->db->select_sum('amount')->where('member_id', $value['member_id'])->where('amount_for', 'Royalty Income')->get('e_wallet_history')->result_array();
                                    ?>
                                        <tr>
                                          
                                            <td><?= $sr ?></td>
                                            <td><?= $name[0]['first_name'] . ' ' . $name[0]['last_name']; ?></td>
                                            <td><?= $value['member_id']; ?></td>
                                            <td><?= date("Y-m-d", strtotime($value['created_at'])); ?></td>

                                            <th class="min-w-140px"><?= $amount[0]['amount'] ?></th>
                                          
                                        </tr>
                                    <?php } ?>
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
 

 
</body>

</html>