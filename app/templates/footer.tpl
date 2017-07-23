<footer>
  <div class="languages">
    <ul>
      <li>Language (Язык):
        {foreach $languages as $item}
        <li><a{if $item.active} class="active"{/if} href="{$item.href}">{$item.text}</a>
        {/foreach}
    </ul>
  </div>
  <div class="copy">&copy; 2015&ndash;{$year} Sergey&nbsp;Pershin</div>
  <div class="powered">Powered by RenderPage&nbsp;{#VERSION}</div>
</footer>
