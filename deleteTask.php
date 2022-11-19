 <?php
error_reporting(E_ALL);
session_start();

	include "config.php";	
	
	$task_id=$_POST['id'];
		
		
	
						$qry_res1 = $dbConnection->prepare("UPDATE task SET del_flag=1 where task_id=?");	
						$qry_res1->execute(array($task_id));
						echo json_encode(array("statusCode"=>200));
             

	
   
	
	
?>
