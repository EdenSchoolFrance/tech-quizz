<?php

$_SESSION['result'] = array_merge($_SESSION['result'], [$_GET['index'] => $_GET['result']]);

var_dump($_SESSION['result']);