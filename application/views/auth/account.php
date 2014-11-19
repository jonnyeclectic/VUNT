<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8'). " " .htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></h1>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
	</tr>

		<tr>
			<td>
					<?php echo anchor("auth/edit_user/".$user->id, htmlspecialchars($groups->name,ENT_QUOTES,'UTF-8')) ;?><br />
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Apply to be a Candidate') ;?></td>
		</tr>

</table>