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
class PartsModel extends ItemModel {

    /**
     * Returns a message for display
     * @param integer $pk Primary key of the "message item", currently unused
     * @return object Message object
     */
    public function getItem($pk= null): object {
        // This gives us a Joomla\Input\Input object
        $db = $this->getDatabase();
		$db->setQuery("SELECT items.id, items.name, groups.name AS gname, types.name AS tname, color.name AS cname, items.image FROM #__roboschema_items AS items LEFT JOIN #__roboschema_item_groups AS groups ON items.item_group=groups.id LEFT JOIN #__roboschema_types AS types ON items.type=types.id LEFT JOIN #__roboschema_color AS color ON items.color=color.id;");
		$items = $db->loadAssocList();
		$item = new \stdClass();
		$item->items = $items;
		return $item;
    }
        
}