<?php
     
    class Bontact_Widget_Model_Mysql4_Bontact_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
    {
        public function _construct()
        {
            //parent::__construct();
            $this->_init('bontact/bontact');
        }
    }