<section class="lot-item container">
    <h2><?= $item['Название']; ?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?= $item['URL_img']; ?>" width="730" height="548" alt="Сноуборд">
        </div>
        <p class="lot-item__category">Категория: <span><?= $item['Категория']; ?></span></p>
        <p class="lot-item__description"><?= $item['description']; ?></p>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
          <?= $item['timer']; ?>
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?= $item['Цена']; ?></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span><?= $item['minPrice']; ?></span>
            </div>
          </div>
          <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" placeholder="12 000">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
        <?php if(count($bets)): ?>
        <div class="history">
          <h3>История ставок (<span><?= count($bets); ?></span>)</h3>
          <table class="history__list">
            <?php foreach ($bets as $bet): ?>
            <tr class="history__item">
              <td class="history__name"><?= $bet['name'] ?></td>
              <td class="history__price"><?= $bet['price'] ?></td>
              <td class="history__time"><?= $bet['ts'] ?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <?php endif;?>
      </div>
    </div>
  </section>