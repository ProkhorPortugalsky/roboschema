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
class OrdersModel extends ItemModel {

    /**
     * Returns a message for display
     * @param integer $pk Primary key of the "message item", currently unused
     * @return object Message object
     */
    public function getItem($pk= null): object {
        // This gives us a Joomla\Input\Input object
		$user = Factory::getUser();
        $db = $this->getDatabase();
		$db->setQuery("SELECT orders.id, orders.date, orders.sum FROM #__roboschema_orders AS orders LEFT JOIN #__roboschema_user_data AS udata ON orders.user_data=udata.id WHERE udata.user_id=".$user->id.";");
		$kits = $db->loadAssocList();
		$item = new \stdClass();
		$item->kits = $kits;
		return $item;
    }
        
}