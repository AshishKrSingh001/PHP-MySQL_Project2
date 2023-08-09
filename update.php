<?php
	$msg="";
		$con = mysqli_connect("localhost","root","","StudentDB");
		if($con)
		{	
			$dl = $_GET['dl'];
			if(isset($_POST['name1']))
			{
				$name = $_POST['name'];
				$q = "update test SET name='$name' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['id1']))
			{
				$id = $_POST['id'];
				$q = "update test SET id='$id' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['Password1']))
			{
				$password = $_POST['Password'];
				$q = "update test SET password='$password' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['email1']))
			{
				$email = $_POST['email'];
				$q = "update test SET email='$email' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['dob1']))
			{
				$dob = $_POST['dob'];
				$q = "update test SET dob='$dob' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['gender1']))
			{
				$gender = $_POST['gender'];
				$q = "update test SET gender='$gender' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['hobby1']))
			{
				$hobbies=implode(",",$_POST['hobby']);
				$q = "update test SET hobbies='$hobbies' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['language1']))
			{
				$Language = $_POST['language'];
				$q = "update test SET language='$Language' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['story1']))
			{
				$story = $_POST['story'];
				$q = "update test SET story='$story' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['image1']))
			{
				$filename =	"profile/" . $_FILES["image"]["name"];
				$tempname = $_FILES["image"]["tmp_name"];
				
				$target_dir = "profile/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);
				
				// Check if file already exists
				if (file_exists($target_file)) 
				{
					$msg="file already exists";
				}
				
				else 
				{
					if (move_uploaded_file($_FILES["image"]["tmp_name"],$target_file))
					{
						$msg="The file has been uploaded";
					}
					else 
					{
						$msg="Sorry, there was an error uploading your file";
					}
				}
				$q = "update test SET image='$filename' where id=$dl";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					$msg="Recored is updated";
				}
			}
			elseif(isset($_POST['done']))
			{
				header("location: home.php");
			}
		}
		else
		{
			$msg="Not connected";
		}
?>
<html>
	<head>
		<title>Web page</title>
		<style>
			*{
				margin:0;
				padding:0;
			}
			.container{
				background-color:white;
				height:100vh;
				width:100vw;
			}
			.head{
				background-color:#355C7D;
				height:10%;
				width:100%;
				font-color:white;
			}
			.tail{
				background-color:#355C7D;
				height:10%;
				width:100%;
			}
			.main{
				background-color:#6C5B7B;
				height:80%;
				width:100%;
			}
			li{
				list-style:none;
				float:left;
			}
			li a{
				display:block;
				color:white;
				text-align:center;
				padding:3.5vh 2vw;
				text-decoration:none;
			}
			.a,.c{
				height:10%;
				width:100%;
			}
			.input{
				height:3.5vh;
				width:15vw;
			}
			.btn
			{
				color:grey;
				background-color:#355c7D;
				height:4vh;
				width:6vw;
				border:none;
			}
			.table
			{
				border:2px solid black;
			}
		</style>
	</head>
	<body>
	<div class="container">
		<div class="head">
			<ul>
				<li><a href="home.php">HOME</a></li>
				<li><a href="insert.php">INSERT</a></li>
			</ul>
		</div>
		<div class="main">
			<div class="a"></div>
			<div class="b">
				<form method="POST" enctype="multipart/form-data">
					<table class="table"height="60%" width="40%"cellspacing="10" style="margin-left:auto; margin-right:auto;">
						<tr><td colspan="2" align="center"><b><big>Details</big></b></td></tr>
						<tr>
							<td><b>Name:</b></td>
							<td><input class="input"type="text" name="name"></td>
							<td><input class="btn"type="submit" value="update" name="name1"></td>
						</tr>
						<tr>
							<td><b>Id:</b></td>
							<td><input class="input"type="number" name="id"></td>
							<td><input class="btn"type="submit" value="update" name="id1"></td>
						</tr>
						<tr>
							<td><b>Password:</b></td>
							<td><input class="input"type="password" name="Password"></td>
							<td><input class="btn"type="submit" value="update" name="Password1"></td>
						</tr>
						<tr>
							<td><b>Email:</b></td>
							<td><input class="input"type="email" name="email"></td>
							<td><input class="btn"type="submit" value="update" name="email1"></td>
						</tr>
						<tr>
							<td><b>Date&nbsp;of&nbsp;Birth:</b></td>
							<td><input type="date" name="dob"></td>
							<td><input class="btn"type="submit" value="update" name="dob1"></td>
						</tr>
						<tr>
							<td><b>Gender:</b></td>
							<td><input type="radio" name="gender" value="male">&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="female">&nbsp;Female&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="other">&nbsp;Other</td>
							<td><input class="btn"type="submit" value="update" name="gender1"></td>
						</tr>
						<tr>
							<td><b>Hobbies:</b></td>
							<td><input type="checkbox" name="hobby[]" value="cooking">&nbsp;Cooking&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="playing">&nbsp;Playing&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="dancing">&nbsp;Dancing&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="reading">&nbsp;Reading&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td><input class="btn"type="submit" value="update" name="hobby1"></td>
						</tr>
						<tr>
							<td><b>Language:</b></td>
							<td><select name="language">
								<option value="hindi">Hindi</option>
								<option value="english">English</option>
								<option value="bhojpuri">Bhojpuri</option>
								<option value="bangali">Bangali</option>
								<option value="marathi">Marathi</option>
							</select></td>
							<td><input class="btn"type="submit" value="update" name="language1"></td>
						</tr>
						<tr>
							<td><b>Upload&nbsp;image:</b></td>
							<td><input type="file" name="image"></td>
							<td><input class="btn"type="submit" value="update" name="image1"></td>
						</tr>
						<tr>
							<td><b>Story:</b></td>
							<td><textarea name="story" rows="4" cols="50"></textarea></td>
							<td><input class="btn"type="submit" value="update" name="story1"></td>
						</tr>
						<tr><td align="left" colspan="3"><input class="btn"type="submit" value="Done" name="done"></td></tr>
						<tr><td colspan="3" align="center"><b><?php echo $msg;?></b></td></tr>
					</table>
				</form>
			</div>
			<div class="c"></div>
		</div>
		<div class="tail"><center><p><font color="white">Content on this website is owned, by the Ashish Kumar singh</p>
				<p>Site is technically designed, hosted and maintained by Myself</p>
				<p>Powered By — Myself</font></p></center></div>
	</div>
	</body>
</html>
