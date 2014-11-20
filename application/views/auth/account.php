<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8'). " " .htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></h1>


<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_groups_th');?></th>
	</tr>
		<tr>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br/>
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('deactivate_button')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Apply to be a Candidate') ;?></td>
		</tr>
</table>