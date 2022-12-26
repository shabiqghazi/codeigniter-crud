<?php

class Mahasiswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index(){
		$data['judul'] = 'Daftar Mahasiswa';
		if($this->input->post('keyword')){
			$keyword = $this->input->post('keyword');
			$data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa($keyword);
		} else {
			$data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}
	public function detail($id){
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($id);
		$data['judul'] = 'Daftar Mahasiswa';
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/detail', $data);
		$this->load->view('templates/footer');
	}
	public function tambah(){
		$data['judul'] = 'Form Tambah Data Mahasiswa';
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nim','NIM','required|numeric');
		$this->form_validation->set_rules('angkatan','Angkatan','required|numeric');
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/tambah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa_model->insertDataMahasiswa();
			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('mahasiswa');
		}
	}
	public function hapus($id){
		$this->Mahasiswa_model->deleteDataMahasiswa($id);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('mahasiswa');
	}
	public function ubah($id){
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswa($id);
		$data['judul'] = 'Ubah Data Mahasiswa';
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nim','NIM','required|numeric');
		$this->form_validation->set_rules('angkatan','Angkatan','required|numeric');
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa_model->updateDataMahasiswa($id);
			$this->session->set_flashdata('flash', 'diubah');
			redirect('mahasiswa');
		}
	}
}