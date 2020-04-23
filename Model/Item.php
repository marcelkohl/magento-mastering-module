<?php

namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected $_eventPrefix = 'mastering_sample_item';

    protected function _construct() //note: this _construct is particular from the abstractModel, NOT __construct
    {
        $this->_init(\Mastering\SampleModule\Model\ResourceModel\Item::class);
    }
}
