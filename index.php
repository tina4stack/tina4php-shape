<?php
require_once "vendor/autoload.php";


echo _html(
    _head(
        _title("Testing")
    ),
    _body(
        _h1("Hello World!"),
        _h2("Hello World!"),
        _h3("Hello World!")
    )
);