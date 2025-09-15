<?php

class WP2025_ProductCategories extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'wp2025_product_categories',  // Base ID
			'[WP2025] ProductCategories',   // Name
            [
                'description' => __('Hiển thị danh mục sản phẩm', 'wp2025-theme')
            ]
		);
	}


	public function widget( $args, $instance ) {
		global $themes_uri;
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $limit = $instance['limit'];
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		ob_start();
		$args = [
			'taxonomy' => 'product_cat',
			'hide_empty' => false
		];
		$terms = get_terms($args);
        ?>
        <ul>
			<?php foreach($terms as $terms) : ?>
                <li><a href="<?= get_term_link($term); ?>"><?= $term->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php
		echo ob_get_clean();
		echo $after_widget;
	}

	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'wp2025-theme' );
		}

        $limit = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		 </p>
		<p>
			<label for="<?php echo $this->get_field_name( 'limit' ); ?>"><?php _e( 'Limit:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>" />
		 </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		return $instance;
	}
}

new WP2025_ProductCategories();