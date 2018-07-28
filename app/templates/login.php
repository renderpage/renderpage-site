<?php
$this->addStyle('/static/style/auth.css');
?>
<form class="auth-form" action="/login" method="post">
  <h2 class="auth-form-heading"><?= $this->_('login', 'heading') ?></h2>
  <fieldset>
    <label for="input-email"><?= $this->_('login', 'label-email') ?></label>
    <input id="input-email" tabindex="1" name="email" type="email" maxlength="129" value="<?= $email ?? '' ?>" placeholder="example@example.org">
    <?php if (isset($errorMessages['email'])): ?>
        <div class="error">
          <span class="exclamation-sign">!</span>
          <span class="message"><?= $errorMessages['email'] ?></span>
        </div>
    <?php endif; ?>
  </fieldset>
  <fieldset>
    <label for="input-password"><?= $this->_('login', 'label-password') ?></label>
    <a class="reset-password" href="/reset-password"><?= $this->_('login', 'reset-password') ?></a>
    <input id="input-password" tabindex="2" name="password" type="password">
    <?php if (isset($errorMessages['password'])): ?>
        <div class="error">
          <span class="exclamation-sign">!</span>
          <span class="message"><?= $errorMessages['password'] ?></span>
        </div>
    <?php endif; ?>
  </fieldset>
  <button class="btn btn-primary btn-big" tabindex="3" type="submit"><?= $this->_('login', 'submit') ?></button>
  <div class="divider">
    <h5><?= $this->_('login', 'divider') ?></h5>
  </div>
  <div>
    <a class="btn btn-default btn-big" href="/signup" tabindex="4"><?= $this->_('login', 'signup') ?></a>
  </div>
</form>
