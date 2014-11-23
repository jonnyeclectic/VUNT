<?php echo anchor('home', '<font face="verdana" size ="50" color="#CCFFCC">VUNT');?></font>
			<td><?php echo lang('home_subheading');?></td>
			<?php if (!$this->ion_auth->logged_in()):?>
			<td><?php echo anchor('auth/login', lang('login_heading'))?></td>
			<?php endif?>
		<?php if($this->ion_auth->logged_in()):?>
			<td><?php echo anchor('auth/logout', lang('login_logout'))?></td>
			<?php endif?>
<table cellpadding=0 cellspacing=10>
	<tr>
		
		<td><?php //echo lang('home_subheading');?>
	</td></tr>
</table></font>