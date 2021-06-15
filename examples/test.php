<?php
require "../src/essence.php";

echo (new essence("http://meuip.com/"))->header(["User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0"])->cookies()->verifySsl()->proxy("201.49.72.226:8080")->resolve()->ipv4()->emptyEncoding()->get();