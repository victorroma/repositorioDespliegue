<?php

class CajaErroneaException extends Exception {

    public function __construct($message, $code = 0, Exception $previous = null0) {
        parent::__construct($message, $code, $previous);
    }

}
