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

//retrieve new member info
$role_description =  filter_input(INPUT_GET, 'roleDescription');
$memberFirstName =  filter_input(INPUT_GET, 'memberFirstName');
$memberLastName =  filter_input(INPUT_GET, 'memberLastName');




//insert roles
$queryInsertRoles = 'INSERT INTO roles
(role_description)
VALUES
(:role_description)';
$statement2 = $db->prepare($queryInsertRoles);
$statement2->bindValue(':role_description', $role_description);
$statement2->execute();
$lastRoleID = $db->lastInsertId();  
$statement2->closeCursor();





//insert team_member
$queryInsertTeamMember = 'INSERT INTO team_member
(role_id, member_f_name, member_l_name)
VALUES
(:role_id, :memberFirstName, :memberLastName)';
$statement3 = $db->prepare($queryInsertTeamMember);
$statement3->bindValue(':role_id', $lastRoleID);
$statement3->bindValue(':memberFirstName', $memberFirstName);
$statement3->bindValue(':memberLastName', $memberLastName);
$statement3->execute();
$lastMemberId = $db->lastInsertId();  
$statement3->closeCursor();


//retrieve last skill id
$lastSkillsID = $_SESSION['skills_id'];

//echo $lastSkillsID;


//insert skills_to_members
$queryInsertSkillsTeamMember = 'INSERT INTO skills_to_members
(skills_id, team_member_id)
VALUES
(:skills_id, :team_member_id)';
$statement4 = $db->prepare($queryInsertSkillsTeamMember);
$statement4->bindValue(':skills_id', $lastSkillsID);
$statement4->bindValue(':team_member_id', $lastMemberId);
$statement4->execute();
$statement4->closeCursor();


//echo $lastMemberId;

//echo $lastRoleID;

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
     - Filename: addNewTeamMember.php
     - 
     - add New Team Member with successfull creation alert
     -------------------------------------------------------------------------------------------------------------->
  <title>Add New Team Member</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">  
  <script src="js/bootstrap.bundle.min.js"></script>
</head>