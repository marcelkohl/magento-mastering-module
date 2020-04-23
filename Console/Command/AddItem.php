<?php

namespace Mastering\SampleModule\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mastering\SampleModule\Model\ItemFactory;
use Magento\Framework\Console\Cli;
use Magento\Framework\Event\ManagerInterface;
use \Psr\Log\LoggerInterface;

class AddItem extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_DESCRIPTION = 'description';

    private $itemFactory;
    private $eventManager;

    //public function __construct(ItemFactory $itemFactory, ManagerInterface $eventManager)
    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
//        $this->eventManager = $eventManager;
        parent::__construct();
    }

    /*private $logger;

    public function __construct(ItemFactory $itemFactory, LoggerInterface $logger)
    {
        $this->itemFactory = $itemFactory;
        $this->logger = $logger;
        parent::__construct();
    }*/

    protected function configure()
    {
        $this->setName('mastering:item:add')
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Item name'
            )->addArgument(
                self::INPUT_KEY_DESCRIPTION,
                InputArgument::OPTIONAL,
                'Item description'
            );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $item->setIsObjectNew(true);
        $item->save();
        //$this->logger->debug('Item was created');
        //$this->eventManager->dispatch('mastering_command', ['object' => $item]); //event
        return Cli::RETURN_SUCCESS;
    }
}
