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
?>
<?php if ($user->guest) : ?>
<h2>Доступ запрещен</h2>
<?php else : ?>
<?php
$input = Factory::getApplication()->getInput();
$kitId = $input->getInt('kitid', 1);
$db = JFactory::getDbo();
$db->setQuery("INSERT INTO `#__roboschema_carts`(`id`, `user_id`, `kit_id`, `checkout`) VALUES (NULL,".$user->id.",".$kitId.",0)");
$db->execute();
?>
<h2>Товар успешно добавлен в корзину</h2>
<h3>
<a href="/index.php?option=com_roboschema&view=kits&Itemid=107">Продолжить покупки</a><br>
<a href="/index.php?option=com_roboschema&view=cart&Itemid=142">Посмотреть корзину</a><br>
<a href="/index.php?option=com_roboschema&view=checkout&Itemid=142">Оформить заказ</a><br>
</h3>
<?php endif; ?>