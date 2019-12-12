<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_barista extends CI_Model{


    	public function get_menu_basic(){

			$id_region = $this->session->userdata('id_region');

    		// $this->db->select('*');
    		// $this->db->from('powder');
    		// $this->db->where('id_jenis', 1);
    		// $this->db->where('sisa >', 0);
    		// $this->db->WHERE('id_region', $id_region);
			// $this->db->order_by('nama_powder' , 'ASC');

			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('varian_powder','powder.id_varian = varian_powder.id_varian');
			$this->db->where('powder.id_jenis',	1);
			$this->db->where('varian_powder.sisa >', 0);
			$this->db->where('varian_powder.id_region', $id_region);
			$this->db->order_by('powder.nama_powder','ASC');

    		$query = $this->db->get();
    		return $query->result();

    	}

    	public function get_menu_premium(){

			$id_region = $this->session->userdata('id_region');

    		// $this->db->select('*');
    		// $this->db->from('powder');
    		// $this->db->where('id_jenis', 2);
    		// $this->db->where('sisa >', 0);
    		// $this->db->WHERE('id_region', $id_region);
			// $this->db->order_by('nama_powder' , 'ASC');
			
			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('varian_powder','powder.id_varian = varian_powder.id_varian');
			$this->db->where('powder.id_jenis',	2);
			$this->db->where('varian_powder.sisa >', 0);
			$this->db->where('varian_powder.id_region', $id_region);
			$this->db->order_by('powder.nama_powder','ASC');

    		$query = $this->db->get();
    		return $query->result();

    	}

    	public function get_menu_soklat(){

			$id_region = $this->session->userdata('id_region');

    		// $this->db->select('*');
    		// $this->db->from('powder');
    		// $this->db->where('id_jenis', 3);
    		// $this->db->where('sisa >', 0);
    		// $this->db->WHERE('id_region', $id_region);
			// $this->db->order_by('nama_powder' , 'ASC');
			
			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('varian_powder','powder.id_varian = varian_powder.id_varian');
			$this->db->where('powder.id_jenis',	3);
			$this->db->where('varian_powder.sisa >', 0);
			$this->db->where('varian_powder.id_region', $id_region);
			$this->db->order_by('powder.nama_powder','ASC');

    		$query = $this->db->get();
    		return $query->result();

		}

		public function get_menu_choco_pm(){

			$id_region = $this->session->userdata('id_region');

    		// $this->db->select('*');
    		// $this->db->from('powder');
    		// $this->db->where('id_jenis', 4);
    		// $this->db->where('sisa >', 0);
    		// $this->db->WHERE('id_region', $id_region);
			// $this->db->order_by('nama_powder' , 'ASC');
			
			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('varian_powder','powder.id_varian = varian_powder.id_varian');
			$this->db->where('powder.id_jenis',	4);
			$this->db->where('varian_powder.sisa >', 0);
			$this->db->where('varian_powder.id_region', $id_region);
			$this->db->order_by('powder.nama_powder','ASC');

    		$query = $this->db->get();
    		return $query->result();

		}
		
		public function get_menu_yakult(){

			$id_region = $this->session->userdata('id_region');

			// $this->db->select('*');
			// $this->db->from('powder');
			// $this->db->where('id_jenis', 5);
			// $this->db->where('sisa >', 0);
			// $this->db->WHERE('id_region', $id_region);
			// $this->db->order_by('nama_powder', 'ASC');

			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('varian_powder','powder.id_varian = varian_powder.id_varian');
			$this->db->where('powder.id_jenis',	5);
			$this->db->where('varian_powder.sisa >', 0);
			$this->db->where('varian_powder.id_region', $id_region);
			$this->db->order_by('powder.nama_powder','ASC');

			$query = $this->db->get();
			return $query->result();

		}

		public function get_menu_juice(){

			$id_region = $this->session->userdata('id_region');

			// $this->db->select('*');
			// $this->db->from('powder');
			// $this->db->where('id_jenis', 6);
			// $this->db->where('sisa >', 0);
			// $this->db->WHERE('id_region', $id_region);
			// $this->db->order_by('nama_powder', 'ASC');

			$this->db->select('*');
			$this->db->from('powder');
			$this->db->join('varian_powder','powder.id_varian = varian_powder.id_varian');
			$this->db->where('powder.id_jenis',	6);
			$this->db->where('varian_powder.sisa >', 0);
			$this->db->where('varian_powder.id_region', $id_region);
			$this->db->order_by('powder.nama_powder','ASC');

			$query = $this->db->get();
			return $query->result();

		}

    	public function get_topping(){

    		$this->db->select('*');
    		$this->db->from('topping');
    		$this->db->WHERE('id_region', 1);
    		$this->db->order_by('nama_topping' , 'ASC');

    		$query = $this->db->get();
    		return $query->result();

    	}

    	public function get_sajian($id){
    		$this->db->select('*');
    		$this->db->from('detail_penyajian');
			$this->db->where('id_powder', $id);
			// $this->db->where('id_region', 1);
    		$this->db->join('penyajian', 'detail_penyajian.id_penyajian = penyajian.id_penyajian');
    		$this->db->order_by('penyajian.nama_penyajian', 'ASC');

    		$query = $this->db->get();
    		return $query->result();
		}
		
		public function get_ekstra(){
			$this->db->select('*');
			$this->db->from('ekstra');
			$this->db->WHERE('id_region', 1);
			
			$query = $this->db->get();
			return $query->result();
		}

		//query lama menggunakan set tabel powder , yang baru menggunakan set varian_powder (semua stok berada di varian)

    	public function set_powder_min($id){
    		$sql = $this->db->query("UPDATE varian_powder SET sisa = sisa - 1 WHERE id_varian = '$id'");
    		return $sql;
    	}

    	public function set_powder_plus($id){
    		$sql = $this->db->query("UPDATE varian_powder SET sisa = sisa + 1 WHERE id_varian = '$id'");
    		return $sql;
    	}

    	public function set_topping_min($id){
    		$sql = $this->db->query("UPDATE topping SET sisa = sisa - 1 WHERE id_topping = '$id'");
    		return $sql;
    	}

    	public function set_topping_plus($id){
    		$sql = $this->db->query("UPDATE topping SET sisa = sisa + 1 WHERE id_topping = '$id'");
    		return $sql;
    	}

    	public function new_nota($tgl , $wkt , $pembeli, $t_awal, $dis , $t_akhir, $id_staff,$order_gojek){
    		$sql = $this->db->query("INSERT INTO jual (tanggal,waktu,nama_pembeli,total_awal,diskon,total,pesanan_gojek,id_staff) VALUES ('$tgl', '$wkt','$pembeli','$t_awal','$dis','$t_akhir','$order_gojek','$id_staff')");
    		return $sql;
    	}

    	public function get_new_nota($tgl, $wkt){
    		$sql = $this->db->query("SELECT * FROM jual WHERE tanggal = '$tgl' AND waktu = '$wkt'");
    		if($sql->num_rows() > 0){
    			foreach ($sql->result() as $value) {
    				$hasil = array(
    					'id' => $value->no_nota,
    				);
    			}
    		}

    		return $hasil;
    	}

    	public function add_detail($data_detail, $id_nota, $id_region, $order_gojek){

    		for ($i=0; $i < count($data_detail); $i++) { 

				if($order_gojek == 'Ya'){
					$data[] = array(
						'no_nota' => $id_nota,
						'id_powder' => $data_detail[$i]['id_menu'],
						'id_penyajian' => $data_detail[$i]['id_sajian'] != '' ? $data_detail[$i]['id_sajian'] : null ,
						'id_topping' => $data_detail[$i]['id_topping'] != '' ? $data_detail[$i]['id_topping'] : null,
						'jumlah' => $data_detail[$i]['harga']+2000,
						'id_region' => $id_region
					);
				}
				else{
					$data[] = array(
						'no_nota' => $id_nota,
						'id_powder' => $data_detail[$i]['id_menu'],
						'id_penyajian' => $data_detail[$i]['id_sajian'] != '' ? $data_detail[$i]['id_sajian'] : null ,
						'id_topping' => $data_detail[$i]['id_topping'] != '' ? $data_detail[$i]['id_topping'] : null,
						'jumlah' => $data_detail[$i]['harga'],
						'id_region' => $id_region
					);
				}  			
    			
    		}

    		try {

    			for ($i=0; $i < count($data_detail); $i++) { 
    				$this->db->insert('detail_transaksi', $data[$i]);
    			}
    			return 'success';
    			
    		} catch (Exception $e) {
    			return 'failed';
    		}

    	}

    	public function cek_pesanan($tanggal){
    		$this->db->select('*');
    		$this->db->from('jual');
			$this->db->where('status', 'Process');
			$this->db->where('tanggal', $tanggal);			
			$this->db->order_by('tanggal', 'DESC');
			$this->db->order_by('waktu', 'DESC');

    		$sql = $this->db->get();
    		return $sql->result();
    	}

    	public function update_status($id){
    		$data = array(
    			'status' => 'Success'
    		);

    		$this->db->where('no_nota', $id);
    		$this->db->update('jual', $data);
    	}

    	public function history($id, $tanggal){

    		$this->db->select('*');
    		$this->db->from('detail_transaksi');
    		$this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
    		// $this->db->join('topping', 'detail_transaksi.id_topping = topping.id_topping');
    		// $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian');
			$this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
			$this->db->where('jual.id_staff', $id);
    		$this->db->where('jual.tanggal', $tanggal);
    		$this->db->order_by('detail_transaksi.no_nota', 'ASC');

    		$sql = $this->db->get();
    		return $sql->result();
		}
		
		public function get_nama_sajian($id){
			if($id == null){
				$idp = 0;

				$hasil = array(
					'nama_penyajian' => '--'
				);
				
			}
			else{
				$idp = $id;
				$hsl = $this->db->query("SELECT * FROM penyajian WHERE id_penyajian = '$idp'");
				if($hsl->num_rows()>0){
					foreach ($hsl->result() as $value) {
						$hasil = array(
							'nama_penyajian' => $value->nama_penyajian
						);
					}
				}
			}
			return $hasil;
		}

		public function get_nama_topping($id){
			if($id == null){
				$idt = 0;

				$hasil = array(
					'nama_topping' => '--'
				);
				
			}
			else{
				$idt = $id;
				$hsl = $this->db->query("SELECT * FROM topping WHERE id_topping = '$idt'");
				if($hsl->num_rows()>0){
					foreach ($hsl->result() as $value) {
						$hasil = array(
							'nama_topping' => $value->nama_topping
						);
					}
				}
			}
			return $hasil;
		}

    	public function detail_nota($id){
    		$this->db->select('*');
    		$this->db->from('jual');
    		// $this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
    		// $this->db->join('topping', 'detail_transaksi.id_topping = topping.id_topping');
    		// $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian');
    		// $this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
			// $this->db->join('jadwal', 'jual.id_jadwal= jadwal.id_jadwal');
			$this->db->join('staff', 'jual.id_staff = staff.id_staff');
    		$this->db->where('jual.no_nota', $id);

    		$sql = $this->db->get();
    		return $sql;
    	}

    	public function detail_transaksi($id){
    		$this->db->select('*');
    		$this->db->from('detail_transaksi');
    		// $this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
    		// $this->db->join('topping', 'detail_transaksi.id_topping = topping.id_topping');
    		// $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian');
    		// $this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
    		$this->db->where('detail_transaksi.no_nota', $id);

    		$sql = $this->db->get();
    		return $sql->result();

		}

		// public function get_id_ekstra($id){
		// 	$id_region = $this->session->userdata('id_region');

		// 	$sql = $this->db->query("SELECT * FROM ekstra WHERE nama_ekstra = '$id' AND id_region = $id_region");
    	// 	if($sql->num_rows() > 0){
    	// 		foreach ($sql->result() as $value) {
    	// 			$hasil = array(
    	// 				'id' => $value->id_ekstra,
    	// 			);
    	// 		}
    	// 	}
    	// 	return $hasil;
		// }
		
		public function ekstra_min($id, $qty){
			$id_region = $this->session->userdata('id_region');
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa - $qty WHERE nama_ekstra = '$id' AND id_region = $id_region ");
    		return $sql;
		}

		public function ekstra_plus($id,$qty){
			$id_region = $this->session->userdata('id_region');
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa + $qty WHERE nama_ekstra = '$id' AND id_region = $id_region");
    		return $sql;
		}		

		public function cup_min(){
			$id_region = $this->session->userdata('id_region');
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa -1 WHERE nama_ekstra = 'Cup' AND id_region = $id_region");
			return $sql;
		}

		public function cup_plus(){
			$id_region = $this->session->userdata('id_region');
			$sql = $this->db->query("UPDATE ekstra SET sisa = sisa +1 WHERE nama_ekstra = 'Cup' AND id_region = $id_region");
			return $sql;
		}

		public function update_detail_ekstra_min($id,$qty,$id_jenis){
			$id_region = $this->session->userdata('id_region');

			$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pemakaian = detail_ekstra.pemakaian + $qty WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");

			return $sql;
		}

		public function update_detail_ekstra_plus($id,$qty,$id_jenis){
			$id_region = $this->session->userdata('id_region');

			$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pemakaian = detail_ekstra.pemakaian - $qty WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");

			return $sql;
		}

		public function set_min_basic_pm_detail_ekstra($id,$id_jenis,$sajian){
			$id_region = $this->session->userdata('id_region');

			if($sajian == "Basic"){
				$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.basic = detail_ekstra.basic + 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
			}
			else if($sajian == "PM"){
				$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pm = detail_ekstra.pm + 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
			}

			return $sql;			
		}

		public function set_plus_basic_pm_detail_ekstra($id,$id_jenis,$sajian){
			$id_region = $this->session->userdata('id_region');

			if($sajian == "Basic"){
				$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.basic = detail_ekstra.basic - 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
			}
			else if($sajian == "PM"){
				$sql = $this->db->query("UPDATE detail_ekstra JOIN ekstra ON detail_ekstra.id_ekstra = ekstra.id_ekstra SET detail_ekstra.pm = detail_ekstra.pm - 1 WHERE ekstra.nama_ekstra = '$id' AND detail_ekstra.id_jenis = $id_jenis AND ekstra.id_region = $id_region ");
			}

			return $sql;
		}
		

		// ================================================================================

		public function inventory_powder(){

			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('varian_powder');
			// $this->db->join('jenis_menu', 'powder.id_jenis =  jenis_menu.id_jenis');
			$this->db->where('id_region', $id_region);
			$this->db->order_by('nama_varian', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}

		public function inventory_topping(){

			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('topping');
			$this->db->where('id_region', $id_region);
			$this->db->order_by('nama_topping', 'ASC');

			$query = $this->db->get();
			return $query->result();
		}

		public function hitung_total_tr(){
			$id_staff = $this->fungsi->user_login()->id_staff;
			$id_region = $this->session->userdata('id_region');

			$this->db->select('*');
			$this->db->from('detail_transaksi');
			$this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
			$this->db->where('jual.id_staff', $id_staff);
			$this->db->where('jual.tanggal', date('Y-m-d'));
			$this->db->where('detail_transaksi.id_region', $id_region);
			$query = $this->db->get();

			return $query->result();
		}

		public function extra_bubble(){
			$this->db->select('*');
			$this->db->from('ekstra');
			$this->db->where('nama_ekstra','Bubble');

			$query = $this->db->get();
			return $query->result();
		}

		public function cook_bubble($id,$jumlah){
			$id_region = $this->session->userdata('id_region');

			$sql = $this->db->query("UPDATE topping SET stock_awal = sisa , penambahan = $jumlah , total = stock_awal + penambahan , sisa = total WHERE nama_topping = '$id' AND id_region = $id_region");

			return 'success';
		}

    }
