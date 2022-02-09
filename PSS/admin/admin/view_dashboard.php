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

    $title = 'Dashboard';
    include '../view/header_admin.php';
?>

        <div>
            <div class="text-center">
                <h2>Welcome Administrator!</h2>
            </div>

            <div>
                <!--Error Message-->
                <?php if(isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <div class="row mt-5 mb-3 float-md-start">
                    <h4 class="text-center">Check out your account</h4>
                    <div class="col-md-6">
                        <p>Visit your account page to see if your information is correct.</p>
                        <p>You can view both your account information and your fitness profile.</p>
                        <p>See an issue with your account? Edit it right in the app.</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <a class="btn btn-outline-primary my-3 px-3" href="../account/index.php?action=view_account">View Account</a>
                    </div>
                </div>

                <div class="row mt-5 mb-3 float-md-end">
                    <h4 class="text-center">View Exercises</h4>                    
                    <div class="col-md-6 order-md-2">
                        <p>Check out the list of available exercises.</p>
                        <p>You can also create your own list of exercises. You choose which exercises you do and when.</p>
                    </div>
                    <div class="col-md-6 text-center order-md-1">
                        <a class="btn btn-outline-primary my-3 px-3" href="../exercise/index.php?action=view_exercise_list">View Exercises</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>


<?php include '../view/footer.php'; ?>