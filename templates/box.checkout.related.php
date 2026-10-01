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

 <div class="hidden-xs">
	<div class="panel panel-default" id="related-products">
		<div class="panel-heading">
			{$LANG.catalogue.related_products}
			
			{if count($RELATED) > 3}
				<div class="controls pull-right">
					<div class="btn-group">
						<a class="left btn btn-xs btn-default" href="#related-carousel" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
						<a class="right btn btn-xs btn-default" href="#related-carousel"data-slide="next"><i class="fas fa-chevron-right"></i></a>
					</div>
				</div>
			{/if}
		</div>
		<div class="panel-body">
			<div class="row">
				
				<div id="related-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
	
						{assign var="rpslideStat" value="0"}
						{assign var="rpCount" value="0"}
						
						{foreach from=$RELATED item=product}
							
							{assign var=rpCount value=$rpCount+1}
							{assign var=rpslideStat value=$rpslideStat+1}
							
							{if $rpCount == 1}
								<div class="item{if $rpslideStat == 1} active{/if}">
							{/if}
	
	
								<div class="product-box">
									<div class="inner">
										<div class="product-wrap">
											<div class="photo-wrap">
												<a class="th" href="{$product.url}" title="{$product.name}">
													<img class="thmb" src="{$product.img_src}" alt="{$product.name}">
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
			
		
							{if $rpCount == 3}
								</div>
								{assign var="rpCount" value="0"}
							{/if}
							
						{/foreach}
		
						{if $rpCount != 0}
							</div>
						{/if}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>