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

<div class="row">
	<ul class="list-unstyled search-manufacturers-grid clearfix">

		{assign var=rowlimit value=0}

		{foreach from=$MANUFACTURERS item=manufacturer}
			{assign var=rowlimit value=$rowlimit+1}
			
			{if $rowlimit eq 1}
				<div class="col-xs-12">
					<div class="row">
			{/if}

			<div class="col-sm-3">
				<li>
					<label for="manufacturer_{$manufacturer.id}"><input type="checkbox" value="{$manufacturer.id}" id="manufacturer_{$manufacturer.id}" name="search[manufacturer][]" {$manufacturer.selected}>{$manufacturer.name}</label>
				</li>
			</div>

			{if $rowlimit eq 4}
					</div>
				</div>
				{assign var=rowlimit value=0}
			{/if}
	
		{/foreach}

		{if $infoid gt 0}
				</div>
			</div>
		{/if}
	</ul>
</div>