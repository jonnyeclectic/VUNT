<div id="infoMessage"><?php echo $message;?></div>
<h1><?php echo lang('voting_heading').' '.$election_name;?></h1>
<p><?php echo lang('voting_subheading');?></p>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('voting_name_label');?></th>
		<th><?php echo lang('voting_action_label');?></th>
	</tr>
	<?php for ($i = 0; isset($candidates[$i]); $i++):?>
		<tr>
            <td><?php echo htmlspecialchars($candidates[$i]['first_name'].' '.$candidates[$i]['last_name'],ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo anchor('auth/', 'Vote');?></td>
		</tr>
	<?php endfor;?>
</table>