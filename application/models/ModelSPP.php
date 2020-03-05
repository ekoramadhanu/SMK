<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSPP extends CI_Model{
    public function createSPP($data){
        return $this->db->insert('spp',$data);
    }
    public function findSPPAll(){
        $query = "select * from spp";
        return  $this->db->query($query)->result(); 
    }
    public function findSPPByTahun($tahun){
        $query = "select * from spp where tahun =".$tahun;
        return  $this->db->query($query)->result(); 
    }
    public function deleteSPPById($id){
        return $this->db->delete('spp',['id_spp'=>$id]);
    }
    public function updateSPPById($id,$data){
        return $this->db->update('spp',$data,['id_spp'=>$id]);
    }
}
?>