<?php
/**
 * Plugin name: Demo module for Divi 3
 * Author:      Philipp Stracker
 * Description: This file contains 2 unfinished custom modules for Divi 3, to illustrate and test the changes in the frontend-builder.
 */

add_action( 'et_builder_ready', 'evr_initialize_divi_modules' );

function evr_initialize_divi_modules() {
	if ( ! class_exists( 'ET_Builder_Module' ) ) { return; }

	class EVR_Builder_Module_Testimonial extends ET_Builder_Module {
		function init() {
			$this->name       = esc_html__( 'Testimonial', 'evr' );
			$this->slug       = 'evr_pb_testimonial';
			$this->fb_support = true;

			$this->whitelisted_fields = array(
				'id',
				'layout',
				'admin_label',
				'module_id',
				'module_class',
			);

			$this->fields_defaults = array(
				'layout'    => array( 'light' ),
			);

			$this->main_css_element = '%%order_class%%.evr_pb_testimonial';
			$this->advanced_options = array(
				'fonts' => array(
					'text' => array(
						'label'    => esc_html__( 'Text', 'evr' ),
						'line_height' => array(
							'range_settings' => array(
								'min'  => '1',
								'max'  => '100',
								'step' => '1',
							),
						),
					),
				),
				'background' => array(
					'use_background_color' => false,
				),
				'custom_margin_padding' => array(
					'css' => array(
						'important' => 'all',
					),
				),
			);
			$this->custom_css_options = array();

			// Custom handler: Output JS for editor preview in page footer.
			add_action( 'wp_footer', array( $this, 'js_frontend_preview' ) );
		}

		function get_fields() {
			$fields = array(
				'id' => array(
					'label'           => esc_html__( 'Testimonial ID', 'evr' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'description'     => esc_html__( 'Enter the ID of the testimonial to display.', 'evr' ),
				),
				'layout' => array(
					'label'           => esc_html__( 'Layout', 'evr' ),
					'type'            => 'select',
					'option_category' => 'basic_option',
					'options'         => array(
						'light' => esc_html__( 'Light', 'evr' ),
						'bold'  => esc_html__( 'Bold', 'evr' ),
						'widget'  => esc_html__( 'Widget', 'evr' ),
					),
					'description' => esc_html__( 'Here you can choose the design that you want to use to display the testimonial.', 'evr' ),
				),
				'disabled_on' => array(
					'label'           => esc_html__( 'Disable on', 'evr' ),
					'type'            => 'multiple_checkboxes',
					'options'         => array(
						'phone'   => esc_html__( 'Phone', 'evr' ),
						'tablet'  => esc_html__( 'Tablet', 'evr' ),
						'desktop' => esc_html__( 'Desktop', 'evr' ),
					),
					'additional_att'  => 'disable_on',
					'option_category' => 'configuration',
					'description'     => esc_html__( 'This will disable the module on selected devices', 'evr' ),
				),
				'admin_label' => array(
					'label'       => esc_html__( 'Admin Label', 'evr' ),
					'type'        => 'text',
					'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'evr' ),
				),
				'module_id' => array(
					'label'           => esc_html__( 'CSS ID', 'evr' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'option_class'    => 'et_pb_custom_css_regular',
				),
				'module_class' => array(
					'label'           => esc_html__( 'CSS Class', 'evr' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'option_class'    => 'et_pb_custom_css_regular',
				),
			);
			return $fields;
		}

		function shortcode_callback( $atts, $content = null, $function_name ) {
			$module_id            = $this->shortcode_atts['module_id'];
			$module_class         = $this->shortcode_atts['module_class'];
			$id                   = $this->shortcode_atts['id'];
			$layout                = $this->shortcode_atts['layout'];

			$module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

			$module_id = '' !== $module_id ? sprintf( ' id="%s"', esc_attr( $module_id ) ) : '';
			$module_class = '' !== $module_class ? sprintf( ' %s', esc_attr( $module_class ) ) : '';

			$layout = sprintf( ' evr_layout_%s', esc_attr( $layout ) );
			$content = 'Testimonial #' . $id; // TODO: Fetch the item from DB and prepare HTML for output.

			$output = sprintf(
				'<div%1$s class="et_pb_module evr_pb_testimonial%2$s%3$s"%4$s>
					%4$s
				</div>',
				$module_id,
				$layout,
				$module_class,
				$content
			);

			return $output;
		}

		// This is a non-standard function. It outputs JS code to render the
		// module preview in the new Divi 3 frontend editor.
		// Return value of the JS function must be full HTML code to display.
		function js_frontend_preview() {
			?><script>
			window.<?php echo $this->slug; ?>_preview = function(args) {
				var layout = 'evr_layout_' + args.layout;
				return '<div class="' + layout + '">Testimonial ' + args.id + '</div>';
			}
			</script><?php
		}
	}
	new EVR_Builder_Module_Testimonial;

	// ----------

	class EVR_Builder_Module_TestimonialSlider extends ET_Builder_Module {
		function init() {
			$this->name       = esc_html__( 'Testimonial Slider', 'evr' );
			$this->slug       = 'evr_pb_testimonial_slider';
			$this->fb_support = true;

			$this->whitelisted_fields = array(
				'tag',
				'delay',
				'layout',
				'admin_label',
				'module_id',
				'module_class',
			);

			$this->fields_defaults = array(
				'delay'    => array( '8' ),
				'layout'    => array( 'light' ),
			);

			$this->main_css_element = '%%order_class%%.evr_pb_testimonial';
			$this->advanced_options = array(
				'fonts' => array(
					'text' => array(
						'label'    => esc_html__( 'Text', 'evr' ),
						'line_height' => array(
							'range_settings' => array(
								'min'  => '1',
								'max'  => '100',
								'step' => '1',
							),
						),
					),
				),
				'background' => array(
					'use_background_color' => false,
				),
				'custom_margin_padding' => array(
					'css' => array(
						'important' => 'all',
					),
				),
			);
			$this->custom_css_options = array();
		}

		function get_fields() {
			$fields = array(
				'tag' => array(
					'label'           => esc_html__( 'Testimonial category', 'evr' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'description'     => esc_html__( 'Enter the category of the testimonials. All available items will be displayed in the slider.', 'evr' ),
				),
				'delay' => array(
					'label'           => esc_html__( 'Slider delay (s)', 'evr' ),
					'type'            => 'text',
					'option_category' => 'basic_option',
					'description'     => esc_html__( 'Choose how long each testimonial should stay visible before the next is shown.', 'evr' ),
				),
				'layout' => array(
					'label'           => esc_html__( 'Layout', 'evr' ),
					'type'            => 'select',
					'option_category' => 'basic_option',
					'options'         => array(
						'light' => esc_html__( 'Light', 'evr' ),
						'bold'  => esc_html__( 'Bold', 'evr' ),
						'widget'  => esc_html__( 'Widget', 'evr' ),
					),
					'description' => esc_html__( 'Here you can choose the design that you want to use to display the testimonial.', 'evr' ),
				),
				'disabled_on' => array(
					'label'           => esc_html__( 'Disable on', 'evr' ),
					'type'            => 'multiple_checkboxes',
					'options'         => array(
						'phone'   => esc_html__( 'Phone', 'evr' ),
						'tablet'  => esc_html__( 'Tablet', 'evr' ),
						'desktop' => esc_html__( 'Desktop', 'evr' ),
					),
					'additional_att'  => 'disable_on',
					'option_category' => 'configuration',
					'description'     => esc_html__( 'This will disable the module on selected devices', 'evr' ),
				),
				'admin_label' => array(
					'label'       => esc_html__( 'Admin Label', 'evr' ),
					'type'        => 'text',
					'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'evr' ),
				),
				'module_id' => array(
					'label'           => esc_html__( 'CSS ID', 'evr' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'option_class'    => 'et_pb_custom_css_regular',
				),
				'module_class' => array(
					'label'           => esc_html__( 'CSS Class', 'evr' ),
					'type'            => 'text',
					'option_category' => 'configuration',
					'tab_slug'        => 'custom_css',
					'option_class'    => 'et_pb_custom_css_regular',
				),
			);
			return $fields;
		}

		function shortcode_callback( $atts, $content = null, $function_name ) {
			$module_id            = $this->shortcode_atts['module_id'];
			$module_class         = $this->shortcode_atts['module_class'];
			$tag                  = $this->shortcode_atts['tag'];
			$layout               = $this->shortcode_atts['layout'];

			$module_class = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

			$module_id = '' !== $module_id ? sprintf( ' id="%s"', esc_attr( $module_id ) ) : '';
			$module_class = '' !== $module_class ? sprintf( ' %s', esc_attr( $module_class ) ) : '';

			$layout = sprintf( ' evr_layout_%s', esc_attr( $layout ) );
			$content = 'Slider with random testimonials with tag' . $tag; // TODO: Fetch the items from DB and prepare HTML for output.

			$output = sprintf(
				'<div%1$s class="et_pb_module evr_pb_testimonial%2$s%3$s"%4$s>
					%4$s
				</div>',
				$module_id,
				$layout,
				$module_class,
				$content
			);

			return $output;
		}
	}
	new EVR_Builder_Module_TestimonialSlider;
}
