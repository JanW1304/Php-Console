<?php

/*
 *  This file is part of SplashSync Project.
 *
 *  Copyright (C) 2015-2019 Splash Sync  <www.splashsync.com>
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Splash\Console\Command;

use Splash\Console\Helper\Table;
use Splash\Console\Models\AbstractListingCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * List Available Objects on Splash Client
 */
class ObjectsListCommand extends AbstractListingCommand
{
    /**
     * Configure Symfony Command
     */
    protected function configure()
    {
        $this
            ->setName('objects:list')
            ->setDescription('Splash: List Data for a Given Object Type')
        ;

        parent::configure();
    }

    /**
     * Execute Symfony Command
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //====================================================================//
        // Init & Splash Screen
        $this->init($input, $output);
        $this->renderTitle("Read Objects List");

        //====================================================================//
        // Read Objects Listed & Readable Fields
        $fields = $this->getFields(true, true, false);

        //====================================================================//
        // Read & Render Objects List
        $table = new Table($output);
        $table->renderObjectsList($fields, $this->getObjects());

        //====================================================================//
        // Render Splash Logs
        $this->renderLogs();
    }
}
