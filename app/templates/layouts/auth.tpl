<!DOCTYPE html>
<html lang="{$lang}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#121212">
    <link rel="icon" href="/favicon.ico">
    <title>{$title}</title>
    <link href="http://renderpage.org/static/style/renderpage.css" rel="stylesheet">
    <link href="http://renderpage.org/static/style/auth.css" rel="stylesheet">
  </head>
  <body>
    <header class="header">
      <a class="logo" href="/"><img src="http://renderpage.org/static/vector/renderpage-logo.svg" alt="RenderPage" width=128></a>
    </header>
    <main class="workarea">
      {workarea}
    </main>
    <footer class="footer">
      <div class="languages">
        <ul>
          <li>Language (Язык):</li>
          {foreach $languages as $item}
            <li><a{if $item.active} class="active"{/if} href="{$item.href}">{$item.text}</a></li>
          {/foreach}
        </ul>
      </div>
      <div class="copy">&copy; 2015&ndash;{$year} RenderPage.org</div>
      <div class="powered">Powered by RenderPage {#VERSION}</div>
    </footer>
  </body>
</html>
