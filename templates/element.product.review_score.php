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