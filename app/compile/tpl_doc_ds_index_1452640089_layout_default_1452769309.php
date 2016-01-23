<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title><?php if (!empty($this->variables['title'])) { echo $this->variables['title']; } ?></title>
    <link href="/static/style/default.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <a class="logo" href="/"><img src="/static/vector/renderpage-logo.svg" alt="RenderPage"></a>
      </header>
      <nav class="navbar">
        <ul>
<?php if (!empty($this->variables['navbar']) && is_array($this->variables['navbar'])) { foreach ($this->variables['navbar'] as $this->variables['item']) { ?>          <li<?php if (!empty($this->variables['item']['active']) && $this->variables['item']['active']) { ?> class="active"<?php } ?>><a href="<?php if (!empty($this->variables['item']['url'])) { echo $this->variables['item']['url']; } ?>"><?php if (!empty($this->variables['item']['text'])) { echo $this->variables['item']['text']; } ?></a></li>
<?php } } ?>
        </ul>
      </nav>
      <div class="workarea">
        <h1>Documentation</h1>
        <p>Coming soon!</p>
      </div>
      <footer class="footer">
        <div class="copy">&copy; 2015&ndash;<?php echo date('Y'); ?> RenderPage.org</div>
        <div class="powered">Powered by RenderPage <?php echo renderpage\libs\RenderPage::RENDERPAGE_VERSION; ?></div>
      </footer>
    </div>
  </body>
</html>
