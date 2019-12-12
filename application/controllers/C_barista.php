<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barista extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_user();
		check_not_login();
        $this->load->library('form_validation');
        $this->load->model('m_barista', 'model');
    }

	public function index(){
		$sum = 0;
		$jumlah = 0;

		foreach ($this->model->hitung_total_tr() as $key => $value) {
			$sum += $value->jumlah;
			$jumlah++;
		}

		$data = array(
			'total' => $sum,
			'count' => $jumlah
		);

        $this->template->load('template', 'interface/v_dashboard', $data);
	}

	public function pesanan(){

		$data = array(
			'basic' => $this->model->get_menu_basic(),
			'premium' => $this->model->get_menu_premium(),
			'soklat' => $this->model->get_menu_soklat(),
			'choco_pm' => $this->model->get_menu_choco_pm(),
			'yakult' => $this->model->get_menu_yakult(),
			'juice' => $this->model->get_menu_juice(),
			'topping' => $this->model->get_topping()
		);

		$this->template->load('template', 'interface/v_pesanan', $data);
	}

	public function cek_order(){
		$this->template->load('template', 'interface/v_cekPesanan');
	}

	public function bubble(){
		$sisa = 0 ;
		$stok = 0 ;

		foreach ($this->model->extra_bubble() as $key => $value) {
			$stok= $value->total;
			$sisa = $value->sisa;
		}

		$data = array(
			'stok' => $stok,
			'sisa' => $sisa
		);
		$this->template->load('template', 'interface/v_bubble', $data);
	}

	public function stok(){

		$data = array(
			'basic' => $this->model->get_menu_basic(),
			'premium' => $this->model->get_menu_premium(),
			'soklat' => $this->model->get_menu_soklat(),
			'choco_pm' => $this->model->get_menu_choco_pm(),
			'yakult' => $this->model->get_menu_yakult(),
			'juice' => $this->model->get_menu_juice(),
			'topping' => $this->model->get_topping(),
			'ekstra' => $this->model->get_ekstra(),
			'inv_powder' => $this->model->inventory_powder(),
			'inv_topping' => $this->model->inventory_topping()
		);

		$this->template->load('template', 'interface/v_inventory', $data);
	}

	public function history(){
		$sum = 0;
		$jumlah = 0;

		foreach ($this->model->hitung_total_tr() as $key => $value) {
			$sum += $value->jumlah;
			$jumlah++;
		}

		$data = array(
			'total' => $sum,
			'count' => $jumlah
		);
		$this->template->load('template', 'interface/v_history', $data);
	}

	public function detail($id){
		// echo $id;
		$query = $this->model->detail_nota($id);
		if($query->num_rows() > 0 ){
			$data['row'] = $query->row();
			$data['result'] = $this->model->detail_transaksi($id);

			$this->template->load('template', 'interface/v_detailPesanan', $data);
		}
		else{
			echo "<script>alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('c_barista/cek_order')."'</script>";
		}
		
	}


	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Menampilkan menu menu dan topping >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	public function get_menu(){
		$data = $this->model->get_menu();
		echo json_encode($data);
	}

	public function get_topping(){
		$data = $this->model->get_topping();
		echo json_encode($data);
	}

	public function get_sajian(){
		$id = $this->input->post('id', TRUE);
		$data = $this->model->get_sajian($id);
		echo json_encode($data);
	}

	public function powder_min(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_powder_min($id);
	}

	public function powder_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_powder_plus($id);
	}

	public function topping_min(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_topping_min($id);	
	}

	public function topping_plus(){
		$id = $this->input->post('id', TRUE);
		$this->model->set_topping_plus($id);
	}

	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Membuat nota transaksi baru >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	public function new_nota(){
		$tgl = $this->input->get('tanggal', TRUE);
		$wkt = $this->input->get('waktu', TRUE);
		$pembeli = $this->input->get('pembeli', TRUE);
		$t_awal = $this->input->get('sub_total', TRUE);
		$dis = $this->input->get('dis', TRUE);
		$t_akhir = $this->input->get('total_akhir', TRUE);
		// $id_id_jadwal = $this->input->post('id_jadwal', TRUE);
		$id_staff = $this->input->get('id_staff', TRUE);
		$order_gojek = $this->input->get('order_gojek', TRUE);

		$data = $this->model->new_nota($tgl , $wkt , $pembeli , $t_awal , $dis , $t_akhir, $id_staff, $order_gojek);
		echo json_encode(array('tgl' => $tgl , 'wkt' => $wkt));
	}

	public function get_new_nota(){
		$tgl = $this->input->post('tanggal', TRUE);
		$wkt = $this->input->post('waktu', TRUE);

		$data = $this->model->get_new_nota($tgl, $wkt);
		echo json_encode($data);
	}

	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Simpan Detail Transaksi >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	public function save_detail(){
		$data_detail = $this->input->post('data_pesanan');
		$id_nota = $this->input->post('id_n');
		$order_gojek = $this->input->post('order_gojek');
		$id_region = $this->session->userdata('id_region');

		$status = $this->model->add_detail($data_detail , $id_nota, $id_region, $order_gojek);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	public function cek_pesanan(){
		$tanggal = $this->input->post('tanggal', TRUE);
		$data = $this->model->cek_pesanan($tanggal);
		echo json_encode($data);
	}

	public function update_status(){
		$id = $this->input->post('id', TRUE);

		$data = $this->model->update_status($id);
		echo json_encode($data);
	}

	public function list_history(){
		$id = $this->input->post('id', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$data = $this->model->history($id, $tanggal);
		echo json_encode($data);
	}

	// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< EXTRA MILK MIN >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	public function get_id_ekstra(){
		$id = $this->input->post('id', TRUE);

		$data = $this->model->get_id_ekstra($id);
		echo json_encode($data);
	}

	public function ekstra_min(){
		$id = $this->input->post('id', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$id_jenis = $this->input->post('id_jenis', TRUE);
		$sajian = $this->input->post('sajian', TRUE);
		if($sajian != null){
			$this->model->set_min_basic_pm_detail_ekstra($id,$id_jenis,$sajian);
		}		
		$this->model->ekstra_min($id, $qty);
		$this->model->update_detail_ekstra_min($id,$qty,$id_jenis);
	}

	public function ekstra_plus(){
		$id = $this->input->post('id', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$id_jenis = $this->input->post('id_jenis', TRUE);
		$sajian = $this->input->post('sajian', TRUE);
		if($sajian != null){
			$this->model->set_plus_basic_pm_detail_ekstra($id,$id_jenis,$sajian);
		}
		$this->model->ekstra_plus($id,$qty);
		$this->model->update_detail_ekstra_plus($id,$qty,$id_jenis);
	}

	public function cup_min(){
		$id = $this->input->post('id', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$id_jenis = $this->input->post('id_jenis', TRUE);
		$this->model->cup_min();
		$this->model->update_detail_ekstra_min($id,$qty,$id_jenis);
	}

	public function cup_plus(){
		$id = $this->input->post('id', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$id_jenis = $this->input->post('id_jenis', TRUE);
		$this->model->cup_plus();
		$this->model->update_detail_ekstra_plus($id,$qty,$id_jenis);
	}

	// 

	public function get_nama_sajian(){
		$id = $this->input->post('id_p', TRUE);
		$data = $this->model->get_nama_sajian($id);
		echo json_encode($data);
	}

	public function get_nama_topping(){
		$id = $this->input->post('id_t', TRUE);
		$data = $this->model->get_nama_topping($id);
		echo json_encode($data);
	}	

	public function cook_bubble(){
		$id = $this->input->post('id', TRUE);
		$jumlah = $this->input->post('jumlah', TRUE);

		$status = $this->model->cook_bubble($id,$jumlah);
		$this->model->ekstra_min($id,$jumlah);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}
}
