<?php

class Peoples_model extends CI_Model{
	public function getAllPeoples(){
		return $this->db->get('peoples')->result_array();
	}
	public function getPeoples($limit, $start, $keyword){
		$this->db->like('nama', $keyword, 'both');
		$this->db->or_like('alamat', $keyword, 'both');
		$this->db->or_like('email', $keyword, 'both');
		return $this->db->get('peoples',$limit,$start)->result_array();
	}
	public function countPeoples($keyword){
		$this->db->like('nama', $keyword, 'both');
		$this->db->or_like('alamat', $keyword, 'both');
		$this->db->or_like('email', $keyword, 'both');
		return $this->db->count_all_results('peoples');
	}
}