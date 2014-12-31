<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{		
		$this->load->view('main_screen');
	}

	public function add(){
		$this->load->view('add_song');
	}

	public function addSong($id){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_rules('playlist', 'Playlist_id', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('song');
            $this->load->model('song_model');

           	$song = new Song();

            $song->url = $this->input->post('vid');
            $song->pl_id = $id;

            $this->song_model->insert($song);           
            //$this->load->view('main_screen');
            echo json_encode(array('status' => 'success'));
            return;
        }
	}

	public function loadList($id){
		$this->load->model('song_model');
		$list = array();
		$songs = $this->song_model->getListItems($id);
		foreach ($songs as $song) {
			//$title = getTitle($song->url);
			$videoTitle = file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$song->url}?v=2&fields=title");
		  
		  // look for that title tag and get the insides
		  	preg_match("/<title>(.+?)<\/title>/is", $videoTitle, $titleOfVideo);
			//array_push($list, $song->url);
			$list += array($song->url => $titleOfVideo[1]);

		}
		echo json_encode($list);
	}

	public function getTitle($id){
		  // returns a single line of XML that contains the video title. Not a giant request. Use '@' to suppress errors.
		  $videoTitle = file_get_contents("http://gdata.youtube.com/feeds/api/videos/{$id}?v=2&fields=title");
		  
		  // look for that title tag and get the insides
		  preg_match("/<title>(.+?)<\/title>/is", $videoTitle, $titleOfVideo);
		  return $titleOfVideo[1];
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */