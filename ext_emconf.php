<?php
	$EM_CONF[$_EXTKEY] = array(
		'title' => 'tt_address Phone Link',
		'description' => 'Generiert Links für tt_address Telefon Nummer // Original code von http://p.cweiske.de/45 Christian Weiske <cweiske@cweiske.de>',
		'category' => 'fe',
		'author' => 'Christian Hackl',
		'author_email' => 'web@hauer-heinrich.de',
		'state' => 'beta',
		'author_company' => 'Werbeagentur Hauer-Heinrich',
		'version' => '0.1.0',
		'constraints' => array(
			'depends' => array(
				'typo3' => '7.6.4-8.9.99',
				'tt_address' => '3.0.0-3.9.9',
			),
			'conflicts' => array(
			),
			'suggests' => array(
			),
		),
	);

?>
