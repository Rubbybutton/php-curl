<?php
require '../CurlMulti/Core.php';
$url1 = 'https://gcc.gnu.org';
$url2 = 'http://urlnotexits';
$curl = new CurlMulti_Core ();

$curl->add ( array (
		'url' => $url1,
		'args' => array (
				'title' => 'This is url1' 
		) 
), 'cbProcess', 'cbFail' );

$curl->add ( array (
		'url' => $url2,
		'args' => array (
				'title' => 'This is url2' 
		),
		'opt' => array (
				CURLOPT_TIMEOUT => 1 
		) 
), 'cbProcess', 'cbFail' );

$curl->start ();
function cbProcess($r, $args) {
	echo "success, url=" . $r ['info'] ['url'] . "\n";
	print_r ( array_keys ( $r ) );
	print_r ( $args );
}
function cbFail($r, $args) {
	echo "fail, url=" . $r ['info'] ['url'] . "\n";
	print_r ( $r );
	print_r ( $args );
}