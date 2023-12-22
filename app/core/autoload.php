<?php
    spl_autoload_register(
        function (string $nameClass) {

            $fullPath = str_replace('App\\Core','app', $nameClass);
            $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $fullPath);
            $filePath .= '.php';

            if(file_exists($filePath)){
                require_once($filePath);
            }
        }
    );