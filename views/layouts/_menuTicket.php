<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [
	['label' => \Yii::t('ticket', 'Ticket'), 'url' => '#', 'items' => [
			['label' => \Yii::t('ticket', 'All'), 'url' => ['/ticket/ticket/index']],
			['label' => \Yii::t('ticket','CSR'), 'url' => ['/ticket/csr/index']],
			['label' => \Yii::t('ticket','RMA'), 'url' => ['/ticket/rma/index']]
		]
	],
	['label' => 'User', 'url' => '#', 'items' => [
		['label' => 'Admin', 'url' => ['/user/admin'], 'title' => 'Administrator panel'],
		['label' => 'Register', 'url' => ['/user/registration/register'], 'title' => 'Register a new user'],
		['label' => 'Resend', 'url' => ['/user/registration/resend'], 'title' => 'Resend confirmation token'],
		['label' => 'Confirm', 'url' => ['/user/registration/confirm'],'title' =>  'Confirm a user (needs id and token query params)'],
		['label' => 'Login', 'url' => ['/user/auth/login'], 'title' => 'Displays login form'],
		['label' => 'Logout', 'url' => ['/user/auth/logout'], 'title' => 'Logs the user out (POST only)'],
		['label' => 'Recovery','url' =>  ['/user/recovery/request'],'title' =>  'Request new recovery token'],
		['label' => 'Reset', 'url' => ['/user/recovery/reset'], 'title' => 'Reset password (needs id and token query params)'],
]]
];