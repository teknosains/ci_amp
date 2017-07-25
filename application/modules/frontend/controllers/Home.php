<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* Home class
* Extending Front_Controller. Check /core/Front_Controller
*
* @author budy k
* @link www.facebook.com/teknosains
* @link www.teknosains.com
*
*/
class Home extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Home_model');
        //load helper
        $this->load->helper('text');
    }

    /**
    * Default | Home
    *
    */
    public function index()
    {
        //GET params
        $params = $this->input->get(null, true);
        $limit  = 3;
        $page   = element('page', $params, 1);
        $search = element('query', $params);
        $offset = ($page) ? ($page - 1) * $limit : 0;

        //fetch latest articles
        $latest = $this->Home_model->fetchLatest($offset, $limit, $search);

        //paging
        $paging_link = $this->_create_pagination(site_url(), $limit, $latest['total_rows']);

        /**
        * meta data to send to the View.
        * add anything you want here
        */
        $data = [
            'meta' => [
                'title' => 'Home Title',
                'Description' => 'Home Description'
            ],
            'latest' => $latest['data'],
            'paging' => $paging_link
        ];

        $this->materialLayout($data, 'home/home');
    }

    /**
    * Detail Article
    * @param str slug
    */
    public function read($slug = null)
    {
        $article = $this->Home_model->fetchDetail($slug);

        //show 404 if no article found
        if (!$article) {
            show_404();
        }

        /**
        * meta data to send to the View.
        * add anything you want here
        */
        $data = [
            'meta' => [
                'title' => $article['title'],
                'Description' => trim(word_limiter(strip_tags($article['content']), 100))
            ],
            'article' => $article
        ];

        $this->materialLayout($data, 'home/read');
    }

    private function _create_pagination($link, $limit, $total_rows)
    {
        //paginations
        $this->load->library('pagination');
        $config = [
            'base_url'	=> $link,
            'total_rows'=> $total_rows,
            'page_query_string' => true,
            'use_page_numbers' => true,
            'per_page'	=> $limit,
            'query_string_segment'=> 'page',
            'attributes'=> array('class'=>'pagination')
        ];
        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

}
