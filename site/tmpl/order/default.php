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
<h2>Подробности заказа</h2>
<?php

?>
<h3>Данные покупателя</h3>
<label> Фамилия </label> <h4><?= $kits['name']?></h4>
<label> Имя </label>  <h4><?= $kits['name2']?></h4>
<label> Отчество </label>  <h4><?= $kits['name3']?></h4>
<label> Мобильный номер </label>  <h4><?= $kits['mobile']?></h4>
<h3>Доставка</h3>
<label> Индекс </label> <h4><?= $kits['zip']?></h4>
<label> Город </label> <h4><?= $kits['city']?></h4>
<label> Адрес </label> <h4><?= $kits['address']?></h4>

<h3>Оплата</h3>

	
<?php

?>
<h3>
<a href="/index.php?option=com_roboschema&view=kits&Itemid=107">Продолжить покупки</a><br>
</h3>
<?php

endif;