<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockElpiji extends CI_Controller {
function __construct(){
		parent::__construct();
		$this->load->model('StockElpijiModel');
	}

function index(){
		$stock = $this->StockElpijiModel->getkeluar();
		$stockdtg = $this->StockElpijiModel->getdatang();
		$sisa = $this->StockElpijiModel->getsisa();

		foreach ($stock as $key) { $stock2 = $key['jumlah_gas']; }
		foreach ($stockdtg as $key) { $dtg = $key['jumlah_gas']; }
		foreach ($sisa as $key) { $sisa1 = $key['hasil']; }

		if($stockdtg=='NULL'){
			$stockdtg = 0;
		}

		if($sisa=='NULL'){
			$sisa = 0;
		}

		$stock3 = (int)$stock2;
		$dtg3 = (int)$dtg;
		$sisa3 = (int)$sisa;

		var_dump($stock3);
		var_dump($dtg3);
		var_dump($sisa3);
	
		$total = $sisa3 + $dtg3;

		$data['StockElpiji'] = array(
                'tanggal' => date('Y/m/d'),
                'stock_datang' => $dtg,
                'stock_keluar' => $stock2,
                'stock_total' => $total
            );
            // $this->StockElpijiModel->InsertData($data['StockElpiji']);
                        
		$data['StockElpiji'] = $this->StockElpijiModel->GetAll();	
		$this->load->view('Template/HeaderPangkalan');
		$this->load->view('StockElpiji/DataStockElpiji',$data);
		$this->load->view('Template/FooterPangkalan');
}

}