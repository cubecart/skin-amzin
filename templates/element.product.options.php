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

{if is_array($OPTIONS)}
	<div class="product-options">
	{foreach from=$OPTIONS item=option}
		
		{if $option.type == Catalogue::OPTION_RADIO}
			
			<div class="product-options-sec radio-options">
				
				{* If we only have one required option replace with hidden field *}
				{if $option.required && count($option.values)===1}
					<label for="option_{$option.option_id}" class="return option-title">{$option.option_name}</label>
					<div>{$option.values.0.value_name}{if $option.values.0.price}<span class="option-cost">{$option.values.0.symbol}{$option.values.0.price}</span>{/if}</div>
					<input type="hidden" name="productOptions[{$option.option_id}]" id="option_{$option.option_id}" value="{$option.values.0.assign_id}"{if !$CTRL_HIDE_PRICES} data-price="{$option.values.0.decimal_price}"{/if}>
				{else}
					<label class="option-title">{$option.option_name}{if $option.required} ({$LANG.common.required}){/if}</label>
					<div id="error_option_{$option.option_id}">
						{foreach from=$option.values item=value name=options}
							<div>
								<input type="radio" name="productOptions[{$option.option_id}]" id="rad_option_{$value.assign_id}" value="{$value.assign_id}" class="nomarg{if $value.absolute_price == '1'} absolute{/if}"{if empty($_POST) && !empty($value.option_default)} checked="checked"{/if}{if !$CTRL_HIDE_PRICES} data-price="{$value.decimal_price}"{/if}{if $smarty.foreach.options.first} rel="error_option_{$option.option_id}" {if $option.required}required{/if}{/if}>
								 <label for="rad_option_{$value.assign_id}" class="return">{$value.value_name}{if $value.price}<span class="option-cost">{$value.symbol}{$value.price}</span>{/if}</label>
							</div>
						{/foreach}
					</div>
				{/if}
	
			</div>
		
		{elseif $option.type == Catalogue::OPTION_SELECT}
			
			<div class="product-options-sec select-options">
				
				{* If we only have one required option replace with hidden field *}
				{if $option.required && count($option.values)===1}
					<label for="option_{$option.option_id}" class="return option-title">{$option.option_name}</label>
					<div>{$option.values.0.value_name}{if $option.values.0.price}<span class="option-cost">{$option.values.0.symbol}{$option.values.0.price}</span>{/if}</div>
					<input type="hidden" name="productOptions[{$option.option_id}]" id="option_{$option.option_id}" value="{$option.values.0.assign_id}"{if !$CTRL_HIDE_PRICES} data-price="{$option.values.0.decimal_price}"{/if}>
				{else}
					<label for="option_{$option.option_id}" class="return option-title">{$option.option_name}{if $option.required} ({$LANG.common.required}){/if}</label>
					<select name="productOptions[{$option.option_id}]" id="option_{$option.option_id}" class="form-control" {if $option.required}required{/if}>
						<option value="">{$LANG.form.please_select}</option>
						{foreach from=$option.values item=value}
							<option value="{$value.assign_id}"{if $value.absolute_price == '1'}class="absolute"{/if}{if empty($_POST) && !empty($value.option_default)} selected="selected"{/if}{if !$CTRL_HIDE_PRICES} data-price="{$value.decimal_price}"{/if}>{$value.value_name} {if $value.price} {$value.symbol}{$value.price}{/if}</option>
						{/foreach}
					</select>
				{/if}
			
			</div>

		{elseif $option.type == Catalogue::OPTION_TEXTBOX ||$option.type == Catalogue::OPTION_TEXTAREA }

			<div class="product-options-sec text-options">
				<label for="option_{$option.option_id}" class="return option-title">{$option.option_name}{if $option.price}<span class="option-cost">{$option.symbol}{$option.price}</span>{/if}{if $option.required} ({$LANG.common.required}){/if}</label>
				<div>
					{if $option.type == Catalogue::OPTION_TEXTBOX}
						<input class="form-control" type="text" name="productOptions[{$option.option_id}][{$option.assign_id}]" id="option_{$option.option_id}"{if $option.absolute_price == '1'} class="absolute"{/if}{if !$CTRL_HIDE_PRICES} data-price="{$option.decimal_price}"{/if} {if $option.required}required{/if}>
					{elseif $option.type == Catalogue::OPTION_TEXTAREA}
						<textarea class="form-control" name="productOptions[{$option.option_id}][{$option.assign_id}]" id="option_{$option.option_id}"{if $option.absolute_price == '1'} class="absolute"{/if}{if !$CTRL_HIDE_PRICES} data-price="{$option.decimal_price}"{/if} {if $option.required}required{/if}></textarea>
					{/if}
				</div>
			</div>

		{else}

			{if $OTHER_CHOOSERS}{include file='templates/element.product.other_choosers.php'}{/if}
	
		{/if}
	{/foreach}
	</div>
{/if}