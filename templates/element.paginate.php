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