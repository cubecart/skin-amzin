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
 
{if !$CATALOGUE_MODE}
	<div class="basket-box">
		<a href="#" data-toggle="modal" data-target="#myBasket" class="basket-widget">
			<div class="clearfix">
				<span class="basketIcon"><i class="fas fa-shopping-basket"></i></span>
				{if !$CART_ITEMS}0{else}{$CART_ITEMS}{/if}
			</div>
		</a>
		<div class="modal fade" id="myBasket" tabindex="-1" role="dialog" aria-labelledby="myBasketLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
						<h4 class="modal-title" id="myEstLabel">{$LANG.basket.your_basket}</h4>
					</div>
					<div class="modal-body clearfix">
						{include file='templates/box.basket.content.php'}
						<div class="session_token hidden">{$SESSION_TOKEN}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{/if}