<?php
session_start();
$email=$_POST['username'];
$pass=$_POST['password'];
$response=0;
if ($_POST['password']) 

{
	$host='localhost:3306';
    $username='root';
    $password='';
    $dbname='rempass';
    $conndb = mysqli_connect($host,$username,$password,$dbname);
          
		if(!$conndb)
		{
			echo"colud not connect".mysql_error();
		}
		else
		{
		        $sql="SELECT uid FROM signup where email='$email' and pass='$pass'";
		        $queryexe=mysqli_query($conndb,$sql);
			       if(!$queryexe)
			       {
			       	die("fuck of");
			       }
			   	while($result=mysqli_fetch_assoc($queryexe))
			   	{
					   			$_SESSION["uid"]= "{$result['uid']}";
					   	
					   					   	$response=1;
			    }

				mysqli_close($conndb);

        }  
}
echo $response;
?>