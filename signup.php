
<html>
	<head>
		<title>Signup.php</title>
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
				height:15vh;
				width:100vw;
			}
			.b{
				height:50vh;
				width:100vw;
			}
			.table{
				height:50vh;
				width:30vw;
				border:2px solid white;
				padding:2vw 5vh;
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
								if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password1']))
								{
									$name = $_POST['name'];
									$email = $_POST['email'];
									$pass = $_POST['password'];
									$pass1 = $_POST['password1'];
									if($pass==$pass1)
									{
										$con = mysqli_connect("localhost","root","","StudentDB");
										if($con)
										{
											$q = "insert into login(name,email,password) values('$name','$email','$pass')";
											$rs = mysqli_query($con,$q);
											if($rs)
											{
												header("location: home.php");
											}
										}
										else
										{
											echo "Not connected!";
										}
									}
									else
									{
										echo "password doesn't matched";
									}
								}
							}
						?>
					</font></p></div>
					<form method="post">
						<table class="table" style="margin-left:auto; margin-right:auto;" cellspacing="0">
							<tr><td  colspan="2" align="right"><small>Already have an account&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></small><a href="home.php">Signin</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
							<tr><td colspan="2" align="center"><b><big>SignUp Form</big></b></td></tr>
							<tr>
								<td><b>Name: </b></td>
								<td><input class="input" type="text" name="name" required> </td>
							</tr>
							<tr>
								<td><b>Email: </b></td>
								<td><input class="input" type="email" name="email" required> </td>
							</tr>
							<tr>
								<td><b>Password: </b></td>
								<td><input class="input" type="password" name="password" required> </td>
							</tr>
							<tr>
								<td><b>Confirm Password: </b></td>
								<td><input class="input" type="password" name="password1" required> </td>
							</tr>
							<tr><td  colspan="2" align="right"><input class="btn1" type="reset" value="reset" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn2" type="submit" name="sub" value="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
						</table>
					</form>
				</div>
				<div class="c"></div>
			</div>
			<div class="tail"></div>
		</div>
	</body>
</html>