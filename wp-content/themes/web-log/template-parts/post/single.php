<?php
/**
 * Template part for displaying posts
 * @package web-log
 * @version 1.0.0
 */

  $breadcrumb_type = web_log_get_option( 'web_log_breadcrumb_setting_option' );
 $enable_breadcrumb = web_log_get_option( 'web-log-extra-breadcrumb' );

 if (1 == $enable_breadcrumb) {

	    if(  $breadcrumb_type == 'simple' )
	
	  { ?>
	  	
	  	 <div class="header-breadcrumb">
            <?php web_log_breadcrumb_trail(); ?>
        </div>
	  
	  <?php }
	   elseif ( (function_exists('bcn_display')) && ($breadcrumb_type=="advanced")) {
        ?>
        	<div class="header-breadcrumb">
            
             <?php  bcn_display(); ?>
           
            </div>

	    <?php  
	   }

	 elseif ( function_exists('rank_math_the_breadcrumbs') && ( $breadcrumb_type=="rank-math")) { ?>

            <div class="header-breadcrumb">
            
             <?php   rank_math_the_breadcrumbs(); ?>
           
            </div>

	<?php  }

	elseif ( (function_exists('yoast_breadcrumb')) && ($breadcrumb_type=="yoast-seo")) { ?>
    	
    		<div class="header-breadcrumb">
            
             <?php    yoast_breadcrumb(); ?>
           
            </div>

	  
<?php	}

}


 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		
		<header class="entry-header">
		
		   <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
        	<ul class="entry-meta list-inline">
                
				<?php web_log_posted_on(); ?>
				
				
				<?php	if(!get_theme_mod('post_categories')) :?>
                
				<?php if( has_category()):
                        echo '<li class="meta-categories list-inline-item"><i class="fa fa-folder-o" aria-hidden="true"></i>';
                            the_category( ',' );
                        echo '</li>';
				endif; ?>
                
				<?php endif; ?>
				
				
				<?php	if(!get_theme_mod('article_comment_link')) :?>
				
				<li class="meta-comment list-inline-item">
                    <?php $cmt_link = get_comments_link(); 
						  $num_comments = get_comments_number();
							if ( $num_comments == 0 ) {
								$web_log_comment = __( 'No Comments', 'web-log' );
							} elseif ( $num_comments > 1 ) {
								$web_log_comment = $num_comments . __( ' Comments', 'web-log' );
							} else {
								$web_log_comment = __('1 Comment', 'web-log' );
							}
					?>	
					<i class="fa fa-comment-o" aria-hidden="true"></i>
                    <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $web_log_comment );?></a>
                </li>
					<?php endif; ?>
                
			</ul>
        
        </header><!-- .entry-header -->
        
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                
                <?php the_post_thumbnail('full'); ?>
                  <?php
	                if (has_post_thumbnail()):
	                    if ($image_caption = get_post(get_post_thumbnail_id())->post_excerpt):
	                        if (trim($image_caption) !== ''):
	                            ?>
	                            <span class="tm_image-caption">
	                                <p>
	                                    <?php echo esc_html($image_caption); ?>
	                                </p>
	                            </span>
	                        <?php
	                        endif;
	                    endif;
	                endif;
                ?>
            </div>
		<?php endif; ?>
        
        <div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		
		<?php	if(!get_theme_mod('article_tags') && has_tag()) :?>
        
        <div class="entry-footer">
		
		<div class="meta-left">
			
		<?php if(has_tag()): ?>
			<div class="tag-list"><?php the_tags( '<i class="fa fa-tags" aria-hidden="true"></i>'); ?></div>
		<?php endif; ?>
		
		</div>
			
        </div>
     <?php endif; ?>
	</div>
</article><!-- #post-## -->

