<?php 
	include 'header.php'; 
	include 'database.php'; 
?>

<?php
	$db = new Database();
	$sql = "select * from crud_table";
	$getSelectData = $db->select($sql);
?>
<?php
	if (isset($_GET['msg'])) {
		echo $_GET['msg'];
	}
?>
<table class="table table-bordered table-striped text-center">
	<thead class="thead-dark">
		<tr>
			<th width="5%">Serial</th>
			<th width="25%">Name</th>
			<th width="25%">Email</th>
			<th width="15%">Phone</th>
			<th width="15%">Address</th>
			<th width="10%">Skill</th>
			<th width="5%">Action</th>
		</tr>
	</thead>
	<tbody>
<?php
	if (isset($getSelectData)) {
		$i = 1;
		while ($row = $getSelectData->fetch_assoc()) {
?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['skill']; ?></td>
			<td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
		</tr>
<?php
	}	}
?>

	</tbody>
</table>
<a class="btn btn-dark" href="insert.php">Insert Value</a>


<?php include 'footer.php'; ?>			