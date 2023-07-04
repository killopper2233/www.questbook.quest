<div class="wp-block wp-block-kubio-query-layout  position-relative wp-block-kubio-query-layout__outer ketos-index__k__1MCYzfcZN-outer ketos-local-742-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/query-layout" id="blog-layout">
	<div class="position-relative wp-block-kubio-query-layout__inner ketos-index__k__1MCYzfcZN-inner ketos-local-742-inner h-section-grid-container h-section-boxed-container">
		<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container ketos-index__k__baLWB4dRKjp-container ketos-local-743-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner ketos-index__k__baLWB4dRKjp-inner ketos-local-743-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-0 gutters-col-v-0">
				<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container ketos-index__k__kxeqsSpdy-n-container ketos-local-744-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner ketos-index__k__kxeqsSpdy-n-inner ketos-local-744-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-2 h-px-md-2 v-inner-md-2 h-px-2 v-inner-2">
						<div class="position-relative wp-block-kubio-column__align ketos-index__k__kxeqsSpdy-n-align ketos-local-744-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
							<div class="wp-block wp-block-kubio-query  position-relative wp-block-kubio-query__container ketos-index__k__CtKC_EuIZL-container ketos-local-745-container" data-kubio="kubio/query">
								<div class="wp-block wp-block-kubio-query-loop  position-relative wp-block-kubio-query-loop__container ketos-index__k__vrf0UGkWrN-container ketos-local-746-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-0 gutters-row-v-0" data-kubio="kubio/query-loop" data-kubio-component="masonry" data-kubio-settings="{&quot;enabled&quot;:true,&quot;targetSelector&quot;:&quot;.wp-block-kubio-query-loop__inner&quot;}">
									<div class="position-relative wp-block-kubio-query-loop__inner ketos-index__k__vrf0UGkWrN-inner ketos-local-746-inner h-row">
										<?php ketos_theme()->get('archive-loop')->render(array (
  'view' => 'content/index/loop-item',
)); ?>
									</div>
								</div>
								<?php if(ketos_has_pagination()): ?>
								<div class="wp-block wp-block-kubio-query-pagination  position-relative wp-block-kubio-query-pagination__container ketos-index__k__vD7AVCTELY-container ketos-local-757-container gutters-row-lg-0 gutters-row-v-lg-2 gutters-row-md-2 gutters-row-v-md-2 gutters-row-0 gutters-row-v-2" data-kubio="kubio/query-pagination">
									<div class="position-relative wp-block-kubio-query-pagination__inner ketos-index__k__vD7AVCTELY-inner ketos-local-757-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-2 gutters-col-md-2 gutters-col-v-md-2 gutters-col-0 gutters-col-v-2">
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container ketos-index__k__tBYU0uM8Xx-container ketos-local-758-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner ketos-index__k__tBYU0uM8Xx-inner ketos-local-758-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align ketos-index__k__tBYU0uM8Xx-align ketos-local-758-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
													<?php if(ketos_has_pagination_button(true)): ?>
													<div class="position-relative wp-block-kubio-pagination-nav-button__spacing ketos-index__k__ELgmeRXRD--spacing ketos-local-759-spacing">
														<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer ketos-index__k__ELgmeRXRD--outer ketos-local-759-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
															<a class="position-relative wp-block-kubio-pagination-nav-button__link ketos-index__k__ELgmeRXRD--link ketos-local-759-link h-w-100 h-global-transition" href="<?php ketos_get_navigation_button_link(true); ?>">
																<span class="position-relative wp-block-kubio-pagination-nav-button__text ketos-index__k__ELgmeRXRD--text ketos-local-759-text kubio-inherit-typography">
																	<?php esc_html_e('Prev', 'ketos'); ?>
																</span>
															</a>
														</span>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container ketos-index__k__P2OarhUKUK-container ketos-local-760-container d-flex h-col-lg h-col-md h-col" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner ketos-index__k__P2OarhUKUK-inner ketos-local-760-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-2 h-px-md-2 v-inner-md-2 h-px-1 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align ketos-index__k__P2OarhUKUK-align ketos-local-760-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
													<div class="wp-block wp-block-kubio-pagination-numbers  position-relative wp-block-kubio-pagination-numbers__outer ketos-index__k__tRiQFlrj8q-outer ketos-local-761-outer" data-kubio="kubio/pagination-numbers">
														<?php ketos_pagination_numbers(); ?>
													</div>
												</div>
											</div>
										</div>
										<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container ketos-index__k__2nd5yuWmz9-container ketos-local-762-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
											<div class="position-relative wp-block-kubio-column__inner ketos-index__k__2nd5yuWmz9-inner ketos-local-762-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-0 v-inner-2">
												<div class="position-relative wp-block-kubio-column__align ketos-index__k__2nd5yuWmz9-align ketos-local-762-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
													<?php if(ketos_has_pagination_button()): ?>
													<div class="position-relative wp-block-kubio-pagination-nav-button__spacing ketos-index__k__ACSe8L2gsX-spacing ketos-local-763-spacing">
														<span class="wp-block wp-block-kubio-pagination-nav-button  position-relative wp-block-kubio-pagination-nav-button__outer ketos-index__k__ACSe8L2gsX-outer ketos-local-763-outer kubio-button-container" data-kubio="kubio/pagination-nav-button">
															<a class="position-relative wp-block-kubio-pagination-nav-button__link ketos-index__k__ACSe8L2gsX-link ketos-local-763-link h-w-100 h-global-transition" href="<?php ketos_get_navigation_button_link(); ?>">
																<span class="position-relative wp-block-kubio-pagination-nav-button__text ketos-index__k__ACSe8L2gsX-text ketos-local-763-text kubio-inherit-typography">
																	<?php esc_html_e('Next', 'ketos'); ?>
																</span>
															</a>
														</span>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
