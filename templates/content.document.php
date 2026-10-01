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

{if {$DOCUMENT.hide_title==0}}
	<h2 class="content-title">{$DOCUMENT.doc_name}</h2>
{/if}

<div class="cleafix">
	{$DOCUMENT.doc_content}
</div>

{if $SHARE}
	<hr>
	<div>
		{foreach from=$SHARE item=html}
			{$html}
		{/foreach}
	</div>
{/if}

{foreach from=$COMMENTS item=html}
	{$html}
{/foreach}