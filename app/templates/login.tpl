<form class="form-login" action="/login" method="post">
  <h2 class="form-login-heading">{"login.form-login-heading"}</h2>
  <fieldset>
    <label for="inputEmail">{"login.label-email"}</label>
    <input id="inputEmail" tabindex="1" name="email" type="email" maxlength="129" value="{$email}">
    {if $errorMessages.email}
      <div class="error">
        <span class="exclamation-sign">!</span>
        <span class="message">{$errorMessages.email}</span>
      </div>
    {/if}
  </fieldset>
  <fieldset>
    <label for="inputPassword">{"login.label-password"}</label>
    <a class="reset-password" href="/reset-password">{"login.reset-password"}</a>
    <input id="inputPassword" tabindex="2" name="password" type="password">
    {if $errorMessages.password}
      <div class="error">
        <span class="exclamation-sign">!</span>
        <span class="message">{$errorMessages.password}</span>
      </div>
    {/if}
  </fieldset>
  <button class="btn btn-primary btn-big" tabindex="3" type="submit">{"login.submit"}</button>
  <div class="divider">
    <h5>{"login.divider"}</h5>
  </div>
  <div>
    <a class="btn btn-default btn-big" href="/signup" tabindex="4">{"login.signup"}</a>
  </div>
</form>
