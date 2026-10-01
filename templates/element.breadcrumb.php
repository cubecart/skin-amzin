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

{if $CRUMBS}
	<div id="element-breadcrumbs" class="hidden-xs">
		<ol class="breadcrumb">
			<li>
				<a href="{$STORE_URL}">
					<i class="fas fa-home"></i> &nbsp;
					<span class="hidden-xs">{$LANG.common.home}</span>
				</a>
			</li>
			{foreach from=$CRUMBS item=crumb name=crumbposition}
				{assign var="position" value=$smarty.foreach.crumbposition.iteration+1}
				<li>
					<a href="{$crumb.url}">
						<span>{$crumb.title}</span>
					</a>
				</li>
			{/foreach}
		</ol>
	</div>
{/if}
