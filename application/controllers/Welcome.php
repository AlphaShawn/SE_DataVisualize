<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('bubble');
	}
	
	public function getCookie()
	{
		$url = 'http://z.seiee.com/index.php/History/change/year/2014/semester/1';
		$ch = curl_init($url); //初始化
		curl_setopt($ch,CURLOPT_HEADER,1); //将头文件的信息作为数据流输出
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //返回获取的输出文本流
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$string = curl_exec($ch);
		//echo $string;
		preg_match_all('/Set-Cookie:(.*);/i', $string, $results);
	//	echo $results[1][0];
		return $results[1][0];
	}
	
	public function getScore($id, $all)
	{
		$cookie = $this->getCookie();
		
		//echo $cookie;
		
		$ch = curl_init();
		$url = "http://z.seiee.com/index.php/Score/search?sid=".$id;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$subject = curl_exec($ch);
		
		
		$pattern;
		if($all == true)
			$pattern = '/<td (class="opt-score")*>(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>/';
		else
			$pattern = '/<td class="opt-score">(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>/';
		
		$match = array();
		preg_match_all($pattern, $subject, $match);
		
		curl_close($ch);
		
		if($all == true)
		{
			$data['unit'] = $match[4];
			$data['score'] = $match[5];
		}
		else
		{
			$data['unit'] = $match[3];
			$data['score'] = $match[4];
		}
		
		$res = array();
		for($i=0;$i<count($data['unit']);$i++)
		{
			// if($data['unit'][$i] == 0)
			// {
				// $tmp = array("name"=>$data['unit'][$i], "size"=>$data['score'][$i]);
			// }
			// else
			if($data['unit'][$i] == 0)
			{
				$data['unit'][$i] = "硬加分".$data['score'][$i];
				$data['score'][$i] = 100;
			}
			$tmp = array( 	
							"name"=>$data['unit'][$i], 
							"size"=>intval($data['score'][$i],10) 
						);
			$res[$i] = $tmp;
		}
		
		$dat = array("name"=>"father", "children"=>$res);
		
		header('Content-type:text/json');
		echo json_encode($dat);
	}
	
}
