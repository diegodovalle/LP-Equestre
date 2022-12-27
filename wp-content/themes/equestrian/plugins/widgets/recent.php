<?php
/*
 * Plugin Name: Custom Recent Posts
 * Description: A widget that displays the latest tweets
 * Version: 1
 * Author: Radu Cretu
 * Author URI: http://raducretu.ro
 */

$prefix = THEMEPREFIX.'_recent_';

add_action( 'widgets_init', 'curly_recent_widget' );


function curly_recent_widget() {
	register_widget( 'recent_Widget' );
}

class recent_Widget extends WP_Widget {
	function recent_Widget() {
		$widget_ops = array( 'classname' => 'custom_recent_posts', 'description' => __('A widget that displays the recent posts', 'CURLYTHEME') );
		$this->WP_Widget( 'curly_recent_widget', __('Curly Themes: Recent Posts', 'CURLYTHEME'), $widget_ops);
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$limit = $instance['limit'];
		$picture = $instance['picture'];
		$exclude = $instance['exclude'];
		$cat = $instance['cat'];
		
		echo $before_widget;
		
		if ( $title ) echo $before_title . $title . $after_title;
			
		$args = array(
				'posts_per_page'  => $limit,
				'exclude'         => $exclude,
				'category'		  => $cat,
				'post_type'       => 'post'
				);
			
		$posts   = get_posts($args);
		
		$html 	 = '<ul class="recent-posts">';
			$count = 0;
			foreach( $posts as $post ){
				setup_postdata($post); $count++;
				
				if ($count%2 == 0) $css = 'recent-news-even'; else $css = 'recent-news-odd';
				
				$html .= '<li class="'.$css.' clearfix">';
				
				if($picture != 'none'){
					if(has_post_thumbnail($post->ID)){
					$html .= '<div class="flip-container pull-left"><div class="flipper"><div class="front">';
					$html .= '<time datetime="'.get_the_time( 'Y-m-d', $post->ID ).'"><span>'.get_the_time( 'd', $post->ID ).'</span><em>'.get_the_time( 'M' , $post->ID).'</em></time>';
					$html .= '</div><div class="back"><a href="'.get_permalink().'">';
					$html .= get_the_post_thumbnail($post->ID, $picture, array('class' => 'img-responsive')); 
					$html .= '</a></div></div></div>';
					} else {
						$html .= '<div class="flip-container pull-left"><time datetime="'.get_the_time( 'Y-m-d', $post->ID ).'"><span>'.get_the_time( 'd', $post->ID ).'</span><em>'.get_the_time( 'M' , $post->ID).'</em></time></div>';
					}
				}
				
				$html .= '<h6><a href="'.get_permalink($post->ID).'">'.get_the_title($post).'</a></h6>';
				$html .= '<span>'.get_the_category_list(' - ',null, $post->ID).'</span>';
				
				$html .= '</li>';
			}
			$html 	.= '</ul>';
		
		echo $html;	
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = strip_tags( $new_instance['limit'] );
		$instance['picture'] = strip_tags( $new_instance['picture'] );
		$instance['exclude'] = strip_tags( $new_instance['exclude'] );
		$instance['cat'] = strip_tags( $new_instance['cat'] );
	
		return $instance;
	}

	
	function form( $instance ) {
		$defaults = array(
			'title' => null,
			'limit' => null,
			'picture' => 'thumbnail',
			'exclude' => null,
			'cat' => null
		);

		//Set up some default widget settings.
		$instance = wp_parse_args( (array) $instance, $defaults); ?>
		<div class="widget-content">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:', 'CURLYTHEME'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
            </p>
			
            
            <p>
                <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e('Limit Posts:', 'CURLYTHEME'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" value="<?php echo $instance['limit']; ?>" class="widefat" />
            </p>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'picture' ); ?>"><?php _e('Thumbnail:', 'CURLYTHEME'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'picture' ); ?>" name="<?php echo $this->get_field_name( 'picture' ); ?>">
                	<option <?php echo ($instance['picture'] == 'none') ? 'selected="selected"' : null; ?> value="none">no thumbnail</option>
                    <option <?php echo ($instance['picture'] == 'thumbnail') ? 'selected="selected"' : null; ?> value="thumbnail">square thumbnail</option>
                    <option <?php echo ($instance['picture'] == 'medium') ? 'selected="selected"' : null; ?> value="medium">fullwidth</option>
                </select>
                
            </p>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php _e('Exclude Posts:', 'CURLYTHEME'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" value="<?php echo $instance['exclude']; ?>" class="widefat" />
                <small>Comma separated ID's you want to exclude</small>
            </p>
            
            <p>
                <label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e('Choose Categories:', 'CURLYTHEME'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" value="<?php echo $instance['cat']; ?>" class="widefat" />
                <small>Comma separated ID's you want to include</small>
            </p>
            
		</div> 

	<?php
	}
}
?>