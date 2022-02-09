<?php

require('../model/database.php');

//start session
session_start();

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






?>

	