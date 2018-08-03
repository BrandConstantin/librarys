<hr/>

<?php if (isset($boxfy)) { ?>
    <?php $image_url = url_for($boxfy); ?>
    <img id="boxfy" src="<?php echo $image_url; ?>" />
    <?php include(SHARED_PATH . '/public_copyright.php'); ?>
<?php } else { ?>
    <?php include(SHARED_PATH . '/public_copyright.php'); ?>
<?php } ?>

</div> <!-- div container -->

<?php db_disconnect($database); ?>
</body>
</html>