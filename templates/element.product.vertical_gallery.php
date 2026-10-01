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
 
 
{if $GALLERY|@count gt 1}
	<div class="product-imgs-container">
		<ul id="imageGallery">
			{foreach from=$GALLERY item=image}
				<li {if $image@total lt 2} style="display:none"{/if} data-thumb="{$image.small}" data-src="{$image.medium}">
					<a href="{$image.medium}" rel="gallery-2" class="swipebox" title="{$LANG.catalogue.click_enlarge}">
						<img class="gallery-img" src="{$image.medium}" alt="{$LANG.catalogue.click_enlarge}">
					</a>
				</li>
			{/foreach}
		</ul>
	</div>
{else}
	<div class="product-gallery-box">
		<div class="product-img-main">
			<img src="{$PRODUCT.medium}" alt="{$PRODUCT.name}" id="img-preview">
		</div>
	</div>
{/if}