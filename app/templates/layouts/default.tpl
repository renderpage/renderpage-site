<!DOCTYPE html>
<html lang="{$lang}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>{$title}</title>
    {foreach $cssFiles as $cssFile}
      <link href="http://renderpage.org/static/style/{$cssFile.href}" rel="stylesheet">
    {/foreach}
    {foreach $jsFiles as $jsFile}
      <script src="http://renderpage.org/static/scripts/{$jsFile.src}"></script>
    {/foreach}
  </head>
  <body>
    <header class="header">
      <a class="logo" href="/"><img src="http://renderpage.org/static/vector/renderpage-logo.svg" alt="RenderPage"></a>
      <ul class="languages">
        <li>Language (Язык):</li>
        {foreach $languages as $item}
          <li><a{if $item.active} class="active"{/if} href="{$item.href}">{$item.text}</a></li>
        {/foreach}
      </ul>
    </header>
    <nav class="navbar">
      <a class="navbar-title" href="/">RenderPage</a>
      <button type="button">
        <span><!-- - --></span>
        <span><!-- - --></span>
        <span><!-- - --></span>
      </button>
      <ul>
        {foreach $navbar as $item}
          <li{if $item.active} class="active"{/if}><a href="{$item.url}">{$item.text}</a></li>
        {/foreach}
      </ul>
    </nav>
    {if $breadcrumb}
      <ol class="breadcrumb">
        {foreach $breadcrumb as $item}
          <li><a href="{$item.url}">{$item.text}</a></li>
        {/foreach}
      </ol>
    {/if}
    <div class="workarea">
      {workarea}
    </div>
    <footer class="footer">
      <div class="copy">&copy; 2015&ndash;{$year} RenderPage.org</div>
      <div class="powered">Powered by RenderPage {#VERSION}</div>
    </footer>
  </body>
</html>
