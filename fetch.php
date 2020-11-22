<?php

//fetch.php

include("database_connection.php");

$query = "SELECT * FROM tbl_sample";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
	<table class="table table-striped table-bordered" id="table">
		<tr>
			<th>
				<span class="custom-checkbox">
					<input type="checkbox" id="selectAll">
					<label for="selectAll"></label>
				</span>
			</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Status</th>
			<th>Role</th>
			<th>Options</th>
		</tr>
	';
if ($total_row > 0) {
	foreach ($result as $row) {
		$output .= '
		<tr>
			<td>
					<input type="hidden" name="AllСheckbox" value=""/>
					<input type="checkbox" id="chek_sel" class="select" name="checkbox" value="' . $row["id"] . '"/>
			</td>
			<td width="20%">' . $row["first_name"] . '</td>
			<td width="20%">' . $row["last_name"] . '</td>
			<td width="20%"><div class="round"><input class="status_d"  type="checkbox" ' . ($row["status"] ? 'checked' : '') . ' data-id="' . $row["id"] . '"><label for="checkbox"></label>
				 </div></td>
			<td width="20%">' . $row["role"] . '</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit"  id="' . $row["id"] . '"><i class="material-icons"  title="Edit">&#xE254;</i></button>
				<button type="button" name="delete" class="btn btn-danger btn-xs delete"  id="' . $row["id"] . '"><i class="material-icons"  title="Delete">&#xE872;</i></button>
			</td>
		</tr>
		';
	}
} else {
	$output .= '
	<tr>
		<td colspan="6" align="center">Data not found</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>