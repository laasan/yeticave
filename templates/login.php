<form class="form container <?=hasError() ? 'form--invalid' : ''?>" method="post"> <!-- form--invalid -->
  <h2>Вход</h2>
  <div class="form__item <?=checkError('email')?>"> <!-- form__item--invalid -->
    <label for="email">E-mail*</label>
    <input id="email" type="text" name="email" placeholder="Введите e-mail" required value="<?=$email?>">
    <span class="form__error"><?=$errors['email']?></span>
  </div>
  <div class="form__item form__item--last <?=checkError('password')?>"">
    <label for="password">Пароль*</label>
    <input id="password" type="text" name="password" placeholder="Введите пароль" required>
    <span class="form__error"><?=$errors['password']?></span>
  </div>
  <button type="submit" class="button">Войти</button>
</form>