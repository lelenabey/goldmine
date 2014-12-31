<?php
class Song_model extends CI_Model {

	function getAll()
	{  
		$query = $this->db->get('songs');
		return $query->result('Song');
	}  
	
	function getListItems($id){
		$this->db->select('url');
		$this->db->from('songs');
		$this->db->join('pl_items', 'songs.id = pl_items.song_id');
		$this->db->where('playlist_id', $id);

		$query = $this->db->get();
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
		$this->db->insert("songs", array('url' => $song->url));
		$item_id = $this->db->insert_id();
		return $this->db->insert("pl_items", array('song_id' => $item_id,
											'playlist_id' => $song->pl_id));
	}
	 
	function update($song) {
		$this->db->where('id', $song->id);
		return $this->db->update("songs", array('url' => $song->url));
	}
	
	
}
?>