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
		$this->load->view('index');
	}
	
	public function test()
	{
		$cookie = $this->Welcome_model->get_cookie(2014,1);
		$data = $this->Welcome_model->get_score($cookie, 5142119001,1);
		var_dump($data);
	}
	
	public function get_origin_quality() 
	{
		$filename = "info";
		//$a = file($filename.'.txt');
		$a = file("xuehao.txt");
		//var_dump($a);
		
		$str = "quality,num_of_activity,plus,plus_num\n";
		for($k=0;$k<count($a);$k++)
		{
			//var_dump($a);
			$content = $a[$k];
			$content = trim($content,"\n");
			
			$content = floatval($content);
			//var_dump($content);
			$str = $str.$content.",";
			
			if($this->Welcome_model->check_id(2014, 1, $content) == false)
			{
				$str = $str."0".','."0".','."0".','."0"."\n";
			}
			
			else
			{
				$cookie = $this->Welcome_model->get_cookie(2014,1);
				$data = $this->Welcome_model->get_score($cookie, $content, 1);
				
			//	var_dump($data);
				$res = 0;
				$count = 0;
				$plus = 0;
				$high = 0;
				for($i=0;$i<count($data['unit']);$i++)
				{
					if($data['unit'][$i]==0)
					{
						$plus += $data['score'][$i];
						$count++;
					}
					if($data['score'][$i]==100)
						$res++;
					if($data['score'][$i]>94)
						$high++;
				}
				
				$str = $str.$data['total_score'].','.count($data['unit']).','.$plus.','.$count.",".$res.",".$high."\n";
			}
		}
		//var_dump($str);
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
	
	public function show_scatter($mess)
	{
		$data['url'] = $mess;
		$this->show("scatter", $data);
	}
	
	public function check_id($ID) 
	{
		$ans;
		header('Content-type:text/json');
		if(!isset($ID) || $ID == "")
			$ans = false;
		else if(!is_numeric($ID))
			$ans = false;
		else if($this->Welcome_model->check_id(2014, 1, $ID))
			$ans = true;
		else
			$ans = false;
		echo json_encode($ans);
	}
	
	public function get_basic_info($id)
	{
		if(!isset($id))
			return;
		$cookie = $this->Welcome_model->get_cookie(2014,1);
		$data = $this->Welcome_model->get_score($cookie, $id, 1);
		
		$plus = 0;
		for($i = 0;$i<count($data['unit']);$i++)
		{
			if($data['unit'][$i] == 0)
				$plus += $data['score'][$i];
		}
		
		$data['plus'] = $plus;
		$data['num_activity'] = count($data['unit']);
		header('Content-type:text/json');
		echo json_encode($data);
	}
	
	public function getScore($id, $all)
	{
		if(!isset($id))
			return;
		
		$cookie = $this->Welcome_model->get_cookie(2014,1);
		
		$data = $this->Welcome_model->get_score($cookie, $id, $all);
		
		$plus = 0;//统计硬加分
		for($i = 0;$i<count($data['unit']);$i++)
		{
			if($data['unit'][$i] == 0)
				$plus += $data['score'][$i];
		}
		
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
					"children"=>$res,
					"plus"=>$plus,
					"num_activity"=>count($data['unit']),
					"total_score"=>$data['total_score'],
					"rank" =>$data['rank']
				);
		
		header('Content-type:text/json');
		echo json_encode($dat);
	}
	
}
