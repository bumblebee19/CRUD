<html>

<head>
	<title>Task</title>
	<link rel="shortcut icon" href="#">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
	<div class="container">
		<br />
		<h3>Task</a></h3><br />
		<br />
		<div class="buttons">
			<button type="button" name="add" class="add btn btn-primary">Add</button>
			<select class="exampleFormControlSelect1">
				<option selected value="select">Please select</option>
				<option value="set_active">Set active</option>
				<option value="set_inactive">Set inactive</option>
				<option value="delete_d">Delete</option>
			</select>
			<input class="mass_action btn btn-primary" type="submit" name="selectList" value="OK">
		</div>
		<div class="table-responsive" id="user_data">
		</div>
		<div class="buttons">
			<button type="button" name="add" class="add btn btn-primary">Add</button>
			<select class="exampleFormControlSelect1">
				<option selected value="select">Please select</option>
				<option value="set_active">Set active</option>
				<option value="set_inactive">Set inactive</option>
				<option value="delete_d">Delete</option>
			</select>
			<input class="mass_action btn btn-primary" type="submit" name="selectList" value="OK">
		</div>
	</div>

	<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="post" id="user_form">
					<div class="modal-body">
						<div class="form-group">
							<label>Enter First Name</label>
							<input type="text" name="first_name" id="first_name" class="form-control" />
							<span id="error_first_name" class="text-danger"></span>
						</div>
						<div class="form-group">
							<label>Enter Last Name</label>
							<input type="text" name="last_name" id="last_name" class="form-control" />
							<span id="error_last_name" class="text-danger"></span>
						</div>
						<div class="form-group">
							<label>Status</label>

							<br />
							<label class="switch">
								<input type="hidden" name="status" value="0" />
								<input id="status" class="status_d" type="checkbox" name="status" value="" />
								<span class="slider round"></span>
							</label>

						</div>
						<div class="form-group">
							<label>Select Role</label>
							<select name="role" id="role" class="form-control">
								<option value=""></option>
								<option value="Admin">Admin</option>
								<option value="User">User</option>
							</select>
							<span id="error_role" class="text-danger"></span>
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="action" id="action" value="insert" />
							<input type="hidden" name="hidden_id" id="hidden_id" />
							<input type="submit" name="form_action" id="form_action" class="btn btn-primary" value="Insert" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal" id="myModal2" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Warning</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="container"></div>
				<div class="modal-body" id="desc">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="myModal4" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Warning</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<form method="post" id="delete_form">
					<div class="container"></div>
					<div class="modal-body">
						Do you want delete this?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" id="del_confirm" class="btn btn-primary">Confirm delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/ajax.js"></script>
</body>

</html>