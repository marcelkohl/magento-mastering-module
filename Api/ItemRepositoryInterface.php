<?php

namespace Mastering\SampleModule\Api;

use Mastering\SampleModule\Api\Data\ItemInterface;

interface ItemRepositoryInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getList();
}
