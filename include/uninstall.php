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

function ghost_killDir($chemin) {
	if ($chemin[strlen($chemin)-1] != '/') { $chemin .= '/'; } 
	if (is_dir($chemin)) {
		 $sq = opendir($chemin); 
		 while ($f = readdir($sq)) {
			if ($f != '.' && $f != '..'){
				$fichier = $chemin.$f; 
				if (is_dir($fichier)) {ghost_killDir($fichier);} 
			else {unlink($fichier);}
		}
	}
	closedir($sq);
	rmdir($chemin); 
	}
	else {unlink($chemin); }
}

function xoops_module_uninstall_ghost(&$module) {
	global $xoopsModuleConfig, $xoopsDB, $xoopsModule;
		ghost_killDir(XOOPS_ROOT_PATH . "/uploads/ghost" );
	return true;
}
?>