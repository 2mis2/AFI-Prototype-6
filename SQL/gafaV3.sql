-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 02:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- ERROR NOTES
-- #1215 cannot add foreign key - means that the declared foreign key is of a different 
-- type to the PK in the other table, look ouf for type,size, unsigned etc


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gafa`
--

-- --------------------------------------------------------

--
-- Table structure for table `programme` and acrionArea
--

CREATE TABLE `member` (
  `memberID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `memberName` varchar(64) NOT NULL,
  `memberAddress1` varchar(128) NOT NULL,
  `memberAddress2` varchar(128) NOT NULL,
  `memberCity` varchar(128) NOT NULL,
  `memberCounty` varchar(128) NOT NULL,
  `memberPhone` varchar(15) NOT NULL,
  `memberType` varchar(3) NOT NULL,
  PRIMARY KEY (`memberID`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `allianceContact` (
  `contactID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contactFName` varchar(64) NOT NULL,
  `contactLName` varchar(64) NOT NULL,
  `contactEmail` varchar(128) NOT NULL,
  `contactMobile` varchar(128) NOT NULL,
  `userType` varchar(6) NOT NULL,
  `memberID` int(15) UNSIGNED NOT NULL,
  CONSTRAINT `memberID` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`),
  PRIMARY KEY (`contactID`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `workGroup` (
  `workGroupID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `WGname` varchar(20) NOT NULL,
  `WGcontact` varchar(32) NOT NULL,
  `WGcontactMobile` varchar(32),
  `WGcontactEmail` varchar(64),
   `WGlocation` varchar(64) NOT NULL,
  PRIMARY KEY (`workGroupID`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `workGroupMember` (
  `WGMworkGroupID` int(15) UNSIGNED NOT NULL,
  `WGMmemberID` int(15) UNSIGNED NOT NULL,
  `memberType` int(2) UNSIGNED NOT NULL,
  CONSTRAINT `WGMmemberID` FOREIGN KEY (`WGMmemberID`) REFERENCES `member` (`memberID`),
  CONSTRAINT `WGMworkGroupID` FOREIGN KEY (`WGMworkGroupID`) REFERENCES `workGroup` (`workGroupID`),
  CONSTRAINT workGroupMemberID PRIMARY KEY (WGMworkGroupID,WGMmemberID)   
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/*CREATE TABLE `nonWorkGroupMember` (
  `nonWGMworkGroupID` int(15) UNSIGNED NOT NULL,
  `nonWGMmemberID` int(15) UNSIGNED NOT NULL,
  CONSTRAINT `nonWGMmemberID` FOREIGN KEY (`nonWGMmemberID`) REFERENCES `nonAllianceMember` (`nonMemberID`),
  CONSTRAINT `nonWGMworkGroupID` FOREIGN KEY (`nonWGMworkGroupID`) REFERENCES `workGroup` (`workGroupID`),
  CONSTRAINT workGroupMemberID PRIMARY KEY (nonWGMworkGroupID,nonWGMmemberID)   
) ENGINE=InnoDB DEFAULT CHARSET=latin1;*/




CREATE TABLE `programme` (
  `programmeID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `whoThemeNumber` int(15) UNSIGNED NOT NULL,
  `whoTheme` varchar(64) NOT NULL,
  `programmeStrategyNumber` int(15) UNSIGNED NOT NULL,
  `programmeStrategy` varchar(128) NOT NULL,
  PRIMARY KEY (`programmeID`)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Intersection entity for programme and actionArea
CREATE TABLE `action` (
  `actionID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `programmeID` int(15) UNSIGNED NOT NULL,
  `actionDescription` varchar(255) NOT NULL,
  `allianceID` int(15) UNSIGNED NOT NULL,
  `workGroupID` int(15) UNSIGNED,
  CONSTRAINT `allianceID` FOREIGN KEY (`allianceID`) REFERENCES `member` (`memberID`),
  CONSTRAINT `workGroupID` FOREIGN KEY (`workGroupID`) REFERENCES `workGroup` (`workGroupID`),
  CONSTRAINT `programmeID` FOREIGN KEY (`programmeID`) REFERENCES `programme` (`programmeID`),
  CONSTRAINT actionID PRIMARY KEY (actionID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*CREATE TABLE `action` (
  `actionID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `actionDescription` varchar(255) NOT NULL,
  `programmeID` int(15) NOT NULL,
  `actionAreaID` int(15) NOT NULL,
  `allianceID` int(15) NOT NULL,
  `workGroupID` int(15),

  PRIMARY KEY (`actionID`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;*/


CREATE TABLE `meeting` (
  `meetingID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meetingDescription` varchar(255) NOT NULL,
  `meetingDate` int(15) NOT NULL,
  `meetingTime` int(15) NOT NULL,
  `meetingAgenda` int(15) NOT NULL,
  PRIMARY KEY (`meetingID`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `report` (
  `reportID` int(15) UNSIGNED NOT NULL,
  `reportHeader` varchar(64) NOT NULL,
  `reportText` varchar(255) NOT NULL,
  `reportBarrier` varchar(255),
  `reportDate` date NOT NULL,
  `reportMeetingID` int(15) UNSIGNED NOT NULL,
  `reportActionID` int(15) UNSIGNED NOT NULL,
  `reportMemberID` int(15) UNSIGNED NOT NULL,
  `reportWorkgroupID` int(15) UNSIGNED,
  `contactFName` varchar(64) NOT NULL,
  `contactLName` varchar(64) NOT NULL,
  `contactEmail` varchar(128) NOT NULL,
  `contactMobile` varchar(128) NOT NULL,
CONSTRAINT `reportMeetingID` FOREIGN KEY (`reportMeetingID`) REFERENCES `meeting` (`meetingID`),
CONSTRAINT `reportMemberID` FOREIGN KEY (`reportMemberID`) REFERENCES `member` (`memberID`),
CONSTRAINT `reportActionID` FOREIGN KEY (`reportActionID`) REFERENCES `action` (`actionID`),
CONSTRAINT `reportWorkgroupID` FOREIGN KEY (`reportWorkgroupID`) REFERENCES `workGroup` (`workGroupID`),
CONSTRAINT reportID PRIMARY KEY (reportID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;










--
-- Dumping data for table `partners`
--

INSERT INTO `member` (`memberID`, `memberName`, `memberAddress1`, `memberAddress2`, `memberCity`, `memberCounty`, `memberType`) VALUES
(1, 'HSE', 'HSE street', 'block Galway', 'Galway', 'Galway', 'full');

INSERT INTO `member` (`memberID`, `memberName`, `memberAddress1`, `memberAddress2`, `memberCity`, `memberCounty`, `memberType`) VALUES
(2, 'Gardai', 'Gardai street', 'block Galway', 'Galway City', 'co.Galway' ,'full');


INSERT INTO `member` (`nonmemberID`, `nonmemberName`, `nonmemberAddress1`, `nonmemberAddress2`, `nonmemberCity`, `nonmemberCounty`,`memberType`) VALUES
(1, 'Workgroup1', ' street 1', 'block Galway', 'Galway', 'Galway','non');

INSERT INTO `member` (`nonmemberID`, `nonmemberName`, `nonmemberAddress1`, `nonmemberAddress2`, `nonmemberCity`, `nonmemberCounty`,`memberType`) VALUES
(2, 'Workgroup2', 'street 2', 'block Galway', 'Galway City', 'co.Galway','non');



-- --------------------------------------------------------

--
-- Table structure for table `reports`
--



--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportID`, `partnerID`, `report`, `reportDate`, `reportOwner`) VALUES
(1, 1, 'Respite Beds', '2016-01-08', 'HSE Administration');

INSERT INTO `reports` (`reportID`, `partnerID`, `report`, `reportDate`, `reportOwner`) VALUES
(2, 1, 'New Footpath', '2016-01-15', 'HSE Administration');

INSERT INTO `reports` (`reportID`, `partnerID`, `report`, `reportDate`, `reportOwner`) VALUES
(3, 1, 'Good Health Plan', '2015-11-17', 'HSE Administration');


INSERT INTO `reports` (`reportID`, `partnerID`, `report`, `reportDate`, `reportOwner`) VALUES
(4, 2, 'More Security', '2015-09-23', 'Sgt. Joe Bloggs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partnerID`),
  ADD KEY `partnerName` (`partnerName`,`partnerContact`,`partnerAddress`,`partnerArea`,`partnerEmail`,`partnerMobile`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `partnerID` (`partnerID`,`report`,`reportDate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partnerID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`partnerID`) REFERENCES `partners` (`partnerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




INSERT INTO `reports` (`partnerID`, `report`, `reportOwner`) VALUES
(2, 'Test Report', 'Test Owner');







INSERT INTO `workGroup` (`WGname`, `WGcontact`, `WGcontactMobile`, `WGcontactEmail`, `WGlocation`) VALUES
('Work Group 1', 'John Doe', '987654', 'john@doe.com', 'Ireland');

INSERT INTO `workGroup` (`WGname`, `WGcontact`, `WGcontactMobile`, `WGcontactEmail`, `WGlocation`) VALUES
('Work Group 2', 'Jane Doe', '987654', 'jane@doe.com', 'galway');

