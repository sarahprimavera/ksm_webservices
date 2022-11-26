<?php

    class Request{

        public String $method;
        public array $urlparams;
        public array $header;
        public array $payload;

        function __construct($method, $urlparams, $header, $payload)
        {
            $this->method = $method;
            $this->urlparams = $urlparams;
            $this->header = $header;
            $this->payload = $payload;
        }

    }


?>