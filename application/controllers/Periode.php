<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Periode extends MY_Controller
{
	var $table;

	function __construct(){
	  parent::__construct();
	  $this->table='tahun';
	  if (empty($_SESSION['user'])) {
	  	redirect(site_url(''));
	  }
	}

	public function index(){
		$data['role'] = $this->session->userdata('role');

		$this->render_page('Listperiode', $data);
	}

	function listperiode(){
		$datauser=$this->db->get('tahun')->result();
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

	function editperiode($idperiode=NULL){
		if ($_SESSION['role'] == 'SUPPLIER') {
			show_error('Anda tidak memiliki akses menambah data.', 403, 'Akses Ditolak');
		}
		if($idperiode==NULL){
			if(isset($_POST) && count($_POST) > 0){
				$id_tahun=$this->input->post('idtahun');
				$dataperiode=array(
					'tgl_mulai'=>$this->input->post('tglawal'),
					'tgl_selesai'=>$this->input->post('tglakhir')
				);
				$available=$this->Altperiod->edit($this->table,$dataperiode,$id_tahun);
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
			$data['dataperiode']=$this->Altperiod->get($this->table,$idperiode);
			$this->load->view('periode/edit_p',$data);
		}
	}

	function removeperiode(){
		if ($_SESSION['role'] == 'SUPPLIER') {
			show_error('Anda tidak memiliki akses menambah data.', 403, 'Akses Ditolak');
		}
		if(isset($_POST) && count($_POST) > 0){
			$idtahun=$this->input->post('idtahun');
			$available=$this->Altperiod->del($this->table,$idtahun);
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

	function addperiode(){
		if ($_SESSION['role'] == 'SUPPLIER') {
			show_error('Anda tidak memiliki akses menambah data.', 403, 'Akses Ditolak');
		}
		
		if(isset($_POST) && count($_POST)>0){
			$dataperiode=array(
				'tgl_mulai'=>$this->input->post('tglawal'),
				'tgl_selesai'=>$this->input->post('tglakhir')
			);
			$cekmasuk=$this->Altperiod->add($this->table,$dataperiode);
			// print_r($pass);
			if ($cekmasuk) {
				echo "Berhasil Tambah Periode";
			}
			else{
				header('HTTP/1.1 500 Gagal Menambahkan');
			}
		}
		else{
			$this->load->view('periode/add_p');
		}
	}
}