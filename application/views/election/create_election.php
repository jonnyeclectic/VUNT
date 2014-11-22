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
      </p>
      <select>
      <p>
      	<?php foreach($myDropdown as $dd)
        echo "<option value='". $dd->name ."'>". $dd->name ."</option>";?>
	  </p>
	  </select>
	  <?php if(isset($_POST['formColleges'])){
  			 $aColleges = $_POST['formColleges'];?>
       		 <p>
      		 <?php $company2 = implode(",", $aColleges);
             echo lang('create_user_company_label', 'company2');
             echo form_input('company2', $company2);?>
       		 </p><?php
    		 echo("</p>");
	  }?>
	  <p>  <!--College-->
            <?php echo lang('election_college_label', 'college');?> <br />
            <?php echo form_input($college);?>
      </p>
      <p>  <!--Start Time-->
            <?php echo lang('election_start_time_label', 'start_time');?> <br />
            <?php echo form_input($start_time, 'YYYY-MM-DD HH:MM:SS');?>
      </p>
      <p>  <!--End Time-->
            <?php echo lang('election_end_time_label', 'end_time');?> <br />
            <?php echo form_input($end_time);?>
      </p>
      <p>  <!--Status-->
            <?php// echo lang('election_status_label', 'status');?> <br />
            <?php// echo form_input($status);?>
      </p>


      <p><?php echo form_submit('submit', lang('election_create_label'));?></p>

<?php echo form_close();?>