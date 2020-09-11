<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title">
          <i class="mdi mdi-settings title_icon"></i><?php echo ucfirst(get_phrase('website_settings')); ?>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->
<div class="row">
  <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12">
    <a href="<?php echo route('noticeboard'); ?>" class="btn <?php if ($page_content == 'noticeboard'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('noticeboard'); ?></a>
    <a href="<?php echo route('website_settings/events'); ?>" class="btn <?php if ($page_content == 'events'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('events'); ?></a>
    <a href="<?php echo route('teacher'); ?>" class="btn <?php if ($page_content == 'teachers'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('teachers'); ?></a>
    <a href="<?php echo route('website_settings/gallery'); ?>" class="btn <?php if ($page_content == 'gallery' || $page_content == 'gallery_image'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('gallery'); ?></a>
    <a href="<?php echo route('website_settings/about_us'); ?>" class="btn <?php if ($page_content == 'about_us'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('about_us'); ?></a>
    <a href="<?php echo route('website_settings/terms_and_conditions'); ?>" class="btn <?php if ($page_content == 'terms_and_conditions'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('terms_and_conditions'); ?></a>
    <a href="<?php echo route('website_settings/privacy_policy'); ?>" class="btn <?php if ($page_content == 'privacy_policy'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('privacy_policy'); ?></a>
    <a href="<?php echo route('website_settings/homepage_slider'); ?>" class="btn <?php if ($page_content == 'homepage_slider'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('homepage_slider'); ?></a>
    <a href="<?php echo route('website_settings/general_settings'); ?>" class="btn <?php if ($page_content == 'general_settings'): ?> btn-dark <?php else: ?> btn-secondary <?php endif; ?> btn-rounded btn-block"><?php echo get_phrase('general_settings'); ?></a>
  </div>
  <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 page_content">
    <?php include $page_content.'.php'; ?>
  </div>
</div>

<script type="text/javascript">
// FRONTEND FORM SUBMISSION STRATS FROM HERE
function updateGeneralSettings() {
  $(".generalSettingsAjaxForm").validate({});
  $(".generalSettingsAjaxForm").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updateAboutUsSettings() {
  $(".aboutUsSettings").validate({});
  $(".aboutUsSettings").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

function updatePrivactPolicySettings() {
  $(".privacyPolicySettings").validate({});
  $(".privacyPolicySettings").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, doNothing);
  });
}

function updateTermsAndConditionSettings() {
  $(".termsAndConditionSettings").validate({});
  $(".termsAndConditionSettings").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, doNothing);
  });
}

function updateHomepageSliderSettings() {
  $(".homepageSliderSettings").validate({});
  $(".homepageSliderSettings").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, reload);
  });
}

// Show All The Events
var showAllEvents = function () {
    var url = '<?php echo route('events/list'); ?>';

    $.ajax({
        type : 'GET',
        url: url,
        success : function(response) {
            $('.page_content').html(response);
            initDataTable('basic-datatable');
        }
    });
}

function reload() {
  setTimeout(
    function()
    {
      location.reload();
    }, 1000);
}
function doNothing() {

}
</script>
