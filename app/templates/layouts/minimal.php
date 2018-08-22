<?php
$this->addStyle('/static/styles/renderpage.css');
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
      <a class="logo" href="/"><img src="/static/vector/renderpage-logo.svg" alt="RenderPage" width=128></a>
    </header>
    <main class="workarea">
      <?= $this->workarea ?>
    </main>
    <?php include __DIR__ . '/../footer.php'; ?>
  </body>
</html>
