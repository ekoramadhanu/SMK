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
        $check = "DELETE FROM spp where id_spp =".$id;
        if ( ! $this->db->simple_query($check)){
             return $error = $this->db->error();
        } else {
            $this->db->delete('spp',['id_spp'=>$id]);
            return $error = $this->db->error();
        }
    }
    public function updateSPPById($id,$data){
        return $this->db->update('spp',$data,['id_spp'=>$id]);
    }
}
?>