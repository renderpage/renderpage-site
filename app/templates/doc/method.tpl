<h1>{$refentry.name}()</h1>
<p>{$refentry.name}() &mdash; {$refentry.purpose}</p>
<div class="methodsynopsis">
  <span class="type">{$refentry.methodsynopsis.return}</span> <span class="methodname">{$refentry.methodsynopsis.name}</span>
  (
  {foreach $refentry.methodsynopsis.params as $param}
    {if $param.initializer}
      [ ,
    {/if}
    <span class="methodparam">
      <span class="type">{$param.type}</span>
      <code class="parameter">${$param.name}</code>
      {if $param.initializer}
        <span class="initializer">= {$param.initializer}</span>
      {/if}
    </span>
    {if $param.initializer}
      ]
    {/if}
  {/foreach}
  )
</div>
<h2>{"doc.description"}</h2>
<div class="description">
  {$refentry.description}
</div>
<h2>{"doc.examples"}</h2>
<div class="examples">
{foreach $refentry.examples as $example}
  <h3>{$example.title}</h3>
  <div class="phpcode">
    <code>
      {$example.programlisting}
    </code>
  </div>
{/foreach}
</div>

