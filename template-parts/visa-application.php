<?
global $post;
$title = get_field( 'оформление-заголовок', 'option' );
if ( get_page_template_slug() == 'page-country.php' ) {
	$title = get_field( 'оформление-заголовок', $post );
}
//json encode visa form info
$visa            = get_field( 'страны', 'visa' );
$nationality     = get_field( 'гражданства', 'visa' );
$nationalityJson = [];
foreach ( $nationality as $nation ) {
	array_push( $nationalityJson, $nation['гражданство'] );
}
$visaJson = [];
foreach ( $visa as $item ) {
	//pre( $item );
	$visaJson[ $item['страна']['название'] ] = $item['страна']['типы-визы'];
	foreach ( $item as $country ) {
		$t = 0;
		foreach ( $visaJson[ $item['страна']['название'] ] as $type ) {
			$visaJson[ $item['страна']['название'] ][ $type['тип']['название'] ] = $type['тип']['тарифы'];
			unset( $visaJson[ $item['страна']['название'] ][ $t ] );
			$t ++;
			$tx = 0;
			foreach ( $type['тип']['тарифы'] as $tax ) {
				unset( $visaJson[ $item['страна']['название'] ][ $type['тип']['название'] ][ $tx ] );
				//		$json[ $item['страна']['название'] ][ $type['тип']['название'] ] = array_values( $tax );
				array_push( $visaJson[ $item['страна']['название'] ][ $type['тип']['название'] ], $tax['тариф'] );
				$tx ++;
			}
		}
	}
}
?>
<section class="visa-application">
    <script>
        var country = '<? the_title() ?>';
        var visa = <?= json_encode( $visaJson ) ?>;
        var nationality = <?= json_encode( $nationalityJson ) ?>;
    </script>
    <div class="container">
        <h2 class="section-title"><?= $title ?></h2>
        <p class="section-subtitle"><? the_field( 'оформление-подзаголовок', 'option' ) ?></p>
        <div class="row justify-content-around">
            <div class="step d-flex align-items-center col-xl-4 col-lg-5 col-md-6">
				<?
				$application = get_field( 'оформление-блоки', 'option' );
				?>
                <div class="circle hour"><p><b>24</b>часа</p></div>
                <div class="info">
                    <p class="title"><?= $application['блок-1-заголовок'] ?></p>
                    <p class="small"><?= $application['блок-1-текст'] ?></p>
                </div>
            </div>
            <div class="step d-flex align-items-center col-xl-4 col-lg-5 col-md-6">
                <div class="circle year"><p><b>1</b>год</p></div>
                <div class="info">
                    <p class="title"><?= $application['блок-2-заголовок'] ?></p>
                    <p class="small"><?= $application['блок-2-текст'] ?></p>
                </div>
            </div>
            <div class="step d-flex align-items-center col-xl-4 col-lg-5 col-md-6">
                <div class="circle type"><img src="<?= path() ?>img/visa/elipse-icon.png" alt="icon"></div>
                <div class="info">
                    <p class="title"><?= $application['блок-3-заголовок'] ?></p>
                </div>
            </div>
        </div>
        <div class="form" id="visaForm">
            <p class="title"><? the_field( 'оформление-форма-заголовок', 'option' ) ?></p>
            <form action="">
                <div class="d-flex justify-content-around flex-wrap">
                    <div class="input-block">
                        <label for="">Страна</label>
                        <div class="caret-after">
                            <select v-model="currentCountry" required>
                                <option value="" selected disabled>Выберите страну</option>
                                <option v-for="(country, key) in countries" :value="key">{{key}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="">Тип визы</label>
                        <div class="caret-after">
                            <select v-model="currentType" :disabled="!currentCountry" required>
                                <option value="" selected disabled>Выберите</option>
                                <option v-for="(type, key, index) in countries[currentCountry]" :value="key">{{key}}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="">Гражданство</label>
                        <div class="caret-after">
                            <select v-model="formData.nationality" required>
                                <option v-for="nation in nationality" :value="nation">{{nation}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="">Планируемая дата въезда</label>
                        <div class="data-after">
                            <vuejs-datepicker v-model="formData.start" format="dd.MM.yy"
                                              monday-first="true"></vuejs-datepicker>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="">Планируемая дата выезда</label>
                        <div class="data-after">
                            <vuejs-datepicker v-model="formData.end" format="dd.MM.yy"
                                              monday-first="true"></vuejs-datepicker>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="">Число запрашиваемых въездов</label>
                        <input type="number" v-model="formData.count" name="Запрашиваемые въезды" value="1" step="1"
                               min="1">
                    </div>
                    <div class="input-block">
                        <label for="">Выбор тарифа</label>
                        <div class="caret-after">
                            <select v-model="currentTax" :disabled="!currentType" required>
                                <option v-for="tax in types" :value="tax">{{tax}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-block">
                        <label for="">Ваше имя</label>
                        <input type="text" v-model="formData.name" placeholder="Например Иван" required>
                    </div>
                    <div class="input-block">
                        <label for="">Ваш email</label>
                        <input type="email" v-model="formData.email" placeholder="examlpe@mail.ru"
                               required>
                    </div>
                    <div class="input-block">
                        <label for="">Ваш номер телефона</label>
                        <input-phone v-bind:value="formData.phone" v-on:change="formData.phone = $event"></input-phone>
                    </div>
                </div>
                <input type="submit" class="submit button button-dark" value="Отправить заявку">
            </form>
			<?= do_shortcode( '[contact-form-7 id="229" title="ФОРМА ЗАЯВКИ НА ВИЗУ" html_class="visa-app"]' ) ?>
        </div>
    </div>
</section>