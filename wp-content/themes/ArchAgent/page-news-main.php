<?php
/*
Template Name: News Main Tempalte
*/
?>

<?php get_header(); ?>

			<main id="content" class="full">

			<?php // Hero Image & Main CTA ?>
				<section id="news-container" class="semi">
					<header class="full">
						<h2 class="tiny-twelvecol small-twelvecol medium-threecol large-threecol first"><?php the_field('news_header'); ?></h2>
						
					</header>
					<div id="news-categories" class="tiny-twelvecol small-twelvecol medium-eightcol large-eightcol first">

						<?php 

						$posts = get_field('news_grid');

						if( $posts ): ?>
						    <ul>
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <?php $categories = get_the_category($p->ID); $catname = $categories[0]->cat_name; ?>
						        
						        <?php if( $catname == 'News' ): ?>
							        <li>
							           <h4><?php echo get_the_title( $p->ID ); ?></h4>
							           <h7><?php echo get_the_date( $p->ID ); ?></h7>
							           <p><?php echo get_the_excerpt( $p->ID ); ?></p>
							        </li>
							    <?php endif; ?>

						    <?php endforeach; ?>
						    </ul>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
						</div>

						<div id="news-sidebar" class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol last">
							<div class="news-sidebar-section">
								<h4>Recent News Posts</h4>
								<ul>
									<li>ArchAgent Assists Keller Williams Maps</li>
									<li>Data Retention Increased for 800 Powerline Capture</li>
									<li>Search Functionality Expanded for Powerdialer</li>
								</ul>
							</div>
							<div class="news-sidebar-section">
								<h4>News Categories</h4>
								<ul>
									<li>Sample Category 1</li>
									<li>Sample Category 2</li>
									<li>Sample Category 3</li>
									<li>Sample Category 4</li>
								</ul>
							</div>
							<div class="news-sidebar-section">
								<h4>News Archives</h4>
								<ul>
									<li>May 2015</li>
								</ul>
							</div>
						</div>

				</section>

			</main>

<?php get_footer(); ?>
