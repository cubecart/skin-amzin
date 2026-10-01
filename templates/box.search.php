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

<form action="{$STORE_URL}/search{$CONFIG.seo_ext}" class="search_form" method="get">
	<div class="input-group" id="search_container">
	<input name="search[keywords]" type="text" data-image="true" data-amount="15" class="form-control search_input nomarg{if $CONFIG.elasticsearch=='1'} es{/if}" autocomplete="off" placeholder="{$LANG.search.input_default}" required>
		<div class="input-group-btn">
			<button class="btn btn-default" type="submit" value="{$LANG.common.search}"><i class="fas fa-search"></i></button>
		</div>
	</div>
	<input type="hidden" name="_a" value="category">
</form>