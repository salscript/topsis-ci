<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubKrite extends CI_Model {
    function list(){
        return $this->db->get('subkriteria')->result();
    }

    function get($id){
        $this->db->where('idsub', $id);
        return $this->db->get('subkriteria')->row();
    }

    function add($data) {
        $this->db->set($data);
        if ($this->db->insert('subkriteria')) {
            $this->Fungsi->addhist(array(
                'menu' => 'Data Sub Kriteria',
                'aksi' => 'Tambah Sub Kriteria ID: ' . $this->db->insert_id(),
                'tanggal_aksi' => date('Y-m-d H:i:s'),
                'user_name' => $_SESSION['user']
            ));
            return true;
        } else {
            return false;
        }
    }

    function delete($cekperiod){
        $this->db->select('idsub');
        $this->db->from('subkriteria');
        $this->db->where($cekperiod);
        $available = $this->db->get();

        if ($available->num_rows() == 1) {
            $this->db->where($cekperiod);
            $query = $this->db->delete('subkriteria');
            if ($query) {
                // Ambil ID dari array $cekperiod untuk ditampilkan dengan aman
                $id = isset($cekperiod['idsub']) ? $cekperiod['idsub'] : json_encode($cekperiod);

                $this->Fungsi->addhist(array(
                    'menu' => 'Data Sub kriteria',
                    'aksi' => 'Hapus Sub Kriteria ID: ' . $id,
                    'tanggal_aksi' => date('Y-m-d H:i:s'),
                    'user_name' => $_SESSION['user']
                ));
                return true;
            } else {
                show_error('Terjadi Kesalahan saat menghapus data');
            }
        } else {
            return false;
        }
    }
    function edit($cekperiod){
        $this->db->select('idsub');
        $this->db->from('subkriteria');
        $this->db->where($cekperiod);
        $available = $this->db->get();

        if ($available->num_rows() == 1) {
            $dataperiode = array(
                'idkri' => $this->input->post('idkri'),
                'nama_sub' => $this->input->post('nama_sub'),
                'indikator' => $this->input->post('indikator'),
                'bobot' => $this->input->post('bobot')
            );

            $this->db->where($cekperiod);
            $updatedat = $this->db->update('subkriteria', $dataperiode);
            if ($updatedat) {
                $id = isset($cekperiod['idsub']) ? $cekperiod['idsub'] : json_encode($cekperiod);

                $this->Fungsi->addhist(array(
                    'menu' => 'Data Sub Kriteria',
                    'aksi' => 'Ubah Data Sub Kriteria ID: ' . $id,
                    'tanggal_aksi' => date('Y-m-d H:i:s'),
                    'user_name' => $_SESSION['user']
                ));
                return true;
            } else {
                show_error('Terjadi Kesalahan saat mengupdate data');
            }
        } else {
            return false;
        }
    }
}
