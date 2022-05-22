<Html><Body> 
<?php

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$con=mysqli_connect("localhost","root","");
		if(!$con)
		{
			die('Could Not Connect:'.mysqli_connect_error());
		}
		mysqli_select_db($con,"Enquiry");
   
   	    $title=$_POST['title'];
    	$subject=$_POST['subject'];
    	$description=$_POST['description'];
    
   	$sql="UPDATE details SET 
	    Title='$title',
    	Subject='$subject',
  	 Description='$description',
    	
	WHERE Title='$title'";

	$result=mysqli_query($con,$sql);

	if($result)
	{
		$msg="Record Updated Successfully...";
?>      <font color="#FF0000"><?php
 		echo $msg;?></font><?php
		echo "<br>";
		echo "<a href='UpdateListenquiry.php'>	View Enquiry </a>";
	}
	else
	{
		echo "Error";
	}
	mysqli_close($con);
 }
?>


 <form name="form" method="post" action="">

<?php
	$con=mysqli_connect("localhost","root","");
	if(!$con)
	{
		die('Could Not Connect:'.mysqli_connect_error());
	}
	mysqli_select_db($con,"Enquiry");

    $title=$_GET['title'];
     $sql="SELECT * FROM details WHERE title='$title'";

    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
   ?>

<table border="1" align="center">
<tr>
<td>Title</td>
<td><input type="text" name="title" value="<?php echo $row['title'];?>"></td>
</tr>

<tr>
<td>Subject</td>
<td><input type="text" name="subject" value="<?php echo $row['Subject'];?>"></td>
</tr>

<tr>
<td>Description</td>
<td><input type="text" name="description" value="<?php echo $row['Description'];?>"></td>
</tr>
</table>
</form>
</body>
</html>
