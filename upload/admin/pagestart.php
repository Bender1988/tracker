<?php

define('BB_ROOT', './../');
define('IN_FORUM', true);
define('IN_ADMIN', true);

require(BB_ROOT .'common.php');
require(BB_ROOT .'attach_mod/attachment_mod.php');
require(BB_ROOT .'attach_mod/includes/functions_admin.php');
require_once(INC_DIR .'functions_admin.php');

$user->session_start();

if (IS_GUEST)
{
	redirect(LOGIN_URL . "?redirect=admin/index.php");
}

if (!IS_ADMIN)
{
	bb_die($lang['NOT_ADMIN']);
}

if (!$userdata['session_admin'])
{
	$redirect = url_arg($_SERVER['REQUEST_URI'], 'admin', 1);
	redirect("login.php?redirect=$redirect");
}