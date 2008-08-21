<?php
/*
+---------------------------------------------------------------------------+
| OpenX v${RELEASE_MAJOR_MINOR}                                                                |
| =======${RELEASE_MAJOR_MINOR_DOUBLE_UNDERLINE}                                                                |
|                                                                           |
| Copyright (c) 2003-2008 OpenX Limited                                     |
| For contact details, see: http://www.openx.org/                           |
|                                                                           |
| This program is free software; you can redistribute it and/or modify      |
| it under the terms of the GNU General Public License as published by      |
| the Free Software Foundation; either version 2 of the License, or         |
| (at your option) any later version.                                       |
|                                                                           |
| This program is distributed in the hope that it will be useful,           |
| but WITHOUT ANY WARRANTY; without even the implied warranty of            |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
| GNU General Public License for more details.                              |
|                                                                           |
| You should have received a copy of the GNU General Public License         |
| along with this program; if not, write to the Free Software               |
| Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA |
+---------------------------------------------------------------------------+
/**
 * OpenX Schema Management Utility
 *
 * @author     Monique Szpak <monique.szpak@openx.org>
 *
 * $Id$
 *
 */

require_once 'oxSchema-common.php';

require_once '../../config.php';

require_once MAX_PATH . '/lib/OA/Admin/TemplatePlugin.php';

require_once '../oxToolbox/lib/oxToolbox.inc.php';
if (is_array($aErrs = OX_DevToolbox::checkFilePermissions(MAX_PATH.$GLOBALS['_MAX']['CONF']['pluginPaths']['packages'])))
{
    $errorMessage =
        join("<br />\n", $aErrs['errors']) . "<br /><br ><hr /><br />\n" .
        'To fix, please execute the following commands:' . "<br /><br >\n" .
        join("<br />\n", $aErrs['fixes']);
    die($errorMessage);
}

phpAds_PageHeader("devtools-schema",'','../../');


/*$oTpl = new OA_Plugin_Template('iframe.html','oxSchema');
//$src = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/oxSchema-frame.php';
$src = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/test-ajax.php';
$oTpl->assign('src', $src);
$oTpl->display();*/

//require_once 'test-ajax.php';



$oTpl = new OA_Plugin_Template('oxSchema.html','oxSchema');
require_once 'oxSchema-frame-init.php';
$oSchema->setWorkingFiles();
$oSchema->parseWorkingDefinitionFile();
$oTpl->assign('aSchema', $oSchema->aDB_definition);
//$oTpl->debugging = true;
$oTpl->display();



phpAds_PageFooter();
?>