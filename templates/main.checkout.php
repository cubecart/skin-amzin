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
	
	<body class="checkout-page">
		
		{foreach from=$BODY_JS_TOP item=js}
			{$js}
		{/foreach}
		
		
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
						<div class="col-xs-7">
							<a href="{$ROOT_PATH}" class="main-logo"><img src="{$STORE_LOGO}" class="main-logo-img" alt="{$CONFIG.store_name}"></a>
						</div>
						<div class="col-xs-5">
							{if $IS_USER}
								<div class="dropdown pull-right checkout-header-menu">
									<a href="#" class="checkout-header-btn dropdown-toggle" id="account_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="fas fa-user"></i> <span class="chb-txt">{$LANG.account.your_account}</span>
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="account_dropdown">
										<li><a href="{$STORE_URL}/index.php?_a=account" title="{$LANG.account.your_account}">{$LANG.account.your_account}</a></li>
										<li><a href="{$STORE_URL}/index.php?_a=profile" title="{$LANG.account.your_details}">{$LANG.account.your_details}</a></li>
										<li><a href="{$STORE_URL}/index.php?_a=vieworder" title="{$LANG.account.your_orders}">{$LANG.account.your_orders}</a></li>
										<li><a href="{$STORE_URL}/index.php?_a=addressbook" title="{$LANG.account.your_addressbook}">{$LANG.account.your_addressbook}</a></li>
										<li><a href="{$STORE_URL}/index.php?_a=downloads" title="{$LANG.account.your_downloads}">{$LANG.account.your_downloads}</a></li>
										<li><a href="{$STORE_URL}/index.php?_a=newsletter" title="{$LANG.account.your_subscription}">{$LANG.account.your_subscription}</a></li>
										{foreach from=$SESSION_LIST_HOOKS item=list_item}
											<li><a href="{$list_item.href}" title="{$list_item.title}">{$list_item.title}</a></li>
										{/foreach}
										<li role="separator" class="divider"></li>
										<li class="text-left"><a href="{$STORE_URL}/index.php?_a=logout" title="{$LANG.account.logout}">{$LANG.account.logout}</a></li>
									</ul>
								</div>
							{else}
								<a href="{$STORE_URL}" class="checkout-header-btn pull-right" title="{$LANG.common.home}"><i class="fas fa-home"></i> <span class="chb-txt">{$LANG.common.home}</span></a>
							{/if}
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container page-wrapper">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
					<div class="page-body {$SECTION_NAME}_wrapper">
						{include file='templates/box.progress.php'}
						{include file='templates/box.errors.php'}
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
		{$LIVE_HELP}
		{$DEBUG_INFO}
		{$SKIN_SELECT}

	</body>
	
	{include file='templates/element.markup.json-ld.php'}

</html>