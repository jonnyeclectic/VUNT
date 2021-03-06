<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Please login with your email/username and password below.';
$lang['login_identity_label']  = 'Email/Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Remember Me:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Forgot your password?';
$lang['login_logout'] 		   = 'Logout';
$lang['login_logout_subheading'] = 'Logged out successfully';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'Below is a list of the users.';
$lang['index_fname_th']          = 'First Name';
$lang['index_lname_th']          = 'Last Name';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groups';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Active';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_create_user_link']  = 'Create a new user';
$lang['index_create_group_link'] = 'Create a new group';

// Deactivate User
$lang['deactivate_heading']                  = 'Deactivate User';
$lang['deactivate_subheading']               = 'Are you sure you want to deactivate the user \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Submit';
$lang['deactivate_validation_confirm_label'] = 'confirmation';
$lang['deactivate_validation_user_id_label'] = 'user ID';
$lang['deactivate_button']		             = 'Deactivate';

// Create User
$lang['create_user_heading']                           = 'Create User';
$lang['create_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['create_user_fname_label']                       = 'First Name:';
$lang['create_user_lname_label']                       = 'Last Name:';
$lang['create_user_college_label']                     = 'College:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_EUID_label']                        = 'EUID:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Confirm Password:';
$lang['create_user_submit_btn']                        = 'Create User';
$lang['create_user_validation_fname_label']            = 'First Name';
$lang['create_user_validation_lname_label']            = 'Last Name';
$lang['create_user_validation_email_label']            = 'Email Address';
$lang['create_user_validation_EUID1_label']           = 'First Part of EUID';
$lang['create_user_validation_EUID2_label']           = 'Second Part of EUID';
$lang['create_user_validation_EUID3_label']           = 'Third Part of EUID';
$lang['create_user_validation_college_label']          = 'College';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Password Confirmation';

// Edit User
$lang['edit_user_heading']                           = 'Edit User';
$lang['edit_user_subheading']                        = 'Please enter the user\'s information below.';
$lang['edit_user_fname_label']                       = 'First Name:';
$lang['edit_user_lname_label']                       = 'Last Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_EUID_label']                       = 'EUID:';
$lang['edit_user_password_label']                    = 'Password: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'Confirm Password: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'Save User';
$lang['edit_user_validation_fname_label']            = 'First Name';
$lang['edit_user_validation_lname_label']            = 'Last Name';
$lang['edit_user_validation_email_label']            = 'Email Address';
$lang['edit_user_validation_EUID1_label']           = 'First Part of EUID';
$lang['edit_user_validation_EUID2_label']           = 'Second Part of EUID';
$lang['edit_user_validation_EUID3_label']           = 'Third Part of EUID';
$lang['edit_user_validation_groups_label']           = 'Groups';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Password Confirmation';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'Forgot Password';
$lang['forgot_password_subheading']              = 'Please enter your %s so we can send you an email to reset your password.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Submit';
$lang['forgot_password_validation_email_label']  = 'Email Address';
$lang['forgot_password_username_identity_label'] = 'Username';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'No record of that email address.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Home
$lang['home_heading'] = 'VUNT';
$lang['home_subheading'] = 'The Election System for University of North Texas';

// Elections
$lang['election_heading'] 			= 'Elections';
$lang['election_subheading'] 		= 'Below are the current active elections.';
$lang['election_name_label'] 		= 'Name';
$lang['election_description_label'] = 'Description';
$lang['election_college_label'] 	= 'College';
$lang['election_start_time_label'] 	= 'Start Time';
$lang['election_end_time_label'] 	= 'End Time';
$lang['election_status_label'] 		= 'Status';
$lang['election_winner_label'] 		= 'Winner';
$lang['election_action_label']		= 'Action';
$lang['election_create_label']		= 'Create an Election';
$lang['election_create_subheading'] = 'Please enter the election information below.';

// Voting
$lang['voting_heading'] 	 = 'Candidates for ';
$lang['voting_subheading'] 	 = 'Below are the candidates for this election.';
$lang['voting_name_label'] 	 = 'Name';
$lang['voting_votes_label']  = 'Votes';
$lang['voting_action_label'] = 'Action';

//Searching
$lang['search_heading']  = 'Enter Confirmation Number';
$lang['search_user'] = 'Voter';
$lang['search_election']  = 'Election';
$lang['search_candidate'] = 'Candidate';
$lang['search_confirmation'] = 'Confirmation Number';
$lang['search_search'] = 'Search';
$lang['search_results'] = 'Voting Information';

// Applications
$lang['application_user_heading'] 			= 'Applications for Usership';
$lang['application_user_subheading']    	= 'Below are the applications for those wanting to become users.';
$lang['application_user_name_label']    	= 'Name';
$lang['application_user_college_label'] 	= 'College';
$lang['application_user_euid_label'] 		= 'EUID';
$lang['application_user_action_label']  	= 'Action';
$lang['application_candidate_heading'] 	    = 'Applications for Candidacy';
$lang['application_candidate_subheading']   = 'Below are the applications for those wanting to become candidates.';
$lang['application_candidate_name_label']   = 'Name';
$lang['application_candidate_college_label']= 'College';
$lang['application_candidate_euid_label'] 	= 'EUID';
$lang['application_candidate_action_label'] = 'Action';
