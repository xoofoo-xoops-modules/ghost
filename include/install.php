<?php
/**
 * Ghost module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright	The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license             http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package	Ghost
 * @since		2.3.0
 * @author 	Dugris <http://www.dugris.info>
 * @version	$Id: xoops_version.php 273 2010-05-14 14:40:51Z kris_fr $
**/

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }

function xoops_module_install_ghost(&$module){
	// specific data for language
	global $xoopsDB, $xoopsConfig;
	$f= XOOPS_ROOT_PATH."/modules/ghost/sql/mysql-" . $xoopsConfig['language'] . ".sql";
	$xoopsDB->queryFromFile($f);
	return true;
}

function xoops_module_pre_install_ghost(){
	$index_File = XOOPS_ROOT_PATH . "/modules/ghost/include/index.html";
	$blank_File = XOOPS_ROOT_PATH . "/modules/ghost/images/blank.gif";
	// Create folder ghost in uploads
	$upload_module = XOOPS_ROOT_PATH . "/uploads/ghost" ;
	if (!is_dir( $upload_module )) {
		mkdir($upload_module, 0777);
		chmod($upload_module, 0777);
	}
	copy( $index_File, XOOPS_ROOT_PATH . "/uploads/ghost/index.html");
	copy( $blank_File, XOOPS_ROOT_PATH . "/uploads/ghost/blank.gif");
	return true;
}
?>