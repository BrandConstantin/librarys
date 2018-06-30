Type Juggling<br />
<?php $count = "2"; ?>
Type: <?php echo gettype($count); ?><br />
<?php echo $count; ?><br />
<p>-----</p>

<?php $count += 3; ?>
Type: <?php echo gettype($count); ?><br />
<?php echo $count; ?><br />
<p>-----</p>

<?php $cats = "I have " . $count . " cats."; ?>
Cats: <?php echo gettype($cats); ?><br />
<?php echo $count; ?><br />
<br />
<p>-----</p>

Type Casting<br />
<?php settype($count, "integer"); ?>
count: <?php echo gettype($count); ?><br />
<?php echo $count; ?><br />
<p>-----</p>

<?php $count2 = (string) $count; ?>
count: <?php echo gettype($count); ?><br />
count2: <?php echo gettype($count2); ?><br />
<?php echo $count; ?><br />
<br />
<p>-----</p>

<?php $test1 = 3; ?>
<?php $test2 = 3; ?>
<?php settype($test1, "string"); ?>
<?php (string) $test2; ?>
test1: <?php echo gettype($test1); ?><br />
test2: <?php echo gettype($test2); ?><br />