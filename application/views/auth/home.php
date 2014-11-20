
<table cellpadding=0 cellspacing=10>
	<tr>
		<th><h1><?php echo anchor('home', lang('home_heading'));?></h1></th>
		
		<?php if (!$this->ion_auth->logged_in()):?>
			<td><?php echo anchor('auth/login', lang('login_heading'))?></td>
			<?php endif?>
		<?php if($this->ion_auth->logged_in()):?>
			<td><?php echo anchor('auth/logout', lang('login_logout')).' '.anchor('election', lang('election_heading'))?></td>
			<?php endif?>
		<td><?php echo lang('home_subheading');?></td>
	</tr>
</table>