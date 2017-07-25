<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* Post class model
*
* @author budy k
* @link www.facebook.com/teknosains
* @link www.teknosains.com
*
*/
class Post_model extends CI_Model
{

    /**
    * Get all post
    *
    * @param int $offset
    * @param int $limit
    * @param str $search
    * @return arr query result
    */
    public function fetchAllPost($offset, $limit, $search = null)
    {
        //use cache
        $this->db->start_cache();

        $this->db->select("*")
                    ->from('m_article');
                if ($search) {
                    $this->db->like('title', $search);
                    $this->db->or_like('content', $search);
                }

        $this->db->stop_cache();
        //count all result
        $total_rows = $this->db->count_all_results();

        $data = $this->db->limit($limit, $offset)->order_by('article_id', 'DESC')
                        ->get()->result_array();

        return [
            'total_rows' => $total_rows,
            'data' => $data
        ];
    }

    /**
    * Get a post by ID
    *
    * @param int $article_id
    * @return arr query result
    */
    public function fetchPostById($article_id)
    {
        return $this->db->get_where('m_article', ['article_id' => $article_id])
                        ->row_array();
    }

    /**
    * Save new post
    *
    * @param array $data
    * @return bool query status
    */
    public function savePost($data)
    {
        $article = [
            'title'     => $data['title'],
            'content'   => $data['content'],
            'created_at'=> date('Y-m-d H:i:s', strtotime($data['posted_date'])),
            'created_by' => $this->session->userdata('username'),
            'status'   => '0',
            'img_thumbnail'=> $data['thumbnail'],
            'slug'=> strtolower(url_title($data['title']))

        ];

        return $this->db->insert('m_article', $article);
    }

    /**
    * Update post
    *
    * @param array $data
    * @return bool query status
    */
    public function updatePost($data, $article_id)
    {
        $article = array(

            'title'     => $data['title'],
            'content'   => $data['content'],
            'created_at'=> date('Y-m-d H:i:s', strtotime($data['posted_date'])),
            'created_by' => $this->session->userdata('username'),
            'img_thumbnail'=> $data['thumbnail']
        );

        return $this->db->update('m_article', $article, [
            'article_id' => $article_id
        ]);
    }

    /**
    * Publish post
    *
    * @param int $article_id
    * @return bool query status
    */
    public function publish($article_id)
    {
        return $this->db->update('m_article', ['status' => '1'], [
            'article_id' => $article_id
        ]);
    }

    /**
    * un-Publish post
    *
    * @param int $article_id
    * @return bool query status
    */
    public function unPublish($article_id)
    {
        return $this->db->update('m_article', ['status' => '0'], [
            'article_id' => $article_id
        ]);
    }


}
