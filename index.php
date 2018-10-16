<!DOCTYPE html>
<?php 
	include 'db.php';
	session_start();
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM info WHERE SUBJ_ID=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['address'];
		}
	}

?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To Mysql Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">
 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">

<!-- my css -->

		<link rel="stylesheet" href="css/style.css">

 
	</head>
	<body>    

	<!-- Navbar
    ================================================== -->
 
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To Mysql Database Using PHP</a>
 
			</div>
		</div>
	</div>
 
	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
 
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
 


<form method="post" action="crud.php" class="sub">

<br>

		<div class="input-group">
			<label>Subject</label>
			<input type="text" name="Subject" value="">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="Description" value="">
		</div>
		<div class="input-group">
			<label>Unit</label>
			<input type="text" name="Unit" value="">
		</div>
		<div class="input-group">
			<label>Semester</label>
			<input type="text" name="Semester" value="">
		</div>
		<br class="clearBoth" />
		<div class="input-group2">
			
			<?php if ($update == true): ?>
			Updating: <input type="" name="id" value="<?php echo $id; ?>"><br><br>
			<button class="btn" type="submit" name="update" style="" >Update</button>
			
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>

		</div>
	</form>

	
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg" id="fade">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>


<h3>Table Data</h3>

		<table class="table table-bordered">
			<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Subject</th>
				  		<th>Description</th>
				  		<th>Unit</th>
				  		<th>Semester</th>
 
 
				  	</tr>	
				  </thead>
			<?php
				$SQLSELECT = "SELECT * FROM subject ORDER BY SUBJ_ID DESC";
				$result_set =  mysqli_query( $conn,$SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
					<tr>
						<td><?php echo $row['SUBJ_ID']; ?></td>
						<td><?php echo $row['SUBJ_CODE']; ?></td>
						<td><?php echo $row['SUBJ_DESCRIPTION']; ?></td>
						<td><?php echo $row['UNIT']; ?></td>
						<td><?php echo $row['SEMESTER']; ?></td>
						<td>
				<a href="index.php?edit=<?php echo $row['SUBJ_ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="crud.php?del=<?php echo $row['SUBJ_ID']; ?>" class="del_btn">Delete</a>
			</td>
 
					</tr>
				<?php
				}
			?>
		</table>
	</div>
 
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/my.js"></script>
	</body>

</html>