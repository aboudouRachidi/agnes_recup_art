<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
 
    public function total_blog() {
    	return $this->db->count_all("blog");
    }
    
    //SELECT * FROM `blog` LIMIT 0, 2
	public function getAll_blogs($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->order_by('date','DESC');
		
		$Query = $this->db->get("blog");
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $blogs)
			{
				$data[] = $blogs;
			}
			
			return $data;
		}
		return false;
	}
	
	public function getAll_DateArchives()
	{

		$Query =  $this->db->query('SELECT extract(year FROM date) AS blogDate
				FROM `blog` WHERE extract(year FROM date) GROUP BY extract(year FROM date) 
				ORDER BY extract(year FROM date) DESC');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $DateArchives)
			{
				$data[] = $DateArchives;
			}
				
			return $data;
		}
	}
	
	
	/*public function total_blogArchives($date) {
		$this->db->where('year(date) = '.$date);
		
		return $this->db->query('SELECT count(*) AS `numrows` FROM blog WHERE year(date) = '.$date);;
	}*/
	
	public function getAll_Archives($date/*,$limit,$start*/)
	{
		//$this->db->limit($limit,$start);
		$this->db->where('year(date) = '.$date);
		
		$Query = $this->db->get('blog');
		if($Query->num_rows() > 0 ){
			foreach ($Query->result() as $archives)
			{
				$data[] = $archives;
			}
			
			return $data;
		}
	}
	
}
