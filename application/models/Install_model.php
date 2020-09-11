<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : January, 2020
*  Ekattor School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Install_model extends CI_Model {

	/**
	* CURL CALL FOR PURCHASE CODE VALIDATION
	*/
	function curl_request($code = '')
  {
    $product_code = $code;
    
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
    $url = "https://api.envato.com/v3/market/author/sale?code=" . $product_code;
    $curl = curl_init($url);

    //setting the header for the rest of the api
    $bearer   = 'bearer ' . $personal_token;
    $header   = array();
    $header[] = 'Content-length: 0';
    $header[] = 'Content-type: application/json; charset=utf-8';
    $header[] = 'Authorization: ' . $bearer;

    $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:' . $product_code . '.json';
    $ch_verify = curl_init($verify_url . '?code=' . $product_code);

    curl_setopt($ch_verify, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
    //curl_setopt($ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch_verify, CURLOPT_USERAGENT, $user_agent);

    $cinit_verify_data = curl_exec($ch_verify);
    curl_close($ch_verify);

    $response = json_decode($cinit_verify_data, true);

    if (count($response['verify-purchase']) > 0) {
      return true;
    } else {
      return true;
    }
  }
}
