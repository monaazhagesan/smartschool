<script type="text/javascript">
var callBackFunction;
var callBackFunctionForGenericConfirmationModal;
function largeModal(url, header)
{
  jQuery('#large-modal').modal('show', {backdrop: 'true'});
  // SHOW AJAX RESPONSE ON REQUEST SUCCESS
  $.ajax({
    url: url,
    success: function(response)
    {
      jQuery('#large-modal .modal-body').html(response);
      jQuery('#large-modal .modal-title').html(header);
    }
  });
}


function rightModal(url, header)
{
  // LOADING THE AJAX MODAL
  jQuery('#right-modal').modal('show', {backdrop: 'true'});

  // SHOW AJAX RESPONSE ON REQUEST SUCCESS
  $.ajax({
    url: url,
    success: function(response)
    {
      jQuery('#right-modal .modal-body').html(response);
      jQuery('#right-modal .modal-title').html(header);
    }
  });
}


function confirmModal(delete_url, param)
{
  jQuery('#alert-modal').modal('show', {backdrop: 'static'});
  callBackFunction = param;
  document.getElementById('delete_form').setAttribute('action' , delete_url);
}

function genericConfirmModal(callBackFunction)
{
  jQuery('#genric-confirmation-modal').modal('show', {backdrop: 'static'});
  callBackFunctionForGenericConfirmationModal = callBackFunction;
}

function callTheCallBackFunction() {
  $('#genric-confirmation-modal').modal('hide');
  callBackFunctionForGenericConfirmationModal();
}
</script>



<!-- Right modal content -->
<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-right">
    <div class="modal-content modal_height">

      <div class="modal-header border-1">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" style="overflow-x:scroll;">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--  Large Modal -->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-print-none">
        <h4 class="modal-title" id="myLargeModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="text-center">
          <i class="dripicons-information h1 text-info"></i>
          <h4 class="mt-2"><?php echo get_phrase('heads_up') ?>!</h4>
          <p class="mt-3"><?php echo get_phrase('are_you_sure'); ?>?</p>
          <form method="POST" class="ajaxDeleteForm" action="" id = "delete_form">
            <button type="button" class="btn btn-info my-2" data-dismiss="modal"><?php echo get_phrase('cancel'); ?></button>
            <button type="submit" class="btn btn-danger my-2" onclick=""><?php echo get_phrase('continue'); ?></button>
          </form>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal THIS MODAL WAS USED BECAUSE OF SOME GENERIC ALERTS-->
<div id="genric-confirmation-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="text-center">
          <i class="dripicons-information h1 text-info"></i>
          <h4 class="mt-2"><?php echo get_phrase('heads_up') ?>!</h4>
          <p class="mt-3"><?php echo get_phrase('are_you_sure'); ?>?</p>
          <button type="button" class="btn btn-info my-2" data-dismiss="modal"><?php echo get_phrase('cancel'); ?></button>
          <button type="submit" class="btn btn-danger my-2" onclick="callTheCallBackFunction()"><?php echo get_phrase('continue'); ?></button>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    jQuery(".ajaxDeleteForm").submit(function(e) {

        var form = $(this);
        ajaxSubmit(e, form, callBackFunction);
    });
</script>
