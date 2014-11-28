<h1><?php echo lang('edit_group_heading');?></h1>			<!-- Display Heading/Titles-->
<p><?php echo lang('edit_group_subheading');?></p>			<!-- Display Heading/Titles-->

<div id="infoMessage"><?php echo $message;?></div>			<!-- Error/message handler-->

<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>			<!-- Save User's input-->
      </p>
      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description);?>	<!-- Save User's input-->
      </p>
      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'));?></p>
															<!-- Submit button and close form-->
<?php echo form_close();?>