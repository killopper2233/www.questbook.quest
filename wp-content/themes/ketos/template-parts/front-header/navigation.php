<?php $component = \ColibriWP\Theme\View::getData( 'component' ); ?>
<div class="wp-block wp-block-kubio-navigation  position-relative wp-block-kubio-navigation__outer <?php echo $component->printNavigationClasses(); ?> ketos-front-header__k__Gp3qTlxXlu-outer ketos-local-137-outer h-navigation_overlap" data-kubio="kubio/navigation" data-kubio-component="overlap" data-kubio-settings="true" id="navigation">
	<?php ketos_theme()->get('front-top-bar')->render(); ?>
	<div class="wp-block wp-block-kubio-navigation-section <?php echo $component->printNavLayoutType(); ?> position-relative wp-block-kubio-navigation-section__nav ketos-front-header__k__xLwdIMLPC_l-nav ketos-local-178-nav h-section h-navigation" data-kubio="kubio/navigation-section" data-kubio-component="navigation" data-kubio-settings="{&quot;sticky&quot;:false,&quot;overlap&quot;:true}">
		<div class="position-relative wp-block-kubio-navigation-section__nav-section ketos-front-header__k__xLwdIMLPC_l-nav-section ketos-local-178-nav-section    <?php echo $component->printContainerClasses(); ?>">
			<div class="wp-block wp-block-kubio-navigation-items  position-relative wp-block-kubio-navigation-items__outer ketos-front-header__k__DqcL_YF9LKJ-outer ketos-local-179-outer" data-kubio="kubio/navigation-items" data-nav-normal="true">
				<div class="wp-block wp-block-kubio-row  position-relative wp-block-kubio-row__container ketos-front-header__k__MqErEXZ17Jm-container ketos-local-180-container gutters-row-lg-2 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-0 gutters-row-2 gutters-row-v-0" data-kubio="kubio/row">
					<div class="position-relative wp-block-kubio-row__inner ketos-front-header__k__MqErEXZ17Jm-inner ketos-local-180-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-2 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-0 gutters-col-2 gutters-col-v-0">
						<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container ketos-front-header__k__SFXC9Ze09eu-container ketos-local-181-container d-flex h-col-lg-auto h-col-md-auto h-col" data-kubio="kubio/column">
							<div class="position-relative wp-block-kubio-column__inner ketos-front-header__k__SFXC9Ze09eu-inner ketos-local-181-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-0 h-px-md-2 v-inner-md-0 h-px-2 v-inner-2">
								<div class="position-relative wp-block-kubio-column__align ketos-front-header__k__SFXC9Ze09eu-align ketos-local-181-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
									<?php ketos_theme()->get('logo')->render(array (
  'wrapper_class' => 'wp-block wp-block-kubio-logo position-relative wp-block-kubio-logo__container  kubio-logo-direction-row ketos-front-header__k__0xSC3AT64-container ketos-local--container',
  'logo_image_class' => 'position-relative wp-block-kubio-logo__image  kubio-logo-image  ketos-front-header__k__0xSC3AT64-image ketos-local--image',
  'alt_logo_image_class' => 'position-relative wp-block-kubio-logo__alternateImage kubio-logo-image kubio-alternate-logo-image   ketos-front-header__k__0xSC3AT64-alternateImage ketos-local--alternateImage',
  'logo_text_class' => 'position-relative wp-block-kubio-logo__text  ketos-front-header__k__0xSC3AT64-text ketos-local--text',
)); ?>
								</div>
							</div>
						</div>
						<div class="wp-block wp-block-kubio-column  kubio-hide-on-mobile position-relative wp-block-kubio-column__container ketos-front-header__k__DJ3dK9XoVZ-container ketos-local-183-container d-flex h-col-lg h-col-md h-col-auto" data-kubio="kubio/column">
							<div class="position-relative wp-block-kubio-column__inner ketos-front-header__k__DJ3dK9XoVZ-inner ketos-local-183-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-0 h-px-md-0 v-inner-md-0 h-px-0 v-inner-0">
								<div class="position-relative wp-block-kubio-column__align ketos-front-header__k__DJ3dK9XoVZ-align ketos-local-183-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
									<div class="wp-block wp-block-kubio-spacer  position-relative wp-block-kubio-spacer__container ketos-front-header__k__mRmagmI3LJv-container ketos-local-184-container" data-kubio="kubio/spacer"></div>
								</div>
							</div>
						</div>
						<div class="wp-block wp-block-kubio-column  position-relative wp-block-kubio-column__container ketos-front-header__k__ZEkYpBrx7RA-container ketos-local-185-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
							<div class="position-relative wp-block-kubio-column__inner ketos-front-header__k__ZEkYpBrx7RA-inner ketos-local-185-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-0 h-px-md-0 v-inner-md-0 h-px-2 v-inner-2">
								<div class="position-relative wp-block-kubio-column__align ketos-front-header__k__ZEkYpBrx7RA-align ketos-local-185-align h-y-container h-column__content h-column__v-align flex-basis-auto align-self-lg-center align-self-md-center align-self-center">
									<?php ketos_theme()->get('header-menu')->render(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
