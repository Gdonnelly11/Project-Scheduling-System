<?php

require('../model/database.php');



//Utility Functions
require_once('../util/main.php');
//require_once('/util/validation.php');
//Model Pages
require_once('model/account_db.php');

$title = 'Create New Skill';
include '../view/header_admin.php';
?>

    <!---------------------------------------------------------------------------------------------------------------
     - California University Project Scheduling System
     - Group: Procuratio
     - Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     - Date: 02/02/2022
     - 
     - Filename: createNewSkill.php
     - 
     - Allows user to create and add new skill to list of skills
     -------------------------------------------------------------------------------------------------------------->

  



<div class="titlePage">

            <div class="col-12 my-3">
                <h1 class="text-center">
                    Add New Team Member
                </h1>
            </div>

  

    <div class="container" id="landingBody">

        <div class="row">

            <div class="col-12 my-3">
                <h1 class="text-center">
                    Add New Skill
                </h1>
            </div>

            <div id="subtitle" class="col-md-8 text-center text-md-start">
                <p><h3> Please add your new skill or cancel and return to previous page. </h3></p>
            </div>

           
        </div>
    </div>




    <form action="addNewSkillForm.php" method="get" id = "addNewSkill">

    
    <div class="userInput" id="skillAdd">

        <form id="newSkill">

    
	        <h3>New Skill </h3> 
            <input type="text" name="newSkill" ><br>

        </form>

        
	

    <input type = "submit" value ="Add Skill to List"><br>
     
    
    </form>



        
    <form action="addNewTeamMember.php" method="get" id = "cancel">
	

    <input type = "submit" value ="Cancel"><br>
     
    
    </form>


    <form action="addNewSkillForm.php" method="get" id = "addSkill">




     

</div>


</div>

<?php include '../view/footer.php';