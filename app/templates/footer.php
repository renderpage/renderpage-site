<?php

use vendor\pershin\renderpage\RenderPage;
?>
<footer>
  <div class="languages">
    <ul>
      <li>Language (Язык):
        <?php
        foreach ($languages as $item) {
            echo '<li><a ';
            if ($item['active']) {
                echo 'class="active" ';
            }
            echo 'href="', $item['href'], '">', $item['text'], '</a>';
        }
        ?>
    </ul>
  </div>
  <div class="copy">&copy; 2015&ndash;<?= date('Y') ?> Sergey&nbsp;Pershin</div>
  <div class="powered">
    Powered by RenderPage&nbsp;<?= RenderPage::RENDERPAGE_VERSION ?>
  </div>
</footer>
