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

use Splash\Client\Splash;
use Splash\Console\Helper\Graphics;
use Splash\Console\Models\AbstractCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Test Ping of Splash Server
 */
class PingCommand extends AbstractCommand
{
    /**
     * @var string
     */
    protected $title = "Test Ping of Splash Server";

    /**
     * Configure Symfony Command
     */
    protected function configure()
    {
        $this
            ->setName('ping')
            ->setDescription('Splash: Perform Ping Test to Splash Server')
        ;
    }

    /**
     * Execute Symfony Command
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->init($input, $output);
        //====================================================================//
        // Splash Screen
        $this->renderTitle();
        //====================================================================//
        // Notice internal routines we are in server request mode
        define("SPLASH_SERVER_MODE", true);
        //====================================================================//
        // Execute Splash Self-Tests
        $selfTests = Splash::selfTest();
        //====================================================================//
        // Execute Splash Server Ping
        $ping = $selfTests ? Splash::ping() : false;
        //====================================================================//
        // Render Splash Logs
        $this->renderLogs();
        //====================================================================//
        // Render Result Icon
        Graphics::renderResult($output, $ping, "Ping of Splash Server");
    }
}
