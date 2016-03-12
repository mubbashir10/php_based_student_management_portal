<?php
	
	//starting session
	session_start();

	//if session doesn't exist
	if(!$_SESSION['user']){

	    echo("<script>window.location = '../index.html'</script>");
		exit();
	}

	//including database coonection file
    include 'dbc.php';
    
    //getting username and session id
	$username = $_SESSION['user']; 
	$session_id = $_GET['id'];


    //clearing previous data
    $sql = "update sessions set status='absent' where sessionID = '$session_id' and usernameTeacher = '$username';";
	$conn->query($sql);

	//getting sessions for current teacher
    $sql = "SELECT * FROM sessions where sessionID='$session_id' and usernameTeacher = '$username';";
    $result = $conn->query($sql);
 
?>
<!--html-->
<!doctype html>
<html lang="en">
	<!--meta information-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" type="image/png" href="images/logo.png">
		<title>PHP Based Student Management Portal</title>
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/skeleton.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/jquery-1.11.3.min.js"></script>
		<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<!--content-->
	<body>
		<!--header-->
	    <header>
	    	<div class="container">
	    		<div class="row">
					<div class="nine columns">
						<h5 style="font-weight:bold;"><span style="color:#35bcf2;"><i class="fa fa-users"></i></span> Student Management Portal</h5>
					</div>
			    </div>	
			</div>    	
	    </header>
	    <!--main wrapper-->
	    <div class="wrapper">
		    <br><br><br>
		    <h3 class="grey">Sessions List</h3>
		    <br><br>
		    <form method="post" action="">
			    <table>
			    	<tr>
			    		<th>ID</th>
			    		<th>Name</th>
			    		<th>Email/Username</th>
			    		<th>Attendance</th>
			    	</tr>
			    	<?php

						if ($result->num_rows > 0) {

							while($row = $result->fetch_assoc()) {
								
								echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["username"]."</td>";
								//if already present
								if($row["status"]=='present')
									echo "<td><input type='checkbox' name='checklist[]' value='".$row["username"]."' checked></td></tr>";
								//if already absent
								else
									echo "<td><input type='checkbox' name='checklist[]' value='".$row["username"]."'></td></tr>";
							
							}
						} 
						else{
							
							echo "<br><br>No sessions were found!<br><br>";
						}

					    //saving attendance
					    if(isset($_POST['save'])){

					    	//marking present
				    		if(!empty($_POST['checklist'])){

							    foreach($_POST['checklist'] as $usr) {
							            
							        $sql = "update sessions set status='present' where sessionID = '$session_id' and username = '$usr';";
					    			$conn->query($sql); 
							    }  
							}
					    }

			    	?>
			    <table>
			    <a href="account.php" style="font-size:13px;">&lt;&lt;Go Back To Sessions' List!</a>
			    <br><br>	
	    		<button type="submit" class="button button-primary" name="save">Save</button>&nbsp;&nbsp;&nbsp;<a href="logout.php" class="button">Logout</a>
		    </form>	
		</div>			
	</body>
</html>