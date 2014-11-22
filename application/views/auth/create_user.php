<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo lang('create_user_heading');?></h1>

<p><?php echo lang('create_user_subheading');?></p>


<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <select multiple = "multiple" name = "formColleges[]">
      <p>
      	<?php foreach($myDropdown as $dd)
        echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>
        <input type="submit" name="Submit" value="Submit">
	  </p>
	  </select>
	  <?php if(isset($_POST['formColleges'])){
  			 $aColleges = $_POST['formColleges'];?>
       		 <p>
      		 <?php $college = implode(",", $aColleges);
             echo form_hidden('college', $college);?>
       		 </p><?php
    		 echo("</p>");
	  }?>
      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_EUID_label', 'EUID');?> <br />
            <?php echo form_input($EUID);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
  	  </p>
  	  
  	  <form>
	  <input type="checkbox" name="checked" value="NULL">Apply To Be a Candidate
	  </form>
	  <?php echo form_hidden($checked);?>
<?php echo form_submit('submit', lang('create_user_submit_btn'));
echo form_close();
?>



