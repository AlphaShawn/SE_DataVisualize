<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
	}
	
	public function index()
	{
		//$this->load->view('welcome_message');
		//$this->load->view('bubble_index');
		$this->load->view('index');
	}
	
	public function test()
	{
		$cookie = $this->Welcome_model->get_cookie(2014,1);
		$data = $this->Welcome_model->get_score($cookie, 5140379066,1);
		//var_dump($data);
	}
	
	public function get_origin_quality() 
	{
		$filename = "14-1-14-eec";
		//$a = file($filename.'.txt');
		$a = file("xuehao.txt");
		
		
		$str = "quality,num_of_activity\n";
		foreach($a as $line=>$content)
		{
			$content = trim($content);
			$cookie = $this->Welcome_model->get_cookie(2014,1);
			$data = $this->Welcome_model->get_score($cookie, $content, 1);
			
			$res = 0;
			$count = 0;
			$num = 0;
			$str = $str.$data['total_score'].','.count($data['unit'])."\n";
			
		}
		header("Content-type:text/csv"); 
		header("Content-Disposition:attachment;filename=".$filename.".csv");
		echo $str;
		
	}
	
	
	public function show($view, $data=array())
	{
		if(!isset($view))
			$this->load->view('error/html/error_404');
		else
			$this->load->view($view, $data);
	}
	
	
	public function show_bubble($ID,$isAll)
	{
		if(!isset($ID) || !isset($isAll))
			return;
		$data['ID'] = $ID;
		$data['isAll'] = $isAll;
		$this->show("bubble", $data);
	}
	
	public function show_line($mess)
	{
		$data['url'] = $mess;
		$this->show("line", $data);
	}
	
	
	public function check_id($ID) 
	{
		if(!is_numeric($ID))
		{
			echo "false";
			return false;
		}
		
		if($this->Welcome_model->check_id(2014, 1, $ID))
		{
			echo "true";
			return true;
		}
		else
		{
			echo "false2";
			return false;
		}
	}
	
	public function getScore($id, $all)
	{
		if(!isset($id))
			return;
		
		$cookie = $this->Welcome_model->get_cookie(2014,1);
		
		$data = $this->Welcome_model->get_score($cookie, $id, $all);
	
		
		//将获得的数据打包成需要的格式 然后json_encode传递到前端
		$res = array();
		for($i=0;$i<count($data['unit']);$i++)
		{
			if($data['unit'][$i] == 0)				//硬加分素拓
			{
				$data['unit'][$i] = "硬加分".$data['score'][$i];
				$data['score'][$i] = 100;
			}
			$tmp = array( 	
							"name"=>$data['unit'][$i], 
							"score"=>floatval($data['score'][$i]),
							"size"=>floatval($data['score'][$i]) 
						);
			$res[$i] = $tmp;
		}
		
		$dat = array(
					"name"=>"father", 
					"children"=>$res
				);
		
		header('Content-type:text/json');
		echo json_encode($dat);
	}
	
}
