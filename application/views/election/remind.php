<div id="infoMessage"><?php echo $message;?></div>
<?php echo 'Thank you for using VUNT!<br>'?>
<?php foreach ($emails as $email): ?>
	<?php echo $email.'<br>'; ?>
<?php endforeach; ?>
<?php echo anchor('home', 'Return to Home<br>')?>