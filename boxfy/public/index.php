<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="main">
    <div class="row">
        <div class="col-md-12">
            <!-- carousel de imágenes -->
            <!--<php $boxfy = '/images/boxfy.png'; ?>--> 
            <img src="images/banner_boxfy.png" width="100%" height="300px" />
        </div>
    </div>
    
    <br/>
    <br/>
    
    <div class="row">
        <div class="col-md-6">
            <a href="<?php echo url_for('/bicycles.php'); ?>">Inicia Sesión</a>
        </div>
        <div class="col-md-6">
            <a href="<?php echo url_for('/bicycles.php'); ?>">Registrate</a>
        </div>
    </div>
</div>

<br/>
<br/>

    <?php include(SHARED_PATH . '/public_footer.php'); ?>

