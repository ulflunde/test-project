<?php
class SETTING
{
	global enable_voucher;
    
	function init_setting()
    {
		$this->enable_voucher = 0;
    }
}

global $mail_setting;

$mail_setting = new SETTING();
$mail_setting->init_setting();
?>