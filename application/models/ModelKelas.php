<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKelas extends CI_Model{
    public function createKelas($data){
        return $this->db->insert('kelas',$data);
    }
    public function findKelasAll(){
        $query = "select * from kelas";
        return  $this->db->query($query)->result(); 
    }
    public function deleteKelasById($id){
        return $this->db->delete('kelas',['id_kelas'=>$id]);
    }
    public function updateKelasById($id,$data){
        return $this->db->update('kelas',$data,['id_kelas'=>$id]);
    }
}
?>