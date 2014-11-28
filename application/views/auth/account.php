<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8'). " " .htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></h1>


<table cellpadding=0 cellspacing=10>								<!-- Formatting -->
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

			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit');?></td>
			<td><?php if (!$is_pending && !$is_candidate): ?>
				<?php echo anchor("election/apply/".$user->id, 'Apply to be a Candidate') ;?>
			<?php endif; ?></td>

			<td><?php echo anchor("election", 'View Elections') ;?></td>
			<?php if ($is_admin):?>												<!-- These are buttons for the administrator-->
				<td><?php echo anchor("application", 'Applications') ;?></td>
			<?php endif;?>
		</tr>
</table>