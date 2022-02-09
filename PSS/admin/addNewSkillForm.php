<?php
require('../model/database.php');



//Utility Functions
require_once('../util/main.php');
//require_once('/util/validation.php');
//Model Pages
require_once('model/account_db.php');


include '../view/header_admin.php';




//start sesssion
session_start();

//retrieve created  skill
$createdSkill = filter_input(INPUT_GET, 'newSkill');




//insert new skill
$queryInsertSkill = 'INSERT INTO skills
(skill_name)
VALUES
(:skill_name)';
$statement2 = $db->prepare($queryInsertSkill);
$statement2->bindValue(':skill_name', $createdSkill);
$statement2->execute(); 
$lastSkillId = $db->lastInsertId();  
$statement2->closeCursor();

echo $lastSkillId;

//skills query
$querySkills = 'SELECT  skills_id
					FROM skills
                    WHERE :skills_id
					ORDER BY skills_id';
$statement1 = $db -> prepare($querySkills);
$statement1->bindValue(':skills_id', $lastSkillId);
$statement1 -> execute();
$lastSkillsID = $statement1 -> fetchAll();
$statement1-> closeCursor();

//session to store skills id to use to insert when new team meember is added. this allows for skill id to be connected to member.
$_SESSION['skills_id'] = $lastSkillId;


include('addNewTeamMember.php');
?>