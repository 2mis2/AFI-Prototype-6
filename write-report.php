
 

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<p>

Partner:<br />

<!-- Build select options from database -->

<?php

$db = mysqli_connect('localhost','root','','Gafa');

if (!$db){
	
	print "Database not connected";
	
	}

$sql_statement  = "SELECT partnerName ";
$sql_statement .= "FROM partners ";
$sql_statement .= "ORDER BY partnerName ";

$result = mysqli_query($db, $sql_statement);

$outputDisplay = "";
$myrowcount = 0;

if (!$result) {
	$outputDisplay .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
	$outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
	$outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
} else {

	$outputDisplay  = "<select name=\"partner\" size=\"1\">";

	$numresults = mysqli_num_rows($result);

	for ($i = 0; $i < $numresults; $i++)
	{
		$row = mysqli_fetch_array($result);

		$name  = $row['partnerName'];

		$outputDisplay .= "<option value='".$name."'>".$name."</option>";
	}

	$outputDisplay .= "</select>";
	print $outputDisplay;
}
?>



</p>
<p>
Report Comments:<br />
<textarea name="reportText" rows="5" cols="50">
</textarea>
</p>



<p>
<input type="submit" name ="submitReport" value="Submit Report">
</p>


</form>

<?php if (isset($_POST['submitReport'])){
	// if (isset($_POST['formType']))
	
	
		include ("/report-controller.php");

	// }
}	
?>
 

