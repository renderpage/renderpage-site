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
        <h1>Contact</h1>
        <p>E-mail: <a href="mailto:mail@renderpage.org">mail@renderpage.org</a></p>
        <p>GitHub: <a href="https://github.com/renderpage">https://github.com/renderpage</a></p>
        <p>VK: <a href="https://vk.com/renderpage">https://vk.com/renderpage</a></p>
        <p>Facebook: <a href="https://www.facebook.com/renderpage">https://www.facebook.com/renderpage</a></p>
        <p>Twitter: <a href="https://twitter.com/renderpage">https://twitter.com/renderpage</a></p>
        <p>Instagram: <a href="https://www.instagram.com/renderpage/">https://www.instagram.com/renderpage/</a></p>
      </div>
      <footer class="footer">
        <div class="copy">&copy; 2015&ndash;<?php echo date('Y'); ?> RenderPage.org</div>
        <div class="powered">Powered by RenderPage <?php echo renderpage\libs\RenderPage::RENDERPAGE_VERSION; ?></div>
      </footer>
    </div>
  </body>
</html>
