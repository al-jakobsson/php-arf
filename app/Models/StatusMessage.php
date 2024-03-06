<?php

namespace Models;

class StatusMessage
{
    public function __construct(
        public bool $success,
        public string $message
    ){}

}