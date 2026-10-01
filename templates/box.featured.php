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

{if $featured}
	<div class="panel" id="box-featured">
		<div class="panel-heading"><i class="fas fa-star"></i> {$LANG.catalogue.title_feature}</div>
		<div class="panel-body">
			<div class="product-box">
				<div class="inner">
					<div class="product-wrap">
						<div class="photo-wrap">
							<a class="th" href="{$featured.url}" title="{$featured.name}">
								<img class="thmb" src="{$featured.image}" alt="{$featured.name}">
							</a>
						</div>
						<div class="product-name">
							<a href="{$featured.url}" title="{$featured.name}">{$featured.name|truncate:28:"..."}</a>
						</div>
						<div class="product-price">
							{if $featured.ctrl_sale}
								<div class="price-group">
									<span class="old-price">{$featured.price}</span> <span class="current-price">{$featured.sale_price}</span>
								</div>
							{else}
								<span class="current-price">{$featured.price}</span>
							{/if}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{/if}