<?php

if (htmlspecialchars($_POST['mode'])) {
    $mode = htmlspecialchars($_POST['mode']);
} elseif (htmlspecialchars($_GET['mode'])) {
    $mode = htmlspecialchars($_GET['mode']);
} else {
    $mode = 'login';
}

if ($mode != 'raw') {
    $logfile = '/var/log/vpn.log';
} else {
    $logfile = '/var/log/pptps.log';
}

$logtype = 'pptp';

$tab_array = array();
$tab_array[] = array(gettext('PPTP Logins'), $mode != 'raw', '/vpn_pptp_log.php');
$tab_array[] = array(gettext('PPTP Raw'), $mode == 'raw', '/vpn_pptp_log.php?mode=raw');

$service_hook = 'pptpd';

require_once 'vpn_pptp_log.inc';