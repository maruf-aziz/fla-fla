<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barista extends CI_Model
{
	public function get_menu_basic()
	{
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('powder')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_jenis',	1)
			->where('varian_powder.sisa >', 0)
			->where('varian_powder.id_region', $id_region)
			->order_by('powder.nama_powder', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_menu_premium()
	{
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('powder')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_jenis',	2)
			->where('varian_powder.sisa >', 0)
			->where('varian_powder.id_region', $id_region)
			->order_by('powder.nama_powder', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_menu_soklat()
	{
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('powder')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_jenis',	3)
			->where('varian_powder.sisa >', 0)
			->where('varian_powder.id_region', $id_region)
			->order_by('powder.nama_powder', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_menu_choco_pm()
	{
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('powder')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_jenis',	4)
			->where('varian_powder.sisa >', 0)
			->where('varian_powder.id_region', $id_region)
			->order_by('powder.nama_powder', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_menu_yakult()
	{
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('powder')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_jenis',	5)
			->where('varian_powder.sisa >', 0)
			->where('varian_powder.id_region', $id_region)
			->order_by('powder.nama_powder', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_menu_juice()
	{
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('powder')
			->join('varian_powder', 'powder.id_varian = varian_powder.id_varian')
			->where('powder.id_jenis',	6)
			->where('varian_powder.sisa >', 0)
			->where('varian_powder.id_region', $id_region)
			->order_by('powder.nama_powder', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_topping()
	{
		$this->db->select('*')
			->from('topping')
			->where('id_region', 1)
			->order_by('nama_topping', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_sajian($id)
	{
		$this->db->select('*')
			->from('detail_penyajian')
			->where('id_powder', $id)
			->join('penyajian', 'detail_penyajian.id_penyajian = penyajian.id_penyajian')
			->order_by('penyajian.nama_penyajian', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_ekstra()
	{
		$this->db->select('*')
			->from('ekstra')
			->where('id_region', 1);
		$query = $this->db->get();

		return $query->result();
	}

	//query lama menggunakan set tabel powder , yang baru menggunakan set varian_powder (semua stok berada di varian)
	public function set_powder_min($id)
	{
		$sql = $this->db->query("UPDATE varian_powder SET sisa = sisa - 1 WHERE id_varian = '$id'");
		return $sql;
	}

	public function set_powder_plus($id)
	{
		$sql = $this->db->query("UPDATE varian_powder SET sisa = sisa + 1 WHERE id_varian = '$id'");
		return $sql;
	}

	public function set_topping_min($id)
	{
		$sql = $this->db->query("UPDATE topping SET sisa = sisa - 1 WHERE id_topping = '$id'");
		return $sql;
	}

	public function set_topping_plus($id)
	{
		$sql = $this->db->query("UPDATE topping SET sisa = sisa + 1 WHERE id_topping = '$id'");
		return $sql;
	}

	public function new_nota($tgl, $wkt, $pembeli, $t_awal, $dis, $t_akhir, $id_staff, $order_gojek)
	{
		$data = array(
			'tanggal' => $tgl,
			'waktu' => $wkt,
			'nama_pembeli' => $pembeli,
			'total_awal' => $t_awal,
			'diskon' => $dis,
			'total' => $t_akhir,
			'pesanan_gojek' => $order_gojek,
			'id_staff' => $id_staff
		);
		$this->db->insert('jual', $data);
		$query = $this->db->get();

		return $query;
	}

	public function get_new_nota($tgl, $wkt)
	{
		$this->db->select('*')
			->from('jual')
			->where('tanggal', $tgl)
			->where('waktu', $wkt);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $value) {
				$hasil = array(
					'id' => $value->no_nota,
				);
			}
		}

		return $hasil;
	}

	public function add_detail($data_detail, $id_nota, $id_region, $order_gojek)
	{

		for ($i = 0; $i < count($data_detail); $i++) {

			if ($order_gojek == 'Ya') {
				$data[] = array(
					'no_nota' => $id_nota,
					'id_powder' => $data_detail[$i]['id_menu'],
					'id_penyajian' => $data_detail[$i]['id_sajian'] != '' ? $data_detail[$i]['id_sajian'] : null,
					'id_topping' => $data_detail[$i]['id_topping'] != '' ? $data_detail[$i]['id_topping'] : null,
					'jumlah' => $data_detail[$i]['harga'] + 2000,
					'id_region' => $id_region
				);
			} else {
				$data[] = array(
					'no_nota' => $id_nota,
					'id_powder' => $data_detail[$i]['id_menu'],
					'id_penyajian' => $data_detail[$i]['id_sajian'] != '' ? $data_detail[$i]['id_sajian'] : null,
					'id_topping' => $data_detail[$i]['id_topping'] != '' ? $data_detail[$i]['id_topping'] : null,
					'jumlah' => $data_detail[$i]['harga'],
					'id_region' => $id_region
				);
			}
		}

		try {

			for ($i = 0; $i < count($data_detail); $i++) {
				$this->db->insert('detail_transaksi', $data[$i]);
			}
			return 'success';
		} catch (Exception $e) {
			return 'failed';
		}
	}

	public function cek_pesanan($tanggal)
	{
		$this->db->select('*')
			->from('jual')
			->where('status', 'Process')
			->where('tanggal', $tanggal)
			->order_by('tanggal', 'DESC')
			->order_by('waktu', 'DESC');
		$sql = $this->db->get();

		return $sql->result();
	}

	public function update_status($id)
	{
		$data = array(
			'status' => 'Success'
		);

		$this->db->where('no_nota', $id)
			->update('jual', $data);
	}

	public function history($id, $tanggal)
	{
		$this->db->select('*')
			->from('detail_transaksi')
			->join('powder', 'detail_transaksi.id_powder = powder.id_powder')
			->join('jual', 'detail_transaksi.no_nota = jual.no_nota')
			->where('jual.id_staff', $id)
			->where('jual.tanggal', $tanggal)
			->order_by('detail_transaksi.no_nota', 'ASC');
		$sql = $this->db->get();

		return $sql->result();
	}

	public function get_nama_sajian($id)
	{
		if ($id == null) {
			$idp = 0;

			$hasil = array(
				'nama_penyajian' => '--'
			);
		} else {
			$idp = $id;

			$this->db->select('*')
				->from('penyajian')
				->where('id_penyajian', $idp);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$hasil = array(
						'nama_penyajian' => $value->nama_penyajian
					);
				}
			}
		}
		return $hasil;
	}

	public function get_nama_topping($id)
	{
		if ($id == null) {
			$idt = 0;

			$hasil = array(
				'nama_topping' => '--'
			);
		} else {
			$idt = $id;

			$this->db->select('*')
				->from('topping')
				->where('id_topping', $idt);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				foreach ($query->result() as $value) {
					$hasil = array(
						'nama_topping' => $value->nama_topping
					);
				}
			}
		}
		return $hasil;
	}

	public function detail_nota($id)
	{
		$this->db->select('*')
			->from('jual')
			->join('staff', 'jual.id_staff = staff.id_staff')
			->where('jual.no_nota', $id);
		$sql = $this->db->get();

		return $sql;
	}

	public function detail_transaksi($id)
	{
		$this->db->select('*')
			->from('detail_transaksi')
			->where('detail_transaksi.no_nota', $id);
		$sql = $this->db->get();

		return $sql->result();
	}

	public function ekstra_min($id, $qty)
	{
		$id_region = $this->session->userdata('id_region');

		$sql = $this->db->query("UPDATE ekstra SET sisa = sisa - $qty WHERE nama_ekstra = '$id' AND id_region = $id_region ");
		
		return $sql;
	}

	public function ekstra_plus($id, $qty)
	{
		$id_region = $this->session->userdata('id_region');
		
		$sql = $this->db->query("UPDATE ekstra SET sisa = sisa + $qty WHERE nama_ekstra = '$id' AND id_region = $id_region");
		
		return $sql;
	}

	public function cup_min()
	{
		$id_region = $this->session->userdata('id_region');
		
		$sql = $this->db->query("UPDATE ekstra SET sisa = sisa -1 WHERE nama_ekstra = 'Cup' AND id_region = $id_region");
		
		return $sql;
	}

	public function cup_plus()
	{
		$id_region = $this->session->userdata('id_region');
		
		$sql = $this->db->query("UPDATE ekstra SET sisa = sisa +1 WHERE nama_ekstra = 'Cup' AND id_region = $id_region");
		
		return $sql;
	}

	public function update_detail_ekstra_min($id, $qty, $id_jenis)
	{
		$id_region = $this->session->userdata('id_region');

		$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pemakaian = detail_ekstra.pemakaian + $qty WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");

		return $sql;
	}

	public function update_detail_ekstra_plus($id, $qty, $id_jenis)
	{
		$id_region = $this->session->userdata('id_region');

		$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pemakaian = detail_ekstra.pemakaian - $qty WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");

		return $sql;
	}

	public function set_min_basic_pm_detail_ekstra($id, $id_jenis, $sajian)
	{
		$id_region = $this->session->userdata('id_region');

		if ($sajian == "Basic") {
			$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.basic = detail_ekstra.basic + 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
		} else if ($sajian == "PM") {
			$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pm = detail_ekstra.pm + 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
		}

		return $sql;
	}

	public function set_plus_basic_pm_detail_ekstra($id, $id_jenis, $sajian)
	{
		$id_region = $this->session->userdata('id_region');

		if ($sajian == "Basic") {
			$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.basic = detail_ekstra.basic - 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
		} else if ($sajian == "PM") {
			$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pm = detail_ekstra.pm - 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
		}

		return $sql;
	}


	// ================================================================================

	public function inventory_powder()
	{

		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('varian_powder')
			->where('id_region', $id_region)
			->order_by('nama_varian', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function inventory_topping()
	{

		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('topping')
			->where('id_region', $id_region)
			->order_by('nama_topping', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}

	public function hitung_total_tr()
	{
		$id_staff = $this->fungsi->user_login()->id_staff;
		$id_region = $this->session->userdata('id_region');

		$this->db->select('*')
			->from('detail_transaksi')
			->join('jual', 'detail_transaksi.no_nota = jual.no_nota')
			->where('jual.id_staff', $id_staff)
			->where('jual.tanggal', date('Y-m-d'))
			->where('detail_transaksi.id_region', $id_region);
		$query = $this->db->get();

		return $query->result();
	}

	public function extra_bubble()
	{
		$this->db->select('*')
			->from('ekstra')
			->where('nama_ekstra', 'Bubble');
		$query = $this->db->get();

		return $query->result();
	}

	public function cook_bubble($id, $jumlah)
	{
		$id_region = $this->session->userdata('id_region');

		$sql = $this->db->query("UPDATE topping SET stock_awal = sisa , penambahan = $jumlah , total = stock_awal + penambahan , sisa = total WHERE nama_topping = '$id' AND id_region = $id_region");

		return 'success';
	}

	public function add_record($tgl, $waktu, $id_penyajian = null, $id_ekstra = null, $id_topping = null, $id_powder = null, $pemakaian, $sajian)
	{
		$id_region = $this->session->userdata('id_region');
		$currentDate = date('Y-m-d');
		$time = date('h:i:s');

		$data = array(
			'tanggal' => $tgl,
			'waktu' => $waktu,
			'id_region' => $id_region,
			'pemakaian' => $pemakaian
		);

		if ($id_penyajian != null) {
			$data['id_penyajian'] = $id_penyajian;
		}

		if ($id_powder != null) {
			$data['id_powder'] = $id_powder;
		}

		if ($id_ekstra != null) {
			$id;

			$this->db->select('id_ekstra')
				->from('ekstra')
				->where('id_region', $id_region)
				->like('nama_ekstra', $id_ekstra);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				$sss = $query->row();

				$id = $sss->id_ekstra;
			}

			$data['id_ekstra'] = $id;
		}

		if ($id_topping != null) {
			$data['id_topping'] = $id_topping;
		}

		if ($sajian == "Basic" || $sajian == "Yakult") {
			$data['basic'] = 0.1;
		} else if ($sajian == "PM") {
			$data['pm'] = 0.2;
		}

		$this->db->insert('record_pemakaian', $data);
	}

	public function del_record($tanggal, $waktu)
	{
		$this->db->where('tanggal', $tanggal)
			->where('waktu', $waktu);

		$this->db->delete('record_pemakaian');
	}

	public function grafik_barista()
	{
		$id_staff = $this->session->userdata('id_staff');

		$this->db->select('tanggal, SUM(detail_transaksi.jumlah) AS uang')
			->from('detail_transaksi')
			->join('jual', 'detail_transaksi.no_nota = jual.no_nota')
			->where('jual.id_staff', $id_staff)
			->group_by('jual.tanggal')
			->order_by('jual.tanggal', 'DESC')
			->limit(10);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key => $value) {
				$hasil[] = $value;
			}
			return $hasil;
		}
	}
}
