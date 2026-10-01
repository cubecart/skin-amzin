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

<div class="product-price-box">
	{if $PRODUCT.ctrl_sale}
		<div class="price-group">
		<span class="old_price" id="fbp"{if !$CTRL_HIDE_PRICES} data-price="{$PRODUCT.full_base_price}"{/if}>{$PRODUCT.price}</span>
		<span class="sale_price" id="ptp"{if !$CTRL_HIDE_PRICES} data-price="{$PRODUCT.price_to_pay}"{/if}>{$PRODUCT.sale_price}</span>
		</div>
	{else}
		<span id="ptp"{if !$CTRL_HIDE_PRICES} data-price="{$PRODUCT.price_to_pay}"{/if}>{$PRODUCT.price}</span>
	{/if}
</div>

<br><br>

<div>
	{if ($CTRL_ALLOW_PURCHASE) && (!$CATALOGUE_MODE)}
	
		{if $PRODUCT.available <= 0}
			<div>
				<input type="submit" value="{$LANG.common.unavailable}" class="btn btn-default btn-block disabled" disabled>
			</div>
		{else}
			<div class="row">
				<div class="col-xs-5">
					<input type="text" name="quantity" value="{if $PRODUCT.minimum_quantity}{$PRODUCT.minimum_quantity}{else}1{/if}" min="{if $PRODUCT.minimum_quantity}{$PRODUCT.minimum_quantity}{else}1{/if}" {if $PRODUCT.maximum_quantity gte $PRODUCT.minimum_quantity}max="{$PRODUCT.maximum_quantity}"{/if}  maxlength="4" class="quantity required text-center form-control">
					<input type="hidden" name="add" value="{$PRODUCT.product_id}">
					{if isset($PRODUCT.discounts)}
						<div class="hidden-xs">
							<small>(<a href="#product_discounts" class="product_discounts_show_tab">{$LANG.catalogue.bulk_discount}</a>)</small>
						</div>
						<div class="hidden-sm hidden-md hidden-lg">
							<small>(<a href="#product_discounts" class="product_discounts_show_panel">{$LANG.catalogue.bulk_discount}</a>)</small>
						</div>
					{/if}
				</div>
				<div class="col-xs-7 text-right">
					<button type="submit" value="{$LANG.catalogue.add_to_basket}" class="btn btn-success"><i class="fas fa-plus"></i> {$LANG.catalogue.add_to_basket}</button>
				</div>
			</div>
			
			{if $PRODUCT.minimum_quantity && $PRODUCT.minimum_quantity>1}
				<div class="text-muted"><small>{$LANG.catalogue.min_purchase_quantity|replace:'%s':$PRODUCT.minimum_quantity}</small></div>
			{/if}

			{if $PRODUCT.maximum_quantity gte $PRODUCT.minimum_quantity}
				<div class="text-muted"><small>{$LANG.catalogue.max_purchase_quantity|replace:'%s':$PRODUCT.maximum_quantity}</small></div>
			{/if}			
		{/if}
	
	{else}
		
		{if $CTRL_HIDE_PRICES}
			<div class="alert alert-info text-center">
				<strong>{$LANG.catalogue.login_to_view}</strong>
			</div>
		{else if $CTRL_OUT_OF_STOCK}
			<div class="alert alert-info text-center">
				<strong>{$LANG.catalogue.out_of_stock}</strong>
			</div>
		{/if}

	{/if}
</div>