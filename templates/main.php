{*
 * Amzin CubeCart Template
 * ========================================
 * Amzin is a template developed by NiteFox 
 * also known as NiteTower Design.
 * ========================================
 * Web:        https://www.facebook.com/CubeCartThemes
 * Email:      nitetowerdesign@gmail.com
 * License:    http://nitefox.x10host.com/license.html
 * Disclaimer: http://nitefox.x10host.com/disclaimer.html
 *}
<!DOCTYPE html>
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" dir="{$TEXT_DIRECTION}" lang="{$HTML_LANG}">
	
	<head>
		<title>{$META_TITLE}</title>
		{include file='templates/element.meta.php'}
		<link href="{$CANONICAL}" rel="canonical">
		<link href="{$ROOT_PATH}favicon.ico" rel="shortcut icon" type="image/x-icon">
		{include file='templates/element.css.php'}
		{include file='templates/content.recaptcha.head.php'}
		{include file='templates/element.google_analytics.php'}
		{include file='templates/element.js_head.php'}
	</head>
   
	<body>
		
		{foreach from=$BODY_JS_TOP item=js}{$js}{/foreach}

		{if $STORE_OFFLINE}
			<div class="alert alert-danger" style="margin:0px;">
				<div class="container text-center">
					{$LANG.common.warning_offline}
				</div>
			</div>
		{/if}
		

		<div class="page-head">
			
			<div class="page-head-bar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="page-head-bar-links pull-left">
								{include file='templates/box.currency.php'}
								{include file='templates/box.language.php'}
							</div>
							<div class="page-head-bar-social pull-right">
								{include file='templates/box.social_header.php'}
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="page-header-sec">
			
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="head-box-1 main-logo-container">
								<a href="{$ROOT_PATH}" class="main-logo"><img src="{$STORE_LOGO}" class="main-logo-img" alt="{$CONFIG.store_name}"></a>
							</div>
							<div class="head-box-2 cat-nav-head hidden-xs hidden-sm">
								{$LANG.navigation.title}
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 hidden-xs">
							<div class="head-box-1 main-links-container">
								<ul class="list-unstyled main-links">
									<li><a href="{$STORE_URL}/search{$CONFIG.seo_ext}" class="search-adv-link"><i class="fas fa-search"></i> {$LANG.search.advanced}</a></li>
									{if $CTRL_CERTIFICATES && !$CATALOGUE_MODE}
										<li><a href="{$URL.certificates}" title="{$LANG.navigation.giftcerts}"><i class="fas fa-gift"></i> {$LANG.navigation.giftcerts}</a></li>
									{/if}
									{if $CTRL_SALE}
										<li><a class="sale-link" href="{$URL.saleitems}" title="{$LANG.navigation.saleitems}"><i class="fas fa-tag"></i> {$LANG.navigation.saleitems}</a></li>
									{/if}
								</ul>
							</div>
							<div class="head-box-2 main-search-container">
								{include file='templates/box.search.php'}
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
							<div class="head-box-1 hidden-xs">
								
							</div>
							<div class="head-box-2">
								<div class="pull-left hidden-sm hidden-md hidden-lg">
									<a href="javascript:" class="searchTog" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
										<i class="fas fa-search"></i>
									</a>
								</div>
								<div class="pull-right account-nav">
									{include file='templates/box.session.php'}
								</div>
								<div class="pull-right header-basket">
									{include file='templates/box.basket.php'}
								</div>
							</div>
							
						</div>
					</div>					
				</div>
				
			</div>
			
		</div>
		
		
		<div class="container page-wrapper">
			
			<div class="row">
					
				<div class="page-side col-xs-12 col-sm-12 col-md-3">
					<div class="hidden-sm hidden-md hidden-lg">
						<div class="collapse" id="collapseSearch">
							<div class="search-block">
								{include file='templates/box.search_collapsed.php'}
							</div>
							<div class="clearfix"><a href="{$STORE_URL}/search{$CONFIG.seo_ext}" class="pull-right"><i class="fas fa-search"></i> {$LANG.search.advanced}</a></div>
						</div>					
					</div>
				
					<div class="panel panel-default site-navigation-container">
						{include file='templates/box.navigation.php'}
					</div>
					
					<div class="hidden-xs hidden-sm">
					
						{include file='templates/box.featured.php'}
						
						{if $SALE_PRODUCTS && $CONFIG['catalogue_sale_mode']>0 && $POPULAR}
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-12">	
									{include file='templates/box.popular.php'}
								</div>
								<div class="col-xs-12 col-sm-6 col-md-12">
									{include file='templates/box.sale_items.php'}
								</div>
							</div>
						{else}
							{include file='templates/box.popular.php'}
							{include file='templates/box.sale_items.php'}
						{/if}
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-9">
					<div class="page-body {$SECTION_NAME}_wrapper">
						{include file='templates/element.breadcrumb.php'} 
					
						{include file='templates/box.errors.php'}
						{include file='templates/box.progress.php'}
						{$PAGE_CONTENT}
					</div>
				</div>
				
				
			</div>

			<a href="#"title="{$LANG.common.top}" class="back-to-top">
				<i class="fas fa-arrow-up"></i>
			</a>

		</div>

		<div class="page-footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						{include file='templates/box.documents.php'}
					</div>
					<div class="col-xs-12 col-sm-4">
						{include file='templates/box.newsletter.php'}
					</div>
					<div class="col-xs-12 col-sm-4">
						{$SOCIAL_LIST}
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-copyright text-center">
			{$COPYRIGHT} {if !empty($CONFIG.tax_number)}{$LANG.settings.tax_vat_number}: {$CONFIG.tax_number}{/if}
			{include file='templates/ccpower.php'}
		</div>

		{include file='templates/element.js_foot.php'}
		{$DEBUG_INFO}
		{$LIVE_HELP}
		{$SKIN_SELECT}

		{include file='templates/element.markup.json-ld.php'}
		{include file='templates/modal.exit.php'}
		{$ACP_WIDGET}
	</body>
		
</html>