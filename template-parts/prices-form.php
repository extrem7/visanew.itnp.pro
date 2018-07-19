<?
$terms       = [ 'registration', 'type', 'nationality', 'age' ];
$prices      = [];
$pricesPosts = get_posts( [
	'numberposts' => - 1,
	'post_type'   => 'price',
	'order_by'    => 'title'
] );
foreach ( $pricesPosts as $price ) {
	$priceObject = [
		'oldPrice'     => $price->post_title,
		'price'        => get_field( 'новая_цена', $price ),
		'time'         => get_field( 'сроки-изготовления', $price ),
		'registration' => [],
		'type'         => [],
		'nationality'  => [],
		'age'          => [],
		'show'         => false
	];
	foreach ( $terms as $name ) {
		foreach ( get_the_terms( $price, $name ) as $term ) {
			array_push( $priceObject[ $name ], $term->term_id );
		}
	}
	array_push( $prices, $priceObject );
}
$taxonomies = [
	'registration' => [],
	'type'         => [],
	'nationality'  => [],
	'age'          => []
];
foreach ( $terms as $name ) {
	foreach ( get_terms( $name ) as $term ) {
		array_push( $taxonomies[ $name ], [ 'id' => $term->term_id, 'name' => $term->name ] );
	}
}
$documents = [];
foreach ( get_terms( 'age' ) as $term ) {
	$documentsArr = [];
	foreach ( get_field( 'документы', $term ) as $document ) {
		array_push( $documentsArr, $document['документ'] );
	}
	$documents[ $term->term_id ] = $documentsArr;
}
?>
<script>
    var prices = <?= json_encode( $prices ) ?>;
    var taxonomies = <?= json_encode( $taxonomies ) ?>;
    var documents = <?= json_encode( $documents ) ?>;
</script>
<div class="form" id="passport-form">
    <p class="title"><? the_field( 'форма-заголовок' ) ?></p>
    <div class="d-flex justify-content-around flex-wrap">
        <div class="input-block">
            <label for="">Место регистрации</label>
            <div class="caret-after">
                <select v-model="currentRegistration">
                    <option v-for="registration in registrations" :value="registration.id">{{registration.name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="input-block">
            <label for="">Тип загранпаспорта</label>
            <div class="caret-after">
                <select v-model="currentType">
                    <option v-for="type in types" :value="type.id">{{type.name}}</option>
                </select>
            </div>
        </div>
        <div class="input-block">
            <label for="">Гражданство</label>
            <div class="caret-after">
                <select v-model="currentNationality">
                    <option v-for="nationality in nationalities" :value="nationality.id">{{nationality.name}}
                    </option>
                </select>
            </div>
        </div>
        <div class="input-block">
            <label for="">Возраст получателя</label>
            <div class="caret-after">
                <select v-model="currentAge">
                    <option v-for="age in ages" :value="age.id">{{age.name}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="prices"><? the_field( 'актуальность-цен', 'option' ) ?></div>
    <div class="d-flex justify-content-around flex-wrap">
        <div class="col-lg-5">
            <table>
                <thead>
                <tr>
                    <th>Сроки изготовления</th>
                    <th>Стоимость изготовления</th>
                </tr>
                </thead>
                <tr v-for="price in prices" v-show="price.show">
                    <td>{{price.time}}</td>
                    <td><span class="old">{{price.oldPrice}}</span> {{price.price}} р.</td>
                </tr>
            </table>
            <p class="warning"><? the_field( 'гос-пошлина', 'option' ) ?></p>
        </div>
        <div class="col-lg-3 col-md-6">
            <p class="list-title">Включено в стоимость:</p>
            <ul class="include">
				<?
				while ( have_rows( 'включено-в-стоимость', 'option' ) ) :
					the_row(); ?>
                    <li><? the_sub_field( 'поле' ) ?></li>
				<? endwhile; ?>
            </ul>
        </div>
        <div class="col-lg-4 col-md-6">
            <p class="list-title">Необходимые документы:</p>
            <ul class="require">
                <li v-for="document in documents[currentAge]">{{document}}</li>
            </ul>
        </div>
    </div>
    <input type="submit" data-target="#callback" data-toggle="modal" class="submit button button-dark"
           value="Отправить заявку">
</div>