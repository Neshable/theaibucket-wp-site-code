<?php
/** Shared card for directory, search, taxonomy, homepage and related-tool loops. */
get_template_part( 'template-parts/components/tool-summary-card', null, array( 'post_id' => get_the_ID() ) );
