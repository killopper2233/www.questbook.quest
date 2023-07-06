<?php
 /**
  * Title: Hero Section Slider
  * Slug: fotawp/hero-section-slider
  * Categories: fotawp
  */
  ?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:query {"queryId":6,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"},"className":"fotawp-banner-slider fotawp-swiper-holder swiper-container"} -->
<div class="wp-block-query fotawp-banner-slider fotawp-swiper-holder swiper-container"><!-- wp:post-template {"className":"swiper-wrapper"} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"isDark":false} -->
<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} /-->

<!-- wp:post-date {"textColor":"background"} /--></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template -->

<!-- wp:html -->
<div class="fotawp-slide-pagination"></div>
<!-- /wp:html -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->