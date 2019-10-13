<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * The mail sending protocol.
 */
$config['protocol'] = 'smtp';

/**
 * SMTP Server Address.
 */
$config['smtp_host'] = 'ssl://smtp.googlemail.com';

/**
 * SMTP Username.
 */
$config['smtp_user']	= 'it@carakafest.org';

/**
 * SMTP Password.
 */
$config['smtp_pass']    = 'itdariGue';

$config['mailtype']		= 'html';

$config['smtp_port']	= '465';

$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['validation'] = TRUE; // bool whether to validate email or not