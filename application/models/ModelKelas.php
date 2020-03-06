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
        $check = "DELETE FROM kelas where id_kelas =".$id;
        if ( ! $this->db->simple_query($check)){
             return $error = $this->db->error();
        } else {
            $this->db->delete('kelas',['id_kelas'=>$id]);
            return $error = $this->db->error();
        }
    }
    public function updateKelasById($id,$data){
        return $this->db->update('kelas',$data,['id_kelas'=>$id]);
    }
}
?>