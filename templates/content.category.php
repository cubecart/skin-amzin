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

<h2 class="content-title">{$category.cat_name}</h2>

{if isset($category.image)}
	<div class="cat-hdr-img text-center">
		<img src="{$category.image}" alt="{$category.cat_name}" class="img-responsive">
	</div>
{/if}

{if !empty($category.cat_desc)}
	<div class="cat-desc">
		{$category.cat_desc}
	</div>
{/if}

<br>

<div class="cat-sorting row">
	<div class="col-xs-5">
		{if isset($SORTING)}
			<div class="dropdown sortingOpts">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<i class="fas fa-sort"></i> {$LANG.form.sort_by}</a>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<form action="{$VAL_SELF}" class="autosubmit pull-left" method="post">
						<div>
							<select name="sort" id="product_sort" class="form-control">
								<option value="" disabled>{$LANG.form.please_select}</option>
								{foreach from=$SORTING item=sort}
									<option value="{$sort.field}|{$sort.order}" {$sort.selected}>{$sort.name} ({$sort.direction})</option>
								{/foreach}
							</select>
							<input type="submit" value="{$LANG.form.sort}" class="hidden">
						</div>
					</form>			
				</div>
			</div>
		{/if}
	</div>
	<div class="col-xs-7">
		{if isset($SUBCATS) && $SUBCATS}
			<div class="pull-right cat-filter">		
				<div><label>{$LANG.common.filter}</label></div>
				<div>
				
				
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownCats" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<i class="fas fa-sliders-h"></i>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCats">
							{foreach from=$SUBCATS item=subcat}
								<li>
									<a href="{$subcat.url}" title="{$subcat.cat_name}"><span class="badge pull-right">{$subcat.products_number}</span><i class="fas fa-chevron-right"></i> {$subcat.cat_name} </a>
								</li>
							{/foreach}
						</ul>
					</div>
				</div>
			</div>
		{/if}
		<div class="pull-right">
			<div><label>{$LANG.common.display}</label></div>
			<div>
				<div class="btn-group" id="layout_toggle">
					<a href="javascript:" class="btn btn-default active grid_view_tog"><i class="fas fa-th-large"></i></a>
					<a href="javascript:" class="btn btn-default list_view_tog"><i class="fas fa-th-list"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>

<div id="ccScroll">

{if $PRODUCTS}
	
	<ul class="product_list grid_view">
		
		{assign var=infoid value=1}
		{foreach from=$PRODUCTS item=product}
			{assign var=infoid value=$infoid+1}
			<li class="product_list_item">

				<div class="product_list_item_wrapper clearfix">
					<div class="prd_toggle_wrap{$product.product_id}">
						<a class="prd_toggle" href="javascript:" onclick="showDescription('{$product.product_id}','show');"><i class="fas fa-info-circle"></i></a>
					</div>
					
					{if $product.available <= 0}
						<span class="product_availability unavailable">{$LANG.common.unavailable}</span>
					{* ctrl_stock True when a product is considered 'in stock' for purposes of allowing a purchase, either by actually being in stock or via certain settings *}
					{elseif $product.ctrl_stock && !$CATALOGUE_MODE}
					{elseif !$CATALOGUE_MODE}
						<span class="product_availability out_of_stock">{$LANG.catalogue.out_of_stock_short}</span>
					{/if}
					
					<div class="product_image">
						<a href="{$product.url}" class="th" title="{$product.name}">
							<img src="{$product.thumbnail}" alt="{$product.name}">
						</a>
					</div>
					
					<div class="product_info">
						<h3 class="pr_name lv_name"><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h3>
						<h3 class="pr_name gv_name"><a href="{$product.url}" title="{$product.name}">{$product.name|truncate:38:"..."}</a></h3>
						{if $product.review_score}
							<div class="pr_score">
								<div class="review-stars-display">
								{for $i = 1; $i <= 5; $i++}
									{if $product.review_score >= $i}
										<span class="star"><i class="fas fa-star"></i></span>
									{elseif $product.review_score > ($i - 1) && $product.review_score < $i}
										<span class="star half-rate"><i class="fas fa-star-half-alt"></i></span>
									{else}
										<span class="star empty-rate"><i class="far fa-star"></i></span>
									{/if}
								{/for}
								</div>
								<span class="pr_info text-muted small">{$product.review_info}</span>
								
							</div>
						{else}
							<div class="pr_score">
								<div class="review-stars-display">
									{for $i = 1; $i <= 5; $i++}
										<span class="star empty-rate"><i class="far fa-star"></i></span>
									{/for}
								</div>
							</div>
						{/if}
						
						<div class="pr_description clearfix text-muted">
							{$product.description_short|escape:"html"}
							{if $product.minimum_quantity && $product.minimum_quantity>1}
								<div class="text-muted"><small>*{$LANG.catalogue.min_purchase_quantity|replace:'%s':$product.minimum_quantity}</small></div>
							{/if}
						</div>
						
						<div class="product_pricing clearfix">
							{if $product.ctrl_sale}
								<span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
							{else}
								<div><span>{$product.price}</span></div>
							{/if}
						</div>
						
						<div class="pr_description_ab clearfix hidden" id="infoblock{$product.product_id}">
							{$product.description_short|escape:"html"}	
						</div>
						
						<form action="{$VAL_SELF}" method="post" class="add_to_basket atb_2">
							{if $product.available <= 0}
								<button type="submit" value="{$LANG.common.unavailable}"  title="{$LANG.common.unavailable}" class="btn btn-default btn-block disabled postfix" disabled><i class="fas fa-ban"></i> {$LANG.common.unavailable}</button>
							{elseif $product.ctrl_stock && !$CATALOGUE_MODE}
								<input type="hidden" name="add" value="{$product.product_id}">
								{if $product.minimum_quantity && $product.minimum_quantity>1}
									<div class="dropup cat-min-qty-dropup">
										<button class="btn btn-default btn-block dropdown-toggle" type="button" id="mq{$product.product_id}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-shopping-basket"></i> {$LANG.catalogue.add_to_basket}
										</button>
										<div class="dropdown-menu" aria-labelledby="mq{$product.product_id}">
											<div class="text-muted text-center">
												<label class="clearfix">{$LANG.common.quantity} : <span class="pull-right">X</span></label>
												<div class="text-muted"><small>{$LANG.catalogue.min_purchase_quantity|replace:'%s':$product.minimum_quantity}</small></div>
												<input type="number" name="quantity" value="{$product.minimum_quantity}" min="{$product.minimum_quantity}" maxlength="4" class="form-control qty-input text-center">
												<button type="submit" value="{$LANG.catalogue.add_to_basket}"  title="{$LANG.catalogue.add_to_basket}" class="btn btn-default btn-block postfix"><i class="fas fa-shopping-basket"></i> {$LANG.catalogue.add_to_basket}</button>	
											</div>
										</div>
									</div>
								{else}
									<input type="hidden" name="quantity" value="1" maxlength="4" class="form-control text-center">
									<button type="submit" value="{$LANG.catalogue.add_to_basket}"  title="{$LANG.catalogue.add_to_basket}" class="btn btn-default btn-block"><i class="fas fa-shopping-basket"></i> {$LANG.catalogue.add_to_basket}</button>
								{/if}
							{elseif !$CATALOGUE_MODE}
								<button type="submit" value="{$LANG.catalogue.out_of_stock_short}"  title="{$LANG.catalogue.out_of_stock_short}" class="btn btn-default btn-block disabled postfix" disabled><i class="fas fa-ban"></i> {$LANG.catalogue.out_of_stock_short}</button>
							{/if}
						</form>

						<form action="{$VAL_SELF}" method="post" class="add_to_basket">
							{if $product.available <= 0}
								<button type="submit" value="{$LANG.common.unavailable}"  title="{$LANG.common.unavailable}" class="btn btn-default btn-block disabled postfix" disabled><i class="fas fa-ban"></i> {$LANG.common.unavailable}</button>
							{elseif $product.ctrl_stock && !$CATALOGUE_MODE}
								<input type="hidden" name="add" value="{$product.product_id}">
								{if $product.minimum_quantity && $product.minimum_quantity>1}
									<div class="clearfix">
										<button type="submit" value="{$LANG.catalogue.add_to_basket}"  title="{$LANG.catalogue.add_to_basket}" class="btn btn-default btn-block pull-right"><i class="fas fa-shopping-basket"></i></button>
										<input type="number" name="quantity" value="{$product.minimum_quantity}" min="{$product.minimum_quantity}" maxlength="4" style="width:80px;" class="form-control text-center pull-right">
									</div>
								{else}
									<input type="hidden" name="quantity" value="1" maxlength="4" class="form-control text-center">
									<button type="submit" value="{$LANG.catalogue.add_to_basket}"  title="{$LANG.catalogue.add_to_basket}" class="btn btn-default"><i class="fas fa-shopping-basket"></i> {$LANG.catalogue.add_to_basket}</button>
								{/if}
							{elseif !$CATALOGUE_MODE}
								<button type="submit" value="{$LANG.catalogue.out_of_stock_short}"  title="{$LANG.catalogue.out_of_stock_short}" class="btn btn-default btn-block disabled postfix" disabled><i class="fas fa-ban"></i> {$LANG.catalogue.out_of_stock_short}</button>
							{/if}
						</form>
						
					</div>
		
				</div>
           
			</li>
		{/foreach}
	</ul>
	{if $PAGINATION}
	<hr>
	{/if}
	
	{else}
		
		{if isset($SUBCATS) && $SUBCATS}
			<ul class="list-group altern-cats">
				{foreach from=$SUBCATS item=subcat}
					<li class="list-group-item">
						<a href="{$subcat.url}" title="{$subcat.cat_name}"><img class="th" src="{$subcat.cat_image}" alt="{$subcat.cat_name}">{$subcat.cat_name}</a>
					</li>
				{/foreach}
			</ul>
		{else}
			<div class="alert alert-danger text-center">{$LANG.category.no_products}</div>
		{/if}
		
	{/if}
   	
	{*
	<div class="row">
		<div class="col-xs-12 split-pagination">
			{$PAGINATION}
		</div>
	</div>
	*}

	<div class="hide" id="ccScrollCat">{$category.cat_id}</div>
	
	{if $page!=='all' && ($page < $total)}
		{$params[$var_name] = $page + 1}
		{* Add "hidden" to the class attribute to not display the more button *}
		<a href="{$current}{http_build_query($params)}{$anchor}" data-next-page="{$params[$var_name]}" data-cat="{$category.cat_id}" class="btn btn-default btn-block ccScroll-next">{$LANG.common.more}</a>
	{/if}
	
	<div class="text-center hidden loading-block" id="loading"><i class="fas fa-sync fa-spin"></i></div>
	
	<br><br>

</div>