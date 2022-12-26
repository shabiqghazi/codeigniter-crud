<?php

class Mahasiswa_model extends CI_Model {
	public function getAllMahasiswa(){
		return $this->db->get('mahasiswa')->result_array();
	}
	public function getMahasiswa($id){
		return $this->db->get_where('mahasiswa',['id' => $id])->result_array()[0];
	}
	public function insertDataMahasiswa(){
		$data = [
			'nama'=>$this->input->post('nama',true),
			'nim'=>$this->input->post('nim',true),
			'angkatan'=>$this->input->post('angkatan',true)
		];
		$this->db->insert('mahasiswa',$data);
	}
	public function deleteDataMahasiswa($id){
		$this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}
	public function updateDataMahasiswa($id){
		$data = [
			'nama'=>$this->input->post('nama',true),
			'nim'=>$this->input->post('nim',true),
			'angkatan'=>$this->input->post('angkatan',true)
		];
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('mahasiswa');
	}
	public function cariDataMahasiswa($keyword){
		$this->db->like('nama', $keyword, 'both');
		$this->db->or_like('nim', $keyword, 'both');
		$this->db->or_like('angkatan', $keyword, 'both');
		return $this->db->get('mahasiswa')->result_array();
	}
}