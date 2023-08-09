<?php
	$msg="";
	if(isset($_POST['submit']))
	{
		//print_r($_POST);		
		
		$con = mysqli_connect("localhost","root","","StudentDB");
		if($con)
		{
			if(!empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['Password']) && !empty($_POST['email']) && !empty($_POST['dob']) && !empty($_POST['gender']) && !empty(implode(",",$_POST['hobby'])) && !empty($_POST['language']) && !empty($_POST['story']) && !empty($_FILES["image"]["name"]))
			{
				$name=$_POST['name'];
				$id=$_POST['id'];
				$password=$_POST['Password'];
				$email=$_POST['email'];
				$dob=$_POST['dob'];
				$gender=$_POST['gender'];
				$hobbies=implode(",",$_POST['hobby']);
				$language=$_POST['language'];
				$story=$_POST['story'];
				
				$filename =	"profile/" . $_FILES["image"]["name"];
				$tempname = $_FILES["image"]["tmp_name"];
				
				$target_dir = "profile/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);
				
				// Check if file already exists
				if (file_exists($target_file)) 
				{
					$msg="file already exists";
					$msg="Your file was not uploaded";
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
		
				$q = "insert into test(name,id,password,email,dob,gender,hobbies,language,image,story) values('$name','$id','$password','$email','$dob','$gender','$hobbies','$language','$filename','$story');";
				$rs = mysqli_query($con,$q);
				if($rs)
				{
					header("location: home.php");
				}
				else
				{
					$msg = "";
				}
			}
			else
			{
				$msg = "Record is empty";
			}
		}
		else
		{
			$msg="Not connected";
		}	
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
				height:12%;
				width:100%;
			}
			.input{
				height:3.5vh;
				width:15vw;
			}
			.btn1
			{
				color:blue;
				background-color:green;
				height:4vh;
				width:6vw;
				border:none;
			}
			.btn2
			{
				color:blue;
				background-color:red;
				height:4vh;
				width:5vw;
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
				<li><a href="home1.php">HOME</a></li>
				<li><a href="insert.php">INSERT</a></li>
			</ul>
		</div>
		<div class="main">
			<div class="a"></div>
			<div class="b">
				<form method="POST" enctype="multipart/form-data">
					<table class="table"height="60%" width="30%"cellspacing="10" style="margin-left:auto; margin-right:auto;">
						<tr><td colspan="2" align="center"><b><big>Details</big></b></td></tr>
						<tr>
							<td><b>Name:</b></td>
							<td><input class="input"type="text" name="name" required></td>
						</tr>
						<tr>
							<td><b>Id:</b></td>
							<td><input class="input"type="number" name="id" required></td>
						</tr>
						<tr>
							<td><b>Password:</b></td>
							<td><input class="input"type="password" name="Password" required></td>
						</tr>
						<tr>
							<td><b>Email:</b></td>
							<td><input class="input"type="email" name="email" required></td>
						</tr>
						<tr>
							<td><b>Date&nbsp;of&nbsp;Birth:</b></td>
							<td><input type="date" name="dob" required></td>
						</tr>
						<tr>
							<td><b>Gender:</b></td>
							<td><input type="radio" name="gender" value="male">&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="female">&nbsp;Female&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="other">&nbsp;Other</td>
						</tr>
						<tr>
							<td><b>Hobbies:</b></td>
							<td><input type="checkbox" name="hobby[]" value="cooking">&nbsp;Cooking&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="playing">&nbsp;Playing&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="dancing">&nbsp;Dancing&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobby[]" value="reading">&nbsp;Reading&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
						</tr>
						<tr>
							<td><b>Upload&nbsp;image:</b></td>
							<td><input type="file" name="image"></td>
						</tr>
						<tr>
							<td><b>Story:</b></td>
							<td><textarea name="story" rows="4" cols="50"></textarea></td>
						</tr>
						<tr><td colspan="2" align="right"><input class="btn1"type="reset" value="reset" name="reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn2"type="submit" value="Submit" name="submit"></td></tr>
						<tr><td colspan="2" align="center"><b><?php echo $msg;?></b></td></tr>
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
