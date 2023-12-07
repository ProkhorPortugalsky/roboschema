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
use Joomla\CMS\Factory;
$user = Factory::getUser();
if ($user->guest) :
?><h2>Доступ запрещен</h2><?
else :
$kits=$this->getModel()->getItem()->kits;
?>
<h2>Ваши заказы</h2>
<?php
if(!empty($kits)) :
	foreach($kits as $kit) :
?>
	<table width="100%>
		<tr>
			<th width="20%">Номер заказа</th>
			<th width="30%">Дата</th>
			<th width="30%">Сумма</th>
			<th width="20%"></th>
		</tr>
		<tr>
			<td><?= $kit['id'] ?></td>
			<td><?= $kit['date'] ?></td>
			<td><?= $kit['sum'] ?></td>
			<td><a href="/index.php?option=com_roboschema&view=order&id=<?= $kit['id'] ?>&Itemid=107">Подробнее</a></td>
		</tr>
	</table>
	
<?php
	endforeach;
?>
<h3>
<a href="/index.php?option=com_roboschema&view=kits&Itemid=107">Продолжить покупки</a><br>
</h3>
<?php
else :
?>
	<h2>Нет заказов</h2>
<h3>
<a href="/index.php?option=com_roboschema&view=kits&Itemid=107">Продолжить покупки</a><br>
</h3>
<?php
endif;

endif;