<?php
define('RENDERPAGE_DEBUG', true);

require '../libs/RenderPage.php';

$app = new \renderpage\libs\RenderPage;

$app->route();
$app->execute();
$app->output();
