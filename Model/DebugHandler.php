<?php

namespace Mastering\SampleModule\Model;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class DebugHandler extends Base
{
    protected $fileName = '/var/log/custom_debug.log';

    protected $loggerType = Logger::DEBUG;
}
