<?php
		$con = mysqli_connect("localhost","root","","StudentDB");
		if($con)
		{
			$q = "SELECT * from test";
			$rs = mysqli_query($con,$q);
			$row;
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
			td a{
				text-decoration:none;
			}
			tr{
				text-align:center;
			}
			td{
				width:auto;
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
				<table class="table" border="2px solid red"height="auto" width="100%"cellspacing="0" style="margin-left:auto; margin-right:auto;">
					<tr><td colspan="12"><b><big>Records</big></b></td></tr>
					<tr>
						<th><b><big>NAME</big></b></th>
						<th><b><big>ID</big></b></th>
						<th><b><big>PASSWORD</big></b></th>
						<th><b><big>EMAIL</big></b></th>
						<th><b><big>DATE-OF-BIRTH</big></b></th>
						<th><b><big>GENDER</big></b></th>
						<th><b><big>HOBBIES</big></b></th>
						<th><b><big>LANGUAGE</big></b></th>
						<th><b><big>IMAGE</big></b></th>
						<th><b><big>STORY</big></b></th>
						<th><b><big>UPDATE</big></b></th>
						<th><b><big>DELETE</big></b></th>
					</tr>
					<?php
						for($i=1;$row = mysqli_fetch_array($rs);$i++)
						{
					?>
						<tr>
						<td><b><?php echo strtoupper($row['name']);?></b></td>
						<td><b><?php echo $row['id'];?></b></td>
						<td><b><?php echo $row['password'];?></b></td>
						<td><b><?php echo $row['email'];?></b></td>
						<td><b><?php echo $row['dob'];?></b></td>
						<td><b><?php echo strtoupper($row['gender']);?></b></td>
						<td><b><?php echo strtoupper($row['hobbies']);?></b></td>
						<td><b><?php echo strtoupper($row['language']);?></b></td>
						<td><b><img src="<?php echo $row['image'];?>" height="30px" width="50px"></b></td>
						<td style="width:23vw;"><b><?php echo strtoupper($row['story']);?></b></td>
						<td><b><a href="update.php?dl=<?php echo $row['id'];?>"><font color="grey">Update</font></a></b></td>
						<td><b><a href="delete.php?dl=<?php echo $row['id'];?>"><font color="voilet">Delete</font></a></b></td>
						</tr>
					<?php } ?>
					
				</table>
		</div>
		<div class="tail"><center><p><font color="white">Content on this website is owned, by the Ashish Kumar singh</p>
				<p>Site is technically designed, hosted and maintained by Myself</p>
				<p>Powered By — Myself</font></p></center></div>
	</div>
	</body>
</html>
