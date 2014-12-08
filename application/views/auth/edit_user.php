<h1><?php echo lang('edit_user_heading');?></h1>				<!-- Display Heading/Titles-->
<p><?php echo lang('edit_user_subheading');?></p>				<!-- Display Heading/Titles-->

<div id="infoMessage"><?php echo $message;?></div>				<!-- Error/Message Handler -->

<?php echo form_open(uri_string());?>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>				<!-- Save User's input     -->
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>				<!-- Save User's input     -->
      </p>

      <p>
            <?php echo lang('edit_user_EUID_label', 'EUID');?> <br />
            <?php echo form_input($EUID);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('election_id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php //echo form_submit('submit', lang('edit_user_submit_btn'));?></p>
  	  <form><select id = "submit" name = "college" onchange="this.form.submit();"><p> <!-- Save User's input when things are selected-->
      <?php foreach($myDropdown as $dd)										// --Dropdown menu--
      echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>	 <!-- Display colleges in list-->
	  </p><input type="submit" name="submit" value="Create"></select></form> <!-- Save User's input-->
<?php echo form_close();?>													 <!-- Submit button and close form-->
