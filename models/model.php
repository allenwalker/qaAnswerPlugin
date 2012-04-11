<?php
	include_once("models/question.class.php");

class Model {
	public $questionIds;
	public function __construct($result){
	//khởi tạo csdl. Lấy hết dữ liệu ra rồi
		//connect_db();
		if(is_array($result)){
			$index=0;
			while ($element = current($result)){
				$this->questionIds[$index]= key($result);
				$index++;
				next($result);
			}
		}
		else 
			$this->questionIds="Has no question appropiate";
		
		//print_r($this->questionIds); ///////// Just Test
		
	}
	
	public function connect_db(){
		$connect = mysql_connect('localhost','root','abc123');
		mysql_select_db('stackoverflow',$connect);
	}
	
	public function close_db(){
		mysql_close(); // ??? $connect
	}
	
	
	public function getQuestionList(){
		$ids = join(',',$this->questionIds);
                echo "<pre>";
                print_r($this->questionIds);
                echo "</pre>";
                echo "<pre>";
                print_r($ids);
                echo "</pre>";
		$sql = "SELECT id, title, tags,body FROM posts WHERE id IN ('$ids')";
		$questionList = mysql_query($sql);
		//return mysql_fetch_array($questionList);
		//return $questionList;
		//$index=0;
		while($arrayList = mysql_fetch_array($questionList)){
			$arrayQuestionList[]=$arrayList;
			//$index++;
		}
                echo "<pre>";
                print_r($arrayQuestionList);
                echo "</pre>";
		return $arrayQuestionList;
	}
	
	public function getQuestion($id){
	}
}
?>