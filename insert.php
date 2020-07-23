<?php 
	include 'header.php'; 
	include 'database.php'; 
?>

<?php
	$db = new Database();
	
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
			$sql = "insert into crud_table(name,email,phone,address,skill) values ('$name','$email','$phone','$address','$skill')";
			$insertdata = $db->insert($sql);
		}
	}
?>
<?php
	if (isset($empty)) {
		echo $empty;
	}
?>
<div class="col-md-6 mx-auto">
	<form action="" method="POST">
		<div class="form-group row">
		    <label for="name" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="name">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="email" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" name="email" class="form-control" id="email">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
		    <div class="col-sm-10">
		      <input type="text" name="phone" class="form-control" id="phone">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="address" class="col-sm-2 col-form-label">Address</label>
		    <div class="col-sm-10">
		      <input type="text" name="address" class="form-control" id="address">
		    </div>
		</div>
		<div class="form-group row">
		    <label for="skill" class="col-sm-2 col-form-label">Skill</label>
		    <div class="col-sm-10">
		      <input type="text" name="skill" class="form-control" id="skill">
		    </div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" name="submit" class="btn btn-success">Submit</button>
				<button type="reset" class="btn btn-success">Reset</button>
			</div>
		</div>
	</form>
</div>
<a class="btn btn-dark" href="index.php">Go back</a>


<?php include 'footer.php'; ?>			