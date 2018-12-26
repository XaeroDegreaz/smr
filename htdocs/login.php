<?php

try {
	
	require_once('config.inc');
	require_once(LIB . 'Default/smr.inc');
	
	// ********************************
	// *
	// * S e s s i o n
	// *
	// ********************************
	
	
	if (SmrSession::$account_id > 0) {
		// creates a new user account object
		$account = SmrAccount::getAccount(SmrSession::$account_id);
	
		// update last login column
		$account->updateLastLogin();

		$href = SmrSession::getNewHREF(create_container('login_check_processing.php'), true);
		SmrSession::update();
	
		header('Location: '.$href);
		exit;
	}
	
	if(isset($_REQUEST['msg']))
		$template->assign('Message',htmlentities(trim($_REQUEST['msg']),ENT_COMPAT,'utf-8'));

	require_once(ENGINE . 'Default/login.inc');

}
catch(Throwable $e) {
	handleException($e);
}
