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

{if $LANGUAGES}
	<div class="dropdown">
		<a href="#" class="parent-link dropdown-toggle" type="button" id="language_dropdown" title="{$current_language.title}" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<img src="{$STORE_URL}/language/flags/{$current_language.code}.png" alt="{$current_language.title}">
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="language_dropdown">
			{foreach from=$LANGUAGES item=language}
				{if $current_language.code!==$language.code}
					<li>
						<a href="{$language.url}" title="{$language.title}" rel="nofollow"><img src="{$STORE_URL}/language/flags/{$language.code}.png" alt="{$language.title}"> {$language.title}</a>
					</li>
				{/if}
			{/foreach}
		</ul>
	</div>
{/if}