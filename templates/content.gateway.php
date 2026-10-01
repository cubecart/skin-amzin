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

{if !isset($TRANSFER)}
	
	<h2 class="text-center">{$LANG.gateway.select}</h2>
	
	<form id="gateway-select" action="{$VAL_SELF}" method="post">
	{if $GATEWAYS}
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
				<ul class="list-group">
					{foreach from=$GATEWAYS item=gateway}
						<li class="list-group-item">
							<input name="gateway" type="radio" value="{$gateway.folder}" id="{$gateway.folder}" {$gateway.checked}>
							
							<label for="{$gateway.folder}">{$gateway.description}</label>
							
							{if !empty($gateway.help)}
								<a href="{$gateway.help}" class="info" title="{$LANG.common.information}"><i class="fas fa-info-circle"></i></a>
							{/if}
							
						</li>
					{/foreach}
				</ul>
				<br>
				<div class="text-center">
					<input type="submit" value="{$LANG.common.continue}" class="btn btn-success btn-block">
				</div>
			</div>
		</div>
	{else}
		<p class="alert alert-danger text-center">{$LANG.gateway.none_defined}</p>
	{/if}
	</form>
	
{/if}


{if isset($TRANSFER)}
	{if  $TRANSFER.mode == 'iframe'}
		<iframe src="{$IFRAME_SRC}" frameborder="0" scrolling="auto" width="100%" height="500">
			{$IFRAME_FORM}
		</iframe>
	{else}
		<form id="gateway-transfer" action="{$TRANSFER.action}" method="{$TRANSFER.method}" target="{$TRANSFER.target}">
			{foreach from=$FORM_VARS key=name item=value}
				<input type="hidden" name="{$name}" value="{$value}">
			{/foreach}
			{if $TRANSFER.mode == 'automatic'}
				<div class="gateway-transfer-block text-center">
					<p class="gt_message">{$LANG.gateway.transferring}</p>
					<p class="gt_icon icon-submit"><i class="fas fa-circle-notch fa-spin"></i></p>
				</div>
			{elseif $TRANSFER.mode == 'manual'}
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading text-center">
								{$LANG.gateway.amount_due}
							</div>
							<div class="panel-body">
								<p class="alert alert-info text-center">{$LANG_AMOUNT_DUE}</p>
								{$FORM_TEMPLATE}
							</div>
						</div>
					</div>
				</div>
			{/if}
			{if !$DISPLAY_3DS}
				<div class="text-center">
					<input type="submit" class="btn btn-success" value="{$BTN_PROCEED}">
				</div>
			{/if}
			{foreach from=$AFFILIATES item=affiliate}
				{$affiliate}
			{/foreach}

		</form>
	{/if}
{/if}

<br>
<br>
<br>
<br>
<br>