<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_admin extends CI_Model{

    	public function get_admin(){
    		$id = $this->session->userdata('id_staff');

    		$this->db->select('*');
    		$this->db->from('staff');
    		$this->db->where('level',1);
    		$this->db->where('id_staff', $id);

    		$query = $this->db->get();

    		return $query;

    	}

    	public function update_profile($id, $nama, $username, $email, $contact, $alamat, $password){
    		$data = array(
                'Nama' => $nama,
                'username' => $username,
                'contact' =>$contact,
                'alamat' => $alamat,
                'email' => $email
            );

            if (!empty($password)) {
                $data['password'] = $password;
            }

            $this->db->where('id_staff', $id);
            $this->db->update('staff', $data);
    	}

    	// public function sum_total(){
    	// 	$currentDate = date('Y-m-d');
    	// 	$this->db->select('(SELECT SUM(jual.total) FROM jual WHERE jual.tanggal = "$currentDate" ) AS omset', FALSE);
    	// 	$query = $this->db->get('jual');

    	// 	return $query;
    	// }

    	public function get_omset_bulanan(){
    		$mon = date('m');
    		$sql = $this->db->query("SELECT SUM(total) AS omset FROM jual WHERE MONTH(tanggal) = '$mon' ");

    		return $sql->result();
    	}

        public function get_count_powder(){

            $sql = $this->db->count_all_results('powder');

            return $sql;
        }

        public function get_count_topping(){
        	return $this->db->count_all_results('topping');
        }

        public function get_count_karyawan(){
        	$this->db->where('level', 2);
        	$this->db->from('staff');
        	return $this->db->count_all_results();
        }

        public function get_menu_basic(){
        	$this->db->where('id_jenis', 1);
        	$this->db->from('powder');

        	return $this->db->count_all_results();
        }

        public function get_menu_pm(){
        	$this->db->where('id_jenis', 2);
        	$this->db->from('powder');

        	return $this->db->count_all_results();
        }

        public function get_menu_soklat(){
        	$this->db->where('id_jenis', 3);
        	$this->db->from('powder');

        	return $this->db->count_all_results();
        }

        public function get_menu_coklat_pm(){
        	$this->db->where('id_jenis', 4);
        	$this->db->from('powder');

        	return $this->db->count_all_results();
        }

        public function get_menu_yakult(){
        	$this->db->where('id_jenis', 5);
        	$this->db->from('powder');

        	return $this->db->count_all_results();
        }

        public function get_menu_juice(){
        	$this->db->where('id_jenis', 6);
        	$this->db->from('powder');

        	return $this->db->count_all_results();
        }

        public function get_transaksi_shift1(){
            $currentDate = date('Y-m-d');

            $sql = $this->db->query("SELECT * FROM jual WHERE tanggal = '$currentDate' AND waktu BETWEEN '08:00:00' AND '16:00:00'");

            return $sql->result();
        }

        public function get_shift2(){
            $currentDate = date('Y-m-d');

            $sql = $this->db->query("SELECT * FROM jual WHERE tanggal = '$currentDate' AND waktu BETWEEN '16:00:00' AND '22:00:00'");

            return $sql->result();
        }

        public function get_transaksi(){
            $currentDate = date('Y-m-d');

            $sql = $this->db->query("SELECT * FROM jual WHERE tanggal = '$currentDate'");

            return $sql->result(); 
        }

        public function get_jenis_menu(){
        	$this->db->select('*');
        	$this->db->from('jenis_menu');

        	$query = $this->db->get();

        	return $query->result();
        }

        public function get_sajian(){
        	$this->db->select('*');
        	$this->db->from('penyajian');

        	$query = $this->db->get();

        	return $query->result();
        }

        public function get_varian($id, $region){
        	$this->db->select('*');
        	$this->db->from('varian_powder');
        	$this->db->join('region', 'varian_powder.id_region = region.id_region');
        	$this->db->where('varian_powder.id_varian', $id);
        	$this->db->where('varian_powder.id_region', $region);
        	$query = $this->db->get();

        	return $query;
        }

        public function update_varian($id, $sisa, $penambahan){
        	// $data = array(
        	// 	'stok_awal' => $sisa,
        	// 	'penambahan' =>$penambahan,
        	// 	'total' => $sisa + $penambahan,
        	// 	'sisa' => $sisa + $penambahan
        	// );

        	// $this->db->where('id_varian', $id);
        	// $this->db->update('varian_powder', $data);

        	$sql = $this->db->query("UPDATE varian_powder SET stok_awal = $sisa , penambahan = $penambahan , total = stok_awal + penambahan , sisa = total WHERE id_varian = $id");

        	// if ($this->db->affected_rows() > 0) {
        		return 'success';
        	// }
        	// else{
        		// return 'gagal';
        	// }
        }

        public function delete_varian($id){
        	$this->db->where('id_varian', $id);
        	$this->db->delete('varian_powder');
        }

        public function get_powder($id, $region){
        	$this->db->select('*');
        	$this->db->from('powder');
        	$this->db->join('detail_penyajian','powder.id_powder = detail_penyajian.id_powder');
        	$this->db->join('penyajian', 'detail_penyajian.id_penyajian = penyajian.id_penyajian');
        	$this->db->join('varian_powder', 'powder.id_varian = varian_powder.id_varian');
        	$this->db->where('powder.id_varian', $id);
        	$this->db->where('varian_powder.id_region', $region);

        	$query = $this->db->get();

        	return $query->result();
        }

        public function update_powder(){
        	#code...
        }

        public function delete_powder($id){
        	$this->db->where('id_powder', $id);
        	$this->db->delete('powder');
        }

        public function get_topping($id = null){
        	$this->db->select('*');
        	$this->db->from('topping');
        	if($id != null){
                $this->db->where('id_topping', $id);
                $query = $this->db->get();
	    		return $query;
            }
            else{
				$query = $this->db->get();
	    		return $query->result();
            } 
        }

        public function insert_topping($nama, $harga, $stok, $region){
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

        public function update_topping($id, $nama, $harga, $penambahan, $sisa){
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

        	$this->db->where('id_topping', $id);
        	$this->db->update('topping', $data);
        }

        public function delete_topping($id){
        	$this->db->where('id_topping', $id);
        	$this->db->delete('topping');
        }

        public function get_ekstra($id = null){
        	$this->db->select('*');
        	$this->db->from('ekstra');
        	if ($id != null) {
        		$this->db->where('id_ekstra', $id);
        		$query = $this->db->get();
        		return $query;
        	}
        }

        public function get_id_ekstra($nama, $satuan, $region){
        	$this->db->select('*');
        	$this->db->from('ekstra');
        	$this->db->where('nama_ekstra', $nama);
        	$this->db->where('satuan', $satuan);
        	$this->db->where('id_region', $region);

        	$query = $this->db->get();

        	return $query;
        }

        public function insert_ekstra($nama, $stok, $satuan, $region){
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

        public function insert_detail_ekstra($id){
        	for ($i=1; $i <=6 ; $i++) { 
        		$data = array(
        			'id_ekstra' => $id,
        			'id_jenis' => $i,
        			'pemakaian' => 0
        		);

        		$this->db->insert('detail_ekstra', $data);
        	}
        }

        public function update_ekstra($id, $nama, $sisa, $penambahan, $satuan){
        	$data = array();

        	if(!empty($nama)){
        		$data['nama_ekstra'] = $nama;
        	}

        	if(!empty($satuan)){
        		$data['satuan'] = $satuan;
        	}

        	if (!empty($penambahan)) {
        		$data['stock_awal'] = $sisa;
        		$data['penambahan'] = $penambahan;
        		$data['total'] = $sisa + $penambahan;
        		$data['sisa'] = $data['total'];
        	}

        	$this->db->where('id_ekstra', $id);
        	$this->db->update('ekstra', $data);
        }

        public function delete_ekstra($id){
        	$this->db->where('id_ekstra', $id);
        	$this->db->delete('ekstra');
        }

    	public function get_diskon($id = null){
    		$this->db->select('*');
    		$this->db->from('diskon');
            if($id != null){
                $this->db->where('id_diskon', $id);
                $query = $this->db->get();
	    		return $query;
            }
            else{
				$query = $this->db->get();
	    		return $query->result();
            }    		
    	}

        public function insert_diskon($nominal, $min_pembelian){
            $data = array(
                'total_diskon' => $nominal,
                'min_pembelian' => $min_pembelian
            );

            $this->db->insert('diskon', $data);
        }

        public function update_diskon($id, $total, $min_pembelian){
        	$data = array(
        		'total_diskon' => $total,
        		'min_pembelian' => $min_pembelian
        	);

        	$this->db->where('id_diskon', $id);
        	$this->db->update('diskon', $data);
        }

        public function delete_diskon($id){
        	$this->db->where('id_diskon', $id);
        	$this->db->delete('diskon');
        }

    	public function get_region($id = null){
    		$this->db->select('*');
    		$this->db->from('region');
            if($id != null){
                $this->db->where('id_region', $id);
                $query = $this->db->get();
	    		return $query;
            }
            else{
            	$query = $this->db->get();
	    		return $query->result();
            }
    		
    	}

        public function insert_region($nama , $alamat){
            $data = array(
                'nama_region' => $nama,
                'alamat' => $alamat
            );

            $this->db->insert('region',$data);
        }

        public function update_region($id, $nama ,$alamat){
        	$data = array(
        		'nama_region' => $nama,
        		'alamat' => $alamat
        	);

        	$this->db->where('id_region', $id);
        	$this->db->update('region', $data);
        }

        public function delete_region($id){
        	$this->db->where('id_region', $id);
        	$this->db->delete('region');
        }

    	public function get_data_karyawan($id = null){
    		$this->db->select('*');
    		$this->db->from('staff');
    		$this->db->where('level', 2);
            if($id != null){
                $this->db->where('id_staff', $id);
                $query = $this->db->get();
	    		return $query;
            }
            else{
            	$query = $this->db->get();
	    		return $query->result();
            }          
   		
    	}

    	public function insert_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat){
            $data = array(
                'id_staff' => $id,
                'Nama' => $nama,
                'username' => $username,
                'password' => $password,
                'contact' =>$kontak,
                'alamat' => $alamat,
                'email' => $email
            );

            $this->db->insert('staff', $data);
        }

        public function update_karyawan($id, $nama, $username, $password, $kontak, $email, $alamat){
            $data = array(
                'Nama' => $nama,
                'username' => $username,
                'contact' =>$kontak,
                'alamat' => $alamat,
                'email' => $email
            );

            if (!empty($password)) {
                $data['password'] = $password;
            }

            $this->db->where('id_staff', $id);
            $this->db->update('staff', $data);
        }

        public function delete_karyawan($id){
            $this->db->where('id_staff', $id);
            $this->db->delete('staff');
        }

        public function insert_transaksi_penambahan($id_ekstra = null , $id_varian = null , $id_topping = null , $id_region, $penambahan){
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

        	if ($id_varian != null){
        		$data['id_varian'] = $id_varian;
        	}

        	if ($id_topping != null) {
        		$data['id_topping'] = $id_topping;
        	}

        	$this->db->insert('transaksi_penambahan', $data);
        }

        public function get_transaksi_penambahan($tanggal = null, $tgl_selesai = null){
        	$currentDate = date('Y-m-d');

        	$this->db->select('*');
        	$this->db->from('transaksi_penambahan');
        	$this->db->join('varian_powder', 'transaksi_penambahan.id_varian = varian_powder.id_varian', 'left');
        	$this->db->join('ekstra', 'transaksi_penambahan.id_ekstra = ekstra.id_ekstra', 'left');
        	$this->db->join('topping','transaksi_penambahan.id_topping = topping.id_topping', 'left');
        	$this->db->join('region', 'transaksi_penambahan.id_region = region.id_region', 'left');
        	if ($tanggal != null && $tgl_selesai != null) {
        		$this->db->where('transaksi_penambahan.tanggal >=', $tanggal);
                $this->db->where('transaksi_penambahan.tanggal <=', $tgl_selesai);
        	}
            else if($tanggal != null){
                $this->db->where('transaksi_penambahan.tanggal', $tanggal);
            }
        	else{
        		$this->db->where('transaksi_penambahan.tanggal', $currentDate);
        	}        	

        	$query = $this->db->get();

        	return $query->result();
        }

        public function get_search_transaksi($tanggal, $region, $shift, $tgl_selesai = null){
            $this->db->select('*');
            $this->db->from('detail_transaksi');
            $this->db->join('jual', 'detail_transaksi.no_nota = jual.no_nota');
            $this->db->join('staff', 'jual.id_staff = staff.id_staff');
            $this->db->join('powder', 'detail_transaksi.id_powder = powder.id_powder');
            $this->db->join('penyajian', 'detail_transaksi.id_penyajian = penyajian.id_penyajian', 'left');
            $this->db->join('topping','detail_transaksi.id_topping = topping.id_topping', 'left');
            if ($shift == "shift1") {                
                $this->db->where('jual.waktu >=','08:00:00');
                $this->db->where('jual.waktu <=','16:00:00');
            }

            else if($shift == "shift2"){
                $this->db->where('jual.waktu >','16:00:00');
                $this->db->where('jual.waktu <=','22:00:00');
            }

            if ($tgl_selesai != null) {
                $this->db->where('jual.tanggal >=', $tanggal);
                $this->db->where('jual.tanggal <=', $tgl_selesai);
            }
            else{
                $this->db->where('jual.tanggal', $tanggal);
            }

            
            $this->db->where('detail_transaksi.id_region', $region);

            $query = $this->db->get();

            return $query->result();
		}
		
		public function get_pakai_powder($tanggal = null , $shift = null, $region = null){
            $query = $this->db->query("SELECT nama_powder , stok_awal, penambahan , id_penyajian , SUM(record_pemakaian.pemakaian) AS pakai , sisa from record_pemakaian RIGHT JOIN powder ON record_pemakaian.id_powder = powder.id_powder JOIN varian_powder ON powder.id_varian = varian_powder.id_varian GROUP BY powder.nama_powder");

            return $query->result();
		}

        public function get_pakai_topping($tanggal = null , $shift = null, $region = null){
            $query = $this->db->query("SELECT nama_topping , SUM(record_pemakaian.pemakaian) AS pakai , harga FROM record_pemakaian RIGHT JOIN topping ON record_pemakaian.id_topping = topping.id_topping GROUP BY topping.nama_topping");

            return $query->result();
        }

        public function get_penjualan($tanggal = null, $shift = null, $region = null){
            $query = $this->db->query("SELECT nama_jenis, nama_penyajian, SUM(record_pemakaian.pemakaian) AS pakai, harga FROM record_pemakaian RIGHT JOIN powder ON record_pemakaian.id_powder = powder.id_powder JOIN penyajian ON record_pemakaian.id_penyajian = penyajian.id_penyajian JOIN detail_penyajian ON detail_penyajian.id_powder = powder.id_powder JOIN jenis_menu ON powder.id_jenis = jenis_menu.id_jenis GROUP BY jenis_menu.nama_jenis, penyajian.id_penyajian");

            return $query->result();
		}

        public function get_pakai_susu_putih($tanggal = null , $shift = null, $region = null){
            $query = $this->db->query("SELECT nama_penyajian ,Round(SUM(record_pemakaian.pm),2) AS PM , Round(SUM(record_pemakaian.basic),2) AS basic FROM record_pemakaian JOIN penyajian ON record_pemakaian.id_penyajian = penyajian.id_penyajian JOIN ekstra ON record_pemakaian.id_ekstra = ekstra.id_ekstra WHERE ekstra.nama_ekstra LIKE '%Susu Putih%' GROUP BY penyajian.nama_penyajian");

            return $query->result();
        }

        public function get_pakai_susu_coklat($tanggal = null , $shift = null, $region = null){
            $query = $this->db->query("SELECT nama_penyajian ,Round(SUM(record_pemakaian.pm),2) AS PM , Round(SUM(record_pemakaian.basic),2) AS basic FROM record_pemakaian JOIN penyajian ON record_pemakaian.id_penyajian = penyajian.id_penyajian JOIN ekstra ON record_pemakaian.id_ekstra = ekstra.id_ekstra WHERE ekstra.nama_ekstra LIKE '%Susu Coklat%' GROUP BY penyajian.nama_penyajian");

            return $query->result();
        }

        public function get_pakai_ekstra($tanggal = null , $shift = null, $region = null){
            $query = $this->db->query("SELECT nama_ekstra , stock_awal, penambahan,Round(SUM(record_pemakaian.pm + record_pemakaian.basic),2) AS pakai_susu, SUM(record_pemakaian.pemakaian) AS pakai FROM record_pemakaian RIGHT JOIN ekstra ON record_pemakaian.id_ekstra = ekstra.id_ekstra GROUP BY ekstra.nama_ekstra");

            return $query->result();
        }

        public function get_masak_bubble($tanggl = null , $shift = null, $region = null){
            $query = $this->db->query("SELECT waktu , nama_ekstra, stock_awal , SUM(record_pemakaian.pemakaian) AS pakai FROM record_pemakaian JOIN ekstra ON record_pemakaian.id_ekstra = ekstra.id_ekstra WHERE ekstra.nama_ekstra LIKE '%Bubble%' GROUP BY ekstra.nama_ekstra");

            return $query->result();
        }
		

        //mengambil data grafik harian
        public function get_data_grafik_harian(){
            $query = $this->db->query("SELECT tanggal, SUM(total) AS uang FROM jual GROUP BY tanggal ORDER BY no_nota DESC LIMIT 10");

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $key => $value) {
                    $hasil[] = $value;
                }
                return $hasil;
            }
		}
		
		public function get_data_grafik_favorit(){
			$query = $this->db->query("SELECT powder.nama_powder , COUNT(detail_transaksi.id_powder) AS pakai FROM detail_transaksi JOIN powder ON detail_transaksi.id_powder = powder.id_powder GROUP BY powder.nama_powder ORDER BY pakai DESC LIMIT 4");

			if($query->num_rows() > 0){
				foreach ($query->result() as $key => $value) {
					$hasil[] = $value;
				}
				return $hasil;
			}
		}

    }

?>