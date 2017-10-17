<?PHP
$response=0;
	if(isset($_POST['pass2']))
		{
			$fn=$_POST['fn'];
			$ln=$_POST['ln'];
			$ui=$_POST['ui'];
			$pass=$_POST['pass1'];
			$pass2=$_POST['pass2'];

    
	   
         if($pass == $pass2)
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
					            echo "connected";
					            $sql="INSERT INTO signup(fname, lname, email, pass, uid) VALUES('$fn','$ln','$ui','$pass','')";
						       $queryexe=mysqli_query($conndb,$sql);
									       if(!$queryexe)
									       {
									       	die("fuck of");
									       }
						                   $response=1;
						       
							}
							mysqli_close($conndb);
     }
			else
			{
				echo $response=0;
			}
	


echo $response=0;
}
?>