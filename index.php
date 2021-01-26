<?php

require_once 'libs/StrSearch.php';


$str =  new StrSearch('hash', 'file.txt','f38e0576ec3e7c8ab28507b0f304a642');

//$str =  new StrSearch('hash', 'priroda-gora.jpg','f38e0576ec3e7c8ab28507b0f304a642');

$str->find();
