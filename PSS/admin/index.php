<?php

    /***************************************************************************************************************
     * California University Project Scheduling System
     * Group: Procuratio
     * Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     * Date: 2/2/2022
     * 
     * Filename: admin/index.php
     * 
     * Controller for the admin pages
     **************************************************************************************************************/

//Utility Functions
require_once('../util/main.php');
//require_once('/util/validation.php');
//Model Pages
require_once('model/account_db.php');
require_once('model/dashboard_db.php');

$action = filter_input(INPUT_POST, 'action');

if (isset($_SESSION['user'])) {
    if ($action == NULL) {   
        $action = filter_input(INPUT_GET, 'action');  
        if($action == NULL){   
            $action = 'dashboard';
        }
    }
}
else{
    redirect('../account/');
}

//Controller - Default is error page
switch($action) {
    case 'dashboard':
        include 'view_dashboard.php';
        break;

    case 'add_team_member':
        include 'addNewTeamMember.php';
        break;

    case 'add_team_leader':
        include 'AddTeamLead.php';
        break;

    case 'add_project_director':
        include 'AddProjectDirector.php';
        break;

    case 'logout':
        unset($_SESSION['user']);
        unset($_SESSION['fitness_profile']);
        unset($_SESSION['exercises']);
        unset($_SESSION['exercise_list']);
        redirect('..');
        break;

    default:
        display_error("$action is an unrecognized action.");
        break;
}
?>