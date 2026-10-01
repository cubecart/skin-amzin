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

{if $CATEGORIES}
	{$CATEGORIES}
{else}
	<nav class="navbar site-navbar">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sitenav-navbar-collapse-1" aria-expanded="false">
				<i class="fas fa-bars"></i> {$LANG.navigation.title}
			</button>			
		</div>
		<div class="collapse navbar-collapse" id="sitenav-navbar-collapse-1">
		
			<ul class="nav navbar-nav main-cats">
				{$NAVIGATION_TREE}
				{if $CTRL_CERTIFICATES && !$CATALOGUE_MODE}
					<li><a href="{$URL.certificates}"  data-level="1" title="{$LANG.navigation.giftcerts}"><i class="fas fa-gift"></i> {$LANG.navigation.giftcerts}</a></li>
				{/if}
				{if $CTRL_SALE}
					<li><a class="sale-link" href="{$URL.saleitems}" data-level="1" title="{$LANG.navigation.saleitems}"><i class="fas fa-tag"></i> {$LANG.navigation.saleitems}</a></li>
				{/if}
			</ul>
	
		</div>
	</nav>
{/if}