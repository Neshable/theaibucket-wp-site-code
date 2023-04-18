<?php
/*
*
*   Archive post content
*
*/

if( has_post_thumbnail() ) {
	$post_featured_image_url = get_the_post_thumbnail_url();
} else {
	$post_featured_image_url = '';
}

?>

<div class="grid grid-cols-12 gap-0 pr-3 sm:gap-3 sm:grid-cols-5 sm:px-4 md:gap-6 md:px-0">
   <div class="relative flex flex-col col-span-3 sm:col-span-1 items-center text-sm mb-4 font-medium text-center text-gray-500 top-[calc(50%-1.625rem)] px-0 sm:px-6 md:px-0">
      <div class="flex flex-col items-center justify-between space-y-2 h-14 md:h-10">
         <div class="flex flex-col w-full sm:flex-row">
            <span class="whitespace-nowrap"><?php echo get_the_date(); ?></span>
         </div>
       
      </div>
   </div>
   <div class="col-span-9 sm:col-span-4 sm:pr-10">
      <a href="<?php echo the_permalink(); ?>">
         <div class="panel shadow dark:border-t dark:border-gray-850 rounded-xl flex flex-wrap bg-white relative flex-col w-full px-8 py-5 mt-6 text-left" style="" x-ref="post0">
            <div class="space-x-1.5">
            </div>
            <h5 class="!mt-2 font-medium text-[15px]"><?php echo get_the_title(); ?></h5>
            <p class="!mt-1 text-sm"><?php echo get_the_excerpt(); ?></p>
            <div class="flex items-center space-x-1.5 group font-semibold uppercase cursor-pointer text-primary hover:text-primary-light text-xs md:text-sm mt-2">
               <span>Read more</span>
               <svg viewBox="0 0 14 12" class="inline-block w-2.5 group-hover:translate-x-0.5 transition duration-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.51321 6L0 1.48679L1.48679 0L7.48679 6L1.48679 12L0 10.5132L4.51321 6Z"></path>
                  <path d="M10.8211 6L6.30792 1.48679L7.79471 0L13.7947 6L7.79471 12L6.30792 10.5132L10.8211 6Z"></path>
               </svg>
            </div>
         </div>
      </a>
   </div>
</div>