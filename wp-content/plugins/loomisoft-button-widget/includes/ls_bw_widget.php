<?php
/**
 * Button Widget by Loomisoft - ls_bw_widget Class
 * Copyright (c) 2017 Loomisoft (www.loomisoft.com)
 */

defined( 'LS_BW_PLUGIN' ) or die();

class ls_bw_widget extends WP_Widget {

	public function __construct() {
		parent::__construct( ls_bw_main::$plugin_slug, __( ls_bw_main::$widget_name, 'ls-bw-text-domain' ), array( 'description' => __( ls_bw_main::$widget_description, 'ls-bw-text-domain' ) ) );
	}

	public function widget( $args, $instance ) {

		//echo $args['before_widget'];

		$instance = ls_bw_main::get_clean_instance_values( $instance );

		$html = '<div class="ls-button-widget-container ls-button-widget-clearfix"><div id="ls-button-widget-' . esc_attr( $this->id ) . '" class="ls-button-widget-outer"><div class="ls-button-widget-inner ls-button-widget-inner-' . esc_attr( str_replace( ' ', '-', strtolower( $instance[ 'alignment' ] ) ) ) . '"><a id="ls-button-widget-link-' . esc_attr( $this->id ) . '" class="ls-button-widget-link"';

		if ( $instance[ 'link-address' ] != '' ) {
			$html .= ' href="' . esc_html( $instance[ 'link-address' ] ) . '"';
		} else {
			$html .= ' href="#" onclick="return false"';
		}

		if ( $instance[ 'new-window' ] != '' ) {
			$html .= ' target="_blank"';
		}

		$html .= '>' . esc_html( $instance[ 'button-text' ] ) . '</a></div></div></div>';

		echo $html;

		//echo $args['after_widget'];

		$style = '';

		$import_style     = '';
		$div_style        = '';
		$link_style       = '';
		$link_hover_style = '';

		if ( $instance[ 'top-margin' ] != '' ) {
			$div_style .= 'margin-top: ' . ls_bw_main::add_length_unit( $instance[ 'top-margin' ] ) . ' !important; ';
		}

		if ( $instance[ 'bottom-margin' ] != '' ) {
			$div_style .= 'margin-bottom: ' . ls_bw_main::add_length_unit( $instance[ 'bottom-margin' ] ) . ' !important; ';
		}

		if ( $instance[ 'horizontal-margin' ] != '' ) {
			$div_style .= 'margin-left: ' . ls_bw_main::add_length_unit( $instance[ 'horizontal-margin' ] ) . ' !important; margin-right: ' . ls_bw_main::add_length_unit( $instance[ 'horizontal-margin' ] ) . ' !important; ';
		}

		if ( $instance[ 'font-family' ] != '' ) {
			if ( ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'category' ] == '' ) {
				$link_style       .= 'font-family: ' . ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'family' ] . ' !important; ';
				$link_hover_style .= 'font-family: ' . ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'family' ] . ' !important; ';
			} else {
				$link_style       .= 'font-family: "' . ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'family' ] . '", ' . ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'category' ] . ' !important; ';
				$link_hover_style .= 'font-family: "' . ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'family' ] . '", ' . ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'category' ] . ' !important; ';
				$import_style     .= '@import url("https://fonts.googleapis.com/css?family=' . urlencode( ls_bw_main::$fonts[ $instance[ 'font-family' ] ][ 'family' ] ) . '"); ';
			}
		}

		if ( $instance[ 'font-size' ] != '' ) {
			$link_style       .= 'font-size: ' . ls_bw_main::add_length_unit( $instance[ 'font-size' ] ) . ' !important; ';
			$link_hover_style .= 'font-size: ' . ls_bw_main::add_length_unit( $instance[ 'font-size' ] ) . ' !important; ';
		}

		if ( $instance[ 'line-height' ] != '' ) {
			$link_style       .= 'line-height: ' . ls_bw_main::add_length_unit( $instance[ 'line-height' ] ) . ' !important; ';
			$link_hover_style .= 'line-height: ' . ls_bw_main::add_length_unit( $instance[ 'line-height' ] ) . ' !important; ';
		} elseif ( $instance[ 'font-size' ] != '' ) {
			$link_style       .= 'line-height: 1.5em !important; ';
			$link_hover_style .= 'line-height: 1.5em !important; ';
		}

		if ( $instance[ 'color' ] != '' ) {
			$link_style .= 'color: ' . $instance[ 'color' ] . ' !important; ';
		}

		if ( $instance[ 'hover-color' ] != '' ) {
			$link_hover_style .= 'color: ' . $instance[ 'hover-color' ] . ' !important; ';
		}

		if ( $instance[ 'bold' ] != '' ) {
			$link_style .= 'font-weight: bold !important; ';
		}

		if ( $instance[ 'hover-bold' ] != '' ) {
			$link_hover_style .= 'font-weight: bold !important; ';
		} elseif ( $instance[ 'bold' ] != '' ) {
			$link_hover_style .= 'font-weight: normal !important; ';
		}

		if ( $instance[ 'italic' ] != '' ) {
			$link_style .= 'font-style: italic !important; ';
		}

		if ( $instance[ 'hover-italic' ] != '' ) {
			$link_hover_style .= 'font-style: italic !important; ';
		} elseif ( $instance[ 'italic' ] != '' ) {
			$link_hover_style .= 'font-style: normal !important; ';
		}

		if ( $instance[ 'underline' ] != '' ) {
			$link_style .= 'text-decoration: underline !important; ';
		}

		if ( $instance[ 'hover-underline' ] != '' ) {
			$link_hover_style .= 'text-decoration: underline !important; ';
		} elseif ( $instance[ 'underline' ] != '' ) {
			$link_hover_style .= 'text-decoration: none !important; ';
		}

		if ( $instance[ 'background-color' ] != '' ) {
			$link_style .= 'background-color: ' . $instance[ 'background-color' ] . ' !important; ';
		}

		if ( $instance[ 'background-hover-color' ] != '' ) {
			$link_hover_style .= 'background-color: ' . $instance[ 'background-hover-color' ] . ' !important; ';
		}

		if ( $instance[ 'border-width' ] != '' ) {
			$link_style .= 'border-width: ' . ls_bw_main::add_length_unit( $instance[ 'border-width' ] ) . ' !important; border-style: solid; ';

			if ( $instance[ 'border-color' ] != '' ) {
				$link_style .= 'border-color: ' . $instance[ 'border-color' ] . ' !important; ';
			}

			if ( $instance[ 'border-hover-color' ] != '' ) {
				$link_hover_style .= 'border-color: ' . $instance[ 'border-hover-color' ] . ' !important; ';
			}
		}

		if ( $instance[ 'border-radius' ] != '' ) {
			$link_style .= 'border-radius: ' . ls_bw_main::add_length_unit( $instance[ 'border-radius' ] ) . ' !important; -webkit-border-radius: ' . ls_bw_main::add_length_unit( $instance[ 'border-radius' ] ) . ' !important; -moz-border-radius: ' . ls_bw_main::add_length_unit( $instance[ 'border-radius' ] ) . ' !important; ';
		}

		if ( $instance[ 'vertical-padding' ] != '' ) {
			$link_style .= 'padding-top: ' . ls_bw_main::add_length_unit( $instance[ 'vertical-padding' ] ) . ' !important; padding-bottom: ' . ls_bw_main::add_length_unit( $instance[ 'vertical-padding' ] ) . ' !important; ';
		}

		if ( $instance[ 'horizontal-padding' ] != '' ) {
			$link_style .= 'padding-left: ' . ls_bw_main::add_length_unit( $instance[ 'horizontal-padding' ] ) . ' !important; padding-right: ' . ls_bw_main::add_length_unit( $instance[ 'horizontal-padding' ] ) . ' !important; ';
		}

		if ( $div_style != '' ) {
			$div_style = '#ls-button-widget-' . esc_attr( $this->id ) . ' { ' . $div_style . '} ';
		}

		if ( $link_style != '' ) {
			$link_style = '#ls-button-widget-link-' . esc_attr( $this->id ) . ', #ls-button-widget-link-' . esc_attr( $this->id ) . ':link, #ls-button-widget-link-' . esc_attr( $this->id ) . ':active, #ls-button-widget-link-' . esc_attr( $this->id ) . ':visited { ' . $link_style . '} ';
		}

		if ( $link_hover_style != '' ) {
			$link_hover_style = '#ls-button-widget-link-' . esc_attr( $this->id ) . ':hover { ' . $link_hover_style . '} ';
		}

		$style .= $import_style . $div_style . $link_style . $link_hover_style;

		if ( $style != '' ) {
			wp_register_style( 'ls_bw_style_inline-' . $this->id, false );
			wp_enqueue_style( 'ls_bw_style_inline-' . $this->id );
			wp_add_inline_style( 'ls_bw_style_inline-' . $this->id, $style );
		}
	}

	function form_label( $key, $value ) {

		$html = '<label for="' . $this->get_field_id( $key ) . '">' . esc_html( __( $value[ 'label' ], 'ls-bw-text-domain' ) ) . '</label>';

		if ( isset( $value[ 'note' ] ) ) {
			$html .= '<br /><small>(' . esc_html( __( $value[ 'note' ], 'ls-bw-text-domain' ) ) . ')</small>';
		}

		return $html;

	}

	public function form( $instance ) {
		$instance = ls_bw_main::get_clean_instance_values( $instance );
		echo '<div class="ls-bw-form">';
		foreach ( ls_bw_main::$form_fields as $key => $value ) {
			echo '<p>';
			switch ( $value[ 'type' ] ) {
				case 'text':
					echo $this->form_label( $key, $value ) . '<input class="widefat ls-bw-form-text" id="' . $this->get_field_id( $key ) . '" name="' . $this->get_field_name( $key ) . '" type="text" value="' . esc_attr( $instance[ $key ] ) . '" />';
					break;
				case 'checkbox':
					echo '<input class="widefat ls-bw-form-checkbox" id="' . $this->get_field_id( $key ) . '" name="' . $this->get_field_name( $key ) . '" type="checkbox" value="yes" ' . checked( $instance[ $key ], 'yes', false ) . '/>' . $this->form_label( $key, $value );
					break;
				case 'select':
					echo $this->form_label( $key, $value ) . '<select class="widefat ls-bw-form-select" id="' . $this->get_field_id( $key ) . '" name="' . $this->get_field_name( $key ) . '">';
					$optgroup_open = false;
					foreach ( $value[ 'options' ] as $option_value => $option ) {
						if ( substr( $option_value, 0, strlen( '---group-' ) ) == '---group-' ) {
							if ( $optgroup_open ) {
								echo '</optgroup>';
							}
							echo '<optgroup label="' . esc_attr( $option ) . '">';
							$optgroup_open = true;
						} else {
							echo '<option value="' . esc_attr( $option_value ) . '" ' . selected( $instance[ $key ], $option_value, false ) . '>' . esc_html( $option ) . '</option>';
						}
					}
					if ( $optgroup_open ) {
						echo '</optgroup>';
					}
					echo '</select>';
					break;
				case 'pixels':
					echo $this->form_label( $key, $value ) . '<input class="widefat ls-bw-form-text" id="' . $this->get_field_id( $key ) . '" name="' . $this->get_field_name( $key ) . '" type="text" value="' . esc_attr( $instance[ $key ] ) . '" />';
					break;
				case 'color':
					echo $this->form_label( $key, $value ) . '<input class="widefat ls-bw-color-picker" id="' . $this->get_field_id( $key ) . '" name="' . $this->get_field_name( $key ) . '" type="text" value="' . esc_attr( $instance[ $key ] ) . '" />';
					break;
			}
			echo '</p>';
		}
		echo '</div>';
	}

	public function update( $new_instance, $old_instance ) {
		return ls_bw_main::get_clean_instance_values( $new_instance );
	}
}
