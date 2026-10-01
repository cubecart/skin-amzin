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