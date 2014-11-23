<h1><?php echo lang('election_create_label');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("election/create_election");?>
      <p>  <!--Name-->
            <?php echo lang('election_name_label', 'name');?> <br />
            <?php echo form_input($name);?>
      </p>
      <p>  <!--Desctipion-->
            <?php echo lang('election_description_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>
      <p>  <!--Start Time-->
            <?php echo lang('election_start_time_label', 'start_time');?> <br />
            <?php echo form_input($start_time);?>
      </p>
      <p>  <!--End Time-->
            <?php echo lang('election_end_time_label', 'end_time');?> <br />
            <?php echo form_input($end_time);?>
      <p>
      <form><select id = "submit" name = "college" onchange="this.form.submit();"><p>
      	<?php foreach($myDropdown as $dd)
        echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>
	  </p><input type="submit" name="submit" value="Create"></select></form>


<?php echo form_close();?>