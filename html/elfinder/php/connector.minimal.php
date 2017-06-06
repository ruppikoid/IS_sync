<?php
session_start();

include '../../db.php';

$id = $_SESSION["id"];
$query = mysqli_query($link, "SELECT * FROM users WHERE id = '$id'");
$newpath = mysqli_fetch_array($query);
$addpath = $newpath["directory"];


error_reporting(0); // Set E_ALL for debuging

// load composer autoload before load elFinder autoload If you need composer
//require './vendor/autoload.php';

// elFinder autoload
require './autoload.php';
// ===============================================

// Enable FTP connector netmount
//elFinder::$netDrivers['ftp'] = 'FTP';
// ===============================================

/**
 * # Dropbox volume driver need `composer require dropbox-php/dropbox-php:dev-master@dev`
 *  OR "dropbox-php's Dropbox" and "PHP OAuth extension" or "PEAR's HTTP_OAUTH package"
 * * dropbox-php: http://www.dropbox-php.com/
 * * PHP OAuth extension: http://pecl.php.net/package/oauth
 * * PEAR's HTTP_OAUTH package: http://pear.php.net/package/http_oauth
 *  * HTTP_OAUTH package require HTTP_Request2 and Net_URL2
 */
// // Required for Dropbox.com connector support
// // On composer
// elFinder::$netDrivers['dropbox'] = 'Dropbox';
// // OR on pear
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDropbox.class.php';

// // Dropbox driver need next two settings. You can get at https://www.dropbox.com/developers
// define('ELFINDER_DROPBOX_CONSUMERKEY',    '');
// define('ELFINDER_DROPBOX_CONSUMERSECRET', '');
// define('ELFINDER_DROPBOX_META_CACHE_PATH',''); // optional for `options['metaCachePath']`
// ===============================================

// // Required for Google Drive network mount
// // Installation by composer
// // `composer require google/apiclient:^2.0`
// // Enable network mount
// elFinder::$netDrivers['googledrive'] = 'GoogleDrive';
// // GoogleDrive Netmount driver need next two settings. You can get at https://console.developers.google.com
// // AND reuire regist redirect url to "YOUR_CONNECTOR_URL?cmd=netmount&protocol=googledrive&host=1"
// define('ELFINDER_GOOGLEDRIVE_CLIENTID',     '');
// define('ELFINDER_GOOGLEDRIVE_CLIENTSECRET', '');
// ===============================================

// // Required for Google Drive network mount with Flysystem
// // Installation by composer
// // `composer require nao-pon/flysystem-google-drive:~1.1 nao-pon/elfinder-flysystem-driver-ext`
// // Enable network mount
// elFinder::$netDrivers['googledrive'] = 'FlysystemGoogleDriveNetmount';
// // GoogleDrive Netmount driver need next two settings. You can get at https://console.developers.google.com
// // AND reuire regist redirect url to "YOUR_CONNECTOR_URL?cmd=netmount&protocol=googledrive&host=1"
// define('ELFINDER_GOOGLEDRIVE_CLIENTID',     '');
// define('ELFINDER_GOOGLEDRIVE_CLIENTSECRET', '');
// ===============================================

// // Required for One Drive network mount
// //  * cURL PHP extension required
// //  * HTTP server PATH_INFO supports required
// // Enable network mount
// elFinder::$netDrivers['onedrive'] = 'OneDrive';
// // GoogleDrive Netmount driver need next two settings. You can get at https://dev.onedrive.com
// // AND reuire regist redirect url to "YOUR_CONNECTOR_URL/netmount/onedrive/1"
// define('ELFINDER_ONEDRIVE_CLIENTID',     '');
// define('ELFINDER_ONEDRIVE_CLIENTSECRET', '');
// ===============================================

// // Required for Box network mount
// //  * cURL PHP extension required
// // Enable network mount
// elFinder::$netDrivers['box'] = 'Box';
// // Box Netmount driver need next two settings. You can get at https://developer.box.com
// // AND reuire regist redirect url to "YOUR_CONNECTOR_URL"
// define('ELFINDER_BOX_CLIENTID',     '');
// define('ELFINDER_BOX_CLIENTSECRET', '');
// ===============================================

/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/

function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}


// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
$opts = array(

	// 'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/'.$addpath.'/',                 // path to files (REQUIRED)
			'URL'           => '/assets/uploads/', // URL to files (REQUIRED)
			'uploadDeny'    => null,                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                     // disable and hide dot starting files (OPTIONAL)
			'alias' => 'Корень'
		),

		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/1/'.$addpath.'/',                 // path to files (REQUIRED)
			'URL'           => '/assets/uploads/1/', // URL to files (REQUIRED)
			'uploadDeny'    => null,                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                      // disable and hide dot starting files (OPTIONAL)
			'alias' => 'Бухгалтерия'
		),

		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/2/'.$addpath.'/',                 // path to files (REQUIRED)
			'URL'           => '/assets/uploads/2/', // URL to files (REQUIRED)
			'uploadDeny'    => null,                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                      // disable and hide dot starting files (OPTIONAL)
			'alias' => 'ИВЦ'
		),

		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/3/'.$addpath.'/',                 // path to files (REQUIRED)
			'URL'           => '/assets/uploads/3/', // URL to files (REQUIRED)
			'uploadDeny'    => null,                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                      // disable and hide dot starting files (OPTIONAL)
			'alias' => 'Отдел кадров'
		),

		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/4/'.$addpath.'/',                 // path to files (REQUIRED)
			'URL'           => '/assets/uploads/4/', // URL to files (REQUIRED)
			'uploadDeny'    => null,                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                      // disable and hide dot starting files (OPTIONAL)
			'alias' => 'Отдел продаж'
		),

		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/5/'.$addpath.'/',                 // path to files (REQUIRED)
			'URL'           => '/assets/uploads/5/', // URL to files (REQUIRED)
			'uploadDeny'    => null,                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access',                      // disable and hide dot starting files (OPTIONAL)
			'alias' => 'Служба безопасности'
		)

	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();
