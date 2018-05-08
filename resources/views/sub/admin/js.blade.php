<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{asset('quantri/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('quantri/global/plugins/excanvas.min.js')}}"></script> 
<![endif]-->
<script src="{{asset('quantri/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- jquery - validate -->
<script src="{{asset('quantri/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<!-- end jquery - validate -->
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('quantri/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<!-- BOOTBOX  js-->
<script src="{{asset('quantri/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>

<!-- END BOOTBOX -->
<script src="{{asset('quantri/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/bootstrap-daterangepicker/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="{{asset('quantri/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('quantri/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/admin/layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/admin/pages/scripts/index.js')}}" type="text/javascript"></script>
<script src="{{asset('quantri/admin/pages/scripts/tasks.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{asset('source/assets/dest/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom-validate-method.js')}}"></script>
<script type="text/javascript">
   tinymce.init({
      selector:'textarea#editor',
      force_br_newlines : false,
      force_p_newlines : false,
      forced_root_block : '', 
      entity_encoding: "raw",
      toolbar: "bold italic underline"
   });
</script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
});
</script>