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

{if $POPULAR}
	<div class="panel panel-default" id="box-popular">
		<div class="panel-heading">
			<i class="fas fa-fire"></i> {$LANG.catalogue.title_popular}
			{if !empty($POPULAR) && $POPULAR|@count > 1}
				<div class="controls pull-right">
					<div class="btn-group">
					<a class="left btn btn-xs btn-default" href="#popular-carousel" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
					<a class="right btn btn-xs btn-default" href="#popular-carousel"data-slide="next"><i class="fas fa-chevron-right"></i></a>
					</div>
				</div>
			{/if}
		</div>
		
		<div class="panel-body">
			<div id="popular-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					
					{assign var="slideStat" value="0"}
					{foreach from=$POPULAR item=product}
						<div class="item{if $slideStat == 0} active{/if}">
							<div class="row">
								<div class="col-xs-12">
									<div class="product-box">
										<div class="inner">
											<div class="product-wrap">
												<div class="photo-wrap">
													<a class="th" href="{$product.url}" title="{$product.name}">
														<img class="thmb" src="{$product.image}" alt="{$product.name}">
													</a>
												</div>
												<div class="product-name">
													<a href="{$product.url}" title="{$product.name}">{$product.name|truncate:28:"..."}</a>
												</div>
												<div class="product-price">
													{if $product.ctrl_sale}
													<div class="price-group">
														<span class="old-price">{$product.price}</span> <span class="current-price">{$product.sale_price}</span>
													</div>
													{else}
													<span class="current-price">{$product.price}</span>
													{/if}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{assign var=slideStat value=$slideStat+1}
					{/foreach}
				
				</div>
			</div>
		</div>
	</div>
{/if}