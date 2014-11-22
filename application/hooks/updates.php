<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// This hook both makes the HTML for all pages look better than the default
// white-on-black, whilst also playing an important role in the system by
// constantly updating the status of each election based on start and 
// end time. It should be noted that a one number representation of total
// time is used throughout the comparisons here.
class Settings extends CI_Hooks {

    public function update_status() {
        $CI =& get_instance();
		$elections = $CI->ion_auth->elections();
		$current_time = strtotime(date('Y-m-d G:i:s'));
		if(isset($elections))
		foreach ($elections as $election)
		{
			// If we are before starting time the election is pending.
			if (strtotime($election['start_time']) > $current_time)
				$CI->ion_auth->change_status($election['id'], 'pending');
			// If we are before ending time but not pending the election 
			// is active.
			else if (strtotime($election['end_time']) >= $current_time)
				$CI->ion_auth->change_status($election['id'], 'active');
			// If we are after end time, the election is inactive.
			else if (strtotime($election['end_time']) < $current_time)
				$CI->ion_auth->change_status($election['id'], 'inactive');
		}
		// Applies HTML
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