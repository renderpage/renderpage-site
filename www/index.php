<?php

define('RENDERPAGE_DEBUG', true);

require __DIR__ . '/../vendor/pershin/renderpage/require.php';

$app = new vendor\pershin\renderpage\RenderPage;

// renderpage.ru
if ('ru' === $app->request->gTLD) {
    $app->language->setCurrentLanguage('ru-ru');
}

$app->route()->execute()->send();
