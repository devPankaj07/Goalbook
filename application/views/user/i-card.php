<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title> ID Card || Dashboard</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
      <style>
         .cont{
         padding-bottom: 3rem;
         margin-left: 0;
         margin-top: 3rem;
         }
         .proidimg img{
         height: 184px;
         border-radius: 100px;
         margin-top: 11em;
         margin-left: 10.5em;
         }
         }
         .idinfo h1  {
         padding-top: 1.5em;
         padding-left: 10rem;
         color:#f83d2a;
         font-size: 35px;
         font-weight: 700;
         margin-left: 4em;
         }
         .idinfo h3{
         padding-bottom: 0.2rem;
         margin-top: 0;
         margin-bottom: 1rem;
         margin-left: 5rem;
         color: #ee988e !important;
         }
         .idinfo h2{
         margin-left: 12rem;
         color: #dd6f71 !important;
         }
         .idinfo span{
         padding-left: 6rem;
         }
         .idinfo h3 {
         margin: 0;
         color:#dd6f71 !important;
         }
         .idinfo h3 span.label {
         display: inline-block !important;
         }
         .idinfo .ans {
         display: inline-block !important;
         }
         .ans{
         color: black;
         }
         
         
         
         
         
         
         
         
         
         
         
         @media only screen and (max-width: 476px) {
         .proidimg img{
         height: 120px;
         border-radius: 100px;
         margin-top: 8em;
         margin-left: 8em;
         }
         .cont{
         margin-left: 0;
         margin-top: 3rem;
         }
         .idcardstart{
         background-size: contain;
         }
         .idinfo h1{
         padding-top: 0;
         font-size: 30px !important;
         padding-left: 2em !important;
         }
         .idinfo h2 {
         margin-left: 9rem;
         }
         .idinfo span {
         padding-left: 3rem;
         }
         .card-body{
         width:100% !important;
         }
         .idinfo{
         padding-top: 2em !important;
         }
         .headthird{
         padding-top: 2em !important;
         }
         .headbot{
         padding-bottom: 4rem !important;
         }
         .memid{
         font-size: 22px !important;
         }
         .idinfo h3{
             padding-left:2em !important;
         }
         }
         
         
         
         
         @media only screen and (min-width: 477px) and (max-width: 768px){
         .cont {
         margin-left: 8rem;
         }
         }
         @media only screen and (min-width: 769px) and (max-width: 820px){
         .cont {
         margin-left: 9rem;
         }
         }
         @media only screen and (min-width: 821px) and (max-width: 1024px){
         .cont {
         margin-left: 15rem;
         }
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
                  <div class="d-flex  flex-column flex-lg-row-fluid" id="printableArea">
                     <div class="row g-6 ">
                        <div class="col-xl-12">
                           <!--end::Charts Widget 1-->
                           <div class="card mb-5 mb-xl-8">
                              <!--begin::Header-->
                              <div class="card-header border-0 pt-5">
                                 <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">I-Card</span>
                                    <!--<span class="text-muted mt-1 fw-semibold fs-7">Over 500 </span>-->
                                 </h3>
                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body py-3 m-auto" style="width:50%;">
                                 <!--begin::Table container-->
                                 <div class="cont" id="printinfo">
                                    <div class="idcardstart" style="background-image: url(<?= base_url() ?>assets/img/newid.jpg); background-repeat: no-repeat;">
                                       <div class="idcont">
                                          <div class="proidimg" style="padding-top: 1em;"><img src="<?= base_url() ?>assets/img/proimg.jpg" alt=""></div>
                                          <div class="idinfo" style="padding-top:4em;">
                                             <h1 style="    font-size: 35px; padding-left:4em;font-weight: 600; color:#f83d2a;">Prashant Tawde</h1>
                                             <h2 class="memid"style="font-size:29px;     font-weight: 600;">M123456</h2>
                                             <h3 class="headthird" style="padding-top:3em;">
                                                <span class="label">Join date:</span>
                                                <span class="ans">24 / 05 / 2023</span>
                                             </h3>
                                             <h3>
                                                <span class="label">Mobile No:</span>
                                                <span class="ans">adsfdsafsadfasdfa</span>
                                             </h3>
                                             <h3>
                                                <span class="label">Email:</span>
                                                <span class="ans">adsfdsafsadfdsaf</span>
                                             </h3>
                                             <h3>
                                                <span class="label">SponsorID:</span>
                                                <span class="ans">adfadsfsadfadsfads</span>
                                             </h3>
                                             <h3 class="headbot" style="padding-bottom: 7rem;">
                                                <span class="label">Destination:</span>
                                                <span class="ans">24/05/2023</span>
                                             </h3>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <br>
                                 <div id="printButtonWrapper">
                                    <input id="printButton" class="btn btn-primary remove-hide" type="button" onclick="printAndHide();" value="Print" />
                                 </div>
                                 <!--end::Table container-->
                              </div>
                              <!--begin::Body-->
                           </div>
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
      <style>
         /* Hide the print button when the page is being printed */
         @media print {
         #printButtonWrapper {
         display: none;
         }
         #kt_app_sidebar {
         display: none ;
         }
         #kt_app_header{
         display: none;
         }
         }
      </style>
      <!--end::App-->
      <?php include_once('customize.php') ?>
      <?php include_once('notification.php') ?>
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
      <script>
         function printAndHide() {
           // Call the window.print() function to trigger the print dialog
           window.print();
         
           // Hide the print button after it's clicked
           
         }
         
      </script>
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