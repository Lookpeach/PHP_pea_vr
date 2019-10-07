<?php
header('Content-type: application/json; charset=utf-8');
class DB_Functions {
 
    private $db;
    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    function __destruct() {
		
    }
	public function saveTag($tag){
		
		$date_now = date("Y-m-d");
		$time_now = date("h:i:sa");
		
		mysql_query("INSERT INTO tb_log (`tag`,`date`,`time`)
		VALUES ('$tag', '$date_now', '$time_now')");

		$row = new stdClass();
		$row->success = true;
		$row->testX = "testX";
		
        return $row;
	}
	// public function saveScore($id,$name_face,$score,$score2){
	// 	$date_now = date("Y-m-d");
	// 	$time_now = date("h:i:sa");
		
	// 	mysql_query("INSERT INTO tb_log_play (`id_ref`,`name_ref`,`score`,`date`,`time`)
	// 	     VALUES ('$id','$name_face','$score2', '$date_now', '$time_now')");
			 
	//     $sql_update = "UPDATE tb_user SET score = '$score' WHERE id = '$id'";
	// 	$dbquery_update = mysql_query($sql_update);
		
	// }
	public function saveUserData($name,$email,$tel){
		
		$date_now = date("Y-m-d");
		$time_now = date("h:i:sa");
		
		// $sql = "SELECT * FROM tb_member where id_facebook = '$id_face'";
		// $dbquery = mysql_query($sql);
		// $num_rows = mysql_num_rows($dbquery);
		// $score = 0;
		// $id1 = 0;
		// if($num_rows > 0){
		// 	$result = mysql_fetch_array($dbquery);
		// 	$id1 = $result['id'];
		// 	// $score = $result['score'];
		// }
		// else{
			// $score = 0;
			mysql_query("INSERT INTO tb_member (`name`,`email`,`tel`,`date_regis`,`time_regis`)
		     VALUES ('$name','$email','$tel','$date_now','$time_now')");
			 
			 $id1 = mysql_insert_id();
		// }

		$row = new stdClass();
		$row->success = true;
		$row->id = $id1;
		// $row->name_user = $name;
		// $row->email_user = $email;
		// $row->tel_user = $tel;
		
        return $row;
	}
	// public function getRanking(){
		
	// 	$sql = "SELECT * FROM tb_user where score > 0 ORDER BY score DESC LIMIT 6";
	// 	$dbquery = mysql_query($sql);
	// 	$num_rows = mysql_num_rows($dbquery);

	// 	$ary = array();
	// 	if($num_rows > 0){
	// 	    while($row = mysql_fetch_assoc($dbquery)) {

	// 			$id = $row['id'];
	// 			$name = $row['name_facebook'];
	// 			$score = $row['score'];

	// 			$row2 = new stdClass();
	// 	        $row2->id = $id;
	// 			$row2->name = $name;
	// 			$row2->score = $score;
				
	// 			$ary[] = $row2;
	// 		}
	// 	}

	// 	return $ary;
	// }
	

	public function getFolderList(){
		$sql = "SELECT * FROM tb_around where display = 1 ORDER BY sort ASC";
		$dbquery = mysql_query($sql);
		$num_rows = mysql_num_rows($dbquery);

		$ary = array();
		if($num_rows > 0){
		    while($row = mysql_fetch_assoc($dbquery)) {

				$id = $row['id'];
				$title = $row['title'];

				$row2 = new stdClass();
		        $row2->id = $id;
				$row2->title = $title;
				
				$ary[] = $row2;
			}
		}

		return $ary;
	}
	
	// public function getItemList($id){
	// 	$sql = "SELECT * FROM tb_pic where cnt = '$id'";
	// 	$dbquery = mysql_query($sql);

	// 	$num_rows = mysql_num_rows($dbquery);

	// 	$ary = array();
	// 	if($num_rows > 0){
	// 	    while($row = mysql_fetch_assoc($dbquery)) {

	// 			$id = $row['id'];
	// 			$detail = $row['detail'];
	// 			$thumbnail = $row['file1'];
	// 			$pic_text = $row['file2'];
	// 			$video = $row['file3'];

	// 			$row2 = new stdClass();
	// 	        $row2->id = $id;
	// 			$row2->detail = $detail;
	// 			$row2->thumbnail = $thumbnail;
	// 			$row2->pic_text = $pic_text;
	// 			$row2->video = $video;
				
	// 			$ary[] = $row2;
	// 		}
	// 	}
	// 	return $ary;
	// }
	public function onGetDataInit(){
		$sql = "SELECT * FROM tb_round where choose = 1";
		$dbquery = mysql_query($sql);

		$num_rows = mysql_num_rows($dbquery);
		$row = new stdClass();
		$row->success = false;
		
		if($num_rows > 0){
			$result = mysql_fetch_array($dbquery);

			$id = $result['id'];
			$title = $result['title'];
			$start_date = $result['start_date'];
			$end_date = $result['end_date'];
			$bg = $result['pic1'];
			$btnFront = $result['pic2'];
			$btnFront2 = $result['pic12'];
			$btnRear = $result['pic3'];
			$btnRear2 = $result['pic13'];
			$btnSearch = $result['pic4'];
			$btnSearch2 = $result['pic14'];
			$btnBack = $result['pic5'];
			$btnBack2 = $result['pic15'];
			$success = true;
	        $row->id = $id;
		    $row->success = $success;
		    $row->fullname = $fullname;
		}
		else {
			$success = false;
			$row->success = $success;
			$row->error = "ไม่มีรอบที่เปิดให้ลงทะเบียน";
		}

	}

}
 
?>