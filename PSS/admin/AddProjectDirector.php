<?php
    /***************************************************************************************************************
     * California University Project Scheduling System
     * Group: Procuratio
     * Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     * Date: 2/2/2022
     * 
     * Filename: admin/AddProjectDirector.php
     * 
     * View page for the screen to add new project directors
     **************************************************************************************************************/

    $title = 'Add Project Director';
    include '../view/header_admin.php';

?>

<h2>Add New Project Director</h2>
 <h1>Project Director</h1>
 <h2>New Project Director</h2>
	
	<label> Project Director: 
	<form action="../index.php" method="post">
    <fieldset class="form">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" placeholder="First Name">
    </fieldset>

    <fieldset class="form">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" placeholder="Last Name">
    </fieldset>

    <fieldset class="form">
        <label for="username">User Name</label>
        <input type="text" name="username" id="lastname" placeholder="User Name">
    </fieldset>

    <button type="submit" id="form-btn" class="btn">Submit</button>

	</label>
	

</form>

<?php include '../view/footer.php'; ?>