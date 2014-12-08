<h1>View Candidate</h1>
<?php foreach ($users as $user):?>
Name: <?php echo $user->first_name.' '.$user->last_name;?> <br>
College: <?php echo $user->college;?> <br>
Email: <?php echo $user->email;?> <br>
<?php endforeach; ?>
<p><?php echo anchor('election/vote/'.$election, 'Return to Election');?></p>
