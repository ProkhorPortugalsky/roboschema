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
class KitModel extends ItemModel {

    /**
     * Returns a message for display
     * @param integer $pk Primary key of the "message item", currently unused
     * @return object Message object
     */
    public function getItem($pk= null): object {
        // This gives us a Joomla\Input\Input object
        $input = Factory::getApplication()->getInput();
        $kitId = $input->getInt('kitId', 1);
		$db = $this->getDatabase();
		$db->setQuery("SELECT kit.name, kit.desc, kit.price, age.name AS aname, images.path FROM #__roboschema AS kit LEFT JOIN #__roboschema_age AS age ON kit.age=age.id LEFT JOIN #__roboschema_images AS images ON kit.image=images.id  WHERE kit.id='".$kitId."';");
		$kits = $db->loadAssocList();
		$db->setQuery("SELECT kits.id, items.name, groups.name AS gname, types.name AS tname, color.name AS cname, items.image FROM #__roboschema_kits AS kits LEFT JOIN #__roboschema_items AS items ON kits.item_id=items.id LEFT JOIN #__roboschema_item_groups AS groups ON items.item_group=groups.id LEFT JOIN #__roboschema_types AS types ON items.type=types.id LEFT JOIN #__roboschema_color AS color ON items.color=color.id WHERE kits.kit_id='".$kitId."'");
		$parts = $db->loadAssocList();
		if (!empty($kits)) {
			$item = new \stdClass();
			$item->kit = $kits[0];
			$item->parts = $parts;
			$item->id = $kitId;
			return $item;
		}
		else {
			throw new \Exception('Not found', 404);
		}
    }
        
}