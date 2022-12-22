<form class="form form--add-lot container <?=hasError() ? 'form--invalid' : ''?>" action="add.php" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item <?=checkError('lot-name')?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required value="<?=$input_temp['lot-name']?>">
        <span class="form__error">Введите наименование лота</span>
      </div>
      <div class="form__item <?=checkError('category')?>" >
        <label for="category">Категория</label>
        <select id="category" name="category" required>
        <?php
          foreach ($categories as $category) { 
            $selected = ($input_temp['category'] === $category) ? 'selected' : '';
            echo "<option {$selected}>{$category}</option>";
          } 
        ?>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    <div class="form__item form__item--wide <?=checkError('message')?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required><?=$input_temp['message']?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file <?=$input_temp['lot-image'] ? 'form__item--uploaded' : ''?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="<?=$input_temp['lot-image']?>" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" value="" name="lot-image">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <span class="form__error <?= !empty($errors['lot-image']) ? 'form__error--bottom' : ''?>"><?=$errors['lot-image']?>.</span>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?=checkError('lot-rate')?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required value="<?=$input_temp['lot-rate']?>">
        <span class="form__error">Введите начальную цену</span>
      </div>
      <div class="form__item form__item--small <?=checkError('lot-state')?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" required value="<?=$input_temp['lot-step']?>">
        <span class="form__error">Введите шаг ставки</span>
      </div>
      <div class="form__item <?=checkError('lot-date')?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" required value="<?=$input_temp['lot-date']?>">
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <span class="form__error <?=hasError() ? 'form__error--bottom' : ''?>">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>