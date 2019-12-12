<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_auth extends CI_Model{

        public function get($id = null)
        {
            $this->db->select('*');
            $this->db->from('staff');
            if($id != null){
                $this->db->where('id_staff', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        public function login($post)
        {
            $this->db->select('*');
            $this->db->from('staff');
            $this->db->where('username', $post['username']);
            $this->db->where('password', $post['pass']);

            $query = $this->db->get();
            return $query;
        }

        public function get_pass($username){
            // $sql = $this->db->query("SELECT * FROM staff WHERE username = '$username' ");

            // if($sql->num_rows() > 0){
    		// 	foreach ($sql->result() as $value) {
    		// 		$hasil = array(
    		// 			'id' => $value->password,
    		// 		);
    		// 	}
    		// }

            // return $sql;
            
            $this->db->select('*');
            $this->db->from('staff');
            $this->db->where('username', $username);

            $query = $this->db->get();
            return $query;
        }

    }

?>