{*
 * Amzin skin for CubeCart v6
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2026. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Originally created by NiteFox (NiteTower Design) and
 * transferred to CubeCart Limited in 2022.
 * ========================================
 * Web:   https://www.cubecart.com
 * Email:  hello@cubecart.com
 * License:  GPL-3.0 https://www.gnu.org/licenses/quick-guide-gplv3.html
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