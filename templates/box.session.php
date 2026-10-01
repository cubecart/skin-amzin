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

{if $IS_USER}
	<div class="dropdown">
		<a href="#" class="parent-link dropdown-toggle" id="account_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="fas fa-user"></i>
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
	<div class="dropdown">
		<a href="#" class="parent-link dropdown-toggle" id="account_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="fas fa-user"></i>
		</a>
		<ul class="dropdown-menu dropdown-menu-right login-menu" aria-labelledby="account_dropdown">
			<a href="{$STORE_URL}/login{$CONFIG.seo_ext}" class="login-link">{$LANG.account.login}</a>
			<div class="text-center"><span class="act-or">{$LANG.common.or}</span></div>
			<a href="{$STORE_URL}/register{$CONFIG.seo_ext}" class="reg-link">{$LANG.account.register}</a>
		</ul>
	</div>
{/if}