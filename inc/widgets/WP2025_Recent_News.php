<?php
class WP2025_Recent_News extends WP_Widget {
    public function __construct() {
		// actual widget processes
        parent::__construct(
			'wp2025_recent_news', // Base ID
			'WP2025_Recent_News', // Name
			[
                'description' => __( 'Widget hiển thị các bài viết mới nhất', 'wp2025-theme' )
            ] // Args
		);
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
        extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
        $limit = isset( $instance['limit'] ) ? $instance['limit'] : 5;
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		$args = [
			'post_type' => 'post',
			'numberposts' => $limit
		];
		$posts = get_posts($args);
		ob_start();
		?>
		<div class="blog__sidebar__recent">
			<?php if(count($posts)) : ?>
				<?php foreach($posts as $post) : ?>
					<a href="<?= get_the_permalink($post->ID); ?>" class="blog__sidebar__recent__item">
						<div class="blog__sidebar__recent__item__pic">
							<?= get_the_post_thumbnail($post->ID, [70,70]); ?>
						</div>
						<div class="blog__sidebar__recent__item__text">
							<h6><?= get_the_title($post->ID); ?></h6>
							<span><?= get_the_date('', $post->ID); ?></span>
						</div>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php
		echo ob_get_clean();
		echo $after_widget;
	}

	public function form( $instance ) {
		// outputs the options form in the admin
        $title = isset( $instance['title'] ) ? $instance['title'] : __( 'New title', 'wp2025-theme' );
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
		// processes widget options to be saved
        $instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : '';
		return $instance;
	}
}

new WP2025_Recent_News();