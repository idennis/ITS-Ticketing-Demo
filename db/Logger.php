<?php

/**
 * Created by PhpStorm.
 *
 * Logger - a utility class to handle info/error logging for production and testing
 *
 * User: joshuapancho
 * Date: 16/08/2016
 * Time: 3:11:59PM
 */
class Logger
{
    private $logFile;

    function __construct($logFile) {
        $this->logFile = $logFile;
    }

    /**
     * Logs an error message to the specified log file
     *
     * @param $message String a string containing the message to be logged
     */
    function log_error($message) {
        error_log('['.date("d/m/y H:i:s").'] ERROR '. $message . "\n", 3, $this->logFile);
    }

    /**
     * Logs an info message to the specified log file
     *
     * @param $message String a string containing the message to be logged
     */
    function log_info($message) {
        error_log('['.date("d/m/y H:i:s").'] INFO '. $message . "\n", 3, $this->logFile);
    }
}