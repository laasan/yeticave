<section class="lots">
  <h2>История просмотров</h2>
    <?php if(count($history)) { ?>
        <ul class="lots__list">
        <?php foreach ($history as $itemId) {
            $item = $items[$itemId]; ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $item['URL_img']; ?>" width="350" height="260" alt="<?= $item['Категория']; ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $item['Категория']; ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?=$itemId;?>"><?= $item['Название']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= show_price($item['Цена']); ?></span>
                        </div>
                        <div class="lot__timer timer">
                        <?= getLeftTime(null); ?>
                        </div>
                    </div>
                </div>
            </li>  
        <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Список просмотров пуст</p>
    <?php } ?>
</section>