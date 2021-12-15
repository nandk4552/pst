<style>
    .card-body {
        display: flex;
        align-items: center;
        justify-content: center;

    }
</style>
<div class="container d-flex align-items-center justify-content-center my-3">
    <div class="row">
        <div class="card col-md-6" style="width: 18rem;">
            <a href="<?php echo SITEURL; ?>driverLogin.php" class="card-body">
                <i class="fas fa-user fa-3x mx-2"></i>
                <h5 class="card-title text-center">Driver Login</h5>
            </a>
        </div>

        <a href="<?php echo SITEURL; ?>parentLogin.php" class="card  col-md-6 " style="width: 18rem;">
            <div class="card-body">
                <i class="fas fa-user-graduate fa-3x mx-2"></i>
                <h5 class="card-title text-center">Parent Login</h5>
            </div>
        </a>
    </div>
</div>