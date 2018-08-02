<?php

define('RENDERPAGE_DEBUG', true);

require __DIR__ . '/../libs/require.php';

$app = new \renderpage\libs\RenderPage;

// renderpage.ru
if ('ru' === $app->request->gTLD) {
    $app->language->setCurrentLanguage('ru-ru');
}

$app->route()->execute()->send();
