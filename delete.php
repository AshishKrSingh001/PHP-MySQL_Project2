<?php
						$conn=mysqli_connect("localhost","root","","StudentDB");
						if($conn)
						{
							$dl = $_GET['dl'];
							$query = "DELETE from test where id=" . $dl . "";
							$rs=mysqli_query($conn,$query);
							if($rs)
							{
								header("location: home.php");
							}
							else
							{
								$conn->error;
							}
						}
						else
						{
							echo "MYSQL not connected<br>";
						}
?>