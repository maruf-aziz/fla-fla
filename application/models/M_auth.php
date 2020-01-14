<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_auth extends CI_Model{

        public function get($id = null)
        {
            $this->db->select('*')
                ->from('staff');
            if($id != null){
                $this->db->where('id_staff', $id);
            }
            $query = $this->db->get();
            
            return $query;
        }

        public function login($post)
        {
            $this->db->select('*')
                ->from('staff')
                ->where('username', $post['username'])
                ->where('password', $post['pass']);
            $query = $this->db->get();

            return $query;
        }

        public function get_pass($username)
        {             
            $this->db->select('*')
                ->from('staff')
                ->where('username', $username);
            $query = $this->db->get();

            return $query;
        }
    }
?>