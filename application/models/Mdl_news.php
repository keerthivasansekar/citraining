<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_news extends MY_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_news($slug = FALSE)
	{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
	}

	public function set_news()
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
    	    'title' => $this->input->post('title'),
        	'slug' => $slug,
        	'text' => $this->input->post('text')
    	);

	    return $this->db->insert('news', $data);
	}

	public function edit_news()
	{
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		$id = $this->uri->segment(3);
	    $data = array(
    	    'title' => $this->input->post('title'),
        	'slug' => $slug,
        	'text' => $this->input->post('text')
    	);
	    $this->db->where('id', $id);
	    return $this->db->update('news', $data);		
	}

	public function delete_news()
	{
		$id = $this->input->post('ref_no');
	    $this->db->where('id', $id);
	    return $this->db->delete('news');				
	}
}