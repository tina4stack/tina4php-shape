<?php
require_once "vendor/autoload.php";


echo _shape(_doctype("html"),_html(["lang" => "en"],
    _head(
        _title("Testing")
    ),
    _body(
        _h1("Hello World! H1"),
        _h2("Hello World! H2"),
        _h3("Hello World! H3"),
        _h4("Hello World! H4"),
        _h5("Hello World! H5")
    )
));