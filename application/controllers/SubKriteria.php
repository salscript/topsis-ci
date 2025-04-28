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
	function editSubKriteria($idkrit=NULL){
		if($idkrit==NULL){
			if(isset($_POST) && count($_POST) > 0){
				$id_krit=$this->input->post('idkri');
				$cekperiod=array(
					'idkri'=> $id_krit,
				);
				$available=$this->Krite->edit($cekperiod);
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
			$data['dataSubKriteria']=$this->Krite->get($idkrit);
			$this->load->view('SubKriteria/edit_sub',$data);
		}
	}

	function removeSubKriteria(){
		if(isset($_POST) && count($_POST) > 0){
			$idkri=$this->input->post('subkri');
			$cekperiod=array(
				'idkri'=> $idkri,
			);
			$available=$this->SubKrite->delete($cekperiod);
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

function addSubKriteria(){
	if(isset($_POST) && count($_POST)>0){
		$dataperiode=array(
			'idkri'=>$this->input->post('idkri'),
			'nama_sub'=>$this->input->post('nama_sub'),
			'indikator'=>$this->input->post('indikator'),
			'bobot'=>$this->input->post('bobot'),
			
		);
		$cekmasuk=$this->SubKrite->add($dataperiode);
		// print_r($pass);
		if ($cekmasuk) {
			echo "Berhasil Tambah Periode";
		}
		else{
			header('HTTP/1.1 500 Gagal Menambahkan');
		}
	}
	else{
		$this->load->view('SubKriteria/add_sub');
	}
}
}