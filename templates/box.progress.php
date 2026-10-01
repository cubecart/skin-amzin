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

{if isset($BLOCKS)}
	<div class="row">
		<ul class="list-unstyled clearfix checkout-progress-wrapper" id="box-progress">
			{foreach from=$BLOCKS item=block}
				<li class="col-xs-4 text-center checkout-progress {$block.class}"><a href="{$block.url}"><span class="hidden-xs">{$block.step}.</span> {$block.title}</a></li>
			{/foreach}
		</ul>
	</div>
{/if}