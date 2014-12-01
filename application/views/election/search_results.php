<h1><?php echo lang('search_results');?></h1>
<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('search_user');?></th>
		<th><?php echo lang('search_election');?></th>
		<th><?php echo lang('search_candidate');?></th>
		<th><?php echo lang('search_confirmation');?></th>
		
	</tr>
		<tr>
            <td><?php echo htmlspecialchars($user_id,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($election_id,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($candidate_id,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($confirmation,ENT_QUOTES,'UTF-8');?></td>

            <?php echo anchor('home', 'Return To Home<br>')?>
		</tr>
</table>