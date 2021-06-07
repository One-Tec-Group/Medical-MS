<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_model extends CI_Model {

	private $table = 'ha_medicine';

	public function medicine_list(){
		$result = $this->db->select("*")
			->from($this->table)
			->where('status',1)
			->get()
			->result();
 
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[] = $value->name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function read(){
		$result = $this->db->select("name")
			->from($this->table)
			->where('status',1)
			->get()
			->result();
		return $result;
	}
	
 }
