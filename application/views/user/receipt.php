<!DOCTYPE html>
<html lang="en">
   <!--begin::Head-->
   <head>
      <title> Invoice Details || Dashboard</title>
      <?php require_once(__DIR__ . '/../includes/head.php'); ?>
      
    
      
      
       <style>
         #receiptsunstar {
         width: 35em !important;
         margin: 3em auto !important;
         color: #fff !important;
         font-family: sans-serif !important;
         }
         #receiptsunstar .card {
         background: linear-gradient(to bottom, #e84c3d 0%, #e84c3d 26%, #ecedef 26%, #ecedef 100%) !important;
         height: 20em ;
         float: left !important;
         position: relative !important;
         padding: 1em !important;
         margin-top: 100px !important;
         }
         #receiptsunstar .cardLeft {
         border-top-left-radius: 8px !important;
         border-bottom-left-radius: 8px !important;
         width: 24em !important;
         padding-top: 1.5em !important;
         }
         #receiptsunstar .backim{
          background-image: url('<?= base_url() ?>/assets/img/people.png') !important;
          background-size: contain !important;
          background-repeat: no-repeat !important;
          background-position: right !important;
          height: 255px !important;
         
         }
         #receiptsunstar .cardRight {
         width: 8.5em !important;
         border-left: 0.18em dashed #fff !important;
         border-top-right-radius: 8px !important;
         border-bottom-right-radius: 8px !important;
         line-height: 3rem !important;
         padding-top: 1.5em !important;
         }
         #receiptsunstar .cardRight img{
         height: 49px !important;
         width: 100% !important;
         background: white !important;
         border-radius: 10px !important;
         }
         #receiptsunstar .cardRight:before, .cardRight:after {
         content: "";
         position: absolute !important;
         display: block !important;
         width: 0.9em !important;
         height: 0.9em !important;
         background: #fff !important;
         border-radius: 50% !important;
         left: -0.5em !important;
         }
         #receiptsunstar .cardRight:before {
         top: -0.4em !important;
         }
         #receiptsunstar .cardRight:after {
         bottom: -0.4em !important;
         }
         #receiptsunstar h1 {
         font-size: 1.1em !important;
         margin-top: 0 !important;
         }
         #receiptsunstar h1 span {
         font-weight: normal !important;
         }
         #receiptsunstar .title, .name, .seat, .time {
         text-transform: uppercase !important;
         font-weight: normal !important;
         }
         #receiptsunstar .title h2, .name h2, .seat h2, .time h2 {
         font-size: 0.9em !important;
         color: #525252 !important;
         margin: 0;
         font-weight: 600;

         }
         #receiptsunstar .title span, .name span, .seat span, .time span {
         font-size: 0.7em !important;
         color: #a2aeae !important;
         }
         #receiptsunstar .title {
        margin: 2em 0 0 0;
        background: white !important;
        width: 49% ;
        padding: 2px 13px !important;
        border-radius: 25px !important;
        margin-top: 2.5rem !important;
        font-weight:600 !important;
        ;
         }
         #receiptsunstar .name, .seat {
         margin: 0.7em 0 0 0 !important;
         }
         #receiptsunstar .time {
         margin: 0.7em 0 0 1em !important;
         }
         #receiptsunstar .seat, .time {
         float: left !important;
         background: white !important;
         padding: 3px 10px !important;
         border-radius: 28px !important;
         text-align: center !important;
         }
         #receiptsunstar .eye {
         position: relative !important;
         width: 2em !important;
         height: 1.5em !important;
         background: #fff !important;
         margin: 0 auto;
         border-radius: 1em/0.6em !important;
         z-index: 1 !important;
         }
         #receiptsunstar .eye:before, .eye:after {
         content: "";
         display: block !important;
         position: absolute !important;
         border-radius: 50% !important;
         }
         #receiptsunstar .eye:before {
         width: 1em !important;
         height: 1em !important;
         background: #e84c3d !important;
         z-index: 2 !important;
         left: 8px !important;
         top: 4px !important;
         }
         #receiptsunstar .eye:after {
         width: 0.5em !important;
         height: 0.5em !important;
         background: #fff !important;
         z-index: 3 !important;
         left: 12px !important;
         top: 8px !important;
         }
         #receiptsunstar .number {
         text-align: center !important;
         text-transform: uppercase !important;
         }
         #receiptsunstar .number h3 {
         color: #e84c3d !important;
         margin: 1.5em 0 0 0 !important;
         font-size: 2.5em !important;
         font-weight: 600;

         }
         #receiptsunstar .number span {
         display: block !important;
         color: #a2aeae !important;
         }
         #receiptsunstar .barcode {
         height: 2em !important;
         width: 0 !important;
         margin: 1.2em 0 0 0.8em !important;
         box-shadow: 1px 0 0 1px #343434, 5px 0 0 1px #343434, 10px 0 0 1px #343434, 11px 0 0 1px #343434, 15px 0 0 1px #343434, 18px 0 0 1px #343434, 22px 0 0 1px #343434, 23px 0 0 1px #343434, 26px 0 0 1px #343434, 30px 0 0 1px #343434, 35px 0 0 1px #343434, 37px 0 0 1px #343434, 41px 0 0 1px #343434, 44px 0 0 1px #343434, 47px 0 0 1px #343434, 51px 0 0 1px #343434, 56px 0 0 1px #343434, 59px 0 0 1px #343434, 64px 0 0 1px #343434, 68px 0 0 1px #343434, 72px 0 0 1px #343434, 74px 0 0 1px #343434, 77px 0 0 1px #343434, 81px 0 0 1px #343434;
         }
          #receiptsunstar .name{
         background: white !important;
            width: 29%;
            padding: 2px 20px !important;
            border-radius: 25px !important;
         }
          #receiptsunstar .date{
         width: 40% !important;
         padding: 0 !important;
         text-align: center !important;
         }
          #receiptsunstar .date hr{
         margin:0 !important;
         width: 100% !important;
         }
          #receiptsunstar .seprate{
         background: #ffe1cd !important;
         border-radius: 20px 20px 0px 0px !important;
         }
          #receiptsunstar .seprate span{
         color:#e84c3d !important;
         }
          #receiptsunstar .secsep{
         background: #e84c3d !important;
         border-radius: 0px 0px 20px 20px !important;
         }
          #receiptsunstar .secsep h2{
         color:white !important;
         }
          #receiptsunstar .cardLeft .paid{
         padding: 2px 10px !important;
         background-color:hsl(110, 100%, 92%) !important;
         border-radius: 20px !important;
         color: white !important;
         border:none !important;
         margin-left: 10px !important ;
         color:#245b0f !important;
         font-size:50%;
         }
          #receiptsunstar .cardLeft h1{
         font-size: 27px !important;
         font-weight: 400 !important;
         color:white;
         }
         
         
         
         
         
         @media only screen and (max-width: 476px) {
             .title{
                 width:60% !important;
             }
             .name{
                 width:34% !important;
             }
             .card{
                 height:21em !important;
             }
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
                  <div class="d-flex flex-column flex-lg-row-fluid">
                     <!--<div id="kt_app_content_container" class="container-xxxl ">-->
                         
                     <!--</div>-->
                     <div class=" container ">
                        <div class="cardWrap" id="receiptsunstar">
         <div class="card cardLeft">
            <h1>My Receipt<span></span><button class="paid">paid</button></h1>
            <div  class="backim">
               <div class="title">
                  <span>Name</span>
                  <h2>Prashant Tawade</h2>
               </div>
               <div class="name">
                  <span>MemberId</span>
                  <h2>M12345</h2>
               </div>
               <div class="name date">
                  <div class="seprate">
                     <span>Joining Package</span>
                  </div>
                  <hr>
                  <div class="secsep">
                     <h2>1000</h2>
                  </div>
               </div>
               <div class="seat">
                  <h2>10/10/23</h2>
                  <span>Joining Date</span>
               </div>
               <div class="time">
                  <h2>10/10/23</h2>
                  <span>Activation Date</span>
               </div>
            </div>
         </div>
         <div class="card cardRight">
            <img src="<?= base_url() ?>/assets/img/logo.png" alt="">
            <div class="number">
               <h3>156</h3>
               <span>seat</span>
            </div>
            <div class="barcode"></div>
         </div>
      </div>
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
      >
      <?php require_once(__DIR__ . '/../includes/foot.php'); ?>
           <script>
    $(document).ready(function() {
      $('.table').each(function() {
        // Destroy any existing DataTable instance
        if ($.fn.DataTable.isDataTable(this)) {
          $(this).DataTable().destroy();
        }

        // Initialize DataTable with all options set to false
        $(this).DataTable({
          searching: false,
          paging: false,
          info: false,
          ordering: false,
          lengthChange: false,
          dom: 'Bfrtip',
          buttons: []
        });
      });
    });
</script>
   </body>
   <!--end::Body-->
</html>
