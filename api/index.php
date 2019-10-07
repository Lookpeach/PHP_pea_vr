 <?php
header('Content-type: application/json; charset=utf-8');

/**
 * File to handle all API requests
 * Accepts GET and POST
 * 
 * Each request will be identified by TAG
 * Response will be JSON data

 * check for POST request 
 */
if (isset($_REQUEST['tag']) && $_REQUEST['tag'] != '') {
    // get tag
    $tag = $_REQUEST['tag'];
 
    // include db handler
    require_once 'include/DB_Functions.php';
    $db = new DB_Functions();
 
    // response Array
    $response = array("tag" => $tag, "success" => FALSE);
 
    // check for tag type
	if($tag == 'test1'){
		 $name1 = $_REQUEST['name'];
         $email1 = $_REQUEST['email'];
         $tel1 = $_REQUEST['tel'];

         $result = $db->saveUserData($name1,$email1,$tel1);

         $response["success"] = true;

        //  $response["data"] = $result;
         echo "success";

		//  echo "name = ".$name1." email = ".$email1." tel = ".$tel1." date_now = ".$date_now1." time_now = ".$time_now1;
	}
    // else if ($tag == 'saveScore') {
		
    //     $id = $_REQUEST['id'];
	// 	$name = $_REQUEST['name_face'];
	// 	$score = $_REQUEST['score'];
	// 	$score2 = $_REQUEST['score2'];
		
	// 	$result = $db->saveScore($id,$name,$score,$score2);
		
    //     $response["success"] = true;

    //     $response["data"] = $result;
		
    //     echo json_encode($response);
    // }

	// else if ($tag == 'getDataUser') {
        
    //     $id = $_REQUEST['id_face'];
	// 	$name = $_REQUEST['name_face'];
	// 	$result = $db->saveUserData($id,$name);
		
    //     $response["success"] = true;

    //     $response["data"] = $result;
		
    //     echo json_encode($response);
    // }
	// else if ($tag == 'getRanking') {
        
	// 	$result = $db->getRanking();
		
    //     $response["success"] = true;

    //     $response["Items"] = $result;
		
    //     echo json_encode($response);
    // }

	else {
        // user failed to store
        $response["success"] = FALSE;
        $response["error_msg"] = "Unknow 'tag' value. It should be either 'login' or 'version'";
        echo json_encode($response);
      }
} else {
    $response["success"] = FALSE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}
?>