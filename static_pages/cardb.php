<?php	
	require ('libs/rb.php');

    R::setup( 'mysql:host=localhost;dbname=a0646293_carnumbers',
        'a0646293_carnumbers', 'carnumbers9798bot' ); //for both mysql or mariaDB
		
	session_start();	