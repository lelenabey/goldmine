<?php
class Song_model extends CI_Model {

	function getAll()
	{  
		$query = $this->db->get('songs');
		return $query->result('Song');
	}  
	
	function get($id)
	{
		$query = $this->db->get_where('songs',array('id' => $id));
		
		return $query->row(0,'Song');
	}
	
	function delete($id) {
		return $this->db->delete("songs",array('id' => $id ));
	}
	
	function insert($song) {
		return $this->db->insert("songs", array('url' => $song->url));
	}
	 
	function update($song) {
		$this->db->where('id', $song->id);
		return $this->db->update("songs", array('url' => $song->url));
	}
	
	
}
?>