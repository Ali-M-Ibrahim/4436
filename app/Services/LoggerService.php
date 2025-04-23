<?php

namespace App\Services;

class LoggerService{
    public function log($message){
        logger($message);
    }

}
