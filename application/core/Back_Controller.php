<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Back Controller - After-Logged-in stuff
 *
 * @author budy k
 * @link www.facebook.com/teknosains
 * @link www.teknosains.com
 *
 */
class Back_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        //load session library
        $this->load->library('session');

        //check cache validation
        $this->refreshCache();

        //check for Session
        if (!$this->session->userdata('logged_in')) {
            redirect('/backend', true);
        }
    }

    /**
    * On browser back button hit
    */
    private function refreshCache()
    {

		// any valid date in the past
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		// always modified right now
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		// HTTP/1.1
		header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
		// HTTP/1.0
		header("Pragma: no-cache");
	}

    //just in case you need to add something here

}
