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
class KitsModel extends ItemModel {

    /**
     * Returns a message for display
     * @param integer $pk Primary key of the "message item", currently unused
     * @return object Message object
     */
    public function getItem($pk= null): object {
        // This gives us a Joomla\Input\Input object
        $db = $this->getDatabase();
		$db->setQuery("SELECT kit.id, kit.name, kit.desc, kit.price, age.name AS aname, images.path FROM #__roboschema AS kit LEFT JOIN #__roboschema_age AS age ON kit.age=age.id LEFT JOIN #__roboschema_images AS images ON kit.image=images.id ;");
		$kits = $db->loadAssocList();
		$item = new \stdClass();
		$item->kits = $kits;
		return $item;
    }
        
}