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

<form action="{$STORE_URL}/search{$CONFIG.seo_ext}" class="search_form" method="get">
	<div class="input-group" id="search_container">
	<input name="search[keywords]" type="text" data-image="true" data-amount="15" class="form-control search_input nomarg{if $CONFIG.elasticsearch=='1'} es{/if}" autocomplete="off" placeholder="{$LANG.search.input_default}" required>
		<div class="input-group-btn">
			<button class="btn btn-default" type="submit" value="{$LANG.common.search}"><i class="fas fa-search"></i></button>
		</div>
	</div>
	<input type="hidden" name="_a" value="category">
</form>