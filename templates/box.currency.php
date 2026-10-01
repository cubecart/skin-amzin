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