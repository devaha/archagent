<?php
/*
Template Name: Resources Main Tempalte
*/
?>

<?php get_header(); ?>

			<main id="content" class="full">

			<?php // Hero Image & Main CTA ?>
				<section id="resources-container" class="semi">
					<header class="full">
						<h2 class="tiny-twelvecol small-twelvecol medium-threecol large-threecol first"><?php the_field('resources_header'); ?></h2>
						
					</header>
					<div id="resources-categories" class="full">


						<?php 

						$posts = get_field('resources_grid');

						if( $posts ): ?>
						    <ul>
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <?php $categories = get_the_category($p->ID); $catname = $categories[0]->cat_name; ?>
						        
						        <?php if( $catname == 'News' ): ?>
							        <li style="border-left: 2px solid #2783ae;";>
							           <h5><?php echo get_the_title( $p->ID ); ?></h5>
							           <p><?php echo get_the_excerpt( $p->ID ); ?></p>
							           <div class="category-flag" style="background-color: #2783ae;"><?php echo $catname;?></div>
							        </li>
							    <?php elseif( $catname == 'Resources' ): ?>
							        <li style="border-left: 2px solid #f7941d;">
							           <h5><?php echo get_the_title( $p->ID ); ?></h5>
							           <p><?php echo get_the_excerpt( $p->ID ); ?></p>
							           <div class="category-flag" style="background-color: #f7941d;"><?php echo $catname;?></div>
							        </li>

							     <?php elseif( $catname == 'FAQs' ): ?>
							        <li style="border-left: 2px solid #45aa47;">
							           <h5><?php echo get_the_title( $p->ID ); ?></h5>
							           <p><?php echo get_the_excerpt( $p->ID ); ?></p>
							           <div class="category-flag" style="background-color: #45aa47;"><?php echo $catname;?></div>
							        </li>
							    <?php endif; ?>

						    <?php endforeach; ?>
						    </ul>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
						
						</div>
				</section>

			</main>

<?php get_footer(); ?>
