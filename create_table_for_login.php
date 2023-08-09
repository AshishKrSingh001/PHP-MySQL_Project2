<?php
$con=mysqli_connect("localhost","root","","StudentDB");

if($con)
{ 
	$result=mysqli_query($con,"create table login(id int AUTO INCREMENT,name varchar(20)NOT NULL,email varchar(20)NOT NULL,password varchar(20)NOT NULL,primary key(id))");
	if($result)
	{
		echo"table created";
	}
	else
	{
		echo"table not createed";
	}
}
else
{
	echo"not connected<br>";
}
	
?>