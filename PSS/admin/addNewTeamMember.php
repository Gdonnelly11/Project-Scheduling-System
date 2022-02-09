<?php

//skills query
$querySkills = 'SELECT  skills_id,
					    skill_name
					FROM skills
					ORDER BY skills_id';
$statement1 = $db -> prepare($querySkills);
$statement1 -> execute();
$skillNames = $statement1 -> fetchAll();
$lastSkillsID = $db->lastInsertId();  
$statement1-> closeCursor();

//store skills in session
$_SESSION['selectableSkills'] = $skillNames;

$title = 'Add Team Member';
include '../view/header_admin.php';

?>
    <!---------------------------------------------------------------------------------------------------------------
     - California University Project Scheduling System
     - Group: Procuratio
     - Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     - Date: 1/31/2022
     - 
     - Filename: addNewTeamMember.php
     - 
     - Required page to add New Team Member
     -------------------------------------------------------------------------------------------------------------->

<div id="masthead" class="container h-25 w-100" >    



<div class="titlePage">

            <div class="col-12 my-3">
                <h1 class="text-center">
                    Add New Team Member
                </h1>
            </div>

  


<form action="newTeamMemberAdded.php" method="get" id = "acceptAdd">


    <div class="userInput" id="dataFill">

        <form id="memberName">

    
	        <h3>Team Member First Name </h3> 
            <input type="text" name="memberFirstName" ><br>
	
	        <h3>Team Member Last Name </h3> 
            <input type="text" name="memberLastName" ><br>



     

    
            <h3>Role Description </h3> 
            <input type="text" name="roleDescription" ><br>



        </form>

    
    


  


    <td><form action="addSkill.php" method="get" id = "memberSkill">
	

    <h3>Skills </h3> 
		
         <select name="skillSelect">
		 
            <?php foreach($skillNames as $id =>$skills) : ?>
               <option value="<?php echo $id; ?>">
                    <?php echo $skills['skill_name']; ?>
                </option>
	

            <?php endforeach; ?>
				  
        

		</select>

    	           
    </td>


    <input type="hidden" name="skillName" value="<?php echo $skills['skill_name'];?>">   
	
	<input type="hidden" name="skillId" value="<?php echo $skills['skills_id']; ?>">



    
    <input type="submit" name = "action" value="Select Skill">
    
    </form>

    
    <form action="createNewSkill.php" method="get" id = "createNewSkill">
	

    <input type = "submit" value ="Create New Skill"><br>
     
    
    </form>



    
    <form action="addNewTeamMember.php" method="get" id = "cancel">
	

    <input type = "submit" value ="Cancel"><br>
     
    
    </form>





    
    <input type="hidden" name="skillName" value="<?php echo $skills['skill_name'];?>">   
	
	<input type="hidden" name="skillId" value="<?php echo $skills['skills_id']; ?>">


   


    <input type = "submit" value ="Add New Team Member"><br>
     
    
</form>
    
</div>


</div>