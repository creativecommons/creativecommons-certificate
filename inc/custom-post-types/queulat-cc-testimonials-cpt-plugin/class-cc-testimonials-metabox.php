<?php

use Queulat\Metabox;
use Queulat\Forms\Node_Factory;
use Queulat\Forms\Element\Input_Url;
use Queulat\Forms\Element\WP_Editor;
use Queulat\Forms\Element\Input_Text;
use Queulat\Forms\Element\Select;

class Testimonial_Metabox extends Metabox {
		public function __contestimonials($id = '', $title = '', $post_type = '', array $args = array())
		{
				parent::__construct($id, $title, $post_type, $args);
				add_action("{$this->get_id()}_metabox_data_updated", [$this, 'data_updated'], 10, 2);
		}
		public function get_fields(): array
		{
			return [
				Node_Factory::make(
								Input_Text::class,
								[
										'name' => 'location',
										'label' => 'Location',
										'attributes' => [
												'class'    => 'regular-text',
												'required' => 'required'
										]
								]
						),
						Node_Factory::make(
							WP_Editor::class,
							[
								'name'       => 'description',
								'label'      => 'User description',
								'value'      => ( ! empty( $data['description'] ) ) ? $data['description'] : '',
								'attributes' => [
									'class' => 'widefat',
								],
								'properties' => [
									'media_buttons'    => true,
									'drag_drop_upload' => false,
									'textarea_rows'    => 5,
								],
							]
						)
				];
		}
		public function sanitize_data(array $data): array
		{
			$sanitized = [];
			foreach ($data as $key => $val) {
				switch ($key) {
					case 'description':
					case 'location':
						$sanitized[$key] = sanitize_text_field($val);
						break;
				}
			}
			return $sanitized;
		}
}

new Testimonial_Metabox('testimonial', 'Testimonial related data', 'cc_testimonials', ['context' => 'normal']);
