<? global $contactsWhite; ?>
<section class="contacts-section <?= $contactsWhite ? 'contacts-white' : '' ?>">
    <div class="container">
        <h2 class="section-title <?= $contactsWhite ? 'title-black' : 'title-white' ?>"><? the_field( 'контакты-заголовок', 'option' ) ?></h2>
        <div class="d-flex  flex-wrap justify-content-center">
            <div class="item">
                <img src="<?= path() ?><?= $contactsWhite ? 'img/icons/map-blue.png' : 'img/home/contacts-1.png' ?>" alt="">
                <div class="text"><? the_field( 'контакты-адрес', 'option' ) ?></div>
            </div>
            <div class="item">
                <img src="<?= path() ?><?= $contactsWhite ? 'img/icons/phone-blue.png' : 'img/home/contacts-2.png' ?>" alt="">
                <div class="text"><? the_field( 'контакты-телефон', 'option' ) ?></div>
            </div>
            <div class="item">
                <img src="<?= path() ?><?= $contactsWhite ? 'img/icons/mail-blue.png' : 'img/home/contacts-3.png' ?>" alt="">
                <div class="text"><? the_field( 'контакты-почта', 'option' ) ?></div>
            </div>
        </div>
    </div>
</section>
<div class="map"><? the_field( 'карта', 'option' ) ?></div>
