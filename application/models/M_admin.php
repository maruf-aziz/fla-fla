<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_admin extends CI_Model{

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

    }

?>