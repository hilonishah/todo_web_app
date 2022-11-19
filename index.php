<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task App</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>
</head>
<body>
   

 <div class="container">
	<p id="success"></p>
	<div class="row">
		<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<h2 class="panel-title" style="position: absolute;">Task App</h2>
									</div>
									<div class="panel-body" style="margin-top:20px">

										<ul class="nav nav-pills">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="pill" href="#alltasks">All Tasks</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="pill" href="#completedtasks">Completed Tasks</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="pill" href="#pendingtasks">Pending Tasks</a>
										</li>
									</ul>
							<div class="tab-content">   
									  <div id="alltasks" class="tab-pane in  active table-responsive">
							        <div class="table-wrapper" >
							            <div class="table-title">
							                <div class="row">
							                    <div class="col-sm-6">
																		<h4>All Tasks</h4>
																	</div>
																	<div class="col-sm-6">
																		<a href="#addTaskModal" class="btn btn-success" data-toggle="modal"><span>Add New Task</span></a>
																	</div>
							                </div>
							            </div>
								            <table class="table table-striped table-hover">
								                <thead>
								                    <tr>
													
																				<th>Sr. No.</th>
								                        <th>Task Name</th>
								                        <th>Description</th>
								                        <th>Task Status</th>
								                        <th>Delete</th>
								                        <th>Complete</th>
								                    </tr>
								                </thead>
												<tbody>
				
																						<?php
																						 $query = "SELECT * FROM task where del_flag=0 ";
																			
																							$result = $dbConnection->prepare($query);
																							$result->execute();
																							$data=array();
																			
																			if($result->rowCount() >0)
																			{
																				$i=1;
																				while($row = $result->fetch())
																				{
																						?>
																							<tr id="<?php echo $row['task_id']; ?>">
																							
																								<td><?php echo $i; ?></td>
																								<td><?php echo $row["task_name"]; ?></td>
																								<td><?php echo $row["description"]; ?></td>
																								<td><?php echo $row["status"]; ?></td>
																								<td>
																									<a href="#deleteTaskModal" class="delete" data-id="<?php echo $row["task_id"]; ?>" data-toggle="modal"><i class="fa fa-trash" data-toggle="tooltip" 
																									 title="Delete"></i></a>
																			                    </td>
																			              <td>
																									<a href="#taskCompleteModal" class="complete" data-id="<?php echo $row["task_id"]; ?>" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" 
																									 title="Mark As Complete"></i></a>
																			             </td>
																							</tr>
																							<?php
																							$i++;
																							}
																						}
																							?>
																							</tbody>
																						</table>
																						
																			        </div>
								
																			</div> <!--all task end-->

									<div id="completedtasks" class="tab-pane fade table-responsive">
											
											        <div class="table-wrapper" >
											            <div class="table-title">
											                <div class="row">
											                    <div class="col-sm-6">
																						<h4>Completed Tasks</h4>
																					</div>
																					
											                </div>
											            </div>
											            <table class="table table-striped table-hover">
											                <thead>
											                    <tr>
																
																							<th style='width:5%'>Sr. No.</th>
											                        <th style='width:10%'>Task Name</th>
											                        <th style='width:20%'>Description</th>
											                      
											                       
											                    </tr>
											                </thead>
															<tbody>
				
																						<?php
																						 $query = "SELECT * FROM task where del_flag=0 AND status='Completed' ";
																			
																							$result = $dbConnection->prepare($query);
																							$result->execute();
																							$data=array();
																			
																			if($result->rowCount() >0)
																			{
																				$i=1;
																				while($row = $result->fetch())
																				{
																						?>
																							<tr id="<?php echo $row['task_id']; ?>">
																							
																								<td><?php echo $i; ?></td>
																								<td><?php echo $row["task_name"]; ?></td>
																								<td><?php echo $row["description"]; ?></td>
																							
																								
																							</tr>
																							<?php
																							$i++;
																							}
																						}
																							?>
																							</tbody>
																						</table>
																						
																			        </div>
																</div> <!--completed tasks end-->
									<div id="pendingtasks" class="tab-pane fade table-responsive">
														
							        <div class="table-wrapper" >
							            <div class="table-title">
							                <div class="row">
							                    <div class="col-sm-6">
																		<h4>Pending Tasks</h4>
																	</div>
																	
							                </div>
							            </div>
							            <table class="table table-striped table-hover">
							                <thead>
							                    <tr>
												
																			<th style='width:5%'>Sr. No.</th>
											                        <th style='width:10%'>Task Name</th>
											                        <th style='width:20%'>Description</th>
							                    </tr>
							                </thead>
											<tbody>
														
														<?php
														 $query = "SELECT * FROM task where del_flag=0 AND status='Pending' ";
											
															$result = $dbConnection->prepare($query);
															$result->execute();
															$data=array();
											
											if($result->rowCount() >0)
											{
												$i=1;
												while($row = $result->fetch())
												{
														?>
														<tr id="<?php echo $row['task_id']; ?>">
														
															<td><?php echo $i; ?></td>
															<td><?php echo $row["task_name"]; ?></td>
															<td><?php echo $row["description"]; ?></td>
															
														</tr>
														<?php
														$i++;
														}
													}
														?>
														</tbody>
													</table>
													
										        </div>
																			</div> <!--pending tasks end-->
        
  					</div><!--tab content end-->
</div><!--panel body end-->
</div><!--panel end-->
</div><!--col end-->
</div><!--row end-->
</div><!--container end-->

  

	<!-- Add Task -->
	<div id="addTaskModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="task_app">
					<div class="modal-header">						
						<h4 class="modal-title">Add Task</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Task Name</label>
							<input type="text" id="task_name" name="task_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea id="description" name="description" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select id="status" name="status" class="form-control" required>
								<option value="Pending">Pending</option>
								<option value="Completed">Completed</option>
							</select>
						</div>
						
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- Delete Task -->
	<div id="deleteTaskModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete this record?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- Mark As Complete Task Modal -->
	<div id="taskCompleteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Mark As Complete</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to mark this task as complete?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="complete">Yes</button>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>    