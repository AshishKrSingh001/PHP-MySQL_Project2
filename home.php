
<html>
	<head>
		<title>Signin.php</title>
		<style>
			*{
				margin:0;
				padding:0;
			}
			.container{
				height:100vh;
				width:100vw;
			}
			.head,.tail{
				height:10vh;
				width:100vw;
				background-color:black;
			}
			.main{
				height:80vh;
				width:100vw;
				background-color:pink;
			}
			.a,.c{
				height:20vh;
				width:100vw;
			}
			.b{
				height:40vh;
				width:100vw;
			}
			.table{
				height:25vh;
				width:20vw;
				border:2px solid white;
				padding:2vw 2vh;
			}
			.input{
				height:4vh;
				width:20vw;
				border:none;
			}
			.btn1,.btn2{
				height:3.5vh;
				width:5vw;
				border:none;
				color:black;
				font-weight:bold;
			}
			.btn1{
				background-color:red;
			}
			.btn2{
				background-color:green;
			}
			
			a{
				text-decoration:none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="head"></div>
			<div class="main">
				<div class="a"></div>
				<div class="b">
					<div align="center" style="margin:10px;"><p><font color="red">
						<?php
							$msg = "";
							if(isset($_POST['sub']))
							{
								if(!empty($_POST['email']) && !empty($_POST['password']))
								{
									$email = $_POST['email'];
									$pass = $_POST['password'];
									$con = mysqli_connect("localhost","root","","StudentDB");
									if($con)
									{
										$q = "select * from login where email='$email' and password='$pass'";
										$rs = mysqli_query($con,$q);
										$row = mysqli_num_rows($rs);
										if($row==1)
										{
											header("location: home1.php");
										}
										else
										{
											echo "Invalid Username or Password";
										}
									}
									else
									{
										echo "Not connected!";
									}
								}
							}
						?>
					</font></p></div>
					<form method="post">
						<table class="table" style="margin-left:auto; margin-right:auto;" cellspacing="15">
							<tr><td align="right" colspan="2"><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New user<br></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="signup.php">Register</a></td></tr>
							<tr><td colspan="2" align="center"><b><big>Login Form</big></b></td></tr>
							<tr>
								<td><b>Username: </b></td>
								<td><input class="input" type="email" name="email" required> </td>
							</tr>
							<tr>
								<td><b>Password: </b></td>
								<td><input class="input" type="password" name="password" required> </td>
							</tr>
							<tr>
								<td align="right" colspan="2"><input class="btn1" type="reset" value="reset" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn2" type="submit" name="sub" value="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
						</table>
					</form>
				</div>
				<div class="c"></div>
			</div>
			<div class="tail"></div>
		</div>
	</body>
</html>