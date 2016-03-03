<?php

include_once("/templates/header.html");
 
 ?>
 
 <div class="container">

<nav>
    <ul class="tabs">

<!-- display navigation tabs -->
    
    <li><a href="#tab1">Home</a></li>
    <li><a href="#tab2">View Report</a></li>
    <li><a href="#tab3">Submit Report</a></li>
    <li><a href="#tab4">Add Alliance Member</a></li>
    <li><a href="#tab5">Add Alliance Contact</a></li>
    <li><a href="#tab6">Create Workgroup</a></li>
    <li><a href="#tab7">Add Programme</a></li>
    <li><a href="#tab8">Add Action Area</a></li>
    <li><a href="#tab9">Add Action</a></li>
    <li><a href="#tab10">Add Meeting</a></li>
    <li><a href="#tab11">Add Minutes</a></li>
    

   
   
   </ul>
</nav>


<section id="content">
    <p>
    
    
   <!-- Add content for each tab below 
   each of the php file create (a view of ..see MVC) the content for each tab -->
   
 
    <div id="tabs" class="tab_container">
    
    <div id="tab1" class="tab_content">
      <h2>Welcome to the AFI Reporting Tool</h2>
     <p> please select an option from the tabs</p> 
    </div>
    
    <div id="tab2" class="tab_content">
      <h2>View Report</h2>
      <p> <?php // Include_once("report-request.php") ?></p> <!-- call report request file -->
    </div>
    
    <div id="tab3" class="tab_content">
      <h2>Submit a Report</h2>
      <p> <?php // Include_once("write-report.php")  ?> </p>
    </div>
    
    <div id="tab4" class="tab_content">
      <h2>Add an Alliance Member</h2>
      <p> <?php Include_once("add-alliance.php")  ?></p>
    </div>
    
    <div id="tab5" class="tab_content">
      <h2>Add a Contact</h2>
      <p> <?php Include_once("add-alliancecontact.php")  ?></p>
    </div>
    
   <div id="tab6" class="tab_content">
      <h2>Create Workgroup</h2>
      <p> <?php Include_once("add-workgroup.php")  ?></p>
    </div>
     
    
    <div id="tab7" class="tab_content">
      <h2>Add Programme</h2>
      <p> <?php Include_once("add-programme.php")  ?></p>
    </div>
    
    
    <div id="tab8" class="tab_content">
      <h2>Add Action Area</h2>
      <p> <?php Include_once("add-actionarea.php")  ?></p>
    </div>
    
    
    <div id="tab9" class="tab_content">
      <h2>Add Action</h2>
      <p> <?php Include_once("add-action.php")  ?></p>
    </div>
    
    <div id="tab10" class="tab_content">
      <h2>Add Meeting</h2>
      <p> <?php Include_once("add-meeting.php")  ?></p>
    </div>
    
    <div id="tab11" class="tab_content">
      <h2>Add Minutes</h2>
      <p> <?php Include_once("add-minutes.php")  ?></p>
    </div>
    
  </div>

   
    
    <!-- <input type="button" id="btnExport" value=" Export Table to Excel " /> -->
    
    </p>
    
  </div>  

 </section>

  
  
<?php

include_once("/templates/footer.html");
 
 ?>

