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

namespace Splash\Console\Helper;

use Splash\Components\Logger;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Splash Console Graphical Outputs
 *
 * @author SplashSync <contact@splashsync.com>
 */
class Graphics
{
    const   SPLIT = "   ----------------------------------------------------------------";

    /**
     * Display SPLASH SCREEN
     */
    public static function renderSplashScreen(OutputInterface $output)
    {
        $logo = array(
            "    ______     ______   __         ______     ______     __  __    ",
            "   /\\  ___\\   /\\  == \\ /\\ \\       /\\  __ \\   /\\  ___\\   /\\ \\_\\ \\   ",
            "   \\ \\___  \\  \\ \\  _-/ \\ \\ \\____  \\ \\  __ \\  \\ \\___  \\  \\ \\  __ \\  ",
            "    \\/\\_____\\  \\ \\_\\    \\ \\_____\\  \\ \\_\\ \\_\\  \\/\\_____\\  \\ \\_\\ \\_\\ ",
            "     \\/_____/   \\/_/     \\/_____/   \\/_/\\/_/   \\/_____/   \\/_/\\/_/ ",
            "                                                                "
        );

        if ($output->isVerbose()) {
            $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_MSG));
            foreach ($logo as $line) {
                $output->write(Logger::getConsoleLine("", $line, Logger::CMD_COLOR_WAR));
            }
        }
    }

    /**
     * Display Action title
     */
    public static function renderTitle(OutputInterface $output, string $text)
    {
        $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_MSG));
        $output->write(Logger::getConsoleLine("", "   ".$text, Logger::CMD_COLOR_DEB));
        $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_MSG));
        $output->write(PHP_EOL);
    }

    /**
     * Display Action title
     */
    public static function renderResult(OutputInterface $output, bool $result, string $text)
    {
        $result
            ? self::renderOkResult($output, $text)
            : self::renderKoResult($output, $text);
    }

    /**
     * Display Action Success Result
     */
    private static function renderOkResult(OutputInterface $output, string $text)
    {
        $logo = array(
            "       \\ \\ / / ",
            "        \\ V /  Passed: ".$text,
            "         \\_/   ",
        );

        $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_MSG));
        foreach ($logo as $line) {
            $output->write(Logger::getConsoleLine("", $line, Logger::CMD_COLOR_MSG));
        }
        $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_MSG));
        $output->write(PHP_EOL);
    }

    /**
     * Display Action Fail Result
     */
    private static function renderKoResult(OutputInterface $output, string $text)
    {
        $logo = array(
            "       \\ \\/ / ",
            "        >  <  Fail: ".$text,
            "       /_/\\_\\ ",
        );

        $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_ERR));
        foreach ($logo as $line) {
            $output->write(Logger::getConsoleLine("", $line, Logger::CMD_COLOR_ERR));
        }
        $output->write(Logger::getConsoleLine("", self::SPLIT, Logger::CMD_COLOR_ERR));
        $output->write(PHP_EOL);
    }
}
