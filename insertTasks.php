 <?php
error_reporting(E_ALL);
session_start();

	include "config.php";	
	if(count($_POST)>0){
	$task_name=$_POST['task_name'];
		$description=$_POST['description'];
		$status=$_POST['status'];
		
	
						$qry_res1 = $dbConnection->prepare("INSERT INTO task(task_name,description,status) VALUES (?,?,?)");	
						$qry_res1->execute(array($task_name,$description,$status));
						echo json_encode(array("statusCode"=>200));
             
	}
	
   
	
	
?>
