<?php

declare(strict_types=1);

/**
 * Entry point for the application.
 *
 * This file includes the Composer autoloader and calls the main application function.
 */

// The autoloader handles loading all functions and classes.
require_once __DIR__ . '/vendor/autoload.php';

// The app\main function is loaded via the "files" directive in composer.json.
// It handles the command-line logic.
app\main($argc, $argv);