<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Post class
 * Extending Back_Controller. Check /core/Back_Controller
 *
 * @author budy k
 * @link www.facebook.com/teknosains
 * @link www.teknosains.com
 *
 */
class Post extends Back_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Post_model');
    }

    public function index()
    {
        $params = $this->input->get(null, true);
        $limit = 3;
        $page = element('p', $params, 1);
        $search = element('q', $params);
        $offset = ($page) ? ($page - 1) * $limit : 0;
        $article = $this->Post_model->fetchAllPost($offset, $limit, $search);

        $paging_link = null;

        if ($article['total_rows'] > 0) {
            $paging_link = $this->_create_pagination(site_url('/backend/post?q=' . $search), $limit, $article['total_rows']);
        }
        $data = [
            'article' => $article['data'],
            'query' => $search,
            'paging' => [
                'total_rows' => $article['total_rows'],
                'paging_link' => $paging_link
            ],
            'js' => ['post/post_js']
        ];

        $this->materialAdminLayout($data, 'backend/post/post');
    }

    /**
    * Config and create pagination
    *
    * @param str $link
    * @param int $limit
    * @param int $total_rows
    * @return pagination link
    */
    private function _create_pagination($link, $limit, $total_rows)
    {
        //paginations
        $this->load->library('pagination');
        $config = [
            'base_url' => $link,
            'total_rows' => $total_rows,
            'page_query_string' => true,
            'use_page_numbers' => true,
            'per_page' => $limit,
            'query_string_segment' => 'p',
            'attributes' => array('class' => 'pagination')
        ];
        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

    /*
    * Show Create Post interface.
    * Include any library you want
    */
    public function create_post()
    {
        $data = [
            'js_lib' => ['/assets/tinymce/tinymce.min.js'],
            'js' => ['post/create_post_js'],
            'mdl_js_layout' => false
        ];

        $this->materialAdminLayout($data, 'backend/post/create_post');
    }

    /**
    * Save Post
    * @param $_POST
    */
    public function savePost()
    {
        //need to filter input when Contain Code
        //in order to pass html tags
        if ($this->input->post('contain_code', true)) {
            $data = $this->input->post(null, true);
        } else {
            $data = $this->input->post();
        }

        $this->Post_model->savePost($data);

        redirect('backend/post');
    }


    /**
    * Publish post
    * @param int $article_id
    */
    public function publish()
    {
        $article_id = $this->input->post('article_id', true);
        $update = $this->Post_model->publish($article_id);
        if ($update) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    /**
    * un-Publish post
    * @param int $article_id
    */
    public function unPublish()
    {
        $article_id = $this->input->post('article_id', true);
        $update = $this->Post_model->unPublish($article_id);
        if ($update) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    /**
    * Show Update interface
    * @param int $article_id
    */
    public function edit($article_id = null)
    {
        if (!$article_id) {
            redirect('backend/post');
        }

        $article = $this->Post_model->fetchPostById($article_id);
        if (! $article) {
            redirect('backend/post');
        }

        $data = [
            'js_lib' => ['/assets/tinymce/tinymce.min.js'],
            'js' => ['post/edit_post_js'],
            'mdl_js_layout' => false,
            'article' => $article
        ];

        $this->materialAdminLayout($data, 'backend/post/edit_post');
    }

    /**
    * Update post
    * @param int $article_id
    */
    public function updatePost($article_id = null)
    {
        //have it your way
        if (!$article_id) {
            redirect('backend/post');
        }

        if ($this->input->post('contain_code', true)) {
            $data = $this->input->post(null, true);
        } else {
            $data = $this->input->post();
        }

        $this->Post_model->updatePost($data, $article_id);

        redirect('backend/post');
    }
}
