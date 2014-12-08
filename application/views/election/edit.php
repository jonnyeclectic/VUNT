<h1><?php echo lang('edit_user_heading');?></h1>				<!-- Display Heading/Titles-->
<p><?php echo lang('edit_user_subheading');?></p>				<!-- Display Heading/Titles-->

<div id="infoMessage"><?php echo $message;?></div>				<!-- Error/Message Handler -->

<?php echo form_open("election/edit");?>
<?php echo lang('edit_user_lname_label', 'name');?> <br />
 <?php echo form_input($election_id);?>
      <p>
            <?php echo lang('edit_user_lname_label', 'name');?> <br />
            <?php echo form_input($name);?>				<!-- Save User's input     -->
      </p>

      <p>
            <?php echo lang('edit_user_description_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p>
            <?php echo lang('edit_user_college_confirm_label', 'start_time');?><br />
            <?php echo form_input($start_time);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_college_confirm_label', 'end_time');?><br />
            <?php echo form_input($end_time);?>
      </p>
      
      

	  <br>
  	  <form><select id = "submit" name = "college" onchange="this.form.submit();"><p>
      <?php foreach($myDropdown as $dd)
      echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>
      </br>
      <br></br>
	  </p> <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>
	  
<?php echo form_close();?>													 <!-- Submit button and close form-->
