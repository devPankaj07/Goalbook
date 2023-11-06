<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title> ID Card || Dashboard</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
      <style>
         @import url('https://fonts.googleapis.com/css?family=PT+Sans:400,700');
         .perinfo {
           background: #fff;
                margin: 23px auto;
                padding: -2vmin 59vmin;
                max-width: 17em;
                line-height: -1.5em;
                font-family: poppins;
                word-wrap: break-word;
            }
         }
         #id-card {
         display: inline-block;
         float: left;
         margin-right: 2em;
         }
         .id-card {
         width: 336px;
         height: 200px;
         background: #fff;
         padding: 10px;
         position: relative;
         }
         .id-card__mugshot {
         position: absolute;
         right: 10px;
         width: 100px;
         height: 100px;
         border-left: 4px solid #f15a2e;
         background: #fff;
         }
         .id-card__mugshot img {
         width: 80px;
         height: 80px;
         }
         .id-card__logo {
         width: 200px;
         }
         .id-card__subject-id {
         position: absolute;
         top: 54px;
         left: 130px;
         font-family: monospace;
         font-size: 14pt;
         transform: rotate(-4deg);
         }
         .id-card__banner {
         /*height: 10pt;*/
         background: #f15a2e;
         margin-top: 10px;
         margin-left: -10px;
         padding-left: 12px;
         }
         .id-card__banner-text {
         color: #fff;
         font-size: 12pt;
         letter-spacing: 2px;
         line-height: 0;
         position: relative;
         top: 0px;
         }
         .id-card__details {
                    padding-top: 17px;
            font-size: 8pt;
            line-height: 1.5;
            text-transform: uppercase;
            width: 68%;
            display: inline-block;
         }
         .id-card__details--short {
         float: right;
         /*margin-left: 30px;*/
         width: 100px;
         }  
         .id-card__detail {
        height: 3px;
        padding-top: 13px;
        padding-bottom: 4px;
    }
         }
         .id-card__detail + .id-card__detail {
         border-top: 1px solid #eee e;
         }
         .id-card__detail-label {
         color: #333;
         font-weight: bold;
         }
         .id-card__detail-label:after {
         content: ' • ';
         font-weight: normal;
         }
         .logo__big {
         font-size: 24pt;
         font-weight: bold;
         line-height: 1.3;
         letter-spacing: 4px;
         }
         .logo__small {
         font-size: 10pt;
         letter-spacing: 4px;
         position: relative;
         top: -10px;
         left: 2px;
         }
         .id-form__row {
         padding-bottom: 8px;
         }
         .id-form__row--inline {
         width: 10em;
         padding-right: 1em;
         padding-bottom: 1em;
         display: inline-block;
         }
         .id-form__label {
         font-size: 8pt;
         line-height: 8pt;
         }
         .material-ui-shadow {
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
         transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
         }
         .material-ui-shadow:hover {
         box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
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
                  <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                     <div class="row g-6 g-xl-   ">
                        <div class="col-xl-12">
                           <!--begin::Charts Widget 1-->
                           <div class="card mb-5 mb-xxl-8">
                              <!--begin::Header-->
                              <div class="card-header border-0 pt-5">
                                 <!--begin::Title-->
                                 <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">ID Card </span>
                                    <div class="perinfo">
                                       <div id="id-card">
                                          <div class="id-card material-ui-shadow">
                                             <!-- \\ mugshot -->
                                             <div class="id-card__mugshot">
                                               <div class="profile-img w-100 d-flex flex-column align-items-center">
                                                <?php if (empty($user_data['profile_image'])) : ?>
                                                    <img src="<?= base_url() ?>assets/img/persons.png" alt="user" class="rounded-circle">
                                                <?php else : ?>
                                                    <img src="<?= base_url('assets/uploads/profile/' . $user_data['profile_image']) ?>" alt="User Profile" class="rounded-circle">
                                                <?php endif; ?>
                                                </div>
                                             </div>
                                             <!-- // mugshot -->
                                             <!-- \\ foundation logo -->
                                             <div class="id-card__logo logo">
                                                  <img alt="Logo" src="https://sunstar.soonx.co.in//assets/img/logo.png" class="h-40px">
                                                 <!--<span class="logo__big">SUNSTAR</span>-->
                                                <!--<span class="logo__small"></span>-->
                                             </div>
                                             <!-- // foundation logo -->
                                             <!-- \\ subject id -->
                                             <div class="id-card__subject-id">
                                             </div>
                                             <!-- // subject id -->
                                             <!-- \\ experiment banner -->
                                             <div class="id-card__banner">
                                                <span class="id-card__banner-text"><?= $user_data['first_name'] . ' ' . $user_data['last_name']?></span>
                                             </div>
                                             <!-- // experiment banner -->
                                             <!-- \\ details -->
                                             <div class="id-card__details">
                                                <div class="id-card__detail">
                                                   <span class="id-card__detail-label">Member ID</span>
                                                   <span class="id-card__detail-value" id="id-card-name"><?= $user_data['member_id']?> </span>
                                                </div>
                                                 <div class="id-card__detail">
                                                   <span class="id-card__detail-label">Mobile No</span>
                                                   <span class="id-card__detail-value"><?= $user_data['mobile_number'] ?></span>
                                                </div>
                                                <div class="id-card__detail">
                                                   <span class="id-card__detail-label">Date of Birth</span>
                                                   <span class="id-card__detail-value" id="id-card-date-of-birth">09/20/1980</span>
                                                </div>
                                                <div class="id-card__detail">
                                                   <span class="id-card__detail-label">Activation Date</span>
                                                   <span class="id-card__detail-value"><?= $user_data['activated_date'] ?></span>
                                                </div>
                                               
                                             </div>
                                             <!-- // details -->
                                             <!-- \\ short details -->
                                             <div class="id-card__details id-card__details--short">
                                                <div class="id-card__detail">
                                                   <span class="id-card__detail-label">Gender</span>
                                                   <span class="id-card__detail-value" id="id-card-gender">M</span>
                                                </div>
                                                <!--<div class="id-card__detail">-->
                                                <!--   <span class="id-card__detail-label">Height</span>-->
                                                <!--   <span class="id-card__detail-value" id="id-card-height">6'03"</span>-->
                                                <!--</div>-->
                                                <!--<div class="id-card__detail">-->
                                                <!--   <span class="id-card__detail-label">Weight</span>-->
                                                <!--   <span class="id-card__detail-value" id="id-card-weight">145</span>-->
                                                <!--</div>-->
                                             </div>
                                             <!-- // short details -->
                                          </div>
                                       </div>
                                       
                                    </div>
                                 </h3>
                                 <!--end::Title-->
                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body">
                              </div>
                              <!--end::Body-->
                           </div>
                           <!--end::Charts Widget 1-->
                        </div>
                        <!--end::Col-->
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
      <script>
         const downloadCharacterSheet = () => {
           
           const node = document.getElementById('id-card');
           
           html2canvas(node).then(canvas => {
             // document.body.appendChild(canvas)
             // var img    = canvas.toDataURL("image/png");
             // document.write('<img src="'+img+'"/>');
             var link = document.createElement('a');
             link.download = 'filename.png';
             link.href = canvas.toDataURL()
             link.click();
           });
           
         };
         
         const bindInputToElement = (inputEl, elementEl) => {
           inputEl.addEventListener('change', () => {
             elementEl.textContent = inputEl.value;
           });
         }
         
         document
           .getElementById('download-button')
           .addEventListener('click', downloadCharacterSheet);
         
         document
           .querySelector('.id-card__subject-id')
           .textContent = md5('something').slice(0, 8);
         
         // Bind name
         const nameEl = document.getElementById('name');
         bindInputToElement(
           nameEl,
           document.getElementById('id-card-name')
         );
         nameEl
           .addEventListener('change', () => {
             document
               .querySelector('.id-card__subject-id')
               .textContent = md5(nameEl.value).slice(0, 8);
           });
         
         // Bind date of birth
         bindInputToElement(
           document.getElementById('date-of-birth'),
           document.getElementById('id-card-date-of-birth')
         );
         
         // Bind gender
         bindInputToElement(
           document.getElementById('gender'),
           document.getElementById('id-card-gender')
         );
         
         // Bind height
         bindInputToElement(
           document.getElementById('height'),
           document.getElementById('id-card-height')
         );
         
         // Bind weight
         bindInputToElement(
           document.getElementById('weight'),
           document.getElementById('id-card-weight')
         );
         
         // Bind mugshot
         document
             .getElementById('mugshot')
             .addEventListener('change', function() {
               if ( this.files && this.files[0] ) {
                 var FR= new FileReader();
                 FR.onload = function(e) {
                    var img = document.getElementById('id-card-mugshot');
                    img.src = e.target.result;
                 };       
                 FR.readAsDataURL( this.files[0] );
               }
             });
      </script>
   </body>
   <!--end::Body-->
</html>