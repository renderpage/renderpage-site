<?php
// Styles
$this->addStyle('/static/styles/renderpage.css');
$this->addStyle('/static/styles/default.css');
$this->addStyle('/static/styles/navbar.css');

// Scripts
$this->addScript('/static/scripts/navbar.js');
?>
<!DOCTYPE html>
<!--
The MIT License

Copyright 2018 Sergey Pershin <sergey dot pershin at hotmail dot com>.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
-->
<html lang="<?= $lang ?>">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#121212">
    <link rel="icon" href="/favicon.ico">
    <title><?= $this->title ?></title>
    <?php
    foreach ($this->styles as $style) {
        echo '<link href="', $style['href'], '" rel="stylesheet">', PHP_EOL;
    }
    foreach ($this->scripts as $script) {
        echo '<script src="', $script['src'], '" defer></script>', PHP_EOL;
    }
    ?>
  </head>
  <body>
    <header class="header">
      <a class="logo" href="/"><img src="/static/vector/renderpage-logo.svg" alt="RenderPage"></a>
      <div class="auth-panel">
        <?php if ($isAuthorized): ?>
            <span><?= $auth->user->email ?></span>
            <a class="btn" href="/logout"><?= $this->_('auth-panel', 'logout') ?></a>
        <?php else: ?>
            <a class="btn" href="/signup"><?= $this->_('auth-panel', 'signup') ?></a>
            <a class="btn btn-login" href="/login"><?= $this->_('auth-panel', 'login') ?></a>
        <?php endif; ?>
      </div>
    </header>
    <nav class="navbar">
      <a class="navbar-title" href="/">RenderPage</a>
      <button type="button">
        <span><!-- - --></span>
        <span><!-- - --></span>
        <span><!-- - --></span>
      </button>
      <ul>
        <?php
        foreach ($navbar as $item) {
            if (isset($item['isSeparator']) && $item['isSeparator']) {
                echo '<li class="divider';
                if (!empty($item['class'])) {
                    echo ' ', $item['class'];
                }
                echo '">';
            } else {
                echo '<li';
                if (!empty($item['class'])) {
                    echo ' class="', $item['class'], '"';
                }
                echo '><a href="', $item['url'], '">', $item['text'], '</a>';
            }
        }
        ?>
      </ul>
    </nav>
    <?php if (!empty($breadcrumb)): ?>
        <ol class="breadcrumb">
          <?php
          foreach ($breadcrumb as $item) {
              echo '<li><a href="', $item['url'], '">', $item['text'], '</a>';
          }
          ?>
        </ol>
    <?php endif; ?>
    <main class="workarea">
      <?= $this->workarea ?>
    </main>
    <?php include __DIR__ . '/../footer.php'; ?>
  </body>
</html>
