<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *  @author   : Creativeitem
 *  date      : November, 2019
 *  Ekattor School Management System With Addons
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->library('session');

        /* LOADING ALL THE MODELS HERE */
        $this->load->model('Crud_model', 'crud_model');
        $this->load->model('User_model', 'user_model');
        $this->load->model('Settings_model', 'settings_model');
        $this->load->model('Email_model', 'email_model');
        $this->load->model('Frontend_model', 'frontend_model');

        /* cache control */
        $this->output->set_header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        /* SET DEFAULT TIMEZONE */
        timezone();

        /* LOAD EXTERNAL LIBRARIES */
        $this->load->library('pdf');

        if ($this->session->userdata('admin_login') != 1) {
            redirect(site_url('login'), 'refresh');
        }
    }

    //dashboard
    public function index() {
        redirect(route('dashboard'), 'refresh');
    }

    public function dashboard() {
        // $this->msg91_model->clickatell();
        $page_data['page_title'] = 'Dashboard';
        $page_data['folder_name'] = 'dashboard';
        $this->load->view('backend/index', $page_data);
    }

//END DAILY ATTENDANCE section
//START EVENT CALENDAR section
    public function event_calendar($param1 = '', $param2 = '') {

        if ($param1 == 'create') {
            $response = $this->crud_model->event_calendar_create();
            echo $response;
        }

        if ($param1 == 'update') {
            $response = $this->crud_model->event_calendar_update($param2);
            echo $response;
        }

        if ($param1 == 'delete') {
            $response = $this->crud_model->event_calendar_delete($param2);
            echo $response;
        }

        if ($param1 == 'all_events') {
            echo $this->crud_model->all_events();
        }

        if ($param1 == 'list') {
            $this->load->view('backend/admin/event_calendar/list');
        }

        if (empty($param1)) {
            $page_data['folder_name'] = 'event_calendar';
            $page_data['page_title'] = 'event_calendar';
            $this->load->view('backend/index', $page_data);
        }
    }

    /* FUNCTION FOR DOWNLOADING A FILE */

    function download_file($path, $name) {
// make sure it's a file before doing anything!
        if (is_file($path)) {
            // required for IE
            if (ini_get('zlib.output_compression')) {
                ini_set('zlib.output_compression', 'Off');
            }

            // get the file mime type using the file extension
            $this->load->helper('file');

            $mime = get_mime_by_extension($path);

            // Build the headers to push out the file properly.
            header('Pragma: public');     // required
            header('Expires: 0');         // no cache
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
            header('Cache-Control: private', false);
            header('Content-Type: ' . $mime);  // Add the mime type from Code igniter.
            header('Content-Disposition: attachment; filename="' . basename($name) . '"');  // Add the file name
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($path)); // provide file size
            header('Connection: close');
            readfile($path); // push it out
            exit();
        }
    }

// NOTICEBOARD MANAGER
    public function noticeboard($param1 = "", $param2 = "", $param3 = "") {
// adding notice
        if ($param1 == 'create') {
            $response = $this->crud_model->create_notice();
            echo $response;
        }

// update notice
        if ($param1 == 'update') {
            $response = $this->crud_model->update_notice($param2);
            echo $response;
        }

// deleting notice
        if ($param1 == 'delete') {
            $response = $this->crud_model->delete_notice($param2);
            echo $response;
        }
// showing the list of notice
        if ($param1 == 'list') {
            $this->load->view('backend/admin/noticeboard/list');
        }

// showing the all the notices
        if ($param1 == 'all_notices') {
            $response = $this->crud_model->get_all_the_notices();
            echo $response;
        }

// showing the index file
        if (empty($param1)) {
            $page_data['folder_name'] = 'noticeboard';
            $page_data['page_title'] = 'noticeboard';
            $this->load->view('backend/index', $page_data);
        }
    }

// SETTINGS MANAGER
    public function school_settings($param1 = "", $param2 = "") {
        if ($param1 == 'update') {
            $response = $this->settings_model->update_current_school_settings();
            echo $response;
        }

// showing the System Settings file
        if (empty($param1)) {
            $page_data['folder_name'] = 'settings';
            $page_data['page_title'] = 'school_settings';
            $page_data['settings_type'] = 'school_settings';
            $this->load->view('backend/index', $page_data);
        }
    }

// SETTINGS MANAGER
//MANAGE PROFILE STARTS
    public function profile($param1 = "", $param2 = "") {
        if ($param1 == 'update_profile') {
            $response = $this->user_model->update_profile();
            echo $response;
        }
        if ($param1 == 'update_password') {
            $response = $this->user_model->update_password();
            echo $response;
        }

// showing the Smtp Settings file
        if (empty($param1)) {
            $page_data['folder_name'] = 'profile';
            $page_data['page_title'] = 'manage_profile';
            $this->load->view('backend/index', $page_data);
        }
    }

//MANAGE PROFILE ENDS
}
