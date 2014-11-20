<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo lang('election_heading');?></h1>
<p><?php echo lang('election_subheading');?></p>



<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('election_name_label');?></th>
		<th><?php echo lang('election_description_label');?></th>
		<th><?php echo lang('election_college_label');?></th>
		<th><?php echo lang('election_start_time_label');?></th>
		<th><?php echo lang('election_end_time_label');?></th>
		<th><?php echo lang('election_status_label');?></th>
	</tr>
	<?php for ($i = 0; isset($elections[$i]); $i++):?>
		<tr>
            <td><?php echo htmlspecialchars($elections[$i]['name'],ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($elections[$i]['description'],ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($elections[$i]['college'],ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($elections[$i]['start_time'],ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($elections[$i]['end_time'],ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($elections[$i]['status'],ENT_QUOTES,'UTF-8');?></td>
		</tr>
	<?php endfor;?>
</table>