<?php 

class Peoples extends CI_Controller{
	public $dataperpage = 10;

	public function index($dataperpage = 10,$halaman = 1,$keyword = null){
		if (isset($_POST['search'])) {
			$keyword = $_POST['keyword'];
			redirect('peoples/index/'. $dataperpage . '/' . 1 . '/' . $keyword);
		}
		$start = ($halaman - 1) * $dataperpage;
		$data['start'] = $start;
		$data['perpage'] = $dataperpage;
		$data['halaman'] = $halaman;
		$data['keyword'] = $keyword;
		$data['judul'] = 'Peoples';
		$data['peoples'] = $this->Peoples_model->getPeoples($data['perpage'],$data['start'],$keyword);
		$data['allpeoples'] = $this->Peoples_model->countPeoples($keyword);
		$batas = 2;

		$data['jmlpage'] = ceil($data['allpeoples']/$dataperpage);
		for ( $i = 1 ; $i <= $data['jmlpage']  ; $i++ ) { 
			if ( ($halaman - $i <= $batas && $halaman - $i >= 0) || $i - $halaman <= $batas && $i - $halaman >= 0){
				$data['pagination'][] = $i;
			}
		}
	
		$this->load->view('templates/header', $data);
		$this->load->view('peoples/index', $data);
		$this->load->view('templates/footer');
	}

}