<?php


namespace South\SystemConfigAdvanced\Block;

class Demo extends \Magento\Framework\View\Element\Template
{

    protected $serialize;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Serialize\Serializer\Json $serialize,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->serialize = $serialize;
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Demo Page Title'));
        return parent::_prepareLayout();
    }

    public function getDemoField(){
        $certificates = [];

        try {

            $config = $this->_scopeConfig->getValue(
                'south_extension_setting/general/demo_field',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );

            $i = 0;
            foreach ($this->serialize->unserialize($config) as $item) {
                $certificates[$i]['name'] = $item['name'];
                $certificates[$i]['qty'] = $item['qty'];
                $i++;
            }

        } catch (\Exception $e) {

        }

        return $certificates;
    }
}

