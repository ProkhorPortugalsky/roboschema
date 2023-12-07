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
$kits=$this->getModel()->getItem()->kits;
if(!empty($kits)) :
	foreach($kits as $kit) :
?>
	<a href="/index.php?option=com_roboschema&view=kit&kitId=<?= $kit['id'] ?>" style="text-decoration:none;">
		<div style="clear:both;">
			<h2 class="card-header"><?= $kit['name'] ?></h2>
			<div>
			<img src="/images/<?= $kit['path'] ?>" style="width:20%;float:left; margin: 0 10px 10px 0;">
			<p><?= mb_substr($kit['desc'], 0, 100) ?></p>
			</div>
		</div>
	</a>
<?php
	endforeach;
else :
?>
	<h2>Нет наборов</h2>
<?php
endif;