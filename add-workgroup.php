<?php


set_include_path ("./classes" );
spl_autoload_register ();

 
 ?>

 
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<p>

Workgroup Name(no spaces, unique name):<br />
<textarea name="newWG" rows="1" cols="8">
</textarea>

</p>

<p>

Contact Name:<br />
<textarea name="WGcontact" rows="1" cols="20">
</textarea>

</p>

<p>

Email:<br />
<textarea name="WGcontactEmail" rows="1" cols="10">
</textarea>

</p>

<p>

Mobile:<br />
<textarea name="WGcontactMobile" rows="1" cols="20">
</textarea>

</p>

<p>

Location:<br />
<textarea name="WGlocation" rows="1" cols="10">
</textarea>

</p>

<p>

Please Select all Work Group Members:<br />

 
<?php

// create new class to read list of agents from DB
	$alliance = new classAlliance();
	$checkBoxList = $alliance->getCheckBoxlist();
	
	print $checkBoxList; // output list of agents for selection in dropdown
	

?>
</p>


<p>
<input type="submit" name= "addWorkgroup" value="Save Workgroup">
</p>


</form>

<?php if (isset($_POST['addWorkgroup'])){
	// if (isset($_POST['formType']))
	
	
		include ("/report-controller.php");

	// }
}	
?>

  
  
