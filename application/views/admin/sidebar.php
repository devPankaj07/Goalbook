<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
   data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
   data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
   data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
   <!--begin::Logo-->
   <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
      <!--begin::Logo image-->
      <a href="<?php echo base_url() ?>Admin/dashboard">
      <img alt="Logo" src="<?php echo base_url() ?>assets/img/logo.png"
         class="w-50 app-sidebar-logo-default">
      <img alt="Logo" src="<?php echo base_url() ?>assets/img/logo.png"
         class=" app-sidebar-logo-minimize">
      </a>
      <div id="kt_app_sidebar_toggle"
         class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
         data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
         data-kt-toggle-name="app-sidebar-minimize">
         <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span
            class="path2"></span></i>
      </div>
      <!--end::Sidebar toggle-->
   </div>
   <!--end::Logo-->
   <!--begin::sidebar menu-->
   <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
      <!--begin::Menu wrapper-->
      <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
         data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
         data-kt-scroll-save-state="true">
         <!--begin::Menu-->
         <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
            data-kt-menu="true" data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div class="menu-item here ">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                  class="ki-duotone ki-element-11 fs-2"><span class="path1"></span><span
                  class="path2"></span><span class="path3"></span><span
                  class="path4"></span></i></span><span
                  class="menu-title"><a class="menu-link"
                  href="<?php echo base_url()?>Admin/dashboard">Dashboards</a></span>
               </span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <!--Members Part-->
            <?php $valuesToCheck = ['Total Member List', 'Active Member', 'InActive Member', 'Add Packges', 'Edit Member Info']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link-->
               <span class="menu-link">
               <span class="menu-icon">
               <i class="ki-duotone ki-address-book fs-2">
               <span class="path1"></span>
               <span class="path2"></span>
               <span class="path3"></span>
               </i>
               </span>
               <span class="menu-title">Members</span>
               <span class="menu-arrow"></span>
               </span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion">
                  <?php if (in_array('Total Member List', $admin_data['access_limits'])) { ?>
                  <!--begin:Menu item-->
                  <div class="menu-item">
                     <a class="menu-link" href="<?php echo base_url()?>Admin/member_list">
                     <span class="menu-bullet">
                     <span class=""><i class="fa-solid fa-users"></i></span>
                     </span>
                     <span class="menu-title">Total Member List</span>
                     </a>
                  </div>
                  <!--end:Menu item-->
                  <?php } ?>
                  <?php if (in_array('Active Member', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?php echo base_url()?>Admin/active_list"><span class="menu-bullet"><span
                        class=""><i class="fa-solid fa-user"></i></span></span><span
                        class="menu-title">Active Member</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <?php if (in_array('InActive Member', $admin_data['access_limits'])) { ?>
                  <!--begin:Menu item-->
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?php echo base_url()?>Admin/inactive_list"><span class="menu-bullet"><span
                        class=""><i class="fa-regular fa-user"></i></span></span><span
                        class="menu-title">InActive Member</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <?php if (in_array('Add Packages', $admin_data['access_limits'])) { ?>
                  <!--end:Menu item-->
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?php echo base_url('Admin/packges')?>"><span class="menu-bullet"><span
                        class=""><i class="fa-solid fa-box-open"></i></span></span><span
                        class="menu-title">Add Packages</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--begin:Menu item-->
                  <!-- Add other conditions here for the rest of the items -->
                  <?php if (in_array('Edit Member Info', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <a class="menu-link" href="<?php echo base_url()?>Admin/edit_member_info">
                     <span class="menu-bullet">
                     <span class=""><i class="fa-solid fa-address-card"></i></span>
                     </span>
                     <span class="menu-title">Edit Member Info</span>
                     </a>
                  </div>
                  <?php } ?>
                  <?php if (in_array('Activate ID', $admin_data['access_limits'])) { ?>
                     <div class="menu-item">
                                    <a class="menu-link" href="<?php echo base_url()?>Admin/activateID">
                                    <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Activate ID</span>
                                    </a>
                                </div>
                  <?php } ?>
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <!--Admins Part-->
            <?php $valuesToCheck = ['Create Admin', 'Admin List']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <!--end:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="fa-solid fa-user"></i></span><span
                  class="menu-title">Admins</span><span
                  class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion">
                  <!--begin:Menu item-->
                  <?php if (in_array('Create Admin', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?= base_url()?>Admin/create_admins"><span class=""><i class="fa-solid fa-user-secret"></i>-<span
                        class=""></span></span><span
                        class="menu-title">Create Admin</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <?php if (in_array('Admin List', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?= base_url()?>Admin/admins_list"><span class=""><span
                        class=""></span><i class="fa-solid fa-list"></i>-</span><span
                        class="menu-title">Admin List</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <?php $valuesToCheck = ['Create Admin', 'Admin List']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <!--end:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="fa-solid fa-user"></i></span><span
                  class="menu-title">Loans</span><span
                  class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion">
                  <!--begin:Menu item-->
                  <?php if (in_array('Create Admin', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?= base_url()?>Admin/loanRequest"><span class=""><i class="fa-solid fa-user-secret"></i>-<span
                        class=""></span></span><span
                        class="menu-title">Loan Request</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <?php if (in_array('Admin List', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?= base_url()?>Admin/admins_list"><span class=""><span
                        class=""></span><i class="fa-solid fa-list"></i>-</span><span
                        class="menu-title">Approved Loans</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <?php $valuesToCheck = ['Generate Pins', 'Transfer Pins']; ?>
                <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-address-book fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">Pins</span><span class="menu-arrow"></span></span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->

                            <?php if (in_array('Generate Pins', $admin_data['access_limits'])) { ?>
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/generate_pins"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Generate Pins</span></a>
                                    <!--end:Menu link-->
                                </div>
                            <?php } ?>
                            <!--end:Menu link-->
                            <?php if (in_array('Transfer Pins', $admin_data['access_limits'])) { ?>
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/transfer_pins"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Trasnfer Pins</span></a>
                                    <!--end:Menu link-->
                                </div>
                            <?php } ?>
                            <?php if (in_array('Transfer Pins', $admin_data['access_limits'])) { ?>
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/available_pins"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Available Pins</span></a>
                                    <!--end:Menu link-->
                                </div>
                            <?php } ?>

                            <!--end:Menu item-->
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
                <?php } ?>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <?php $valuesToCheck = ['KYC Pending Requested', 'KYC Approved Records']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="fa-solid fa-fingerprint"></i></span><span
                  class="menu-title">KYC</span><span
                  class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion">
                  <!--begin:Menu item-->
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <?php if (in_array('KYC Pending Requested', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?php echo base_url()?>Admin/kyc"><span
                        class="menu-bullet"><span
                        class=""><i class="fa-solid fa-user"></i></span></span><span
                        class="menu-title">KYC Pending Requested</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <?php if (in_array('KYC Approved Records', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?php echo base_url()?>Admin/kyc_approved"><span
                        class="menu-bullet"><span
                        class=""><i class="fa-solid fa-person-circle-check"></i></span></span>
                        <span class="menu-title">KYC Approved Records  <span class="badge rounded-pill text-bg-warning">IMP</span> </span></a>
                        
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <?php $valuesToCheck = ['Payout Report', 'Direct Income Payouts']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                  class="ki-duotone ki-abstract-39 fs-2"><span class="path1"></span><span
                  class="path2"></span></i></span><span
                  class="menu-title">Payouts</span><span class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion">
                  <!--begin:Menu item-->
                  <?php if (in_array('Payout Report', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                   <a class="menu-link" href="<?php echo base_url() ?>assets/Payout1.xlsx" download="payout.xls" target="_blank">
                      <span class="menu-bullet">
                         <span class=""><i class="fa-solid fa-coins"></i></span>
                      </span>
                      <span class="menu-title">ROI + Level Report</span>
                   </a>
                </div>

                  <?php } ?>
                  <?php if (in_array('Direct Income Payouts', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="<?php echo base_url()?>Admin/payout_direct_income"><span class="menu-bullet"><span
                        class=""><i class="fa-solid fa-indian-rupee-sign"></i></span></span><span
                        class="menu-title">Direct Income Payouts</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <?php $valuesToCheck = ['Total TDS']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                  class="ki-duotone ki-bank fs-2"><span class="path1"></span><span
                  class="path2"></span></i></span><span
                  class="menu-title">Deduction</span><span class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion menu-active-bg">
                  <!--begin:Menu item-->
                  <?php if (in_array('Total TDS', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link" href="totaltds.php"><span
                        class=""><i class="fa-solid fa-money-bill"></i>-<span
                        class=""></span></span><span
                        class="menu-title">Total TDS</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
                        <?php $valuesToCheck = ['Total TDS']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                  class="ki-duotone ki-bank fs-2"><span class="path1"></span><span
                  class="path2"></span></i></span><span
                  class="menu-title">Test Website</span><span class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion menu-active-bg">
                  <!--begin:Menu item-->
                  <?php if (in_array('Total TDS', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url()?>Admin/dummyID"><span
                        class=""><i class="fa-solid fa-money-bill"></i>-<span
                        class=""></span></span><span
                        class="menu-title">Plan Test</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <!--end:Menu item-->
             <!--begin:Menu item-->
             
              
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="fa fa-list-alt" aria-hidden="true"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">Category</span><span class="menu-arrow"></span></span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->

                            
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/maincategory"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Main Category</span></a>
                                    <!--end:Menu link-->
                                </div>
                           
                            <!--end:Menu link-->
                          
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/subcategory"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sub-Category</span></a>
                                    <!--end:Menu link-->
                                </div>
                        
                             
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/childcategory"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Child-Category</span></a>
                                    <!--end:Menu link-->
                                </div>
                      
                         
                                <div class="menu-item">
                                    <!--begin:Menu link--><a class="menu-link" href="<?php echo base_url() ?>Admin/ccforms"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">CC Forms</span></a>
                                    <!--end:Menu link-->
                                </div>
                           

                            <!--end:Menu item-->
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->
                    </div>
             
                  <!--end:Menu item-->
            <!--begin:Menu item-->
            <?php $valuesToCheck = ['Support']; ?>
            <?php if (array_intersect($valuesToCheck, $admin_data['access_limits'])) { ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
               <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                  class="ki-duotone ki-chart-pie-3 fs-2"><span class="path1"></span><span
                  class="path2"></span><span class="path3"></span></i></span><span
                  class="menu-title">Support</span><span class="menu-arrow"></span></span>
               <!--end:Menu link-->
               <!--begin:Menu sub-->
               <div class="menu-sub menu-sub-accordion menu-active-bg">
                  <!--begin:Menu item-->
                  <?php if (in_array('Support', $admin_data['access_limits'])) { ?>
                  <div class="menu-item">
                     <!--begin:Menu link--><a class="menu-link"
                        href="pages/faq/classic.html"><span class="menu-bullet"><span
                        class="bullet bullet-dot"></span></span><span
                        class="menu-title">Inbox</span></a>
                     <!--end:Menu link-->
                  </div>
                  <?php } ?>
                  <!--end:Menu item-->
                  <!--begin:Menu item-->
                  <!--end:Menu item-->
               </div>
               <!--end:Menu sub-->
            </div>
            <?php } ?>
            <!--end:Menu item-->
            <!--end:Menu item-->
         </div>
         <!--end::Menu-->
      </div>
      <!--end::Menu wrapper-->
   </div>
   <!--end::sidebar menu-->
   <!--end::Footer-->
</div>
