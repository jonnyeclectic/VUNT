<font face="verdana" size ="50" color="rgb(255,255,255)">

	
		<?php echo anchor('home', lang('home_heading'));?>
<table cellpadding=0 cellspacing=10>
	<tr><td>
		<?php if (!$this->ion_auth->logged_in()):?>
			<?php echo anchor('auth/login', lang('login_heading'))?>
			<?php endif?>
		<?php if($this->ion_auth->logged_in()):?>
			<?php echo anchor('auth/logout', lang('login_logout'))?>
			<?php endif?>
		<?php echo lang('home_subheading');?>
	</td></tr>
</table></font>