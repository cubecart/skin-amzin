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

<div class="dropdown">
	<a href="#" class="parent-link dropdown-toggle" type="button" id="currency_dropdown" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		{$CURRENT_CURRENCY.symbol_left|escape:'htmlall'} {$CURRENT_CURRENCY.code} {$CURRENT_CURRENCY.symbol_right|escape:'htmlall'}
		<span class="caret"></span>
	</a>
	<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="currency_dropdown">
		{if count($CURRENCIES)>1}
			{foreach from=$CURRENCIES item=currency}
				{if $currency.code!==$CURRENT_CURRENCY.code}
					<li>
						<a href="{$currency.url}" rel="nofollow">{$currency.symbol_left|escape:'htmlall'} {$currency.code} {$currency.symbol_right|escape:'htmlall'} ({$currency.name})</a>
					</li>
				{/if}
			{/foreach}
		{/if}
	</ul>
</div>