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

<h2 class="content-title">{$LANG.search.advanced}</h2>

<form method="post" action="?_a=category" id="advanced_search_form" enctype="multipart/form-data">
   
	<div class="row">
		<div class="col-xs-12">
			<dl style="margin:0px;">
				<dt><label for="keywords">{$LANG.search.keywords}</label></dt>
				<dd><input type="text" name="search[keywords]" placeholder="{$LANG.search.keywords}" id="keywords" class="form-control search_input" required></dd>
			</dl>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<dl style="margin:0px;">
				<dt><label for="">{$LANG.search.price_range}</label></dt>
				<dd class="row">
					<div class="col-xs-4">
						<input type="text" name="search[priceMin]" placeholder="{$LANG.common.from}" class="form-control">
					</div>
					<div class="col-xs-1 text-center">
						-
					</div>
					<div class="col-xs-4">
						<input type="text" name="search[priceMax]" placeholder="{$LANG.common.to}" class="form-control">
					</div>
					<div class="col-xs-3" style="padding-top:5px;">
						<input type="checkbox" name="search[priceVary]" value="1"> &plusmn;5%
					</div>
				</dd>
			</dl>
		</div>
	</div>
	<hr>
	
	
	{if isset($MANUFACTURERS)}
	<div class="row">
		<div class="col-xs-12">
			<dl style="margin:0px;">
				<dt><label for="">{$LANG.catalogue.manufacturer}</label></dt>
				<dd class="clearfix">
					
					{* Uncomment the following include to show a grid of checkboxes. Manufacturers names should be very short. *}
					{* include file='templates/element.search.manufacturers.checkbox.grid.php' *}

					{* Uncomment the following include to show a drop-down selector. Manufacturers names can be long and numerous. *}
					{include file='templates/element.search.manufacturers.select.chosen.php'}
				
				</dd>
			</dl>
		</div>
	</div>
	<hr>
	{/if}

	{if isset($SORTERS)}
	<div class="row">
		<dl class="col-xs-12 col-sm-6">
			<dt><label for="sort">{$LANG.form.sort_by}</label></dt>
			<dd>	
				<select name="sort" id="sort" class="form-control">
					{foreach from=$SORTERS item=sort}
						<option value="{$sort.field}|{$sort.order}" {$sort.selected}>{$sort.name} ({$sort.direction})</option>
					{/foreach}
				</select>
			</dd>
		</dl>
	</div>
	<hr>
	{/if}
	
	<div class="row">
		{if !isset($OUT_OF_STOCK)}
			<div class="col-xs-12 col-sm-6">
				<dl>
					<label for="in_stock"><input type="checkbox" name="search[inStock]" id="in_stock" value="1">{$LANG.search.in_stock}</label>
				</dl>
			</div>
		{/if}
		<div class="col-xs-12 col-sm-6">
			<dl>
				<label for="featured_only"><input type="checkbox" name="search[featured]" id="featured_only" value="1">{$LANG.search.featured_only}</label>
			</dl>
		</div>
	</div>
   
	<div class="text-center">
		<hr>
		<input type="submit" class="btn btn-success" value="{$LANG.common.search}"> <button type="reset" class="btn btn-danger"><i class="fas fa-refresh"></i> {$LANG.common.reset}</button>
	</div>
</form>