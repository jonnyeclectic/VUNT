<div id="infoMessage"><?php echo $message;?></div>
<?php echo form_open("election/search");?>
<table cellpadding=0 cellspacing=10>
	<tr>
      <p><br> 
      	<?php echo lang('search_heading', 'confirmation');?> <br/>
        <?php echo form_input($confirmation);?>
   
      </p> 
   </tr>
      
<?php echo form_submit('submit', lang('search_search'));
echo form_close();?>



