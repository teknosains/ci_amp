<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Signin class
 * Extending Front_Controller. Check /core/Front_Controller
 *
 * @author budy k
 * @link www.facebook.com/teknosains
 * @link www.teknosains.com
 *
 */
class Signin extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->refreshCache();

        //load session library
        $this->load->library('session');

    }

    /**
    * On browser back button hit
    * force to pre-Check
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

    /**
    * Show Login interface
    */
    public function index()
    {
        //check for login status
        if ($this->session->userdata('logged_in')) {
            redirect('/backend/post');
            exit;
        }
        $data = [
            //anything here
        ];

        $this->materialView($data, 'layouts/backend/signin');
    }

    /**
    * verify Login
    *
    * @param str username
    * @param str password
    */
    public function check()
    {
        $input = $this->input->post(null, true);
        $username = element('username', $input);
        $password = element('password', $input);
        if ($username && $password) {
            $user = $this->db->select('*')
                        ->from('m_user')->where('username', $username)
                        ->get()->row_array();
            if ($user) {
                if(password_verify($password, $user['password'])) {
                    $user['logged_in'] = true;
                    $this->session->set_userdata($user);
                    redirect('/backend/post');
                } else {
                    $this->_login_fail();
                }
            } else {
                $this->_login_fail();
            }
        } else {
            $this->_login_fail();
        }

    }

    /**
    * On Login faild
    */
    private function _login_fail()
    {
        $this->session->set_flashdata('error_login', 'Incorrect username or Password');
        redirect('/backend', true);
    }

    /**
    * Just for initial login user
    * change it to public to see generated password
    * and where you re done, set it to private again
    */
    private function generate_pass()
    {
        echo password_hash('admin', PASSWORD_BCRYPT);
    }

    /**
    * Sign out
    */
    public function signout()
    {
        $this->session->sess_destroy();
        redirect('/backend', true);
    }
}
