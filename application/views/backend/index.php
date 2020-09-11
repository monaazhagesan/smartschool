<?php
$user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');
$logged_in_user_details = $this->user_model->get_user_details($user_id);
$user_name = $logged_in_user_details['name'];
$school_id = school_id();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- all the meta tags -->
        <?php include 'metas.php'; ?>
        <!-- all the css files -->
        <?php include 'includes_top.php'; ?>
    </head>
    <body data-layout="detached">
        <!-- HEADER -->
        <?php include 'header.php'; ?>
        <div class="container-fluid">
            <div class="wrapper">
                <!-- BEGIN CONTENT -->
                <!-- SIDEBAR -->
                <?php include 'navigation.php'; ?>

                <!-- PAGE CONTAINER-->
                <div class="content-page">
                    <div class="content content-main">
                        <div class="loadings hidden"></div>
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->
                        <?php
                        if (!isset($page_name)) {
                            $page_name = "index.php";
                        } else {
                            $page_name = $page_name . '.php';
                        }
                        include $user_type . '/' . $folder_name . '/' . $page_name;
                        ?>
                        <!-- END PLACE PAGE CONTENT HERE -->
                    </div>
                    <!-- Footer -->
                    <?php include 'footer.php'; ?>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
        <!-- all the js files -->
        <?php include 'includes_bottom.php'; ?>
        <?php include 'notify.php'; ?>
        <?php include 'modal.php'; ?>
    </body>
</html>
