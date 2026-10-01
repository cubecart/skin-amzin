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

{if $SALE_PRODUCTS && $CONFIG['catalogue_sale_mode']>0}
	<div class="panel panel-default" id="box-sale_items">
		<div class="panel-heading"><i class="fas fa-tag"></i> {$LANG.catalogue.title_saleitems}</div>
		<ul class="list-group productbox-list">
			{foreach from=$SALE_PRODUCTS item=product}
				{if $smarty.foreach.products.index == 5}
					<li class="list-group-item">
						<a class="btn btn-block btn-danger" href="{$URL.saleitems}" title="{$LANG.navigation.saleitems}">{$LANG.common.view_all} {$LANG.catalogue.title_saleitems} <i class="fas fa-arrow-right"></i></a>
					</li>
					{break}
				{/if}
				<li class="list-group-item">
					<div class="product-name">
						<a href="{$product.url}" title="{$product.name} ({if $product.saving}{$LANG.catalogue.saving} {$product.saving}{/if})">{$product.name}</a>
					</div>
					<div class="product-price">
						{if empty($product.sale_price_unformatted)}
							<span class="current-price">{$product.price}</span>
						{else}
							<span class="old-price">{$product.price}</span> <span class="current-price">{$product.sale_price}</span>
						{/if}
						{if $product.saving} <span class="small text-muted">({$LANG.catalogue.saving} {$product.saving})</span>{/if}
					</div>
				</li>
			{/foreach}
		</ul>
	</div>
{/if}