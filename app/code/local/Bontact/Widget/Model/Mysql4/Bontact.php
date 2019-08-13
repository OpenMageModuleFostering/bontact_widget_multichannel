    <?php
     
    class Bontact_Widget_Model_Mysql4_Bontact extends Mage_Core_Model_Mysql4_Abstract
    {
        public function _construct()
        {   
            $this->_init('bontact/bontact', 'clickdesk_id');
        }
    }