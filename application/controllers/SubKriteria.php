<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class SubKriteria extends MY_Controller
{
	function __construct(){
	  parent::__construct();
	  $this->load->model('SubKrite');
	  if (empty($_SESSION['user'])) {
	  	redirect(site_url(''));
	  }
	}

	public function index(){
		$this->render_page('ListSubKriteria');
	}

	function listSubKriteria(){
		$datauser=$this->SubKrite->list();
		$a=1;
		$test=array();
		foreach ($datauser as $key) {
			$key->nomor=$a;
			$test[]=$key;
			$a++;
		}
		// print_r($test);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($test));
	}
}