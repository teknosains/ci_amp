<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* Home class model
*
* @author budy k
* @link www.facebook.com/teknosains
* @link www.teknosains.com
*
*/
class Home_model extends CI_Model
{

    /**
    * fetch latest Articles
    * @param int $limit
    */
    public function fetchLatest($offset = 0, $limit = 5, $search = '')
    {
        $this->db->start_cache();
        /**
        * consider not usinng select * for complex table
        */
        $this->db->select('*')->from('m_article')->where('status', 1);
        if ($search) {
            $this->db->like('title', trim($search));
            $this->db->or_like('content', trim($search));
        }
        $this->db->stop_cache();
        $total_rows = $this->db->count_all_results();

        $data = $this->db->limit($limit, $offset)->order_by('article_id', 'DESC')
                    ->get()->result_array();

        return [
            'total_rows' => $total_rows,
            'data' => $data
        ];
    }

    /**
    * fetch detail article
    * @param str $slug
    */
    public function fetchDetail($slug = '')
    {
        return $this->db->select('*')->from('m_article')
                    ->where([
                        'slug' => $slug,
                        'status' => 1
                    ])->get()->row_array();
    }
}
