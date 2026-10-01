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
	<ul class="pagination clearfix" id="element-paginate">
	
		{if ($page > 1)}
			{$params[$var_name] = $page-1}
			<li class="previous-page">
				<a href="{$current}{http_build_query($params)}{$anchor}">
					<i class="fas fa-chevron-left"></i>
				</a>
			</li>
		{else}
			<li class="disabled previous-page">
				<a href="javascript:">
					<i class="fas fa-chevron-left"></i>
				</a>
			</li>
		{/if}
   
		{for $i = 1; $i <= $total; $i++}
			{$params[$var_name] = $i}
			{if ($i == $page)}
				<li class="active hidden"><a href="">{$i}</a></li>
			{else}
				<li class="hidden"><a href="{$current}{http_build_query($params)}{$anchor}">{$i}</a></li>
			{/if}
		{/for}
   
		{if ($page < $total)}
			{$params[$var_name] = $page + 1}
			<li class="arrow next-page">
				<a href="{$current}{http_build_query($params)}{$anchor}">
					<i class="fas fa-chevron-right"></i>
				</a>
			</li>
		{else}
			<li class="disabled next-page">
				<a href="javascript:">
					<i class="fas fa-chevron-right"></i>
				</a>
			</li>
		{/if}

	</ul>