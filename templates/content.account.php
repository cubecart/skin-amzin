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

<h2 class="content-title">{$LANG.account.your_account}</h2>

<ul class="list-unstyled account-menu-blocks">
	<li>
		<a href="{$STORE_URL}/index.php?_a=profile" title="{$LANG.account.your_details}" >
			<span class="menu-icon"><i class="fas fa-user"></i></span>{$LANG.account.your_details}
		</a>
	</li>
	<li>
		<a href="{$STORE_URL}/index.php?_a=vieworder" title="{$LANG.account.your_orders}" >
			<span class="menu-icon"><i class="fas fa-truck-moving"></i></span>{$LANG.account.your_orders}
		</a>
	</li>
	<li>
		<a href="{$STORE_URL}/index.php?_a=addressbook" title="{$LANG.account.your_addressbook}" >
			<span class="menu-icon"><i class="fas fa-address-book"></i></span>{$LANG.account.your_addressbook}
		</a>	
	</li>
	<li>
		<a href="{$STORE_URL}/index.php?_a=downloads" title="{$LANG.account.your_downloads}" >
			<span class="menu-icon"><i class="fas fa-cloud-download-alt"></i></span>{$LANG.account.your_downloads}
		</a>
	</li>
	<li>
		<a href="{$STORE_URL}/index.php?_a=newsletter" title="{$LANG.account.your_subscription}" >
			<span class="menu-icon"><i class="fas fa-envelope"></i></span>{$LANG.account.your_subscription}
		</a>
	</li>
		
	{foreach from=$ACCOUNT_LIST_HOOKS item=list_item}
		<li>
			<a href="{$list_item.href}" title="{$list_item.title}" >
				<span class="menu-icon">{if !empty($list_item.fa)}<i class="fas fa-{$list_item.fa}"></i>{else}<i class="fas fa-bars"></i>{/if}</span>{$list_item.title}
			</a>
		</li>
	{/foreach}
	
	<li>
		<a href="{$STORE_URL}/index.php?_a=logout" title="{$LANG.account.logout}" >
			<span class="menu-icon"><i class="fas fa-power-off"></i></span>{$LANG.account.logout}
		</a>
	</li>
</ul>