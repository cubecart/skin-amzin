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

{if isset($PRODUCT) && $PRODUCT}

	<div>
		<form action="{$VAL_SELF}" method="post" class="add_to_basket">
			
			<h2 class="content-title">{$PRODUCT.name}</h2>
			
			{include file='templates/element.product.review_score.php'}

			<div class="row">
				<div  class="col-xs-12 col-sm-6">
					{include file='templates/element.product.vertical_gallery.php'}
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="product-code">
						<strong>{$LANG.catalogue.product_code} :</strong> {$PRODUCT.product_code}
					</div>

					<div class="product-short-desc">
						{$PRODUCT.description_short|escape:"html"} <a href="javascript:" id="scrollToDesc">+ {$LANG.common.more}</a>
					</div>
					
					{include file='templates/element.product.options.php'}
					{include file='templates/element.product.call_to_action.php'}
				</div>
			</div>
		
		</form>
	
		<br>
		<br>
		
		<div class="product_info_sec clearfix">
			<div class="hidden-xs">
				{include file='templates/element.product.tabs.php'}
			</div>
			<div class="hidden-sm hidden-md hidden-lg">
				{include file='templates/element.product.tabs_panel_group.php'}
			</div>
		</div>
			
		{if $SHARE}
			<hr>
			{foreach from=$SHARE item=html}
				{$html}
			{/foreach}
		{/if}
			
		<br>
			
		{include file='templates/element.product_reviews.php'}
			
		<br>
			
		{foreach from=$COMMENTS item=html}
			{$html}
		{/foreach}
	</div>
	
	<div class="hide" id="validate_field_required">{$LANG.form.field_required}</div>

{else}
	<p class="alert alert-danger text-center">{$LANG.catalogue.product_doesnt_exist}</p>
{/if}