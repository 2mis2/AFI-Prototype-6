<?php
include_once("classDbConnection.php");

class classMeeting
{
	
	public function addMeeting($meetingDescription,$meetingDate,$meetingTime,$meetingAgenda){
		
		// build sql statements
		$statement = "insert into meeting (meetingDescription, meetingDate, meetingTime, meetingAgenda) ";
		$statement .= "values (";
		$statement .= "'".$meetingDescription."', '".$meetingDate."', '".$meetingTime."', '".$meetingAgenda."'";
		$statement .= ")";
				
		// set up Database connection
		$db = new Db();

		// submit query
		$result = $db -> query($statement);

		return $result 
		}
			
	
	} // end of list agents function	
	
	
	public function updateMeeting($meetingDescription,$meetingDate,$meetingTime,$meetingAgenda){
		
		// build sql statements
		$statement = "UPDATE meeting SET(meetingDescription, meetingDate, meetingTime, meetingAgenda) ";
		$statement .= "VALUES (";
		$statement .= "'".$meetingDescription."', '".$meetingDate."', '".$meetingTime."', '".$meetingAgenda."'";
		$statement .= ")";
		$statement .= "WHERE id = ($meetingID)";
				
		// set up Database connection
		$db = new Db();

		// submit query
		$result = $db -> query($statement);

		return $result;
		
			
	
	} // end of list agents function	
	
	
	
	
	
	
	
	
}