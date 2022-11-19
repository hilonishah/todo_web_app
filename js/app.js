	
	$(document).on('click','#btn-add',function(e) {
		var data = $("#task_app").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "insertTasks.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addTaskModal').modal('hide');
						
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});

	

	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "deleteTask.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteTaskModal').modal('hide');
					
					location.reload();	
			
			}
		});
	});

	$(document).on("click", ".complete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#complete", function() { 
		$.ajax({
			url: "changeStatus.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#taskCompleteModal').modal('hide');
					 location.reload();	
			
			}
		});
	});
	
	