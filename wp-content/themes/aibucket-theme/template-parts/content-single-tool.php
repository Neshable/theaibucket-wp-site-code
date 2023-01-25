<section class="py-12">
<?php $website_url = get_field( 'website_url' ); ?>
		<div class="w-full max-w-6xl mx-auto sm:px-6  relative space-y-8 md:space-y-24">
	<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<div class="prose prose-lg">
				<header class="entry-header mb-4">
					<?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-4"><a href="%s" rel="bookmark">', esc_url( $website_url ) ), '</a></h1>' ); ?>
					
					<?php get_template_part( 'template-parts/elements/rating', 'stars' ); ?>
					
					<div class="mt-2 inline-flex items-center bg-gray-200 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-600">           
						<span class="ml-4 text-sm font-semibold">Added on <?php echo get_the_date(); ?></span>
					</div>
					
				</header>
				<?php the_excerpt(); ?>
				</div>
				<div>
					<div>
						<?php the_post_thumbnail( 'full' ); ?>
						<!-- <img loading="lazy" width="1920" height="1080" src="https://ploi.io/images/screenshots/teams/team-1.jpg" alt="Work together" class="shadow-lg"> -->
					</div>
				</div>
			</div>


			<footer class="flex mx-auto items-center max-w-4xl justify-center mt-12">
				<a class="inline-flex items-center w-full justify-center px-4 text-sm font-bold tracking-tight text-white transition bg-blue-600 rounded-lg shadow h-9 hover:bg-blue-500 focus:bg-blue-700 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-20 focus:outline-none" href="<?php echo $website_url; ?>">
				<span><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" color="white" style="color:white" height="22" width="22" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5"></path><line x1="10" y1="14" x2="20" y2="4"></line><polyline points="15 4 20 4 20 9"></polyline></svg>
				  </span>    
				Check the tool
					
				</a>
			</footer>

			<div class="grid grid-cols-1 md:grid-cols-1 gap-6">
				<?php the_content(); ?>
			</div>
<!-- 
			<footer class="flex items-center justify-center mt-12">
				<a class="inline-flex items-center justify-center px-4 text-sm font-bold tracking-tight text-white transition bg-blue-600 rounded-lg shadow h-9 hover:bg-blue-500 focus:bg-blue-700 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-20 focus:outline-none" href="<?php // echo $website_url; ?>">
				<span><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" color="white" style="color:white" height="22" width="22" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5"></path><line x1="10" y1="14" x2="20" y2="4"></line><polyline points="15 4 20 4 20 9"></polyline></svg>
				  </span>    
				Check the tool
					
				</a>
			</footer> -->

			
</div>
	</section>
