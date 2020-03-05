<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPetugas extends CI_Model{
    public function createPetugas($data){
        return $this->db->insert('petugas',$data);
    }
    public function findPetugasAll(){
        $query = "select id_petugas,username,nama_petugas,level from petugas";
        return  $this->db->query($query)->result(); 
    }
    public function deletePetugasById($id){
        return $this->db->delete('petugas',['id_petugas'=>$id]);
    }
    public function updatePetugasById($id,$data){
        return $this->db->update('petugas',$data,['id_petugas'=>$id]);
    }
    public function login($username,$password){
		$query = "select id_petugas,username,nama_petugas,level from petugas where username = '".$username."' and password = '".$password."'";
        return  $this->db->query($query)->result(); 
	}
}
?>