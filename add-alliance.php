

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<p>

Member Name:<br />
<textarea name="newPartner" rows="1" cols="8">
</textarea>

</p>

<p>

Address:<br />
<textarea name="partnerAddress1" rows="1" cols="15">
</textarea>

</p>


<p>

Address 2:<br />
<textarea name="partnerAddress2" rows="1" cols="15">
</textarea>

</p>

<p>

City:<br />
<textarea name="partnerCity" rows="1" cols="10">
</textarea>

</p>

<p>

County:<br />
<textarea name="partnerCounty" rows="1" cols="10">
</textarea>

</p>

<p>

Phone:<br />
<textarea name="partnerPhone" rows="1" cols="10">
</textarea>

</p>

<p>
Member Type:<br />
<select id = "memberType" name="memberType" size = "1" >
	<option value = "full">Alliance Member </option>
	<option value = "non">non Alliance Member </option>
	
</select>
</p>


<p>
<input type="submit" name= "addPartner" value="Save">
</p>


</form>

<?php if (isset($_POST['addPartner'])){
	// if (isset($_POST['formType']))
	
	
		include ("/report-controller.php");

	// }
}	
?>

  
  
