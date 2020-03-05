<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSiswa extends CI_Model{
    public function createSiswa($data){
        return $this->db->insert('siswa',$data);
    }
    public function countSiswa(){
        $query = "select * from siswa";
        return $this->db->query($query)->num_rows();
    }
    public function getMaxNISNSiswa(){
        $query = "select * from siswa order by nisn desc limit 1";
        return $this->db->query($query)->result();
    }
    public function findSiswaAll(){
        $query = "SELECT nisn,nis,nama,alamat,no_telp,nama_kelas,nominal FROM siswa join kelas on siswa.id_kelas = kelas.id_kelas join spp on siswa.id_spp = spp.id_spp";
        return  $this->db->query($query)->result(); 
    }
    public function findSiswaByNISN($nisn){
        $query = "SELECT nisn,nis,nama,alamat,no_telp,nama_kelas,nominal,siswa.id_spp 
        FROM siswa join kelas on siswa.id_kelas = kelas.id_kelas join spp on siswa.id_spp = spp.id_spp
         where nisn ='".$nisn."' ";
        return  $this->db->query($query)->result(); 
    }
    public function deleteSiswaById($id){
        return $this->db->delete('siswa',['nisn'=>$id]);
    }
    public function updateSiswaById($id,$data){
        return $this->db->update('siswa',$data,['nisn'=>$id]);
    }
    public function login($username,$password){
		$query = "select * from siswa where nisn = '".$username."' and nis = '".$password."'";
        return  $this->db->query($query)->result(); 
	}
}
?>