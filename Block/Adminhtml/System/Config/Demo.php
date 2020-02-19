<?php

namespace South\SystemConfigAdvanced\Block\Adminhtml\System\Config;

class Demo extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{

    protected function _prepareToRender()
    {
        $this->addColumn('name', ['label' => __('Voucher'), 'renderer' => false]);
        $this->addColumn('qty', ['label' => __('Qty'), 'renderer' => false]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add More Voucher');
    }

}
