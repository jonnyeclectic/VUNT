<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo lang('voting_heading').' '.$election_name;?></h1>
<p><?php echo lang('voting_subheading');?></p>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('voting_name_label');?></th>
		<th><?php echo lang('voting_votes_label');?></th>
		<th><?php echo lang('voting_action_label');?></th>
	</tr>
	<?php foreach ($candidates as $candidate):?>
		<tr>
            <td><?php echo anchor('auth/view_user/'.$candidate['candidate_id'].'/'.$election_id, htmlspecialchars($candidate['first_name'].' '.$candidate['last_name'],ENT_QUOTES,'UTF-8'));?></td>
            <td><?php echo htmlspecialchars($candidate['num_votes']);?></td>
            <?php if (!isset($voted)): ?>
           		<td><?php echo anchor('election/vote_for/'.$election_id.'/'.$candidate['candidate_id'], 'Vote');?></td>
           	<?php endif; ?>
           	<?php if ($voted === $candidate['candidate_id']): ?>
           		<td><?php echo anchor('election/unvote_for/'.$election_id.'/'.$candidate['candidate_id'], 'Unvote');?></td>
           	<?php endif; ?>
		</tr>
	<?php endforeach;?>
</table>