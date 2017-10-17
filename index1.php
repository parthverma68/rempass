
<?php
session_start();
//$uid=$_COOKIE[$cookie_uid];
$uid=$_SESSION['uid'];

?>
<?php 
//
$response=0;
if(!empty($_POST['pass']))
{
	$lbtyp = implode(",", $_POST['lebeltype']);
	
	$dl = implode(",", $_POST['label']);
	
	$du=implode(",",$_POST['ui']);
	$dp=implode(",",$_POST['pass']);
   

$idd="";
$n=sizeof($_POST['ui']); 

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
			for($k=0;$k<$n;$k++)
			{
          
            $sql="INSERT INTO users(id,lbtyp,lb,ui,pass,uid) VALUES ('$idd','{$_POST['lebeltype'][$k]}','{$_POST['label'][$k]}','{$_POST['ui'][$k]}','{$_POST['pass'][$k]}',$uid)";
	       $queryexe=mysqli_query($conndb,$sql);
	       if(!$queryexe)
	       {
	       	die("fuck of");
	       }
	       $response=1;
	       
		}
		mysqli_close($conndb);
}

}

echo $response;



?>