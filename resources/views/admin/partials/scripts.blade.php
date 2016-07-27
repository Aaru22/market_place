<!-- Custom and plugin javascript -->
<script src="{{ asset('public/lib/jquery-2.1.1.js')}}"></script>
<script src="{{ asset('public/lib/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/plugins/kendo/js/kendo.all.min.js')}}"></script>
<script src="{{ asset('public/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('public/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>	   
<script src="{{ asset('public/plugins/chosen/chosen.jquery.js')}}"></script>
<script src="{{ asset('public/lib/inspinia.js')}}"></script>
<script src="{{ asset('public/plugins/pace/pace.min.js')}}"></script>
<!-- jQuery UI -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

 <!-- Validate -->
<script src="{{ asset('public/lib/parsley.js')}}"></script>
<script src="{{ asset('public/lib/parsley.min.js')}}"></script>
<script  src="{{ asset('public/lib/ui-modals.js')}}"></script>
<script src="{{ asset('public/lib/bootbox.js')}}"></script>
<script src="{{ asset('public/lib/function.js')}}"></script>

<script>
$('#ajax-modal').on('shown.bs.modal', function () {
	$('.chosen-select', this).chosen();
});
$('#ajax-modal').on('shown.bs.modal', function () {
  $('.chosen-select', this).chosen('destroy').chosen();
});
var config = {
	'.chosen-select'           : {disable_search: true},
	'.chosen-select-single'    : {max_selected_options: 1},
	'.chosen-select-deselect'  : {allow_single_deselect:true},
	'.chosen-select-no-single' : {disable_search_threshold:10},
	'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
	'.chosen-select-width'     : {width:"95%"}
	}
for (var selector in config) {
	$(selector).chosen(config[selector]);
}

$(document).ready(function(){
    setInterval(function() {
        $(".alert-close").click();
        $(".alert-success").html('').hide();
        $(".alert-danger").html('').hide();
    }, 2000,"Javascript");

   $('body').on('focus', '.chosen-container-single input', function(){
        if (!$(this).closest('.chosen-container').hasClass('chosen-container-active')){
            $(this).closest('.chosen-container').trigger('mousedown');           
        }    
    });
	    
});
</script>