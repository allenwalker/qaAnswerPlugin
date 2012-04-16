<?php
	include_once("models/question.class.php");

class Model {
	public $questionIds;
	public function __construct($result){
		if(is_array($result)){
                    $this->questionIds= array_keys($result);
		}
		else 
                    $this->questionIds="Has no question appropiate";	
	}
	
	public function connect_db(){
		$connect = mysql_connect('localhost','root','abc123');
		mysql_select_db('stackoverflow',$connect);
	}
	
	public function close_db(){
		mysql_close(); // ??? $connect
	}
	
	
	public function getQuestionList(){
            $arrayQuestionList = array();
            $index=0;
            foreach ($this->questionIds as $value){
                $arrayQuestionList[$index]=$this->getQuestion($value);
                $index++;
            }
            return $arrayQuestionList;
	}
	
	public function getQuestion($id){
            $sql = "SELECT id, title, tags, body FROM posts WHERE id='$id'";
            $result = mysql_fetch_array(mysql_query($sql));
            $question = new Question($result['id'],$result['title'],$result['tags'],$result['body']);
            //$question->display();
            return $question;
	}
}
?>