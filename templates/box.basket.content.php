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

{if isset($CONTENTS) && count($CONTENTS) > 0}
	<div class="shopping-cart" id="basket-detail">
		<ul class="shopping-cart-items list-unstyled">
			{foreach from=$CONTENTS item=item name=items}
				{if $smarty.foreach.items.index == 5}
					{assign var=extra_items value=$CART_ITEMS-5}
					<li><div class="text-center"><span class="badge">&hellip;</span></div></li>
					{break}
				{/if}
				<li class="clearfix row">
					<div class="col-xs-3 text-center">
						<img class="thmb" src="{$item.image}" alt="{$item.name}">
					</div>
					<div class="col-xs-9">
						<span class="item-name"><a href="{$item.link}" title="{$item.name}">{$item.name|truncate:35:"&hellip;"}</a></span>
						{if $item.options}
							<div class="item-options">
								{foreach from=$item.options item=option}
									<div class="item-options-opt">
										<strong>{$option.option_name}</strong>: {$option.value_name|truncate:45:"&hellip;":true}{if !empty($option.price_display)} ({$option.price_display}){/if}
									</div>
								{/foreach}
							</div>
						{/if}
						<span class="item-price">{$item.total}</span>
						<span class="item-quantity"> &times; {$item.quantity}</span>
					</div>
				</li>
			{/foreach}
		</ul>
		<div class="shopping-cart-sum">
			{$LANG.common.item_plural}: <span class="badge">{$CART_ITEMS}</span>
			<div class="shopping-cart-total">
				<span class="lighter-text">{$LANG.basket.total}:</span>&nbsp;
				<span class="main-color-text">{$CART_TOTAL}</span>
			</div>
		</div>
		<a href="{$STORE_URL}/index.php?_a=basket" class="btn btn-success btn-block">{$LANG.basket.view_basket} <i class="fas fa-arrow-right"></i></a>
	</div>
{else}
	<p class="basket-empty text-center">{$LANG.basket.basket_is_empty}</p>
{/if}