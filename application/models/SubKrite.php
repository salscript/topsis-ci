<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubKrite extends CI_Model {
    function list(){
        return $this->db->get('subkriteria')->result();
    }
}
