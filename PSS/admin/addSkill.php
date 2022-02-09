<?php
require('../model/database.php');



//Utility Functions
require_once('../util/main.php');
//require_once('/util/validation.php');
//Model Pages
require_once('model/account_db.php');


include '../view/header_admin.php';



//start session
session_start();



//retrieve selected skills
$selectedSkill = filter_input(INPUT_GET, 'skillName');
$selectedSkillId = filter_input(INPUT_GET, 'skillSelect');

$selectedSkillArray = array($selectedSkill );



$_SESSION['selectableSkills'][$selectedSkillId] = $selectedSkillArray;

var_dump($_SESSION['selectableSkills']);

var_dump($selectedSkillId);


include('addNewTeamMember.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!---------------------------------------------------------------------------------------------------------------
     - California University Project Scheduling System
     - Group: Procuratio
     - Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     - Date: 1/31/2022
     - 
     - Filename: addSkill.php
     - 
     - page that displays selected skills for user
     -------------------------------------------------------------------------------------------------------------->
  <title>Add New Team Member</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">  
  <script src="js/bootstrap.bundle.min.js"></script>
</head>

<div id="masthead" class="container h-25 w-100" >    


	

    <h3>Selected Skills for New Team Member </h3> 


<table>
          <tr>
			
                <th>Skill ID</th>
                <th>Skill Name</th>
			
           
			
        	</tr>
	
	  <?php foreach ($_SESSION['selectableSkills'] as $selectedSkillID => $skillName): ?>

	        <tr> 

                      <td><?php echo $skillName['skills_id']; ?></td><td>  
			          <td><?php echo $skillName['skill_name']; ?></td><td>

				  
	 
        	</tr>
	
		<?php endforeach; ?>


</table>




	<!--
<form action="removeSelectedSkill.php" method="get">
	
	
	
	<select name="skillID">
		
    <?php foreach ($_SESSION['selectableSkills'] as $exercID => $exerciseOps): ?>
             <option value="<?php echo $exercID; ?>">
                    <?php echo $exercID['skills_id']; ?> - <?php echo $exerciseOps['skill_name']; ?>
                </option>
			  
			  	<?php endforeach; ?>
				
				
			
					   
    </select>
		
	<input type="hidden" name="dayOfWeek" value="<?php echo $exerciseOps['dayOfWeek']; ?>">  	
			   
	
	<input type="hidden" name="skillID" value="<?php echo $exercID;?>"> 
	

	<input type="submit" name="action" value="Remove Selected Skill">
	
</form>
    -->

</div>

