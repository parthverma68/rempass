<?php
session_start();
$uid=$_SESSION['uid'];
/*$cookie_uid=$_SESSION["uid"];
setcookie($cookie_uid);

$uid=$cookie_uid;
;*/

?>
<!DOCTYPE html>
<head>
<script src="jquery-2.2.3.js"></script>
  <script type="text/javascript" src="canvasjs.min.js"></script>
	
	<style>
	
	#logout
	{
		position:absolute;
		right:10px;
		top:10px;
		height:26px;
		width:100px;
	}
 #et
    {
	 font-size: 20px;
	 color:yellow;
    }
	input ,select
	{
		height:40px;
		width:180px;
		font-size:20px;
		background:yellow;
	}
	#prevent
	{
		height:300px;
		background: red;
		width:200px;
		position:fixed;
		bottom:100px; 
	}
	#chartContainer
	{
		height:500px;
		position:relative;
		float: right;
		right:10px;
		width:500px;
		background: red;
		

	}
	input
	{
		height:20px;
		width:80px;
	}
	body
	{
		background-repeat: no-repeat;
		background-attachment:fixed;
	}
	#showprevious
	{
		height:400px;
		width:auto;
		background-color: green;
	}
	
	</style>
	
	<script type="text/javascript">

	$(document).ready(function()
	{
			   $("#entsub").click(function(e)
			   {
			   		e.preventDefault();
			     var x=$("#entryform #num");
			     var e=x.val();

			for(var i=1;i<=e;i++)
			{
				$("#et").append('<tr><td >lebeltype</td><td><select name="lebeltype[]" ><option value="E-Banking">BANKING</option><option value="E-Shopping">Shopping</option><option value="Booking">BOOKING</option><option value="Other">OTHER</option></select></td><td>lebel'+i+'<input type="text"  name="label[]"></td><td>username'+i+'</td><td ><input type="text" name="ui[]"  ></td><td>passwprd'+i+'</td><td ><input type="text" name="pass[]"></td></tr>');
			    
			}
			});

   
});

	
	</script>
<script>

		    $("#useri#frm#hey").submit(function(e)
		    {
		        	
		     e.stopPropogation();

					  
							  $.ajax
				        ({
							url:"index1.php",
							type:'POST',
							success:function(response)
						   {
							   	
							 
							console.log(response);
							  }
						});return false;
           });
</script>
</head>
<body background="look3.png">
	<div height="30px" background="red">welcome
	
		<form id="logout" action="signup.html"> 
		<input type="button" id="logout" value="LOGOUT"/>
	    </form>
	    </div><br/>

	<div id="entryd">
	   <form id="entryform">
		<center>
		<b>Enter number of entries</b>
		<input type="number" id="num">
		<button id="entsub">CREATE</button>
	    </center>
	   </form>
	</div>

	<div id="useri">
	 <form action="index1.php" method="POST" id="frm">
		<table id="et">
		</table><br/>
		<center>
		<input type="submit" id="hey">
	    </center>
    	</form>
	</div>

<div id="showprevious">
	<table id="prev" border="1" height="auto" width="auto">

<?php


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
				$xb=0;
				$xbk=0;
				$ot=0;
				$xs=0;
         
           $sql="SELECT id,lbtyp,lb,ui,pass FROM users where uid=$uid";
	       $queryexe=mysqli_query($conndb,$sql);
	       if(!$queryexe)
	       {
	       	die("fuck of");
	       }
	       while($result=mysqli_fetch_assoc($queryexe))
	       {   

	       	     
	       		  echo"<tr><td>{$result["lbtyp"]}</td><td>{$result["lb"]}</td><td>{$result["ui"]}</td><td>{$result["pass"]} </td></tr>";
	       	
	        $x1= "{$result['lbtyp']}";
	    	if($x1=="E-Banking")
	    	{
	    		$xb++;
	    	}
	    	if($x1=="Booking")
	    	{
	    		$xbk++;
	    	}
	    	if($x1=="E-Shopping")
	    	{
	    		$xs++;
	    	}
	    	if($x1=="Other")
	    		{
	    			$ot++;
	    		}
	       }
	    
	       
	     mysqli_close($conndb);
		}
		
?>
);
});

</table>
</div>

 	<script type="text/javascript">

  window.onload = function ()
   {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "ANALYSYS OF ACCOUT DATA"    
      },
      animationEnabled: true,
      axisY: {
        title: "NUMBER OF ACCOUNT"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "pie",  
        showInLegend:true, 
        legendMarkerColor: "gray",
        legendText: ">",

                dataPoints: [      
                {y:<?php echo $ot;?> , label: "OTHER"},
                {y:<?php echo $xbk;?> ,  label: "BANKING" },
                {y:<?php echo $xs;?> , label: "SHOPPING" },
                {y:<?php echo $xb;?> ,  label: "BOOKING" },
                ]
       }   
      ]
    });

    chart.render();
  }
   
</script>
 
<div id="chartContainer" height="600" width="600">
</div>
</body>
</html>