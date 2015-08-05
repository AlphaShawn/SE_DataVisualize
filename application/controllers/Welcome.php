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
		$this->load->view('bubble_index');
		//$this->load->view('line_index');
	}
	
	public function test()
	{
		$cookie = $this->Welcome_model->get_cookie(2014,1);
		$this->Welcome_model->get_score($cookie, 5140379066,1);
	}
	
	public function get_origin_quality() 
	{
		$a = file('xuehao.txt');
		foreach($a as $line=>$content)
		{
			$content = trim($content);
			$data = $this->Welcome_model->getScore($content, 0);
			
			$res = 0;
			$count = 0;
			$num = 0;
			
			for($i=0 ; $i < count($data['unit']) ; $i++)
			{
				if($data['unit'][$i] == "0")
					continue;
				else
				{
					$num++;
					$count  = $count + floatval($data['unit'][$i]);
					$res = $res + floatval($data['unit'][$i]) * floatval($data['score'][$i]);
				}
			}
			
			if($count>=10)
				$res = $res/$count*0.3;
			else
				$res = $res/10*0.3;
			$res = floor(($res+0.005)*100)/100;  //四舍五入 保留小数点后2位
			echo ' '.$res;
			echo "<br/>";
		}
	}
	
	
	public function show($view, $data)
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
	
	public function show_line()
	{
		$data = array();
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
