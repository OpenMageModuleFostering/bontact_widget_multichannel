<?php

class Bontact_Widget_Block_Status extends Mage_Core_Block_Template
{


    protected function _toHtml()
    {
 
        $model = Mage::getModel('bontact/bontact');

        $this->setWidgetId($model->getWidgetId());
        return parent::_toHtml();
    }






}