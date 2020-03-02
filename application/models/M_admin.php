<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	public function get_admin()
	{
		$id = $this->session->userdata('id_staff');

		$this->db->select('*')
			->from('staff')
			->where('level', 1)
			->where('id_staff', $id);
		$query = $this->db->get();

		return $query;
	}

	public function update_profile($id, $nama, $username, $email, $contact, $alamat, $password)
	{
		$data = array(
			'Nama' => $nama,
			'username' => $username,
			'contact' => $contact,
			'alamat' => $alamat,
			'email' => $email
		);

		if (!empty($password)) {
			$data['password'] = $password;
		}

		$this->db->where('id_staff', $id)
			->update('staff', $data);
	}

	public function get_omset_bulanan()
	{
		$mon = date('m');

		$this->db->select('SUM(total) as omset')
			->from('jual')
			->where('MONTH(tanggal)', $mon);
		$sql = $this->db->get();

		return $sql->result();
	}

	public function get_count_powder()
	{
		$sql = $this->db->count_all_results('powder');

		return $sql;
	}

	public function get_count_topping()
	{
		return $this->db->count_all_results('topping');
	}

	public function get_count_karyawan()
	{
		$this->db->where('level', 2)
			->from('staff');

		return $this->db->count_all_results();
	}

	public function get_menu_basic()
	{
		$this->db->where('id_jenis', 1)
			->from('powder');

		return $this->db->count_all_results();
	}

	public function get_menu_pm()
	{
		$this->db->where('id_jenis', 2)
			->from('powder');

		return $this->db->count_all_results();
	}

	public function get_menu_soklat()
	{
		$this->db->where('id_jenis', 3)
			->from('powder');

		return $this->db->count_all_results();
	}

	public function get_menu_coklat_pm()
	{
		$this->db->where('id_jenis', 4)
			->from('powder');

		return $this->db->count_all_results();
	}

	public function get_menu_yakult()
	{
		$this->db->where('id_jenis', 5)
			->from('powder');

		return $this->db->count_all_results();
	}

	public function get_menu_juice()
	{
		$this->db->where('id_jenis', 6)
			->from('powder');

		return $this->db->count_all_results();
	}

	/* =========================================== Transactions Models ================================================ */
	public function get_transaksi_shift1()
	{
		$currentDate = date('Y-m-d');

		$this->db->select('*')
			->from('jual')
			->where('tanggal', $currentDate)
			->where('waktu >=', '08:00:00')
			->where('waktu <=', '16:00:00');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_shift2()
	{
		$currentDate = date('Y-m-d');

		$this->db->select('*')
			->from('jual')
			->where('tanggal', $currentDate)
			->where('waktu >=', '16:00:00')
			->where('waktu <=', '22:00:00');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_transaksi()
	{
		$currentDate = date('Y-m-d');

		$this->db->select('*')
			->from('jual')
			->where('tanggal', $currentDate);
		$query = $this->db->get();

		return $query->result();
	}

	/* =========================================== Menus Models ================================================ */
	public function get_jenis_menu()
	{
		$this->db->select('*')
			->from('jenis_menu');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_sajian()
	{
		$this->db->select('*')
			->from('penyajian');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_varian($id, $region)
	{
		$this->db->select('*')
			->from('varian_powder')
			->join('region', 'varian_powder.id_region = region.id_region')
			->where('varian_powder.id_varian', $id)
			->where('varian_powder.id_region', $region);
		$query = $this->db->get();

		return $query;
	}

	public function get_id_varian($nama, $stock, $region)
	{
		$this->db->select('*')
			->from('varian_powder')
			->where('nama_varian', $nama)
			->where('stok_awal', $stock)
			->where('id_region', $region);
		$query = $this->db->get();

		return $query;
	}

	public function get_id_powder($jenis, $nama, $id_varian)
	{
		$this->db->select('*')
			->from('powder')
			->where('id_jenis', $jenis)
			->where('nama_powder', $nama)
			->where('id_varian', $id_varian);
		$query = $this->db->get();

		return $query;
	}

	public function update_varian($id, $sisa, $penambahan)
	{
		$tambah = NULL;

		$this->db->select('sisa')
			->where('id_varian', $id);
		$query = $this->db->get('varian_powder');
		$row = $query->row();
		$stock_awal = $row->sisa;

		$data = array(
			'stok_awal' => $stock_awal,
			'penambahan' => $penambahan,
			'total' => $tambah = $sisa + $penambahan,
			'sisa' => $tambah
		);

		$this->db->where('id_varian', $id)
			->update('varian_powder', $data);

		return 'success';
	}

	public function delete_varian($id)
	{
		$this->db->where('id_varian', $id)
			->delete('varian_powder');
	}

	public function delete_powder_penyajian($id_powder, $id_penyajian)
	{
		$this->db->where('id_powder', $id_powder)
			->where('id_penyajian', $id_penyajian)
			->delete('detail_penyajian');
	}

	public function get_powder($id, $region)
	{
		$this->db->select('*')
			->from('powder')
			->join('detail_penyajian', 'powder.id_powder = detail_penyajian.id_powder')
			->join('penyajian', 'detail_penyajian.id_penyajian = penyajian.id_penyajian')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_varian', $id)
			->where('varian_powder.id_region', $region);
		$query = $this->db->get();

		return $query->result();
	}

	public function update_powder()
	{
		#code...
	}

	public function update_menu_peny($id_powder, $id_peny, $harga)
	{
		$data = array(
			'harga' => $harga
		);

		$this->db->where('id_powder', $id_powder)
			->where('id_penyajian', $id_peny)
			->update('detail_penyajian', $data);

		if ($this->db->affected_rows() > 0) {
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function delete_powder($id)
	{
		$this->db->where('id_powder', $id)
			->delete('powder');
	}

	public function get_topping($id = null)
	{
		$this->db->select('*')
			->from('topping');

		if ($id != null) {
			$this->db->where('id_topping', $id);
			$query = $this->db->get();

			return $query;
		} else {
			$query = $this->db->get();

			return $query->result();
		}
	}

	public function insert_topping($nama, $harga, $stok, $region)
	{
		$data = array(
			'nama_topping' => $nama,
			'harga' => $harga,
			'stock_awal' => $stok,
			'penambahan' => 0,
			'total' => $stok,
			'sisa' => $stok,
			'id_region' => $region
		);

		$this->db->insert('topping', $data);
	}

	public function update_topping($id, $nama, $harga, $penambahan, $sisa)
	{
		$data = array();

		if (!empty($nama)) {
			$data['nama_topping'] = $nama;
		}

		if (!empty($harga)) {
			$data['harga'] = $harga;
		}

		if (!empty($penambahan)) {
			$data['stock_awal'] = $sisa;
			$data['penambahan'] = $penambahan;
			$data['total'] = $sisa + $penambahan;
			$data['sisa'] = $data['total'];
		}

		$this->db->where('id_topping', $id)
			->update('topping', $data);
	}

	public function delete_topping($id)
	{
		$this->db->where('id_topping', $id)
			->delete('topping');
	}

	public function get_ekstra($id = null)
	{
		$this->db->select('*')
			->from('ekstra');

		if ($id != null) {
			$this->db->where('id_ekstra', $id);
			$query = $this->db->get();

			return $query;
		}
	}

	public function get_id_ekstra($nama, $satuan, $region)
	{
		$this->db->select('*')
			->from('ekstra')
			->where('nama_ekstra', $nama)
			->where('satuan', $satuan)
			->where('id_region', $region);
		$query = $this->db->get();

		return $query;
	}

	public function insert_ekstra($nama, $stok, $satuan, $region)
	{
		$data = array(
			'nama_ekstra' => $nama,
			'stock_awal' => $stok,
			'penambahan' => 0,
			'total' => $stok,
			'sisa' => $stok,
			'satuan' => $satuan,
			'id_region' => $region
		);

		$this->db->insert('ekstra', $data);
	}

	public function insert_detail_ekstra($id)
	{
		for ($i = 1; $i <= 6; $i++) {
			$data = array(
				'id_ekstra' => $id,
				'id_jenis' => $i,
				'pemakaian' => 0
			);

			$this->db->insert('detail_ekstra', $data);
		}
	}

	public function update_ekstra($id, $nama, $sisa, $penambahan, $satuan)
	{
		$data = array();

		if (!empty($nama)) {
			$data['nama_ekstra'] = $nama;
		}

		if (!empty($satuan)) {
			$data['satuan'] = $satuan;
		}

		if (!empty($penambahan)) {
			$data['stock_awal'] = $sisa;
			$data['penambahan'] = $penambahan;
			$data['total'] = $sisa + $penambahan;
			$data['sisa'] = $data['total'];
		}

		$this->db->where('id_ekstra', $id)
			->update('ekstra', $data);
	}

	public function delete_ekstra($id)
	{
		$this->db->where('id_ekstra', $id)
			->delete('ekstra');
	}

	public function get_diskon($id = null)
	{
		$this->db->select('*')
			->from('diskon');

		if ($id != null) {
			$this->db->where('id_diskon', $id);
			$query = $this->db->get();

			return $query;
		} else {
			$query = $this->db->get();

			return $query->result();
		}
	}

	public function insert_diskon($nominal, $min_pembelian)
	{
		$data = array(
			'total_diskon' => $nominal,
			'min_pembelian' => $min_pembelian
		);

		$this->db->insert('diskon', $data);
	}

	public function update_diskon($id, $total, $min_pembelian)
	{
		$data = array(
			'total_diskon' => $total,
			'min_pembelian' => $min_pembelian
		);

		$this->db->where('id_diskon', $id)
			->update('diskon', $data);
	}

	public function delete_diskon($id)
	{
		$this->db->where('id_diskon', $id)
			->delete('diskon');
	}

	public function get_region($id = null)
	{
		$this->db->select('*')
			->from('region');

		if ($id != null) {
			$this->db->where('id_region', $id);
			$query = $this->db->get();

			return $query;
		} else {
			$query = $this->db->get();

			return $query->result();
		}
	}

	public function insert_region($nama, $alamat)
	{
		$data = array(
			'nama_region' => $nama,
			'alamat' => $alamat
		);

		$this->db->insert('region', $data);
	}

	public function update_region($id, $nama, $alamat)
	{
		$data = array(
			'nama_region' => $nama,
			'alamat' => $alamat
		);

		$this->db->where('id_region', $id)
			->update('region', $data);
	}

	public function delete_region($id)
	{
		$this->db->where('id_region', $id)
			->delete('region');
	}

	public function get_data_karyawan($id = null)
	{
		$this->db->select('*')
			->from('staff')
			->where('level', 2);

		if ($id != null) {
			$this->db->where('id_staff', $id);
			$query = $this->db->get();

			return $query;
		} else {
			$query = $this->db->get();

			return $query->result();
		}
	}

	public function insert_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat)
	{
		$data = array(
			'id_staff' => $id,
			'Nama' => $nama,
			'username' => $username,
			'password' => $password,
			'contact' => $kontak,
			'alamat' => $alamat,
			'email' => $email
		);

		$this->db->insert('staff', $data);
	}

	public function update_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat)
	{
		$data = array(
			'Nama' => $nama,
			'username' => $username,
			'contact' => $kontak,
			'alamat' => $alamat,
			'email' => $email
		);

		if (!empty($password)) {
			$data['password'] = $password;
		}

		$this->db->where('id_staff', $id)
			->update('staff', $data);
	}

	public function delete_karyawan($id)
	{
		$this->db->where('id_staff', $id)
			->delete('staff');
	}

	public function insert_transaksi_penambahan($id_ekstra = null, $id_varian = null, $id_topping = null, $id_region, $penambahan)
	{
		$currentDate = date('Y-m-d');
		$time = date('h:i:s');

		$data = array(
			'tanggal' => $currentDate,
			'waktu' => $time,
			'penambahan_stok' => $penambahan,
			'id_region' => $id_region
		);

		if ($id_ekstra != null) {
			$data['id_ekstra'] = $id_ekstra;
		}

		if ($id_varian != null) {
			$data['id_varian'] = $id_varian;
		}

		if ($id_topping != null) {
			$data['id_topping'] = $id_topping;
		}

		$this->db->insert('transaksi_penambahan', $data);
	}

	public function get_transaksi_penambahan($tanggal = null, $tgl_selesai = null)
	{
		$currentDate = date('Y-m-d');

		$this->db->select('*')
			->from('transaksi_penambahan')
			->join('varian_powder', 'transaksi_penambahan.id_varian = varian_powder.id_varian', 'left')
			->join('ekstra', 'transaksi_penambahan.id_ekstra = ekstra.id_ekstra', 'left')
			->join('topping', 'transaksi_penambahan.id_topping = topping.id_topping', 'left')
			->join('region', 'transaksi_penambahan.id_region = region.id_region', 'left');

		if ($tanggal != null && $tgl_selesai != null) {
			$this->db->where('transaksi_penambahan.tanggal >=', $tanggal)
				->where('transaksi_penambahan.tanggal <=', $tgl_selesai);
		} else if ($tanggal != null) {
			$this->db->where('transaksi_penambahan.tanggal', $tanggal);
		} else {
			$this->db->where('transaksi_penambahan.tanggal', $currentDate);
		}
		$query = $this->db->get();

		return $query->result();
	}

	public function get_search_transaksi($tanggal, $region, $shift, $tgl_selesai = null)
	{
		$this->db->select('*')
			->from('detail_transaksi')
			->join('jual', 'detail_transaksi.no_nota = jual.no_nota')
			->join('staff', 'jual.id_staff = staff.id_staff')
			->join('powder', 'detail_transaksi.id_powder = powder.id_powder')
			->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian', 'left')
			->join('topping', 'detail_transaksi.id_topping = topping.id_topping', 'left');
			
		if ($shift == "shift1") {
			$this->db->where('jual.waktu >=', '08:00:00')
				->where('jual.waktu <=', '16:00:00');
		} else if ($shift == "shift2") {
			$this->db->where('jual.waktu >', '16:00:00')
				->where('jual.waktu <=', '22:00:00');
		}

		if ($tgl_selesai != null) {
			$this->db->where('jual.tanggal >=', $tanggal)
				->where('jual.tanggal <=', $tgl_selesai);
		} else {
			$this->db->where('jual.tanggal', $tanggal);
		}

		$this->db->where('detail_transaksi.id_region', $region);
		$query = $this->db->get();

		return $query->result();
	}

	public function get_pakai_powder($tanggal = null, $shift = null, $region = null)
	{
		$mulai = 0;
		$akhir = 0;
		if ($shift == "shift1") {
			$mulai = "08:00:00";
			$akhir = "16:00:00"; 
		}
		else if($shift == "shift2"){
			$mulai = "16:00:00";
			$akhir = "22:00:00";
		}
		else{
			$mulai = "08:00:00";
			$akhir = "22:00:00";
		}

		$this->db->select('nama_powder, stok_awal, penambahan, id_penyajian, 
			SUM(IF(id_penyajian = 1 && tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) as basic_use, 
			SUM(IF(id_penyajian = 2 && tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) as pm_use,
			SUM(IF(id_penyajian = 3 && tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) as hot_use,	
			SUM(IF(id_penyajian = 4 && tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) as yakult_use,	
			SUM(IF(id_penyajian = 5 && tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) as juice_use,	
			sisa')
			->from('record_pemakaian')
			->join('powder', 'record_pemakaian.id_powder = powder.id_powder', 'RIGHT')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('varian_powder.id_region', $region)
			->group_by('powder.nama_powder');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_pakai_topping($tanggal = null, $shift = null, $region = null)
	{
		$mulai = 0;
		$akhir = 0;
		if ($shift == "shift1") {
			$mulai = "08:00:00";
			$akhir = "16:00:00"; 
		}
		else if($shift == "shift2"){
			$mulai = "16:00:00";
			$akhir = "22:00:00";
		}
		else{
			$mulai = "08:00:00";
			$akhir = "22:00:00";
		}

		$this->db->select('nama_topping, SUM(IF(tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) as pakai, harga, harga_jual')
			->from('record_pemakaian')
			->join('topping', 'record_pemakaian.id_topping = topping.id_topping', 'RIGHT')
			->where('topping.id_region', $region)
			->group_by('topping.nama_topping');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_penjualan($tanggal = null, $shift = null, $region = null)
	{

		$mulai = 0;
		$akhir = 0;
		if ($shift == "shift1") {
			$mulai = "08:00:00";
			$akhir = "16:00:00"; 
		}
		else if($shift == "shift2"){
			$mulai = "16:00:00";
			$akhir = "22:00:00";
		}
		else{
			$mulai = "08:00:00";
			$akhir = "22:00:00";
		}

		$this->db->select('nama_jenis, nama_penyajian, SUM(IF(tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', pemakaian, NULL)) AS pakai, harga_jual')
			->from('record_pemakaian')
			->join('powder', 'record_pemakaian.id_powder = powder.id_powder', 'RIGHT')
			->join('penyajian', 'record_pemakaian.id_penyajian = penyajian.id_penyajian')
			// ->join('detail_penyajian', 'detail_penyajian.id_powder = powder.id_powder')
			->join('jenis_menu', 'powder.id_jenis = jenis_menu.id_jenis')
			->where('record_pemakaian.id_region', $region)
			->group_by('jenis_menu.nama_jenis, penyajian.id_penyajian');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_pakai_susu_putih($tanggal = null, $shift = null, $region = null)
	{
		$this->db->select('e.nama_ekstra, j.nama_jenis, de.basic, de.pm, de.pemakaian, de.yakult, r.id_region')
			->from('detail_ekstra de')
			->join('jenis_menu j', 'j.id_jenis = de.id_jenis')
			->join('ekstra e', 'e.id_ekstra = de.id_ekstra')
			->join('region r', 'r.id_region = e.id_region', 'LEFT')
			->where('e.nama_ekstra', 'Susu Putih')
			->where("(j.nama_jenis = 'Basic' OR j.nama_jenis = 'Premium' OR j.nama_jenis = 'Yakult')")
			// ->where("(de.basic != '1' OR de.pm != '1')")
			->where('e.id_region', 1)
			->order_by('j.nama_jenis')
			->group_by('j.nama_jenis');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_pakai_susu_coklat($tanggal = null, $shift = null, $region = null)
	{
		$this->db->select('e.nama_ekstra, j.nama_jenis, de.basic, de.pm, de.pemakaian, r.id_region')
			->from('detail_ekstra de')
			->join('jenis_menu j', 'j.id_jenis = de.id_jenis')
			->join('ekstra e', 'e.id_ekstra = de.id_ekstra')
			->join('region r', 'r.id_region = e.id_region', 'LEFT')
			->where('e.nama_ekstra', 'Susu Coklat')
			->where("(j.nama_jenis = 'Soklat' OR j.nama_jenis = 'Choco Premium')")
			->where("(de.basic != '1' OR de.pm != '1')")
			->where('e.id_region', 1)
			->order_by('j.nama_jenis')
			->group_by('j.nama_jenis');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_pakai_ekstra($tanggal = null, $shift = null, $region = null)
	{
		$mulai = 0;
		$akhir = 0;
		if ($shift == "shift1") {
			$mulai = "08:00:00";
			$akhir = "16:00:00"; 
		}
		else if($shift == "shift2"){
			$mulai = "16:00:00";
			$akhir = "22:00:00";
		}
		else{
			$mulai = "08:00:00";
			$akhir = "22:00:00";
		}
		$this->db->select('nama_ekstra , stock_awal, sisa, penambahan,
			Round(SUM(IF(tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', (pm + basic), null)),2) AS pakai_susu,
			Round(SUM(IF(tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.', sirup, null)),2) AS sirup, 
			SUM(IF(tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.',pemakaian, null)) AS pakai')
			->from('record_pemakaian')
			->join('ekstra', 'record_pemakaian.id_ekstra = ekstra.id_ekstra', 'RIGHT')
			->where('ekstra.id_region', $region)
			->group_by('ekstra.nama_ekstra');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_masak_bubble($tanggal = null, $shift = null, $region = null)
	{
		$mulai = 0;
		$akhir = 0;
		if ($shift == "shift1") {
			$mulai = "08:00:00";
			$akhir = "16:00:00"; 
		}
		else if($shift == "shift2"){
			$mulai = "16:00:00";
			$akhir = "22:00:00";
		}
		else{
			$mulai = "08:00:00";
			$akhir = "22:00:00";
		}
		$this->db->select('waktu , nama_ekstra, stock_awal , SUM(IF(tanggal = "'.$tanggal.'" && waktu >= "'.$mulai.'" && waktu <= "'.$akhir.'" && record_pemakaian.id_region = '.$region.',record_pemakaian.pemakaian, null)) AS pakai')
			->from('record_pemakaian')
			->join('ekstra', 'record_pemakaian.id_ekstra = ekstra.id_ekstra')
			->like('ekstra.nama_ekstra', 'Bubble')
			->where('ekstra.id_region', $region)
			->group_by('ekstra.nama_ekstra');
		$query = $this->db->get();

		return $query->result();
	}

	//mengambil data grafik harian
	public function get_data_grafik_harian()
	{
		$m = date('m');

		$this->db->select('tanggal, SUM(total) AS uang')
			->from('jual')
			// ->where('MONTH(tanggal)', $m)
			->group_by('tanggal')
			->order_by('no_nota', 'DESC')
			->limit(30);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key => $value) {
				$hasil[] = $value;
			}
			return $hasil;
		}
	}

	public function get_data_grafik_favorit()
	{
		$this->db->select('powder.nama_powder, COUNT(detail_transaksi.id_powder) AS pakai')
			->from('detail_transaksi')
			->join('powder', 'detail_transaksi.id_powder = powder.id_powder')
			->group_by('powder.nama_powder')
			->order_by('pakai', 'DESC')
			->limit(4);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key => $value) {
				$hasil[] = $value;
			}
			return $hasil;
		}
	}
}
