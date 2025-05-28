<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class JenisSupplier extends MY_Controller
{
	function __construct(){
	  parent::__construct();
	  $this->load->model('JenSup');
	  if (empty($_SESSION['user'])) {
	  	redirect(site_url(''));
	  }
	}

	// public function index(){
	// 	$data['role'] = $this->session->userdata('role');
	// 	$this->render_page('Listkriteria');
	// }

	public function index(){
		$data['role'] = $this->session->userdata('role');
		$this->render_page('ListJenisSupp', $data);
	}

	function listJenisSupp(){
		$dataJenSup=$this->JenSup->list();
		$a=1;
		$test=array();
		foreach ($dataJenSup as $key) {
			$key->nomor=$a;
			$test[]=$key;
			$a++;
		}
		// print_r($test);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($test));
	}

	function editJenSupp($idjs=NULL){
		if($idjs==NULL){
			if(isset($_POST) && count($_POST) > 0){
				$idjs=$this->input->post('idjs');
				$cekJenSup=array(
					'id'=> $idjs,
				);
				$available=$this->JenSup->edit($cekJenSup);
				if($available){
					echo "Data telah diubah";
				}
				else{
					header('HTTP/1.1 500 Terjadi Kesalahan 2');
				}
			}
			else{
				header('HTTP/1.1 500 Terjadi Kesalahan 1');
			}
		}
		else{
			$data['datajs']=$this->JenSup->get($idjs);
			$this->load->view('jenisSupp/edit_js',$data);
		}
	}

	function removekriteria(){
		if(isset($_POST) && count($_POST) > 0){
			$idjs=$this->input->post('js');
			$cekperiod=array(
				'id'=> $idjs,
			);
			$available=$this->Krite->delete($cekperiod);
			// print_r($_POST);
			if($available){
					echo "Data berhasil di Hapus";
			}
			else{
				header('HTTP/1.1 500 Terjadi Kesalahan 2');
			}
		}
		else{
			header('HTTP/1.1 500 Terjadi Kesalahan 1');
		}
	}

	function addJenSup(){
		if(isset($_POST) && count($_POST)>0){
			$dataJenSup=array(
				'nama'=>$this->input->post('nama'),
				'created' => date('Y-m-d')
			);
			$cekmasuk=$this->JenSup->add($dataJenSup);
			// print_r($pass);
			if ($cekmasuk) {
				echo "Berhasil Tambah Jenis Supplier";
			}
			else{
				header('HTTP/1.1 500 Gagal Menambahkan');
			}
		}
		else{
			$this->load->view('jenisSupp/add_js');
		}
	}
}