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

<div class="product_tabs_panel_group">
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingInfo">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" href="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo">
					<i class="fas fa-chevron-right"></i> {$LANG.catalogue.product_info}
				</a>
			</h4>
		</div>
		<div id="collapseInfo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingInfo">
			<div class="panel-body">
				{$PRODUCT.description}
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingSpec">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" href="#collapseSpec" aria-expanded="false" aria-controls="collapseSpec">
					<i class="fas fa-chevron-right"></i> {$LANG.common.specification}
				</a>
			</h4>
		</div>
		<div id="collapseSpec" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSpec">
			<div class="panel-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>{$LANG.catalogue.product_code}</td>
							<td>{$PRODUCT.product_code}</td>
						</tr>
						{if $PRODUCT.manufacturer}
						<tr>
							<td>{$LANG.catalogue.manufacturer}</td>
							<td>{$MANUFACTURER}</td>
						</tr>
						{/if}
						{if $MANUFACTURER_GPSR}
						<tr>
							<td valign="top">{$LANG.catalogue.manufacturer_address}</td>
							<td>{if !empty($MANUFACTURER_GPSR.line1)}{$MANUFACTURER_GPSR.line1}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.line2)}{$MANUFACTURER_GPSR.line2}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.town)}{$MANUFACTURER_GPSR.town}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.state)}{$MANUFACTURER_GPSR.state}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.postcode)}{$MANUFACTURER_GPSR.postcode}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.country)}{$MANUFACTURER_GPSR.country}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.phone)}{$MANUFACTURER_GPSR.phone}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.email)}<a href="mailto:{$MANUFACTURER_GPSR.email}">{$MANUFACTURER_GPSR.email}</a><br>{/if}
								{if !empty($MANUFACTURER_GPSR.contact_url)}<a href="{$MANUFACTURER_GPSR.contact_url}" target="_blank">{$MANUFACTURER_GPSR.contact_url}</a>{/if}
							</td>
						</tr>
						{/if}
						{if $MANUFACTURER_GPSR}
						<tr>
							<td valign="top">{$LANG.catalogue.manufacturer_eu_contact}</td>
							<td>
								{if !empty($MANUFACTURER_GPSR.eu_name)}{$MANUFACTURER_GPSR.eu_name}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_line1)}{$MANUFACTURER_GPSR.eu_line1}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_line2)}{$MANUFACTURER_GPSR.eu_line2}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_town)}{$MANUFACTURER_GPSR.eu_town}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_state)}{$MANUFACTURER_GPSR.eu_state}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_postcode)}{$MANUFACTURER_GPSR.eu_postcode}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_country)}{$MANUFACTURER_GPSR.eu_country}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_phone)}{$MANUFACTURER_GPSR.eu_phone}<br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_email)}<a href="mailto:{$MANUFACTURER_GPSR.eu_email}">{$MANUFACTURER_GPSR.eu_email}</a><br>{/if}
								{if !empty($MANUFACTURER_GPSR.eu_contact_url)}<a href="{$MANUFACTURER_GPSR.eu_contact_url}" target="_blank">{$MANUFACTURER_GPSR.eu_contact_url}</a>{/if}
							</td>
						</tr>
						{/if}
						{if $PRODUCT.stock_level}
						<tr>
							<td>{$LANG.catalogue.stock_level}</td>
							<td>{$PRODUCT.stock_level}</td>
						</tr>
						{/if}
						<tr>
							<td>{$LANG.common.condition}</td>
							<td>{$PRODUCT.condition}</td>
						</tr>
						{if $PRODUCT.product_weight > 0}
						<tr>
							<td>{$LANG.common.weight}</td>
							<td>{$PRODUCT.product_weight}{$CONFIG.product_weight_unit|lower}</td>
						</tr>
						{/if}
						{if $PRODUCT.product_width > 0}
						<tr>
							<td>{$LANG.common.width}</td>
							<td>{floatval($PRODUCT.product_width)}{if $PRODUCT.dimension_unit=='in'}&#8243;{else}{$PRODUCT.dimension_unit}{/if}</td>
						</tr>
						{/if}
						{if $PRODUCT.product_height > 0}
						<tr>
							<td>{$LANG.common.height}</td>
							<td>{floatval($PRODUCT.product_height)}{if $PRODUCT.dimension_unit=='in'}&#8243;{else}{$PRODUCT.dimension_unit}{/if}</td>
						</tr>
						{/if}
						{if $PRODUCT.product_depth > 0}
						<tr>
							<td>{$LANG.common.depth}</td>
							<td>{floatval($PRODUCT.product_depth)}{if $PRODUCT.dimension_unit=='in'}&#8243;{else}{$PRODUCT.dimension_unit}{/if}</td>
						</tr>
						{/if}
						{if $PRODUCT.digital > 0}
						<tr>
							<td>{$LANG.catalogue.product_type_digital}</td>
							<td>{$LANG.common.download}</td>
						</tr>
						{/if}
						{if $PRODUCT.spec_array}
						{foreach from=$PRODUCT.spec_array key=spec_key item=spec_val}
						<tr>
							<td>{$spec_val.0}</td>
							<td>{$spec_val.1}</td>
						</tr>
						{/foreach}
						{/if}
					</tbody>
				</table>
				{$PRODUCT.spec_copy}
			</div>
		</div>
	</div>
	
	{if isset($PRODUCT.discounts)}
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingDiscounts">
			<h4 class="panel-title">
				<a role="button" class="collapsed" data-toggle="collapse" href="#collapseDiscounts" aria-expanded="false" aria-controls="collapseDiscounts">
					<i class="fas fa-chevron-right"></i> {$LANG.catalogue.quantity_discounts}
				</a>
			</h4>
		</div>
		<div id="collapseDiscounts" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDiscounts">
			<div class="panel-body">
				<div class="well well-sm">
					{$LANG.catalogue.quantity_discounts_explained}
				</div>
						
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>{$LANG.common.quantity}</th>
							<th>{$LANG.catalogue.price_per_unit}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center">1</td>
							<td class="text-center">{$PRODUCT.price}</td>
						</tr>
						{foreach from=$PRODUCT.discounts item=discount}
							<tr>
								<td class="text-center">{$discount.quantity}+</td>
								<td class="text-center">{$discount.price}</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{/if}
	
	{assign var=tabcid value=1}
	{foreach from=$PRODUCT_TABS_CONTENTS item=product_tab_content}
		{assign var=tabcid value=$tabcid+1}
		{if isset($product_tab_content.content_id) && isset($product_tab_content.content)}
			<div class="panel panel-default {if !empty($product_tab_content.content_class)}{$product_tab_content.content_class}{else}content{/if}">
				<div class="panel-heading" role="tab" id="heading{$product_tab_content.content_id}">
					<h4 class="panel-title">
						<a role="button" class="collapsed" data-toggle="collapse" href="#collapseTab{$product_tab_content.content_id}{$tabcid}" aria-expanded="false" aria-controls="collapseTab{$product_tab_content.content_id}{$tabcid}">
							<i class="fas fa-chevron-right"></i> {$product_tab_title}
						</a>
					</h4>
				</div>
				<div id="collapseTab{$product_tab_content.content_id}{$tabcid}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{$product_tab_content.content_id}">
					<div class="panel-body">
						{$product_tab_content.content}
					</div>
				</div>
			</div>
		{else}
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTab{$tabcid}">
					<h4 class="panel-title">
						<a role="button" class="collapsed" data-toggle="collapse" href="#collapseTab{$tabcid}" aria-expanded="false" aria-controls="collapseTab{$tabcid}">
							<i class="fas fa-chevron-right"></i> {$product_tab_title}
						</a>
					</h4>
				</div>
				<div id="collapseTab{$tabcid}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTab{$tabcid}">
					<div class="panel-body">
						{$product_tab_content.content}
					</div>
				</div>
			</div>
		{/if}
	{/foreach}
</div>