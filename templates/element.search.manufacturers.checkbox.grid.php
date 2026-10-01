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