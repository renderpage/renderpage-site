<form class="auth-form" action="/reset-password" method="post">
  <h2 class="auth-form-heading">{"reset-password.heading"}</h2>
  <p>{"reset-password.p"}</p>
  <fieldset>
    <label for="input-email">{"reset-password.label-email"}</label>
    <input id="input-email" tabindex="1" name="email" type="email" maxlength="129" value="{$email}" placeholder="example@example.org">
    {if $errorMessages.email}
      <div class="error">
        <span class="exclamation-sign">!</span>
        <span class="message">{$errorMessages.email}</span>
      </div>
    {/if}
  </fieldset>
  <button class="btn btn-primary btn-big" tabindex="3" type="submit">{"reset-password.submit"}</button>
  <p class="text-center">{"reset-password.back-to"} <a href="/login">{"reset-password.login"}</a></p>
</form>
