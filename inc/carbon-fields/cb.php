<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	$basic_options_container = Container::make( 'theme_options',   esc_html__( 'Carbon fields', 'medical' ) )
    ->set_page_menu_title(  __( 'Carbon Fields', 'medical' ))

    ->add_tab( __('Header', 'medical'), array(
        Field::make( 'text', 'crb_header_slogan_ro', __( 'Slogain in header ro', 'medical' ) )
	    ->set_width(50),
	    Field::make( 'text', 'crb_header_slogan_ru', __( 'Slogain in header ru', 'medical' ) )
	    ->set_width(50),
    ) )

    ->add_tab( __('Slider', 'medical'), array(
        Field::make( 'complex', 'crb_slider_item' )
        ->add_fields( array(
            Field::make( 'image', 'crb_slider_image',  __('Image', 'medical') )
            ->set_help_text( __('Incarcati imagini cu dimensiunile de 1920x900', 'medical') ),
        ) )
    ) )

    ->add_tab( __('Timer', 'medical'), array(
        Field::make( 'text', 'crb_timer_title'.carbon_lang(), __( 'Timer name', 'medical' ) ),

        Field::make( 'separator', 'crb_separator_timer'.carbon_lang(), __( 'Monday Friday', 'medical' ) ),
	    Field::make( 'text', 'crb_separator_timer_text'.carbon_lang(), __( 'Monday Friday', 'medical' ) ),
        Field::make( 'time', 'crb_monday_start', __('Inceput de timp', 'medical') )
        ->set_width(50),
        Field::make( 'time', 'crb_monday_end', __('End', 'medical') )
        ->set_width(50),

        Field::make( 'separator', 'crb_separator_timer_1'.carbon_lang(), __( 'Saturday', 'medical' ) ),
	    Field::make( 'text', 'crb_separator_timer_text_1'.carbon_lang(), __( 'Saturday', 'medical' ) ),
        Field::make( 'time', 'crb_saturday_start', __('Start', 'medical') )
        ->set_width(50),
        Field::make( 'time', 'crb_saturday_end', __('end', 'medical') )
        ->set_width(50),

        Field::make( 'separator', 'crb_separator_timer_2'.carbon_lang(), __( 'Stationar', 'medical' ) ),
	    Field::make( 'text', 'crb_separator_timer_text_2'.carbon_lang(), __( 'Stationar', 'medical' ) ),
        Field::make( 'text', 'crb_timer_stationar'.carbon_lang(), __('Stationar', 'medical') ),
    ) )

	->add_tab( __('Medical Guide', 'medical'), array(
		Field::make( 'separator', 'crb_sep_gid_title'.carbon_lang(), __( 'Medical Guide', 'medical' ) ),
		Field::make( 'text', 'crb_guid_title_1'.carbon_lang(), __('Title 1', 'medical') )
		     ->set_width(50),
		Field::make( 'text', 'crb_guid_title_2'.carbon_lang(), __('Title 2', 'medical') )
		     ->set_width(50),
		Field::make( 'text', 'crb_gid_descr'.carbon_lang(), __('Description', 'medical') ),
	) )
    ->add_tab( __('Specialists', 'medical'), array(
        Field::make( 'text', 'crb_specialist_block_title_1'.carbon_lang(), __('Title 1', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_specialist_block_title_2'.carbon_lang(), __('Title 2', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_specialist_description'.carbon_lang(), __('Description', 'medical') ),
    ) )
	->add_tab( __('Cite', 'medical'), array(
		Field::make( 'text', 'crb_cite_text_ro', 'crb_cite_text_ro' )
		->set_width(50),
		Field::make( 'text', 'crb_cite_text_ru', 'crb_cite_text_ru' )
		->set_width(50),

		Field::make( 'text', 'crb_cite_author_ro', 'crb_cite_author_ro' )
			->set_width(50),
		Field::make( 'text', 'crb_cite_author_ru', 'crb_cite_author_ru' )
			->set_width(50),
	) );



    // Add second options page under 'Basic Options'
	Container::make( 'theme_options', __( 'General settings', 'medical' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container

    ->add_tab( __('Socials', 'medical'), array(
        Field::make( 'text', 'crb_email', __( 'Email', 'medical' ) ),
        Field::make( 'text', 'crb_facebook', __( 'Facebook', 'medical' ) )
        ->set_help_text( __('start http://', 'medical') ),
        Field::make( 'text', 'crb_twitter', __( 'Twitter', 'medical' ) )
        ->set_help_text( __('start http://', 'medical') ),
        Field::make( 'text', 'crb_google', __( 'Google', 'medical' ) )
        ->set_help_text( __('start http://', 'medical') ),
        Field::make( 'text', 'crb_vimeo', __( 'Vimeo', 'medical' ) )
        ->set_help_text( __('start http://', 'medical') ),
        Field::make( 'text', 'crb_phone', __( 'Phone', 'medical' ) )
        ->set_help_text( __('Symbols: ()-+', 'medical') ),
        Field::make( 'text', 'crb_address'.carbon_lang(), __( 'Adresa', 'medical' ) ),
        Field::make( 'text', 'crb_btn'.carbon_lang(), __( 'Vezi mai multe', 'medical' ) )
    ))

    ->add_tab( __('Footer', 'medical'), array(
        Field::make( 'separator', 'crb_sep_footer'.carbon_lang(), __( 'Emergency Phone', 'medical' ) ),
        Field::make( 'text', 'crb_emergency_title'.carbon_lang(), __('Title', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_emergency_phone'.carbon_lang(), __('Phone urgency', 'medical') )
        ->set_width(50),
        Field::make( 'separator', 'crb_sep_footer_1'.carbon_lang(), __( 'Copyright', 'medical' ) ),
        Field::make( 'text', 'crb_copyright_text'.carbon_lang(), __('Text', 'medical') ),
    ) )

    ->add_tab( __('Images', 'medical'), array(
        Field::make('image', 'crb_subanner_img', __('Image', 'medical'))
        ->set_help_text(__('Dimensions 1900x290', 'medical'))
    ) )

    ->add_tab( __('Articles', 'medical'), array(
        Field::make( 'separator', 'crb_sep_post_1'.carbon_lang(), __( 'Articles from categories', 'medical' ) ),
        Field::make('text', 'crb_category_amb_stat_default_img'.carbon_lang(), __('Id for image', 'medical')),
        Field::make( 'separator', 'crb_sep_post_2'.carbon_lang(), __( 'Specialist articles', 'medical' ) ),
        Field::make( 'text', 'crb_specialist_post_title_1'.carbon_lang(), __('Title 1', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_specialist_post_title_2'.carbon_lang(), __('Title 2', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_specialist_post_desription'.carbon_lang(), __( 'Description', 'medical' ) )
    ) );


    // Add second options page under 'Basic Options'
    Container::make( 'theme_options', __( 'Services Settings', 'medical' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container

    ->add_tab( 'Title', array(
        Field::make( 'text', 'crb_services_post_title_1'.carbon_lang(), __('Title 1', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_services_post_title_2'.carbon_lang(), __('Title 2', 'medical') )
        ->set_width(50),
        Field::make( 'text', 'crb_services_post_desription'.carbon_lang(), __( 'Description', 'medical' ) )
    ) );

	// Add second options page under 'Basic Options'
	Container::make( 'theme_options', 'Contacts' )
		->set_page_parent( $basic_options_container ) // reference to a top level container

		 ->add_tab( __('Map', 'medical'), array(
			Field::make( 'separator', 'crb_sep_contacts', __( 'Title', 'medical' ) ),
			Field::make( 'text', 'crb_contacts_title_1'.carbon_lang(), __( 'Title', 'medical' ) )
				 ->set_width(30),
			Field::make( 'text', 'crb_contacts_title_2'.carbon_lang(), __( 'Title', 'medical' ) )
				 ->set_width(30),
			Field::make( 'text', 'crb_contacts_title_3'.carbon_lang(), __( 'Title', 'medical' ) )
				 ->set_width(30),

			Field::make( 'separator', 'crb_sep_address_contacts', __( 'Title for address', 'medical' ) ),
			Field::make( 'text', 'crb_contacts_address_1'.carbon_lang(), __( 'Title', 'medical' ) )
				 ->set_width(50),
			Field::make( 'text', 'crb_contacts_address_2'.carbon_lang(), __( 'Title', 'medical' ) )
				 ->set_width(50),

			Field::make( 'separator', 'crb_sep_contacts_2', __( 'Phones', 'medical' ) ),
			Field::make( 'text', 'crb_contacts_phone_1', __('Phone 1', 'medical') ),
			Field::make( 'text', 'crb_contacts_phone_2', __('Phone 2', 'medical') ),
			Field::make( 'text', 'crb_contacts_phone_3', __('Phone 3', 'medical') ),
			Field::make( 'text', 'crb_contacts_phone_4', __('Phone 4', 'medical') )
		) );
}
