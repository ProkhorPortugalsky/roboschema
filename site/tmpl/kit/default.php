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
$kit=$this->getModel()->getItem()->kit;
$parts=$this->getModel()->getItem()->parts;
?>
<style>
  .kit-container {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f5f5f5;
  }

  .kit-name {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .kit-description {
    font-size: 18px;
    margin-bottom: 20px;
  }

  .kit-price {
    font-size: 36px;
    color: #0099ff;
  }

  .kit-author {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .login-message {
    font-size: 16px;
  }

  .add-to-cart-form {
    margin-top: 20px;
  }

  .add-to-cart-button {
    background-color: #0099ff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 18px;
  }

  .part-table {
    width: 100%;
    border-collapse: collapse;
  }

  .part-table th, .part-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
  }
</style>

<div class="kit-container">
  <h2 class="kit-name"><?= $kit['name'] ?></h2>
  <div>
    <img src="/images/<?= $kit['path'] ?>" style="float:left;width:45%; margin: 0 10px 10px 0;" />
    <p class="kit-description"><?= $kit['desc'] ?></p>
  </div>
  <div style="clear:both;">
    <h1 class="kit-price">Цена <?= $kit['price'] ?> &#8381;</h1>
    <h3 class="kit-author"><?= $kit['aname'] ?></h3>
    <?php if ($user->guest) : ?>
    <h4 class="login-message">Чтобы совершать покупки <a href="/index.php?option=com_users&view=login&Itemid=130">Войдите</a> или <a href="/index.php?option=com_users&view=registration&Itemid=130">Зарегистрируйтесь</a></h4>
    <?php else : ?>
    <form class="add-to-cart-form" action="/index.php?option=com_roboschema&view=addcart">
      <input type="hidden" value="com_roboschema" name="option">
      <input type="hidden" value="addcart" name="view">
      <input type="hidden" value="142" name="Itemid">
      <input type="hidden" value="<?= $this->getModel()->getItem()->id ?>" name="kitid">
      <input class="add-to-cart-button" type="submit" value="Добавить в корзину">
    </form>
    <?php endif; ?>
    <h2>Состав набора</h2>
    <table class="part-table">
      <tr>
        <th></th>
        <th>Деталь</th>
        <th>Тип</th>
        <th>Вид</th>
        <th>Цвет</th>
      </tr>
    <?php foreach ($parts as $part): ?>
      <tr>
        <td><img src="/images/<?= $part['image'] ?>.png"/></td>
        <td><?= $part['name'] ?></td>
        <td><?= $part['gname'] ?></td>
        <td><?= $part['tname'] ?></td>
        <td><?= $part['cname'] ?></td>
      </tr>
    <?php endforeach; ?>
    </table>
  </div>
</div>