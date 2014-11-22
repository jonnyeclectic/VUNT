<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Hooks {

    public function update_status() {
        $CI =& get_instance();
		$elections = $CI->ion_auth->elections();
		$current_time = date('Y-m-d G:i:s');
		foreach ($elections as $election)
		{
			if ($election['start_time'] > $current_time && $election['status'] != 'pending')
				$CI->ion_auth->change_status($election['id'], 'pending');
			else if ($election['end_time'] > $current_time && $election['status'] != 'active')
				$CI->ion_auth->change_status($election['id'], 'active');
			else if ($election['end_time'] < $current_time && $election['status'] != 'inactive')
			{
				$CI->ion_auth->change_status($election['id'], 'inactive');
			}
		}
    }
}