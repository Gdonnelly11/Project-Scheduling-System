<?php
    /***************************************************************************************************************
     * California University Project Scheduling System
     * Group: Procuratio
     * Authors: Dominick Affinito, Breanne Rose, Garrison Donnelly
     * Date: 2/2/2022
     * 
     * Filename: admin/view_dashboard.php
     * 
     * View page for the administrator's dashboard
     **************************************************************************************************************/

    $proj_director = get_count_proj_director();
    $team_leader = get_count_team_leader();
    $team_member = get_count_team_member();

    $title = 'Dashboard';
    include '../view/header_admin.php';

?>

    
            <div class="text-center">
                <h2>Welcome Administrator!</h2>
            </div>

            <div>
                <!--Error Message-->
                <?php if(isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <div class="row mt-5 mb-3">
                    <h4 class="text-center">Check out your account</h4>

                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Project Director</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $proj_director[0];?></p>
                        </div>
                    </div>

                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Team Leader</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $team_leader[0];?></p>
                        </div>
                    </div>


                </div>  
                
                <div class="row mt-5 mb-3">
                    <div class="card col-md-4 mx-auto mb-3 shadow">
                        <div class="card-header">
                            <h4 class="text-center">Team Member</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center"><?php echo $team_member[0];?></p>
                        </div>
                    </div>
                </div>

            </div>
        



<?php include '../view/footer.php'; ?>