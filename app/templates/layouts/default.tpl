<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>{$title}</title>
    <link href="/static/style/default.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <a class="logo" href="/"><img src="/static/vector/renderpage-logo.svg" alt="RenderPage"></a>
      </header>
      <nav class="navbar">
        <ul>
          {foreach $navbar as $item}
            <li{if $item.active} class="active"{/if}><a href="{$item.url}">{$item.text}</a></li>
          {/foreach}
        </ul>
      </nav>
      <div class="workarea">
        {workarea}
      </div>
      <footer class="footer">
        <div class="copy">&copy; 2015&ndash;<?php echo date('Y'); ?> RenderPage.org</div>
        <div class="powered">Powered by RenderPage <?php echo renderpage\libs\RenderPage::RENDERPAGE_VERSION; ?></div>
      </footer>
    </div>
  </body>
</html>
