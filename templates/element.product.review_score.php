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

{if $PRODUCT.review_score && $CTRL_REVIEW}
	<div class="product-reviews-block">
		<div class="review-stars-display">
		{for $i = 1; $i <= 5; $i++}
			{if $PRODUCT.review_score >= $i}
				<span class="star"><i class="fas fa-star"></i></span>
			{elseif $PRODUCT.review_score > ($i - 1) && $PRODUCT.review_score < $i}
				<span class="star half-rate"><i class="fas fa-star-half-alt"></i></span>
			{else}
				<span class="star empty-rate"><i class="far fa-star"></i></span>
			{/if}
		{/for}
		</div>
		<div class="review-score-sum">{$LANG_REVIEW_INFO}</div>
	</div>
{elseif !$PRODUCT.review_score && $CTRL_REVIEW}	
	<div class="product-reviews-block">
		<div class="review-stars-display">
			<span class="star empty-rate"><i class="far fa-star"></i></span>
			<span class="star empty-rate"><i class="far fa-star"></i></span>
			<span class="star empty-rate"><i class="far fa-star"></i></span>
			<span class="star empty-rate"><i class="far fa-star"></i></span>
			<span class="star empty-rate"><i class="far fa-star"></i></span>
		</div>
	</div>
{/if}