<?php

class WP2025_ProductFilterPrice extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'wp2025_product_filter_price',  // Base ID
			'[WP2025] Product Filter Price',   // Name
            [
                'description' => __('Lọc giá sản phẩm', 'wp2025-theme')
            ]
		);
	}


	public function widget( $args, $instance ) {
		global $themes_uri, $wpdb;
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $limit = $instance['limit'];
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		$sql = "SELECT min(meta_value) as min_price, max(meta_value) as max_price FROM $wpdb->postmeta 
		JOIN $wpdb->posts ON {$wpdb->postmeta}.post_id = {$wpdb->posts}.ID
		WHERE {$wpdb->posts}.post_status = 'publish' AND {$wpdb->posts}.post_type = 'product' AND {$wpdb->postmeta}.meta_key = 'product_price'";
		$row = $wpdb->get_row($sql);
		$minPrice = $row->min_price / 1000;
		$maxPrice = $row->max_price / 1000;

		ob_start();
        ?>
		<div class="price-range-wrap">
			<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
				data-min="<?= $minPrice; ?>" data-max="<?= $maxPrice; ?>">
				<div class="ui-slider-range ui-corner-all ui-widget-header"></div>
				<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
				<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
			</div>
			<div class="range-slider">
				<div class="price-input">
					<input type="text" id="minamount">
					<input type="text" id="maxamount">
				</div>
			</div>
        </div>
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
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		return $instance;
	}
}

new WP2025_ProductFilterPrice();