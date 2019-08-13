<?php
     
    class Bontact_Widget_Model_Bontact extends Mage_Core_Model_Abstract
    {

        protected $_widgetid  = '';
        
        public function _construct()
        {
            parent::_construct();
            $this->_init('bontact/bontact');
        }

        public function getWidgetId()
        {

                $db = Mage::getSingleton('core/resource')->getConnection('core_read');
				$tableName = Mage::getSingleton("core/resource")->getTableName("bontact");
                $result = $db->query("SELECT * FROM ". $tableName ." LIMIT 1");
                if($result) {
        
                   if($row = $result->fetch())
                   {
                      $this->_widgetid =$row["widgetid"]; 
                      return $row["widgetid"];
                   }
                }
                

        }

        
    }