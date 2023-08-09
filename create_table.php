<?php
$con=mysqli_connect("localhost","root","","StudentDB");

if($con)
{ 
$Q="create table test(name varchar(20)NOT NULL,id int,password varchar(20)NOT NULL,email varchar(20)NOT NULL,dob date NOT NULL,gender varchar(20)NOT NULL,hobbies varchar(20)NOT NULL,language varchar(20)NOT NULL,image varchar(20)NOT NULL,story text NOT NULL,primary key(i))";
	$result=mysqli_query($con,$Q);
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