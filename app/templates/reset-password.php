<?php
$this->addStyle('/static/styles/auth.css');
?>
<form class="auth-form" action="/reset-password" method="post">
  <h2 class="auth-form-heading"><?= $this->_('reset-password', 'heading') ?></h2>
  <p><?= $this->_('reset-password', 'p') ?></p>
  <fieldset>
    <label for="input-email"><?= $this->_('reset-password', 'label-email') ?></label>
    <input id="input-email" tabindex="1" name="email" type="email" maxlength="129" value="<?= $email ?? '' ?>" placeholder="example@example.org">
    <?php if (!empty($errorMessages['email'])): ?>
        <div class="error">
          <span class="exclamation-sign">!</span>
          <span class="message"><?= $errorMessages['email'] ?></span>
        </div>
    <?php endif; ?>
  </fieldset>
  <button class="btn btn-primary btn-big" tabindex="3" type="submit"><?= $this->_('reset-password', 'submit') ?></button>
  <p class="text-center"><?= $this->_('reset-password', 'back-to') ?> <a href="/login"><?= $this->_('reset-password', 'login') ?></a></p>
</form>
