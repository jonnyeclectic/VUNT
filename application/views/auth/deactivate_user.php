<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>	<!-- Display Heading/Title-->

<?php echo form_open("auth/deactivate/".$user->id);?>							<!-- Open form for logged in user-->

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>					<!-- Display button information  -->
    <input type="radio" name="confirm" value="yes" checked="checked" />			<!-- Interactive checkbox buttons-->
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>												<!-- Save User's input in invisible textbox -->
  <?php echo form_hidden(array('id'=>$user->id)); ?>							<!-- Save User's input in invisible textbox -->

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>		<!-- Submit form and save User's information-->

<?php echo form_close();?>