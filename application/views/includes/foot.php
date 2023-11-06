 <!--end::Modal - Invite Friend--> <!--end::Modals-->
  <script>
   var baseurl = '<?php echo base_url()?>'
 </script>   
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?= base_url() ?>assets/plugins/global/plugins.bundle-1.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts.bundle-1.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="<?= base_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/index-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/xy-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/percent-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/radar-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/themes/Animated-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/map-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/geodata/worldLow-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/geodata/continentsLow-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/geodata/usaLow-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/geodata/worldTimeZonesLow-1.js"></script>
    <script src="<?= base_url() ?>assets/lib/5/geodata/worldTimeZoneAreasLow-1.js"></script>
    <script src="<?= base_url() ?>assets/plugins/custom/datatables/datatables.bundle-1.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?= base_url() ?>assets/js/widgets.bundle-1.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/widgets-1.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/apps/chat/chat-1.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/upgrade-plan-1.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/create-app-1.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/new-target-1.js"></script>
    <script src="<?= base_url() ?>assets/js/custom/utilities/modals/users-search-1.js"></script>
        <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js "></script>

    <!--end::Custom Javascript-->
    <!--end::Javascript-->
        <script>
$(document).ready(function() {
    $('.data-table').each(function() {
      $(this).DataTable({
        searching: true,
        info: true,
        paging: true,
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf'
        ]
      });
    });
  });
</script>