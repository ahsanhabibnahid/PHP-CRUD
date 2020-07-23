<?php 
	include 'header.php'; 
	include 'database.php'; 
?>

<?php
	$id = $_GET['id'];
	$db = new Database();
	$sql = "select * from crud_table where id='$id'";
	$getSelectData = $db->select($sql);
	
?>

<?php
	if (isset($_POST['delete'])) {
		$sql = "delete from crud_table where id='$id'";
		$deleteData = $db->delete($sql);
	}
?>

<?php
	if (isset($_POST['submit'])) {
		$name = $db->link->real_escape_string($_POST['name']);
		$email = $db->link->real_escape_string($_POST['email']);
		$phone = $db->link->real_escape_string($_POST['phone']);
		$address = $db->link->real_escape_string($_POST['address']);
		$skill = $db->link->real_escape_string($_POST['skill']);
		if ($name=="" || $email=="" || $phone=="" || $address=="" || $skill=='') {
			$empty = "<h2 class='text-danger text-center'>Field must not be empty</h2>";
		}
		else{
			$sql = "update crud_table 
					set name  = '$name',
						email = '$email',
						phone =	'$phone',
						address = '$address',
						skill = '$skill'
					where id = '$id'
					";
			$insertdata = $db->update($sql);
		}
	}
?>
<?php
	if (isset($empty)) {
		echo $empty;
	}
?>

<?php
	if (isset($getSelectData)) {
		while ($row = $getSelectData->fetch_assoc()) {

?>

<div class="col-md-6 mx-auto">
	<form action="update.php?id=<?php echo $id;?>" method="POST">
		<div class="form-group row">
		    <label for="name" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="name" 
		      value="<?php echo $row['name']; ?>">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="email" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="email" class="form-control" id="email"
		       value="<?php echo $row['email']; ?>">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
		    <div class="col-sm-10">
		      <input type="text" name="phone" class="form-control" id="phone" 
		      value="<?php echo $row['phone']; ?>">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="address" class="col-sm-2 col-form-label">Address</label>
		    <div class="col-sm-10">
		      <input type="text" name="address" class="form-control" id="address" 
		      value="<?php echo $row['address']; ?>">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="skill" class="col-sm-2 col-form-label">Skill</label>
		    <div class="col-sm-10">
		      <input type="text" name="skill" class="form-control" id="skill" 
		      value="<?php echo $row['skill']; ?>">
		    </div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" name="submit" class="btn btn-success">Update</button>
				<button type="reset" class="btn btn-success">Reset</button>
				<button type="submit" name="delete" class="btn btn-success">Delete</button>
			</div>
		</div>
	</form>
<?php
	}	}
?>
</div>
<a class="btn btn-dark" href="index.php">Go back</a>


<?php include 'footer.php'; ?>			