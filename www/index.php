<?php

define('RENDERPAGE_DEBUG', false);

require '../libs/RenderPage.php';

$app = new \renderpage\libs\RenderPage;

// renderpage.ru
if ($app->request->gTLD === 'ru') {
    $app->language->setCurrentLanguage('ru-ru');
}

$app->route();
$app->execute();
$app->output();
