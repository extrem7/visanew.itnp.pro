<?
global $country;
?>
<div class="item">
    <div class="circle">
        <img src="<?= $country['картинка']['url'] ?>" alt="<?= $country['картинка']['alt'] ?>">
    </div>
    <div class="info">
        <p class="title"><span class="flag" style="background-image: url('<?= $country['флаг'] ?>')"></span><?= $country['название'] ?></p>
        <div class="padding">
            <p class="time">Срок оформления: <?= $country['срок'] ?></p>
            <p class="price"><?= $country['цена'] ?> <i class="fa fa-rub"></i></p>
            <p class="sale"><?= $country['старая-цена'] ?></p>
            <a href="<?= $country['ссылка'] ?>">подробнее <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</div>