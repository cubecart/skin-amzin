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

{if $CTRL_REVIEW}

	<div id="element-reviews" class="panel panel-reviews">
		<div class="panel-heading" id="reviews"><i class="fas fa-users"></i> {$LANG.catalogue.customer_reviews} {if $REVIEWS}<div class="pull-right"><span class="hidden-xs">{$LANG.catalogue.average_rating}:</span><span class="hidden-sm hidden-md hidden-lg"><i class="fas fa-star"></i></span> <strong>{$REVIEW_AVERAGE}</strong></div>{/if}</div>
		<div class="panel-body">
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="product_reviews_view">

					{if $REVIEWS}
						<div class="row clearfix">
							<div class="col-xs-12 reviews-nav">
								<div class="pagination_reviews pagination_top pull-right">
									{if isset($PAGINATION)}{$PAGINATION}{/if}
								</div>
								<a href="#product_reviews_write" class="btn btn-success pull-right" aria-controls="product_reviews_write" role="tab" data-toggle="tab">
									<i class="fas fa-edit"></i> {$LANG.catalogue.write_a_review}
								</a>
							</div>
						</div>
				
						{foreach from=$REVIEWS item=review}
							<div class="row review_row" rel="{$review.gravatar}">
							<div class="panel review-panel">
								<div class="panel-heading">
									{$review.title}
								</div>
								<div class="panel-body">
									<div class="review-stars-display">
										{for $i = 1; $i <= 5; $i++}
											{if $i <= $review.rating}
												<span class="star"><i class="fas fa-star"></i></span>
											{else}
												<span class="star empty-rate"><i class="far fa-star"></i></span>
											{/if}
										{/for}
									</div>

									<div class="review-content">
										<div>{$review.review}</div>
									</div>
								</div>
								<div class="panel-footer">
									{if $review.gravatar_exists}
										<span class="review-gravatar gravatar">
											<a href="http://gravatar.com/emails/">
												<img class="th marg-right" id="g_{$review.gravatar}" src="">
											</a>
										</span>
									{/if}
									<span>{$review.name}</span>{if !empty($review.verified)} <span class="review_verified">{$LANG.catalogue.review_verified}</span>{/if} {if !empty($review.date)}<span>- {$review.date}</span>{/if}
								</div>
							</div>
							</div>
						{/foreach}

						<div class="row clearfix">
							<div class="col-xs-12 reviews-nav">
								<div class="pagination_reviews pagination_bottom pull-right">
									{if isset($PAGINATION)}{$PAGINATION}{/if}
								</div>
							</div>
						</div>
      
					{else}

						<div class="alert alert-info text-center">
							{$LANG.catalogue.product_not_reviewed}
							<br><br>
							<a href="#product_reviews_write" class="btn btn-success" aria-controls="product_reviews_write" role="tab" data-toggle="tab"><i class="fas fa-edit"></i> {$LANG.catalogue.write_a_review}</a>
						</div>
			
					{/if}
				
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="product_reviews_write">
					<div class="text-right">
						<a href="#product_reviews_view" class="btn btn-danger btn-sm" aria-controls="product_reviews_view" role="tab" data-toggle="tab"><i class="fas fa-times"></i> {$LANG.common.cancel}</a>
					</div>			
					<div id="review_write" class="panel panel-binx">
						
						<div class="panel-body">
							{if $REVIEW_ALLOWED}
							<form action="{$VAL_SELF}#reviews_write" id="review_form" method="post">
							<div class="row">				
								<dl class="col-xs-12">
									<dt><label for="rev_title">{$LANG.catalogue.review_title}</label></dt>
									<dd><input id="rev_title" class="form-control" type="text" name="review[title]" value="{$WRITE.title}" placeholder="{$LANG.catalogue.review_title} {$LANG.form.required}" required></dd>
								</dl>
							</div>
							
							<div class="clearfix" id="review_stars">
								<label class="pull-left" for="rating" style="margin-right:7px;">{$LANG.documents.rating} </label>
								{foreach from=$RATING_STARS item=star}
									<input type="radio" id="rating_{$star.value}" name="rating" value="{$star.value}" class="rating" {$star.checked}>
								{/foreach}
							</div>
								
							<br>
														
							<div class="row">
								<dl class="col-xs-12">
									<dt><label for="rev_review" class="return">{$LANG.catalogue.review}</label></dt>
									<dd><textarea id="rev_review" class="form-control" name="review[review]" rows="4" placeholder="{$LANG.catalogue.review} {$LANG.form.required}" required>{$WRITE.review}</textarea></dd>
								</dl>
							</div>
								
							{if $IS_USER}
								<div class="well well-sm">
									<input type="checkbox" id="rev_anon" name="review[anon]" value="1"> <label for="rev_anon">{$LANG.catalogue.post_anonymously}</label>
								</div>
							{else}
								<div class="well well-sm">
									<div class="row">
										<dl class="col-xs-12 col-sm-6">
											<dt><label for="rev_name">{$LANG.common.name}</label></dt>
											<dd><input id="rev_name" class="form-control" type="text" name="review[name]" value="{$WRITE.name}" placeholder="{$LANG.common.name} {$LANG.form.required}" required></dd>
										</dl>
										<dl class="col-xs-12 col-sm-6">
											<dt><label for="rev_email">{$LANG.common.email}</label></dt>
											<dd><input id="rev_email" class="form-control" type="text" name="review[email]" value="{$WRITE.email}" placeholder="{$LANG.common.email} {$LANG.form.required}" required></dd>
										</dl>
									</div>
								</div>
							{/if}
								
							{include file='templates/content.recaptcha.php'}
							
							<hr>
				
							<div class="clearfix text-center">
								<input type="submit" value="{$LANG.catalogue.submit_review}" data-form-id="review_form" id="review_submit" class="g-recaptcha btn btn-success">
							</div>
							</form>
							{else}
							<p class="review_blocked">{$REVIEW_BLOCKED_MESSAGE}</p>
							{/if}
						</div>
						<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

{/if}