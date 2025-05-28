<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenSup extends CI_Model {

    function list(){
        return $this->db->get('jenis_supplier')->result();
    }

    function get($id){
        $this->db->where('id', $id);
        return $this->db->get('jenis_supplier')->row();
    }

    function add($dataJenSup){
        $this->db->set($dataJenSup);
        if ($this->db->insert('jenis_supplier')) {
            $this->Fungsi->addhist(array(
                'menu' => 'Data Jenis Supplier',
                'aksi' => 'Tambah Jenis Supplier ID: ' . $this->db->insert_id(),
                'tanggal_aksi' => date('Y-m-d H:i:s'),
                'user_name' => $_SESSION['user']
            ));
            return true;
        } else {
            return false;
        }
    }

    function delete($cekJenSup){
        $this->db->select('id');
        $this->db->from('jenis_supplier');
        $this->db->where($cekJenSup);
        $available = $this->db->get();

        if ($available->num_rows() == 1) {
            $this->db->where($cekJenSup);
            $query = $this->db->delete('kriteria');
            if ($query) {
                // Ambil ID dari array $cekJenSup untuk ditampilkan dengan aman
                $id = isset($cekJenSup['id']) ? $cekJenSup['id'] : json_encode($cekJenSup);

                $this->Fungsi->addhist(array(
                    'menu' => 'Data Jenis Suppliers',
                    'aksi' => 'Hapus Jenis Suppliers ID: ' . $id,
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

    function edit($cekJenSup){
        $this->db->select('id');
        $this->db->from('jenis_supplier');
        $this->db->where($cekJenSup);
        $available = $this->db->get();

        if ($available->num_rows() == 1) {
            $dataJenSupp = array(
                'nama' => $this->input->post('nama'),
                'updated' => date('Y-m-d')
            );

            $this->db->where($cekJenSup);
            $updatedat = $this->db->update('jenis_supplier', $dataJenSupp);
            if ($updatedat) {
                $id = isset($cekJenSup['id']) ? $cekJenSup['id'] : json_encode($cekJenSup);

                $this->Fungsi->addhist(array(
                    'menu' => 'Data Jenis Supplier',
                    'aksi' => 'Ubah Data Jenis Supplier ID: ' . $id,
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
