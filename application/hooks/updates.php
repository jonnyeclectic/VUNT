<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Hooks {

    public function update_status() {
        $CI =& get_instance();
		$elections = $CI->ion_auth->elections();
		$current_time = strtotime(date('Y-m-d G:i:s'));
		if(isset($elections))
		foreach ($elections as $election)
		{
			if (strtotime($election['start_time']) > $current_time)
				$CI->ion_auth->change_status($election['id'], 'pending');
			else if (strtotime($election['end_time']) >= $current_time)
				$CI->ion_auth->change_status($election['id'], 'active');
			else if (strtotime($election['end_time']) < $current_time)
				$CI->ion_auth->change_status($election['id'], 'inactive');
		}
		$this->pretty();
    }
	
	public function pretty(){
	?><title>VUNT</title>
	<html>
	</body>
	</html>
	
	<bgcolor="yellow">
	<!---<marquee>It's the best website in the world!</marquee>-->
	<body background="http://bestpaperz.com/data_images/out/17/8822358-plain-green-background.jpg">
	<?php 
	}
}