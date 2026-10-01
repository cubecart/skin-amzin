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

{if $SOCIAL_LINKS}
	 {include file='images/icon-sprites.svg'}
	<div class="social-links">
		{foreach from=$SOCIAL_LINKS item=link}
			<a href="{$link.url}" title="{$link.name}" target="_blank" rel="noopener noreferrer">
			<svg class="icon"><use xlink:href="#icon-{$link.icon}"></use></svg>
			</a>
		{/foreach}
	</div>
{/if}