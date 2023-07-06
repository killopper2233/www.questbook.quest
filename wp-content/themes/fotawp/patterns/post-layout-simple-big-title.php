<?php
 /**
  * Title: Post simple big title layout
  * Slug: fotawp/post-layout-simple-big-title
  * Categories: fotawp, posts
  */
  ?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|40","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1000px","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"left","level":6,"style":{"spacing":{"margin":{"bottom":"0","top":"0","right":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"lineHeight":1}}} -->
<h6 class="wp-block-heading has-text-align-left" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;line-height:1">BLOG</h6>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"left","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"}},"typography":{"lineHeight":"1"}}} -->
<h1 class="wp-block-heading has-text-align-left" style="margin-bottom:var(--wp--preset--spacing--70);line-height:1">Latest Posts and Articles</h1>
<!-- /wp:heading -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"backgroundColor":"background","textColor":"heading-color","layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group alignfull has-heading-color-color has-background-background-color has-text-color has-background has-link-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:query {"queryId":47,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:separator {"opacity":"css","style":{"color":{"background":"#ffffff"}},"className":"alignwide is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-css-opacity has-background alignwide is-style-wide" style="background-color:#ffffff;color:#ffffff"/>
<!-- /wp:separator -->

<!-- wp:columns {"verticalAlignment":"center","align":"wide","textColor":"heading-color"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center has-heading-color-color has-text-color"><!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:post-date {"textColor":"foreground","fontSize":"extra-small"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"80%","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|40","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40);flex-basis:80%"><!-- wp:post-title {"isLink":true,"style":{"typography":{"lineHeight":1},"color":{"text":"#ffffff","link":"#ffffff"}},"className":"is-style-title-hover-secondary-color","fontSize":"xxxx-large"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->