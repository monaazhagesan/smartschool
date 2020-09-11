<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="<?php echo site_url($this->session->userdata('role')); ?>" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="<?php echo $this->settings_model->get_logo_light(); ?>" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="<?php echo $this->settings_model->get_logo_light('small'); ?>" alt="" height="40">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
          <?php if ($this->session->userdata('user_type') == 'superadmin'): ?>
              <li class="dropdown notification-list">
                  <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" onclick="getLanguageList()">
                      <i class="mdi mdi-translate noti-icon"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                      <!-- item-->
                      <div class="dropdown-item noti-title">
                          <h5 class="m-0">
                              <?php echo get_phrase('language'); ?>
                          </h5>
                      </div>

                      <div class="slimscroll" id="language-list" style="min-height: 150px;">

                      </div>
                  </div>
              </li>
          <?php endif; ?>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="<?php echo $this->user_model->get_user_image($this->session->userdata('user_id')); ?>" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name"><?php echo $user_name; ?></span>
                    <?php if (strtolower($this->db->get_where('users', array('id' => $user_id))->row('role')) == 'admin'): ?>
                        <span class="account-position"><?php echo get_phrase('school_admin'); ?></span>
                    <?php else: ?>
                        <span class="account-position"><?php echo ucfirst($this->db->get_where('users', array('id' => $user_id))->row('role')); ?></span>
                    <?php endif; ?>

                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0"><?php echo get_phrase('welcome'); ?> !</h6>
                </div>

                <!-- item-->
                <a href="<?php echo route('profile'); ?>" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle mr-1"></i>
                    <span><?php echo get_phrase('my_account'); ?></span>
                </a>
                <?php if ($this->session->userdata('user_type') == 'superadmin'): ?>
                    <!-- item-->
                    <a href="<?php echo route('system_settings'); ?>" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit mr-1"></i>
                        <span><?php echo get_phrase('settings'); ?></span>
                    </a>
                <?php endif; ?>
                <!-- item-->
                <a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout mr-1"></i>
                    <span><?php echo get_phrase('logout'); ?></span>
                </a>

            </div>
        </li>

    </ul>
    <a class="button-menu-mobile disable-btn">
        <div class="lines">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
    <div class="visit_website">
        <h4 style="color: #fff; float: left;"> <?php echo get_settings('system_name'); ?></h4>
        <a href="<?php echo site_url('home'); ?>" target="" class="btn btn-outline-light ml-3"><?php echo get_phrase('visit_website'); ?></a>
        <img  class="hidden content-placeholder" src="<?php echo base_url('assets/backend/images/loader.gif'); ?>" alt="" height="35px;">
    </div>
</div>
</div>
<!-- end Topbar -->


<script type="text/javascript">
function getLanguageList() {
    $.ajax({
        url: "<?php echo route('language/dropdown'); ?>",
        success: function(response){
            console.log(response);
            $('#language-list').html(response);
        }
    });
}
</script>
