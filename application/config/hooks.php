<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
// This is the hook that updates the election status between
// "pending", "active", and "inactive", based on the start and end times.
// The full function is in the hooks folder.
$hook['post_controller_constructor'] = array(
                                'class'    => 'settings',
                                'function' => 'update_status',
                                'filename' => 'updates.php',
                                'filepath' => 'hooks'
                                );

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */