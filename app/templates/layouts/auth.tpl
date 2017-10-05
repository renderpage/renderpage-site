<!DOCTYPE html>
<html lang="{$lang}">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#121212">
    <link rel="icon" href="/favicon.ico">
    <title>{$title}</title>
    <link href="/static/style/renderpage.css" rel="stylesheet">
    <link href="/static/style/auth.css" rel="stylesheet">
  </head>
  <body>
    <header class="header">
      <a class="logo" href="/"><img src="/static/vector/renderpage-logo.svg" alt="RenderPage" width=128></a>
    </header>
    <main class="workarea">
      {workarea}
    </main>
    {include footer.tpl}
  </body>
</html>
