<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	$this->load->helper('url');

	}
	public function index()
	{
		$data['title'] = "OKELLO JOHN SILAS";
        // $v_data['card_header'] = "BUGONDO MANAGER";
		// $data['content'] = $this->load->view("site/index", $v_data, TRUE);
		$data['content'] = $this->load->view("site/index", '', TRUE);
		$this->load->view("site/templates/general_page", $data);
	}
}
