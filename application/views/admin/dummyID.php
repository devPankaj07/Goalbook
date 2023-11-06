<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member Info || Admin</title>
    <?php require_once(__DIR__ . '/../includes/head.php'); ?>

</head>

<body>

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
                <!--start::Sidebar-->
                <?php include_once('sidebar.php') ?>
                <!--end::Sidebar-->
                <!--begin::Main-->

                <div class="row gy-4 justify-content-center mt-5" style="gap: 1em;">
                    <!--begin::Tables Widget 9-->
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-body">
                                <form id="registrationForm">
                                    <div class="mb-3">
                                        <label for="sponsored_id" class="form-label">Sponsored ID</label>
                                        <input type="text" class="form-control" id="sponsored_id" name="sponsored_id" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Package</label>
                                        <select class="form-select" id="package" name="package" required>
                                            <?php foreach ($packages as $package) : ?>
                                                <option value="<?= $package['package_name'] . ' - ' . $package['package_amount'] ?>">
                                                    <?= $package['package_name'] . ' - ' . $package['package_amount'] ?>
                                                </option>
                                                <?php break; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Number</label>
                                        <input type="text" class="form-control" id="number" name="number" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Generate IDs</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-body">
                                <form id="repurchase">
                                    <div class="mb-3">
                                        <label for="member_id" class="form-label">Select Member ID(s)</label>
                                        <select class="form-select" id="member_id" name="member_id[]" multiple required>
                                            <option value="all">Select All</option>
                                            <?php foreach ($memberIds as $memberId) : ?>
                                                <option value="<?= $memberId['member_id'] ?>"><?= $memberId['member_id'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Package</label>
                                        <select class="form-select" id="repurchasePackage" name="repurchasePackage" required>
                                            <?php foreach ($packages as $package) : ?>
                                                <option value="<?= $package['package_name'] . ' - ' . $package['package_amount'] ?>">
                                                    <?= $package['package_name'] . ' - ' . $package['package_amount'] ?>
                                                </option>
                                              
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="repurchaseID">Repurchase IDs</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--end::Tables Widget 9-->
                </div>

                <!-- Last Div  -->

                <!--end:::Main-->
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::App-->



        <?php require_once(__DIR__ . '/../includes/foot.php'); ?>

    </body>

    <script>
        $(document).ready(function() {
            $('#registrationForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Get form data
                var sponsoredId = $('#sponsored_id').val();
                var number = $('#number').val();
                var package = $('#package').val();

                // Validate form data (you can add more validations as needed)
                if (sponsoredId === '' || number === '') {
                    $('#validationError').text('Please fill in all fields.');
                    return;
                }

                // AJAX request
                $.ajax({
                    url: '<?php echo base_url() ?>Ajax/generateDummayIDs', // Replace with your controller and method
                    type: 'POST',
                    data: {
                        sponsored_id: sponsoredId,
                        number: number,
                        package: package
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Handle success (e.g., show a success message)
                            alert('Member IDs Created');
                        } else {
                            // Handle errors (e.g., show an error message)
                            $('#validationError').text(response.message);
                        }
                    }
                });
            });

            const selectedMemberIds = []; // Array to store selected member IDs

            // Event listener for dropdown change
            $('#member_id').on('change', function () {
                const selectedValue = $(this).val();
                
                if (selectedValue.includes('all')) {
                    // If "Select All" is selected, select all other options
                    const allMemberIds = <?= json_encode(array_column($memberIds, 'member_id')) ?>;
                    selectedMemberIds.length = 0; // Clear the array
                    selectedMemberIds.push(...allMemberIds);
                    $(this).val(allMemberIds); // Select all options
                } else {
                    // Update the selectedMemberIds array based on the selection
                    selectedMemberIds.length = 0; // Clear the array
                    $.each(selectedValue, function (index, value) {
                        if (value !== 'all') {
                            selectedMemberIds.push(value);
                        }
                    });
                }
            });
            

            // Event listener for submit button click
            $('#repurchaseID').on('click', function (e) {
                e.preventDefault(); // Prevent the default form submission
                // Send the selectedMemberIds array to the server via AJAX as a POST request
                var repurchase = $('#repurchasePackage').val()
                console.log(repurchase);
                $.ajax({
                    url: '<?php echo base_url()?>Ajax/repurchaseActivateID', // Replace with your server endpoint
                    method: 'POST',
                    data: { memberIds: selectedMemberIds,
                        repurchase: repurchase
                    },
                    success: function (response) {
                        // Handle the server's response as needed
                        alert('Member Repurchased');
                    },
                    error: function () {
                        alert('Failed to submit selection.');
                    }
                });
            });
        });
    </script>

</html>