<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Alternatif extends MY_Controller
{
	function __construct(){
	  parent::__construct();
	  $this->load->model('SubKrite');
	  if (empty($_SESSION['user'])) {
	  	redirect(site_url(''));
	  }
	}

	public function index(){
		$data['role'] = $this->session->userdata('role');
		$this->render_page('alter', $data);
	}

	function listalter(){
		$datauser=$this->db->get('alters')->result();
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

	/**function editalter($alter = NULL)
{
    if (isset($_POST) && count($_POST) > 0) {
        // Ambil data tahun dan validasi
        $idtahun = $this->input->post('id_tahun');
        $cekda = array('id_tahun' => $idtahun);
        $available = $this->db->get_where('tahun', $cekda)->row();
        
        if (!$available) {
            header('HTTP/1.1 500 Tahun tidak ditemukan');
            exit;
        }

        // Data periode untuk update
        $dataperiode = array(
            'ket' => $this->input->post('ket'),
            'id_tahun' => $idtahun,
            'status' => $this->input->post('status')
        );
        
        // Update data alternatif
        $this->db->where('idalter', $alter);
        $cekmasuk = $this->db->update('alters', $dataperiode);

        if ($cekmasuk) {
            // Update kriteria berdasarkan input dari form
            $noid = $alter;
            $this->db->select('nilai_alter.idnilai, nilai_alter.idkri, kriteria.name');
            $this->db->from('nilai_alter');
            $this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri', 'left');
            $this->db->where('nilai_alter.idalter', $alter);
            $this->db->order_by('kriteria.idkri', 'ASC');
            $kriteria = $this->db->get()->result();
            
            foreach ($kriteria as $key) {
                $field_name = 'subkrit' . $key->idkri; // Ambil nilai dari form
                $nilai = $this->input->post($field_name);

                if ($nilai !== null) {
                    $object = array(
                        'nilai' => $nilai,
                    );
                    $this->db->where('idnilai', $key->idnilai);
                    $cekin = $this->db->update('nilai_alter', $object);
                }
            }

            if (isset($cekin) && $cekin) {
                echo "Berhasil Edit Alternatif";
            } else {
                header('HTTP/1.1 500 Gagal Menambahkan Kriteria');
            }
        } else {
            header('HTTP/1.1 500 Gagal Update Data Alternatif');
        }
    } elseif ($alter == NULL) {
        show_404();
    } else {
        // Menampilkan form untuk mengedit alternatif
        $this->db->select('*');
        $this->db->from('alters');
        $this->db->where('alters.idalter', $alter);
        $data['dataalter'] = $this->db->get()->row();

        // Ambil periode yang tersedia
        $data['periode'] = $this->db->get('tahun')->result();

        // Ambil data kriteria terkait
        $this->db->select('*');
        $this->db->from('nilai_alter');
        $this->db->where('idalter', $alter);
        $this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri');
        $this->db->order_by('kriteria.idkri', 'ASC');
        $data['kriteria'] = $this->db->get()->result();

        // Ambil subkriteria
        $data['subkriteria'] = $this->SubKrite->list();

        // Tampilkan view edit alternatif
        $this->load->view('alters/edit_al', $data);
    }
}*/

	/**function editalter($idalter=NULL) {
		if (isset($_POST) && count($_POST) > 0) {
			$id_alter = $this->input->post('idalter');
			$idtahun = $this->input->post('id_tahun');
			$cekda = array('id_tahun' => $idtahun);
			$available = $this->db->get_where('tahun', $cekda)->row();

			if (!$available) {
				header('HTTP/1/1 500 Tahun tidak ditemukan');
				exit;
			}

			$dataperiode = array(
				'ket' => $this->input->post('ket'),
				'id_tahun' => $idtahun,
				'status' => $this->input->post('status')
			);

			$this->db->where('id_alter', $id_alter);
			$cekmasuk = $this->db->update('alters', $dataperiode);

			if($cekmasuk) {
				$noid = $id_alter;
            $this->db->select('nilai_alter.idnilai, nilai_alter.idkri, kriteria.name');
            $this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri', 'left');
            $this->db->from('nilai_alter');
            $this->db->where('nilai_alter.idalter', $id_alter);
            $this->db->order_by('kriteria.idkri', 'ASC');
            $kriteria = $this->db->get()->result();

				$cekin = false;
				foreach($kriteria as $key) {
					$field_name = 'subkrit' . $key->idkri;
					$nilai = $this->input->post($field_name);

					if ($nilai !== null) {
						$object = array(
							'nilai' => $nilai
						);

						$this->db->where('idnilai', $key->idnilai);
						$cekin = $this->db->update('nilai_alter', $object);
					}
				}

				if ($cekin) {
                echo "Berhasil Edit Alternatif";
            } else {
                header('HTTP/1.1 500 Gagal Edit Alternatif');
            }
			} else {
				header('HTTP/1.1 500 Gagal Update Data Alternatif');
			}

		} else if($idalter == NULL) {
			show_404();
			// print_r("idalter is null");
		} else {
			// Menampilkan form untuk mengedit alternatif
			$this->db->select('*');
			$this->db->from('alters');
			$this->db->where('alters.idalter', $idalter);
			$data['dataalter'] = $this->db->get()->row();

			// Ambil periode yang tersedia
			$data['periode'] = $this->db->get('tahun')->result();

			// Ambil data kriteria terkait
			$this->db->select('*');
			$this->db->from('nilai_alter');
			$this->db->where('idalter', $idalter);
			$this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri');
			$this->db->order_by('kriteria.idkri', 'ASC');
			$data['kriteria'] = $this->db->get()->result();

			// Ambil subkriteria
			$data['subkriteria'] = $this->SubKrite->list();

			// Tampilkan view edit alternatif
			$this->load->view('alters/edit_al', $data);
		}
	}*/

	function editalter($idalter=NULL){
		if($idalter==NULL){
			if(isset($_POST) && count($_POST) > 0){
				$id_alter = $this->input->post('idalter');
				$idtahun = $this->input->post('id_tahun');
				$cekda = array('id_tahun' => $idtahun);
				$available = $this->db->get_where('tahun', $cekda)->row();

				if (!$available) {
					header('HTTP/1/1 500 Tahun tidak ditemukan');
					exit;
				}

				$dataperiode = array(
					'ket' => $this->input->post('ket'),
					'id_tahun' => $idtahun,
					'status' => $this->input->post('status')
				);

				$this->db->where('idalter', $id_alter);
				$cekmasuk = $this->db->update('alters', $dataperiode);

				if($cekmasuk) {
					$noid = $id_alter;
					$this->db->select('nilai_alter.idnilai, nilai_alter.idkri, kriteria.name');
					$this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri', 'left');
					$this->db->from('nilai_alter');
					$this->db->where('nilai_alter.idalter', $id_alter);
					$this->db->order_by('kriteria.idkri', 'ASC');
					$kriteria = $this->db->get()->result();

					$cekin = false;
					foreach($kriteria as $key) {
						$field_name = 'subkrit' . $key->idkri;
						$nilai = $this->input->post($field_name);

						if ($nilai !== null) {
							$object = array(
								'nilai' => $nilai
							);

							$this->db->where('idnilai', $key->idnilai);
							$cekin = $this->db->update('nilai_alter', $object);
						}
					}

					if ($cekin) {
						echo "Berhasil Edit Alternatif";
					} else {
						header('HTTP/1.1 500 Gagal Edit Alternatif');
					}
				} else {
					header('HTTP/1.1 500 Gagal Update Data Alternatif');
				}
			}
			else{
				header('HTTP/1.1 500 Terjadi Kesalahan 1');
			}
		}
		else{
			// Menampilkan form untuk mengedit alternatif
			$this->db->select('*');
			$this->db->from('alters');
			$this->db->where('alters.idalter', $idalter);
			$data['dataalter'] = $this->db->get()->row();

			// Ambil periode yang tersedia
			$data['periode'] = $this->db->get('tahun')->result();

			// Ambil data kriteria terkait
			$this->db->select('*');
			$this->db->from('nilai_alter');
			$this->db->where('idalter', $idalter);
			$this->db->join('kriteria', 'nilai_alter.idkri = kriteria.idkri');
			$this->db->order_by('kriteria.idkri', 'ASC');
			$data['kriteria'] = $this->db->get()->result();

			// Ambil subkriteria
			$data['subkriteria'] = $this->SubKrite->list();

			// Tampilkan view edit alternatif
			$this->load->view('alters/edit_al', $data);
		}
	}

	function removealt(){
		if(isset($_POST) && count($_POST) > 0){
			$idalter=$this->input->post('idalter');
			$this->db->where('idalter', $idalter);
			$cek=$this->db->delete('nilai_alter');
			if($cek){
				$this->db->where('idalter', $idalter);
				$cek2=$this->db->delete('alters');
				if($cek2){
					echo "Hapus Berhasil";
				}
				else{
					header('HTTP/1.1 500 Hapus Gagal');
				}
			}
			else{
				header('HTTP/1.1 500 Terjadi Kesalahan 2');
			}
		}
		else{
			header('HTTP/1.1 500 Terjadi Kesalahan 1');
		}
	}

	function addalter(){
		if(isset($_POST) && count($_POST)>0){
			$idtahun=$this->input->post('id_tahun');
			$cekda=array('id_tahun'=>$idtahun);
			$available=$this->db->get_where('tahun',$cekda)->row();
			if($available->status==0){
				header('HTTP/1.1 500 Tahun Sudah Tidak Aktif');
			}
			else{
				$dataperiode=array(
					'ket'=>$this->input->post('ket'),
					'id_tahun'=>$idtahun,
					'status'=>$this->input->post('status')
				);

				$this->db->set($dataperiode);
				$cekmasuk=$this->db->insert('alters');
				
				if ($cekmasuk) {
					$noid=$this->db->insert_id();
					
					$this->db->select('*');
					$this->db->from('kriteria');
					$this->db->order_by('kriteria.idkri', 'ASC');
					$kriteria=$this->db->get()->result();

					foreach ($kriteria as $key) {
						$field_name = 'subkrit' . $key->idkri;
						$nilai = $this->input->post($field_name);
						
						if ($nilai !== null) {
							$object = array(
								'idalter'=>$noid,
								'idkri'=>$key->idkri,
								'nilai' => $nilai
							);
							$cekin=$this->db->insert('nilai_alter', $object);
						}
					}
					if(isset($cekin) && $cekin){
						echo "Berhasil Tambah Alternatif";
					}
					else{
						header('HTTP/1.1 500 Gagal Menambahkan');
					}
				}
				else{
					header('HTTP/1.1 500 Gagal Menambahkan');
				}
			}
		}
		else{
			$data['periode']=$this->db->get('tahun')->result();
			//KRITERIA
			$this->db->select('*');
			$this->db->from('kriteria');
			$this->db->order_by('kriteria.idkri', 'ASC');
			$data['kriteria'] = $this->db->get()->result();
			$data['subkriteria'] = $this->SubKrite->list();
			$data['role'] = $this->session->userdata('role');
			// print_r($data);
			$this->load->view('alters/add_al',$data);
		}
	}
}