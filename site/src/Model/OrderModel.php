<?php

namespace Proxor\Component\RoboSchema\Site\Model;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\ItemModel;
use Joomla\CMS\Language\Text;

/**
 * @package     Joomla.Site
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2020 John Smith. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

/**
 * Hello World Message Model
 * @since 0.0.5
 */
class OrderModel extends ItemModel {

    /**
     * Returns a message for display
     * @param integer $pk Primary key of the "message item", currently unused
     * @return object Message object
     */
    public function getItem($pk= null): object {
        // This gives us a Joomla\Input\Input object
		$user = Factory::getUser();
		$input = Factory::getApplication()->getInput();
		$oid = $input->getInt('id', 1);
        $db = $this->getDatabase();
		$db->setQuery("SELECT orders.id, orders.date, orders.sum, udata.name, udata.name2, udata.name3, udata.mobile, ddata.region, ddata.service, ddata.zip, ddata.city, ddata.address, pdata.type FROM #__roboschema_orders AS orders LEFT JOIN #__roboschema_user_data AS udata ON orders.user_data=udata.id JOIN #__roboschema_user_delivery AS ddata ON orders.user_delivery=ddata.id JOIN #__roboschema_user_payments AS pdata ON orders.user_payment=pdata.id WHERE orders.id=".$oid.";");
		$kits = $db->loadAssocList();
		$item = new \stdClass();
		$item->kits = $kits[0];
		return $item;
    }
        
}