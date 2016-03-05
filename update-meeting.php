<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<p>

Description:<br />
<textarea name="meetingDescription" rows="1" cols="15">
</textarea>

</p>

<p>

Date:<br />
<textarea name="meetingDate" rows="1" cols="5">
</textarea>

</p>


<p>

Time:<br />
<textarea name="meetingTime" rows="1" cols="5">
</textarea>

</p>

<p>

Agenda:<br />
<textarea name="meetingAgenda" rows="5" cols="15">
</textarea>

</p>


<p>
<input type="submit" name= "updateMeeting" value="Save">
</p>


</form>

<?php if (isset($_POST['updateMeeting'])){
	// if (isset($_POST['formType']))
	
	
		include ("/meeting-controller.php");

	// }
}	
?>

  
  
