<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    function __construct(){
		parent::__construct();
		check_admin();
		check_not_login();
        $this->load->library('form_validation');
        $this->load->model('m_admin', 'model');
    }

	public function index(){
		$jumlah = 0;
		$omset = 0;
		foreach ($this->model->get_transaksi() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
		}
		$data = array(
			'region' => $this->model->get_region(),
			'powder' => $this->model->get_count_powder(),
			'topping' => $this->model->get_count_topping(),
			'karyawan' => $this->model->get_count_karyawan(),
			'profit' => $omset,
			'order' => $jumlah
		);
        $this->template_admin->load('template_admin','admin/dashboard/v_dashboard', $data);
	}

	public function profil(){
		$jumlah = 0;
		$omset = 0;
		foreach ($this->model->get_transaksi() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
		}

		$omset_total = 0;
		foreach ($this->model->get_omset_bulanan() as $key => $value) {
			$omset_total = $value->omset;
		}
		$data = array(
			'admin' => $this->model->get_admin()->row(),
			'omset_hari' => $omset,
			'total_penjualan' => $jumlah,
			'omset_bulanan' => $omset_total
		);
		$this->template_admin->load('template_admin', 'admin/profil/v_viewProfile', $data);
	}

	public function update_profil($id){
		if (isset($_POST['submit']) ){
			$nama = $this->input->post('nama',TRUE);
			$username = $this->input->post('username',TRUE);
			$email = $this->input->post('email',TRUE);
			$contact = $this->input->post('contact',TRUE);
			$alamat = $this->input->post('alamat',TRUE);
			$password = $this->input->post('password',TRUE);

			$this->model->update_profile($id,$nama,$username,$email,$contact,$alamat,$password);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash','Data Admin Berhasil Diubah');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/profil')."'</script>";
		}
	}

	public function shift1(){
		$jumlah = 0;
		$omset = 0;
		$status_proses = 0;	
		$status_succcess = 0;
		foreach ($this->model->get_transaksi_shift1() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
			if($value->status != 'Success'){
				$status_proses++;
			}
			else{
				$status_succcess++;
			}
		}
		$data = array(
			'jumlah' => $jumlah,
			'omset' => $omset,
			'proses' => $status_proses,
			'success' => $status_succcess,
			'region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin','admin/transaksi/v_shift1', $data);
	}

	public function shift2(){
		$jumlah = 0;
		$omset = 0;
		$status_proses = 0;	
		$status_succcess = 0;
		foreach ($this->model->get_shift2() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
			if($value->status != 'Success'){
				$status_proses++;
			}
			else{
				$status_succcess++;
			}
		}
		$data = array(
			'jumlah' => $jumlah,
			'omset' => $omset,
			'proses' => $status_proses,
			'success' => $status_succcess,
			'region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin','admin/transaksi/v_shift2', $data);
	}

	public function total_transaksi(){
		$jumlah = 0;
		$omset = 0;
		$status_proses = 0;	
		$status_succcess = 0;
		foreach ($this->model->get_transaksi() as $key => $value) {
			$jumlah++;
			$omset = $omset + $value->total;
			if($value->status != 'Success'){
				$status_proses++;
			}
			else{
				$status_succcess++;
			}
		}
		$data = array(
			'jumlah' => $jumlah,
			'omset' => $omset,
			'proses' => $status_proses,
			'success' => $status_succcess,
			'region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin','admin/transaksi/v_totalTransaksi', $data);
	}

	public function inventory(){
		$data = array(
			'region' => $this->model->get_region(),
			'basic' => $this->model->get_menu_basic(),
			'pm' => $this->model->get_menu_pm(),
			'soklat' => $this->model->get_menu_soklat(),
			'coklat_pm' => $this->model->get_menu_coklat_pm(),
			'yakult' => $this->model->get_menu_yakult(),
			'juice' => $this->model->get_menu_juice()
		);
		$this->template_admin->load('template_admin','admin/inventory/v_listInventory', $data);
	}

	public function insert_powder(){
		if (isset($_POST['submit'])) {
			# code...
		}
		else{
			$data = array(
				'jenis_menu' => $this->model->get_jenis_menu(),
				'region' => $this->model->get_region(),
				'sajian' => $this->model->get_sajian()
			);
			$this->template_admin->load('template_admin','admin/inventory/powder/v_addPowder', $data);
		}
	}

	public function update_powder(){
		#codee...
	}

	public function delete_powder(){
		#code...
	}

	public function update_varian($id, $region){
		if (isset($_POST['submit'])) {
			# code...
		}
		else{
			$data = array(
				'powder' => $this->model->get_powder($id,$region)
			);

			$query = $this->model->get_varian($id,$region);
			if ($query->num_rows() > 0) {
				$data['varian'] = $query->row();
			}

			$this->template_admin->load('template_admin','admin/inventory/powder/v_listpowder', $data);
		}
	}

	public function action_update_varian(){
		$id = $this->input->post('id', TRUE);
		$sisa = $this->input->post('sisa', TRUE);
		$penambahan = $this->input->post('penambahan', TRUE);
		$region = $this->input->post('region', TRUE);

		$this->model->insert_transaksi_penambahan(null, $id, null, $region, $penambahan);
		$status = $this->model->update_varian($id,$sisa,$penambahan);

		$this->output->set_content_type('application/json');
		echo json_encode(array('status' => $status));
	}

	public function delete_varian($id){
		$this->model->delete_varian($id);

		$this->session->set_flashdata('flash','Data Varian Berhasil Dihapus');

		echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
	}

	public function insert_topping(){
		if (isset($_POST['submit'])) {
			$nama_topping = $this->input->post('nama',TRUE);
			$harga = $this->input->post('harga', TRUE);
			$stok = $this->input->post('stok', TRUE);
			$region = $this->input->post('region', TRUE);

			$this->model->insert_topping($nama_topping, $harga, $stok, $region);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash','Data Topping Berhasil Ditambahkan');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";

		}
		else{
			$data = array(
				'region' => $this->model->get_region()
			);
			$this->template_admin->load('template_admin','admin/inventory/topping/v_addTopping', $data);
		}
	}	

	public function update_topping($id){
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$harga = $this->input->post('harga', TRUE);
			$penambahan = $this->input->post('penambahan', TRUE);
			$sisa = $this->input->post('sisa', TRUE);
			$id_region = $this->input->post('id_region', TRUE);

			$this->model->insert_transaksi_penambahan(null, null, $id, $id_region, $penambahan);
			$this->model->update_topping($id, $nama, $harga, $penambahan, $sisa);

			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('flash','Data Topping Berhasil Diubah');
			}
			echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
		}
		else{
			$query = $this->model->get_topping($id);
			if($query->num_rows() > 0){
				$data['topping'] = $query->row();
				$this->template_admin->load('template_admin','admin/inventory/topping/v_updateTopping', $data);
			}
			else{
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('index.php/c_admin/inventory')."'</script>";
			}
			
		}
	}

	public function delete_topping($id){
		$this->model->delete_topping($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash','Data Topping Berhasil Dihapus');
		}

		echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
	}

	public function insert_ekstra(){
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$stok = $this->input->post('stok', TRUE);
			$satuan = $this->input->post('satuan', TRUE);
			$region = $this->input->post('id_region', TRUE);

			$this->model->insert_ekstra($nama, $stok, $satuan, $region);
			if($this->db->affected_rows() > 0){
				$query = $this->model->get_id_ekstra($nama, $satuan, $region);

				if($query->num_rows() > 0){
					$row = $query->row();

					$id_ekstra = $row->id_ekstra;

					$this->model->insert_detail_ekstra($id_ekstra);

					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('flash','Data Ekstra Berhasil Disimpan');
					}
				}
				
			}
			echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
		}
		else{
			$data = array(
				'region' => $this->model->get_region()
			);
			$this->template_admin->load('template_admin','admin/inventory/ekstra/v_addEkstra', $data);
		}		
	}

	public function update_ekstra($id){
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$sisa = $this->input->post('sisa', TRUE);
			$satuan = $this->input->post('satuan', TRUE);
			$penambahan = $this->input->post('penambahan', TRUE);
			$region = $this->input->post('id_region', TRUE);

			$this->model->insert_transaksi_penambahan($id, null, null, $region, $penambahan);

			$this->model->update_ekstra($id, $nama, $sisa, $penambahan, $satuan);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash','Data Ekstra Berhasil Diubah');
			}
			echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
		}
		else{
			$data = array(
				'region' => $this->model->get_region()
			);

			$query = $this->model->get_ekstra($id);

			if ($query->num_rows() > 0) {
				$data['ekstra'] = $query->row();
				$this->template_admin->load('template_admin','admin/inventory/ekstra/v_updateEkstra', $data);
			}
			else{
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('index.php/c_admin/inventory')."'</script>";
			}
			
		}
	}

	public function delete_ekstra($id){
		$this->model->delete_ekstra($id);

		if ($this->db->affected_rows > 0) {
			$this->session->set_flashdata('flash','Data Ekstra Berhasil Dihapus');
		}

		echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
	}

	public function upload_file(){
		$this->template_admin->load('template_admin','admin/inventory/upload/v_uploadData');
	}

	public function discount(){
		$data = array(
			'data_diskon' => $this->model->get_diskon()
		);
		$this->template_admin->load('template_admin','admin/diskon/v_diskon', $data);
	}

	public function add_diskon(){
		$this->template_admin->load('template_admin','admin/diskon/v_addDiskon');
	}

	public function insert_diskon(){
		if (isset($_POST['submit'])) {		
		
			$nominal = $this->input->post('nominal', TRUE);
			$min_pembelian = $this->input->post('min_pembelian', TRUE);

			$this->model->insert_diskon($nominal,$min_pembelian);

			if($this->db->affected_rows()>0){
				$this->session->set_flashdata('flash','Data Diskon Berhasil Ditambahkan');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/discount')."'</script>";

		}
	}

	public function update_diskon($id){
		if (isset($_POST['submit'])) {
			// $id = $this->input->post('id', TRUE);
			$total = $this->input->post('nominal', TRUE);
			$min_pembelian = $this->input->post('min_pembelian', TRUE);

			$query = $this->model->update_diskon($id, $total, $min_pembelian);
			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('flash','Data Diskon Berhasil Diubah');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/discount')."'</script>";
		}
		else{
			$query = $this->model->get_diskon($id);
			if($query->num_rows() > 0){
				$data['diskon'] = $query->row();
				$this->template_admin->load('template_admin','admin/diskon/v_updateDiskon', $data);
			}
			else{
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('index.php/c_admin/diskon')."'</script>";
			}
		}
	}

	public function delete_diskon($id){
		$this->model->delete_diskon($id);

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('flash','Data Diskon Berhasil Dihapus');
		}

		echo "<script>window.location='".base_url('index.php/c_admin/discount')."'</script>";
	}

	public function region(){
		$data = array(
			'data_region' => $this->model->get_region()
		);
		$this->template_admin->load('template_admin','admin/region/v_cabang', $data);
	}

	public function add_region(){
		$this->template_admin->load('template_admin','admin/region/v_addRegion');
	}

	public function insert_region(){
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$alamat = $this->input->post('alamat', TRUE);

			$this->model->insert_region($nama,$alamat);
			if($this->db->affected_rows()>0){
				$this->session->set_flashdata('flash','Data Region Berhasil Ditambahkan');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/region')."'</script>";
		}
	}

	public function update_region($id){
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama', TRUE);
			$alamat = $this->input->post('alamat', TRUE);

			$this->model->update_region($id, $nama, $alamat);

			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('flash','Data Region Berhasil Diubah');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/region')."'</script>";
		}
		else{
			$query = $this->model->get_region($id);
			if ($query->num_rows() > 0) {
				$data['region'] = $query->row();
				$this->template_admin->load('template_admin','admin/region/v_updateRegion', $data);
			}
			else{
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('index.php/c_admin/region')."'</script>";
			}
		}
	}

	public function delete_region($id){
		$this->model->delete_region($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('flash','Data Region Berhasil Dihapus');
		}
		echo "<script>window.location='".base_url('index.php/c_admin/region')."'</script>";
	}

	public function karyawan(){
		$data  = array(
			'data_karyawan' => $this->model->get_data_karyawan()
		);
		$this->template_admin->load('template_admin','admin/karyawan/v_karyawan', $data);
	}

	public function add_karyawan(){
		$this->template_admin->load('template_admin','admin/karyawan/v_addKaryawan');
	}

	public function insert_karyawan(){
		if(isset($_POST['submit'])){
			$id = $this->input->post('id', TRUE);
			$nama = $this->input->post('nama',TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$kontak = $this->input->post('kontak', TRUE);
			$email = $this->input->post('email', TRUE);
			$alamat = $this->input->post('alamat',TRUE);

			$this->model->insert_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat);

			if($this->db->affected_rows()>0){
				$this->session->set_flashdata('flash','Data Karyawan Berhasil Ditambahkan');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/karyawan')."'</script>";
		}
	}

	public function update_karyawan($id){
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama',TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$kontak = $this->input->post('kontak', TRUE);
			$email = $this->input->post('email', TRUE);
			$alamat = $this->input->post('alamat',TRUE);

			$this->model->update_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash','Data Karyawan Berhasil DiUbah');
			}

			echo "<script>window.location='".base_url('index.php/c_admin/karyawan')."'</script>";
		}
		else{
			$query = $this->model->get_data_karyawan($id);

			if($query->num_rows() > 0){
				$data['staff'] = $query->row();
				$this->template_admin->load('template_admin','admin/karyawan/v_updateKaryawan', $data);
			}
			else{
				echo "<script>alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('index.php/c_admin/karyawan')."'</script>";
			}
		}
	}

	public function delete_karyawan($id){
		$this->model->delete_karyawan($id);

		if($this->db->affected_rows () > 0){
			$this->session->set_flashdata('flash','Data Karyawan Berhasil Dihapus');
		}

		echo "<script>window.location='".base_url('index.php/c_admin/karyawan')."'</script>";
	}

	public function list_penambahan(){
		$data = array(
			'data' => $this->model->get_transaksi_penambahan()
		);
		$this->template_admin->load('template_admin','admin/laporan_penambahan/v_listPenambahan', $data);
	}

	public function get_transaksi_penambahan(){
		$tanggal = $this->input->post('tanggal', TRUE);

		$data = $this->model->get_transaksi_penambahan($tanggal);

		echo json_encode($data);

	}

	public function get_search_transaksi(){
		$tanggal = $this->input->post('tanggal', TRUE);
		$region = $this->input->post('region', TRUE);
		$shift = $this->input->post('id',TRUE);

		$data = $this->model->get_search_transaksi($tanggal, $region, $shift);

		echo json_encode($data);
	}

	public function get_laporan_pemakaian(){
		$data = array(
			'powder' => $this->model->get_pakai_powder(),
			'topping' => $this->model->get_pakai_topping(),
			'penjualan' => $this->model->get_penjualan()
		);
		$this->template_admin->load('template_admin','admin/laporan_pemakaian/v_listPemakaian', $data);
	}
}