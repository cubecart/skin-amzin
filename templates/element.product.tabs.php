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

<div id="product_tabs">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#product_info" aria-controls="product_info" role="tab" data-toggle="tab">{$LANG.catalogue.product_info}</a></li>
		<li role="presentation"><a href="#product_spec" aria-controls="product_spec" role="tab" data-toggle="tab">{$LANG.common.specification}</a></li>
		{if isset($PRODUCT.discounts)}
			<li role="presentation"><a href="#product_discounts" aria-controls="product_discounts" role="tab" data-toggle="tab">{$LANG.catalogue.quantity_discounts}</a></li>
		{/if}
		{assign var=tabid value=1}
		{foreach from=$PRODUCT_TABS_TITLES item=product_tab_title}
			{assign var=tabid value=$tabid+1}
			{if isset($product_tab_title.content_id) && isset($product_tab_title.title)}
				<li role="presentation"><a href="#product_tab{$product_tab_title.content_id}" aria-controls="product_tab{$product_tab_title.content_id}" role="tab" data-toggle="tab">{$product_tab_title.title}</a></li>
			{else}
				<li role="presentation"><a href="#product_tab{$tabid}" aria-controls="product_tab{$tabid}" role="tab" data-toggle="tab">{$product_tab_title}</li>
			{/if}
		{/foreach}
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="product_info">
			{$PRODUCT.description}
		</div>
					
		<div role="tabpanel" class="tab-pane" id="product_spec">
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
					
		{if isset($PRODUCT.discounts)}
			<div role="tabpanel" class="tab-pane" id="product_discounts">
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
		{/if}
					
		{assign var=tabid value=1}
		{foreach from=$PRODUCT_TABS_CONTENTS item=product_tab_content}
			{assign var=tabid value=$tabid+1}
			{if isset($product_tab_content.content_id) && isset($product_tab_content.content)}
				<div role="tabpanel" class="tab-pane {if !empty($product_tab_content.content_class)}{$product_tab_content.content_class}{else}content{/if}" id="product_tab{$product_tab_content.content_id}">
					{$product_tab_content.content}
				</div>
			{else}
				<div role="tabpanel" class="tab-pane" id="product_tab{$tabid}">
					{$product_tab_content}
				</div>
			{/if}
		{/foreach}
	</div>
</div>