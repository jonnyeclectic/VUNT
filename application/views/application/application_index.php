<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo lang('application_user_heading');?></h1>
<p><?php echo lang('application_user_subheading');?></p>
<?php if(isset($pending_users)):?>
<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('application_user_name_label');?></th>
		<th><?php echo lang('application_user_college_label');?></th>
		<th><?php echo lang('application_user_euid_label');?></th>
		<th><?php echo lang('application_user_action_label');?></th>
	</tr>
	<?php foreach ($pending_users as $row):?>
		<tr>
            <td><?php echo htmlspecialchars($row->first_name.' '.$row->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($row->college,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($row->EUID,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo anchor('application/validation_state/'.$row->id.'/'.'1', 'Validate');?><br>
            <?php echo anchor('application/validation_state/'.$row->id.'/'.'0', 'Deny');?></td>
		</tr>
	<?php endforeach;?>
</table>
<?php endif;?>
<h1><?php echo lang('application_candidate_heading');?></h1>
<p><?php echo lang('application_candidate_subheading');?></p>
<?php if(isset($pending_candidates)):?>
<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('application_candidate_name_label');?></th>
		<th><?php echo lang('application_candidate_college_label');?></th>
		<th><?php echo lang('application_candidate_euid_label');?></th>
		<th><?php echo lang('application_candidate_action_label');?></th>
	</tr>
	<?php foreach ($pending_candidates as $row):?>
		<tr>
            <td><?php echo htmlspecialchars($row->first_name.' '.$row->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($row->college,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($row->EUID,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo anchor('application/candidacy_state/'.$row->id.'/'.'1', 'Approve');?><br>
            	<?php echo anchor('application/candidacy_state/'.$row->id.'/'.'0', 'Deny');?></td>
		</tr>
	<?php endforeach;?>
</table>
<?php endif;?>