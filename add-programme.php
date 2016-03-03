<?php


set_include_path ("./classes" );
spl_autoload_register ();

 
 ?>

 
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<p>

WHO Theme(no spaces, unique name):<br />
<textarea name="WHOtheme" rows="1" cols="20">
</textarea>

</p>

<p>

WHO Theme Number:<br />
<p>
<select id = "themeNumber" name="themeNumber" size = "1" >
	<option value = "1">1</option>
	<option value = "2">2</option>
	<option value = "3">3</option>
	<option value = "4">4</option>
	<option value = "5">5</option>
	<option value = "6">6</option>
	<option value = "7">7</option>
	<option value = "8">8</option>
	<option value = "9">9</option>
	<option value = "10">10</option>
	
</select>
</p>

</p>

<p>

Strategy:<br />
<textarea name="strategy" rows="1" cols="20">
</textarea>

</p>

<p>

Strategy Number:<br />
<select id = "strategyNumber" name="strategyNumber" size = "1" >
	<option value = "1">1</option>
	<option value = "2">2</option>
	<option value = "3">3</option>
	<option value = "4">4</option>
	<option value = "5">5</option>
	<option value = "6">6</option>
	<option value = "7">7</option>
	<option value = "8">8</option>
	<option value = "9">9</option>
	<option value = "10">10</option>
	
</select>

</p>


<p>
<input type="submit" name= "addProgramme" value="Save Programme">
</p>


</form>

<?php if (isset($_POST['addProgramme'])){
	// if (isset($_POST['formType']))
	
	
		include ("/report-controller.php");

	// }
}	
?>

  
  
