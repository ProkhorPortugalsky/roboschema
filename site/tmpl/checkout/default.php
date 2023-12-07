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
<style>
  .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #337ab7;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
  }

  .card {
    background-color: #f5f5f5;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
  }

  .card-header {
    background-color: #337ab7;
    color: #fff;
    padding: 10px;
    border-radius: 4px 4px 0 0;
  }

  .form-group {
    margin-bottom: 10px;
  }

  .form-control {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
  }

  h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
  }

  h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
  }

  h4 {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
  }
</style>
<?php if ($user->guest) : ?>
<h2>Доступ запрещен</h2>
<?php else : ?>
<?php
$kits=$this->getModel()->getItem()->kits;
?>
<?php if (isset($_POST['name'])) : ?>
	<?php
	$sum = 0;
	if(!empty($kits)) :
		foreach($kits as $kit) :
			$sum = $sum + $kit['price'];
		endforeach;
		$db = JFactory::getDbo();
		$db->setQuery("INSERT INTO `#__roboschema_user_data`(`id`, `user_id`, `name`, `name2`, `name3`, `mobile`) VALUES (NULL,".$user->id.",'".$_POST['name']."','".$_POST['name2']."','".$_POST['name3']."','".$_POST['mobile']."');");
		$db->execute();
		$user_data_id=$db->insertid();
		$db->setQuery("INSERT INTO `#__roboschema_user_delivery`(`id`, `user_id`, `region`, `service`, `zip`, `city`, `address`) VALUES (NULL,".$user->id.",'".$_POST['region']."','".$_POST['service']."','".$_POST['zip']."','".$_POST['city']."','".$_POST['address']."');");
		$db->execute();
		$user_delivery_id=$db->insertid();
		$db->setQuery("INSERT INTO `#__roboschema_user_payments`(`id`, `type`, `card`, `expried`, `cvc`, `paid`) VALUES (NULL,'".$_POST['type']."','".$_POST['card']."','".$_POST['expried']."','".$_POST['cvc']."', 0);");
		$db->execute();
		$user_payment_id=$db->insertid();
		$db->setQuery("INSERT INTO `#__roboschema_orders`(`id`, `date`, `user_data`, `user_delivery`, `user_payment`, `sum`) VALUES (NULL, NOW(),'".$user_data_id."','".$user_delivery_id."','".$user_payment_id."','".$sum."');");
		$db->execute();
		$order_id=$db->insertid();
		foreach($kits as $kit) :
			$db->setQuery("INSERT INTO `#__roboschema_order_kits`(`id`, `order_id`, `kit_id`) VALUES (NULL,".$order_id.",'".$kit['kid']."');");
			$db->execute();
			$db->setQuery("DELETE FROM `#__roboschema_carts` WHERE id=".$kit['id'].";");
			$db->execute();
		endforeach;
		?>
		<h2>Заказ оформлен</h2>
		<a href="/index.php?option=com_roboschema&view=kits&Itemid=107">Продолжить покупки</a><br>
		<a href="/index.php?option=com_roboschema&view=orders&Itemid=107">К списку заказов</a><br>
		<?php		
	else :
		?><h2>No kits</h2><?php
	endif;
	?>
<?php else : ?>
	<h2>Оформление заказа</h2>
	<?php
	$sum = 0;
	if(!empty($kits)) :
		foreach($kits as $kit) :
			$sum = $sum + $kit['price'];
	?>
				<h4 class="card-header"><?= $kit['name'] ?></h4>

			
		<?php
			endforeach;
		?>
		<h2>Всего на сумму <?= $sum ?> &#8381;</h2>
		<form method="post">
		<h3>Данные покупателя</h3>
		<label> Фамилия </label> <input type="text" required name="name">
		<label> Имя </label> <input type="text" required name="name2">
		<label> Отчество </label> <input type="text" required name="name3">
		<label> Мобильный номер </label> <input type="text" required name="mobile">
		<h3>Доставка</h3>
		<label> Регион </label> <select required name="region"><option value="1">1</option></select>
		<label> Служба доставки </label> <select required name="service"><option value="1">1</option></select>
		<label> Индекс </label> <input type="number" required name="zip">
		<label> Город </label> <input type="text" required name="city">
		<label> Адрес </label> <input type="text" required name="address">
		<h3>Оплата</h3>
		<label> Способ оплаты </label> <select required name="type"><option value="1">1</option></select>
		<label> Номер карты </label> <input type="number" required name="card">
		<label> Expried </label> <input type="number" required name="expried">
		<label> CVC </label> <input type="number" required name="cvc">
		
		<input type="submit" value="Оформить">
		</form>
		<?php
		else :
		?>
			<h2>Нет товаров</h2>
		<?php
		endif;

	endif;

endif;