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

$items=$this->getModel()->getItem()->items;
if(!empty($items)) :
	foreach($items as $item) :
?>
	<a href="index.php?option=com_roboschema&view=part&kitId=<?= $item['id'] ?>" style="text-decoration:none;">
		<div>
			<h2 class="card-header"><img src="/images/<?= $item['image'] ?>.png" /><?= $item['name'] ?></h2>

		</div>
	</a>
<?php
	endforeach;
else :
?>
	<h2>Нет деталей</h2>
<?php
endif;