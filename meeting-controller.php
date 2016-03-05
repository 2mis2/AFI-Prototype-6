
<?php

set_include_path ("./classes" );
spl_autoload_register ();





if(!empty($_POST['viewMeeting'])) {
	
	// get the data from the HTTP post
	$meetingDescription = $_POST['formType'];
	$meetingDate = $_POST['date'];
	$meetingTime = $_post['time'];
	$meetingAgenda = $_POST['agenda'];

	// create new meeting object and view meeting
	$meeting = new classMeeting();
	
	// this function will return a fully formatted table so results can be printed directly
	$outputResults = $meeting->viewMeeting($meetingDescription,$meetingDate,$meetingTime,$meetingAgenda);
	
	print $outputResults;

	

}
	?>
  
   
<hr size="4" style="background-color: #F5DEB3; color: #F5DEB3;">


     <div id="printTable">
<?php

if (!empty($_POST['viewMeeting'])){
	
	// display the table
//	$outputDisplay .= "<br /><br /><b>Number of Rows in Results: $myrowcount </b><br /><br />";
	print $outputDisplay;
}
	
?>
	 
	</div>

<!-- *********************************** -->
<!-- * Submit Meeting section from here ** -->
<!-- *********************************** -->

<?php



if(!empty($_POST['submitMeeting'])) {


	// fetch data from form
	$meetingDescription = $_POST['formType'];
	$meetingDate = $_POST['date'];
	$meetingTime = $_post['time'];
	$meetingAgenda = $_POST['agenda'];
	
	// get meetingID ???
	//$Agents = new classAgents();
	//$result = $Agents->getAgentID($agentName);
	

	if (!$result) {
		
		$outputDisplay = "Sorry there was an error submitting the meeting(meetingID error ??). Please copy the information below to your administrator ";
		$outputDisplay .= "You didnt do anything wrong. This is a program or DB error";
		$outputDisplay .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
		$outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
		$outputDisplay .= "<br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</p>";
	
		print $outputDisplay;

	} else {

		$row = mysqli_fetch_array($result);
	
		$agentID = $row['meetingID'];
	
	} // end if for checking results

	//$reportOwner = $agentName;
	
	// create new meeting object to insert new meeting
	$report = new classReports();
	$result = $report->addReport($agentID,$reportText,$reportOwner);


	if (!$result) {
		$outputDisplay = "Sorry there was an error submitting the report. Please copy the information below to your administrator ";
		$outputDisplay .= "You didnt do anything wrong. This is a database insert error";
		$outputDisplay .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
		$outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
		$outputDisplay .= "<br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</p>";
	
		print $outputDisplay;

	} else {

		Print " Successful Report Submission";
	
	} // end of check for report submission

} // end of if for Report writing section 

?>


<!-- *********************************-->
<!-- * Add Meeting section  *-->
<!-- *********************************-->

<?php


if(!empty($_POST['addMeeting'])) {


// fetch data from Form
$newMeeting = $_POST['newMeeting'];
$meetingDescription = $_POST['meetingDescription'];
$meetingDate = $_POST['meetingDate'];
$meetingTime = $_POST['meetingTime']
$meetingAgenda = $_POST['meetingAgenda']



$Meeting = new classMeeting();
$result = $Meeting->addMeeting($newMeeting,$meetingDescription,$meetingDate,$meetingTime,$meetingAgenda);

$outputDisplay = "";

if (!$result) {
	$outputDisplay = "Error adding Meeting";
	print $outputDisplay;

} else {

Print " New Meeting Created: ";
Print $newMeeting;
	
}

} // end of add Meeting if statement
?>



<!-- *********************************-->
<!-- * Update Meeting *-->
<!-- *********************************-->

<?php


if(!empty($_POST['updateMeeting'])) {


	// fetch data from form
	$meetingDescription = $_POST['formType'];
	$meetingDate = $_POST['date'];
	$meetingTime = $_post['time'];
	$meetingAgenda = $_POST['agenda'];
	
	// get the meetingID using ???
	$Meeting = new classMeeting();
	$memberNumber = $alliance->getAllianceID($memberName);

	$contact = new classContact();
	$result = $contact->addContact($contactFName,$contactLName,$contactEmail,$contactMobile,$userType,$memberNumber);

	$outputDisplay = "";

	if (!$result) {
		$outputDisplay .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
		$outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
		$outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
		$outputDisplay .= "<br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</p>";	
		print $outputDisplay;

	} else {

	Print " New Contact Created for ".$memberName."<br>";
	Print $contactFName." ".$contactLName;
	
	} // end of result check

} // end of add Alliance Contact if statement
?>






<!-- *********************************-->
<!-- * Add workgroup section goes here *-->
<!-- *********************************-->

<?php


if(!empty($_POST['addWorkgroup'])) {

	$outputDisplay = ""; // declare output to user variable

	// fetch data from form
	$newWorkgroup = $_POST['newWG'];
	$WGcontact = $_POST['WGcontact'];
	$WGcontactEmail = $_POST['WGcontactEmail'];
	$WGlocation = $_POST['WGlocation'];
	$WGcontactMobile = $_POST['WGcontactMobile'];

	print_r($_POST['allianceList']);

	$WG = new classWorkgroup(); // create new classworkGroup object
	
	$result = $WG->checkNotUniqueName($newWorkgroup);// check if workgroup name is unique
	
	if (!$result){ // new wg name is unique
	
		// add the work group
		$result = $WG->addWorkgroup($newWorkgroup,$WGcontact,$WGcontactEmail,$WGlocation,$WGcontactMobile);

	
		if (!$result){
		
			print " Error Inserting workgroup into DB";	
		}
	
	
		// code must go here to check for existance of allinaceList
	
		foreach($_POST['allianceList'] as $allianceChecked){
		
			$result = $WG->addWorkGroupMember($newWorkgroup,$allianceChecked);
		
			if (!$result){
					
			$outputDisplay .= "Error with Work Group ".$newWorkgroup." addition of ".$allianceChecked.".";
		} else {
			
				$outputDisplay = $allianceChecked." added.<br> ";
				print $outputDisplay;
		} // end of if

	} // end of for each

	
	/* // add non-Alliance members to workgroup

	$memberType = "2"; // set member type to non alliance
	
	foreach($_POST['nonAllianceList'] as $nonAllianceChecked){
	
		$result = $WG->addWorkGroupMember($newWorkgroup,$nonAllianceChecked,$memberType);
		
			if (!$result){

				$outputDisplay .= "Error with workgroup ".$newWorkgroup." addition of ".$nonAllianceChecked.".";
			} else {
			
				$outputDisplay = $nonAllianceChecked." added. <br>";
				print $outputDisplay;
			}

	} */

	$outputDisplay = "<br>Result for Work Group ".$newWorkgroup.".";
	
	print $outputDisplay;
	
	} else {  // else for unique wg name
	
	$outputDisplay = "<br>Work group name already used. You must choose a unique work group name ";
	print $outputDisplay;
	
	}
	
} // end of add Work Group if statement

?>



<!-- *********************************-->
<!-- * Add Alliance or non alliance section  *-->
<!-- *********************************-->

<?php


if(!empty($_POST['addMeeting'])) {


	// fetch data from Form
	$meetingDescription = $_POST['meetingDescription'];
	$meetingDate = $_POST['meetingDate'];
	$meetingTime = $_POST['meetingTime'];
	$meetingAgenda = $_POST['meetingAgenda'];


	$meeting = new classMeeting();
	$result = $meeting->addMeeting($meetingDescription,$meetingDate,$meetingTime,$meetingAgenda);

	$outputDisplay = "";

	if (!$result) {
		$outputDisplay = "Error adding Meeting";
		print $outputDisplay;

	} else {

	Print " New Meeting Created:<br> ";
	Print $meetingDescription;
		
	}

} // end of add Meeting if statement

?>


<?php 	//  *************************************************************
	//  ***  Handle AJAX updateMeeting request               *********
	// *************************************************************



//if(!empty($_POST['ajaxUpdateType'])) {

	//$reportOwner = $_POST['partnerName'];
	//$reportText = $_POST['reportText'];
	//$reportID = $_POST['reportID'];
	
	//$report = new classReports();
	//$result = $report->updateReport($reportID,$reportText,$reportOwner);	

		
		//if (!$result) {  // output db error
					//$outputDisplay ="There was an error updated the report. You did nothing wrong. Please copy the following to your administrator. ";
					//$outputDisplay .= "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
					//$outputDisplay .= "MySQL Error: ".mysqli_error($db)."<br>";
					//$outputDisplay .= "<br>SQL: ".$sql_statement."<br>";
					//$outputDisplay .= "<br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</p>";
				
				//	print $outputDisplay;

					//} else { // output selected rows
					
					//print "The report was updated successfully. Thank you";
					
					}

 
// echo "Im uddating the report in PHP file, report: " . $reportID. "  ". $reportText;

//echo($reportText);
// echo($partnerName); 


	
	
	
} // end of if for ajax requests
?>

