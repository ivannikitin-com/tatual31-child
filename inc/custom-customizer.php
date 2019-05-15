<?php

add_action('customize_register', function($customizer) {
	// Contact Form 7
	$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
	$cf7Forms = get_posts( $args );

	$forms = [];

	foreach($cf7Forms as $cf7Form) {
			$forms[$cf7Form->ID] =  $cf7Form->post_title;
	}

	$customizer->add_section(
		'settings-site', array(
				'title'         => 'Настройки сайта',
				'description'   => 'Контактная информация на сайте',
				'priority'      => 11,
		)
  );

  $customizer->add_setting('signup', array(
    'default'        => ''
  ));

	$customizer->add_control( 'signup', array(
			'type'    => 'select',
			'label'     => 'Записаться',
			'section'   => 'settings-site',
			'choices'		=> $forms
	));

  $customizer->add_setting('order_call', array(
			'default'        => ''
	));

	$customizer->add_control( 'order_call', array(
			'type'    => 'select',
			'label'     => 'Заказать звонок',
			'section'   => 'settings-site',
			'choices'		=> $forms
	));
});