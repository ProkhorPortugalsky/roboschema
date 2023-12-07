<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2020 John Smith. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

 // No direct access to this file
defined('_JEXEC') or die('Restricted Access');

//$db = JFactory::getDbo();
//$db->setQuery("SELECT * FROM #__roboschema WHERE `id`='".$this->getModel()->getItem()->message."';");
//$kits = $db->loadAssocList();
//$kit = $kits[0];
$part=$this->getModel()->getItem()->kit;
?>
<h2><?= $part['name'] ?></h2>
<img src="/images/<?= $part['image'] ?>.png" />
<h3>Тип: <?= $part['gname'] ?></h3>
<h3>Вид: <?= $part['tname'] ?></h3>
<h3>Цвет: <?= $part['cname'] ?></h3>
