<?php
	
$server = "localhost";
$username = "root";
$password = "";
$db = "cal_sched_system_database";
	
try{
	$connect = new PDO("mysql:host=$server; dbname=$db","$username", "$password");
	
	//$sql = 'SELECT member_f_name, member_l_name, team_member_id 
	//		FROM team_member 
	//		ORDER BY member_f_name';
	//$stmt = $connect->query($sql);
	
	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $error){
	die("Could not connect to database:".$error->getMessage());
}
?>

<?php
    /***************************************************************************************************************
     * California University Project Scheduling System
     * Group: Procuratio
     * Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     * Date: 2/2/2022
     * 
     * Filename: admin/AddTeamLead.php
     * 
     * View page for the screen to add new team leaders
     **************************************************************************************************************/

    $title = 'Add Project Director';
    include '../view/header_admin.php';

?>


<!DOCTYPE html>
<html>
 <h2>Add New Team Leader</h2>
 <h3>Team Leader</h3>
	<label> Team Leader: 
		<select>
			<option>--- Select Team Lead ---</option>
			<?php 
				$stmt=$connect->prepare("SELECT role_id, member_f_name, member_l_name, team_member_id FROM team_member ORDER BY member_f_name");
				$stmt->execute();
				$teamMemList = $stmt->fetchAll();
				

			
			?>

			<?php foreach($teamMemList as $TMember):?>
				<option value="<?php echo $TMember['team_member_id']?>"><?php echo $TMember['member_f_name']." ".$TMember['member_l_name']?></option>
			<?php endforeach; ?>

		</select>
	</label>
	<button type="submit" id="form-btn" class="btn">Submit</button>

<?php include '../view/footer.php'; ?>