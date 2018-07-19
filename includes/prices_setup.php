<?php
add_action( 'init', 'register_prices' );

function register_prices() {
	register_post_type( 'price', [
		'labels'             => [
			'name'               => 'Цена загранпаспорта', // основное название для типа записи
			'singular_name'      => 'Цена загранпаспорта', // название для одной записи этого типа
			'add_new'            => 'Добавить цену', // для добавления новой записи
			'add_new_item'       => 'Добавление цены', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование цены', // для редактирования типа записи
			'new_item'           => '', // текст новой записи
			'view_item'          => 'Смотреть цену', // для просмотра записи этого типа.
			'search_items'       => 'Искать цену', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Цены загранпаспорта', // название меню
		],
		'public'             => true,
		'publicly_queryable' => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-cart',
		'supports'           => array( 'title', 'custom-fields' ),
		'has_archive'        => false,
	] );
	register_taxonomy( 'registration', 'price', [
		'label'        => '',
		// определяется параметром $labels->name
		'labels'       => [
			'name'              => 'Место регистрации',
			'singular_name'     => 'Место регистрации',
			'search_items'      => 'Искать место',
			'all_items'         => 'Все места',
			'view_item '        => 'Смотреть место',
			'parent_item'       => 'Parent место',
			'parent_item_colon' => 'Parent место:',
			'edit_item'         => 'Редактировать место',
			'update_item'       => 'Обновить место',
			'add_new_item'      => 'Добавить место',
			'new_item_name'     => 'Название мест',
			'menu_name'         => 'Места регистрации',
		],
		'description'  => '',
		'public'       => true,
		'hierarchical' => false,
	] );
	register_taxonomy( 'type', 'price', [
		'label'              => '',
		// определяется параметром $labels->name
		'labels'             => [
			'name'              => 'Тип загранпаспорта',
			'singular_name'     => 'Тип загранпаспорта',
			'search_items'      => 'Искать тип',
			'all_items'         => 'Все типы',
			'view_item '        => 'Смотреть тип',
			'parent_item'       => 'Parent тип',
			'parent_item_colon' => 'Parent тип:',
			'edit_item'         => 'Редактировать тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить тип',
			'new_item_name'     => 'Название типов',
			'menu_name'         => 'Тип загранпаспорта',
		],
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => false,
		'hierarchical'       => false,
	] );
	register_taxonomy( 'nationality', 'price', [
		'label'              => '',
		// определяется параметром $labels->name
		'labels'             => [
			'name'              => 'Гражданство',
			'singular_name'     => 'Гражданство',
			'search_items'      => 'Искать гражданство',
			'all_items'         => 'Все гражданства',
			'view_item '        => 'Смотреть гражданство',
			'parent_item'       => 'Parent гражданство',
			'parent_item_colon' => 'Parent гражданство:',
			'edit_item'         => 'Редактировать гражданство',
			'update_item'       => 'Обновить гражданство',
			'add_new_item'      => 'Добавить гражданство',
			'new_item_name'     => 'Название гражданства',
			'menu_name'         => 'Гражданства',
		],
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => false,
		'hierarchical'       => false,
	] );
	register_taxonomy( 'age', 'price', [
		'label'              => '',
		// определяется параметром $labels->name
		'labels'             => [
			'name'              => 'Возраст',
			'singular_name'     => 'Возраст',
			'search_items'      => 'Искать возраст',
			'all_items'         => 'Все возраста',
			'view_item '        => 'Смотреть возраст',
			'parent_item'       => 'Parent возраст',
			'parent_item_colon' => 'Parent возраст:',
			'edit_item'         => 'Редактировать возраст',
			'update_item'       => 'Обновить возраст',
			'add_new_item'      => 'Добавить возраст',
			'new_item_name'     => 'Название возраста',
			'menu_name'         => 'Возраст',
		],
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => false,
		'hierarchical'       => false,
	] );
}