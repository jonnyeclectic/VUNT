<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("election/create_group");?>

      <p>
            <?php echo lang('election_college_label', 'group_name');?> <br />
            <?php echo form_input($election);?>
      </p>

      <p>
            <?php echo lang('election_name_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', lang('election_create_label'));?></p>

<?php echo form_close();?>