<?php

class Welcome_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }
		
		public function check_id($year, $semester, $id)
		{
			$cookie = $this->get_cookie($year, $semester);
			
			$ch = curl_init();
			$url = "http://z.seiee.com/index.php/Score/search?sid=".$id;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_COOKIE, $cookie);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$subject = curl_exec($ch);
			$pattern = "/span10/";
			
			return !preg_match($pattern, $subject);
			
		}
		
		public function get_cookie($year, $semester)
		{
			if(!isset($year) || !isset($semester))
				throw new Exception("wrong in get_cookie. parameter is not given"); 
			$url = 'http://z.seiee.com/index.php/History/change/year/'.$year.'/semester/'.$semester;
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
		
		
		public function get_score($cookie, $id, $isAll)
		{
			$ch = curl_init();
			$url = "http://z.seiee.com/index.php/Score/search?sid=".$id;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_COOKIE, $cookie);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$subject = curl_exec($ch);
			curl_close($ch);
			
			//var_dump($id);
		
			$pattern;
			if($isAll == true)
				$pattern = '/<td (class="opt-score")*>(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>/';
			else
				$pattern = '/<td class="opt-score">(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>\s*<td>(.*)<\/td>/';
			
			$match = array();
			
			preg_match_all($pattern, $subject, $match);
						
			if($isAll == true)
			{
				$data['unit'] = $match[4];
				$data['score'] = $match[5];
			}
			else
			{
				$data['unit'] = $match[3];
				$data['score'] = $match[4];
			}
			
			$pattern = "/<span class=\"badge badge-info\">(.*)<\/span><\/td>/";
			$match = array();
			preg_match_all($pattern, $subject, $match);
			
			$data['total_score'] = $match[1][0];
			$data['rank'] = $match[1][1];
			
			return $data;
		}
		
		
}