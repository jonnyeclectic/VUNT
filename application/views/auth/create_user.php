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
      </br>
  	  <form><select id = "submit" name = "college" onchange="this.form.submit();"><p>
      <?php foreach($myDropdown as $dd)
      echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>
	  </p><input type="submit" name="submit" value="Create"></select></form>
<?php //echo form_submit('submit', lang('create_user_submit_btn'));
      /*</br>
      <input type="checkbox" name="checked" value="NULL">Apply To Be a Candidate
	  <?php echo form_hidden($checked);?>
      <p><?php //echo form_submit('submit', lang('edit_user_submit_btn'));?></p>
  	  <form><select multiple = "multiple" name = "college[]" ><p> <!-- Save User's input when things are selected-->
      <?php foreach($myDropdown as $dd)										// --Dropdown menu--
      echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>	 <!-- Display colleges in list-->
	  </p><input type="submit" name="submit" value="Create"></select> <form><!-- Save User's input-->
	  <?php 
if(isset($_POST['college']))
{
  //$aColleges = $_POST['college'];
     $college = implode(',',$_POST['college']);
	 //echo $college;
	echo form_hidden($college);
	//echo $college;//form_hidden($college);
}
*/
echo form_close();?>



