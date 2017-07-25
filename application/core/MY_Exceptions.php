<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Extending the default errors to always give JSON errors.
 * DOesnt matter where the call comes from XHR ajax or regular call
 *
 * @author budy k
 */

class MY_Exceptions extends CI_Exceptions
{
    protected $CI;
    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }


    //render layout
    private function _materialLayout($data = [], $view = null)
    {
        if (ENVIRONMENT === 'production') {
            $this->CI->load->view('layouts/frontend/header-min', $data);
            if ($view) {
                $this->CI->load->view($view . '-min');
            }
            $this->CI->load->view('layouts/frontend/footer-min');
        } else {
            $this->CI->load->view('layouts/frontend/header', $data);
            if ($view) {
                $this->CI->load->view($view);
            }
            $this->CI->load->view('layouts/frontend/footer');
        }
    }

    /**
    * 404 Page Not Found Handler
    *
    * @param   string  the page
    * @param   bool    log error yes/no
    * @return  string
    */
    public function show_404($page = '', $log_error = true)
    {
        // By default we log this, but allow a dev to skip it
        if ($log_error) {
            log_message('error', '404 Page Not Found --> '.$page);
        }

        $this->_materialLayout([], 'errors/html/error_404');
        echo $this->CI->output->get_output();
        exit;
    }

    //create your own here

}
