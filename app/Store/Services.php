<?php

namespace Store;


class Services
{
    private $errors; //array of errors

    public function setError($error)
    {

            $this->errors = $error;

    }

    public function errors()
    {
        return $this->errors;
    }
}
