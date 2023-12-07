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
//$db->setQuery("SELECT * FROM #__roboschema WHERE id='".$this->getModel()->getItem()->message."';");
//$kits = $db->loadAssocList();
//$kit = $kits[0];
$kits=$this->getModel()->getItem()->kits;
?>
<style>
  .kit-container {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f5f5f5;
  }

  .card-header {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .card-image {
    width: 10%;
    float: left;
    margin: 0 10px 10px 0;
  }

  .card-description {
    font-size: 16px;
  }

  .total-price {
    font-size: 24px;
  }

  .checkout-buttons {
    margin-top: 20px;
  }

  .checkout-link {
    margin-right: 10px;
  }

  .empty-cart {
    font-size: 24px;
  }
</style>

<h2>Ваши товары</h2>
<?php
$sum = 0;
if(!empty($kits)) :
  foreach($kits as $kit) :
    $sum = $sum + $kit['price'];
?>

    <div class="kit-container">
      <h2 class="card-header"><?= $kit['name'] ?></h2>
      <div>
        <img src="/images/<?= $kit['path'] ?>" class="card-image">
        <p class="card-description"><?= mb_substr($kit['desc'], 0, 100) ?></p>
      </div>
    </div>

<?php
  endforeach;
?>
<h1 class="total-price">Всего на сумму <?= $sum ?> &#8381;</h1>
<div class="checkout-buttons">
  <h3>
    <a href="/index.php?option=com_roboschema&view=kits&Itemid=107" class="checkout-link">Продолжить покупки</a>
    <a href="/index.php?option=com_roboschema&view=checkout&Itemid=142" class="checkout-link">Оформить заказ</a>
  </h3>
</div>
<?php
else :
?>
  <h2 class="empty-cart">Корзина пуста</h2>
<div class="checkout-buttons">
  <h3>
    <a href="/index.php?option=com_roboschema&view=kits&Itemid=107" class="checkout-link">Продолжить покупки</a>
  </h3>
</div>
<?php
endif;
?>