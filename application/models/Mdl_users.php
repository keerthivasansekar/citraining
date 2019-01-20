<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	private $table = 'users';
	
	public function fetch_one($col, $value)
	{
		$this->db->where($col, $value);
		return $this->db->get($this->table)->row_array();
	}

	public function fetch_all()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function create($row)
	{
		return $this->db->insert($this->table, $row);
	}

	public function edit($id, $values)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $values);
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

}