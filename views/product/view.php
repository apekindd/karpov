<?php
use yii\helpers\Html;
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include('/includes/sidebar.inc.php')?>
				</div>
<?php
	$mainImg = $product->getImage();
 	$gallery = $product->getImages();
?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<?php/*<div class="view-product productinfo text-center">
								<?= Html::img($mainImg->getUrl(),['alt'=>$product->name]) ?>
							</div>*/?>
							<?php/*
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								<div class="carousel-inner">
									<?php
									$cnt=count($gallery);
									$i=0;
									foreach($gallery as $img){?>
										<?php if($i%3==0){ ?>
											<div class="<?= ($i==0) ? 'active' : '' ?> item">
										<?php } ?>
										<a href=""><?= Html::img($img->getUrl('84x85'),[]) ?></a>

										<!--											<a href=""><img src="--><?//= $img->getUrl(); ?><!--" alt=""></a>-->
										<?php
										$i++;
										if($i%3==0 || $i==$cnt){ ?>
											</div>
										<?php } ?>
										<?php
									}
									?>
								</div>
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
							*/?>

							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">

									<?php for($x=0; $x<count($gallery); $x++){ ?>
									<li data-target="#myCarousel" data-slide-to="<?= $x ?>" <?=($x==0) ? 'class="active"' : '' ?>></li>
									<?php } ?>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner view-product productinfo text-center" role="listbox">
									<?php $i=0;foreach($gallery as $item){?>
									<div class="item <?= ($i==0) ? 'active' : '' ?>" style="padding:0px!important">
										<?= Html::img($item->getUrl('330x248'),['alt'=>$product->name]) ?>
									</div>
									<?php $i++; } ?>
								</div>

								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">&#8592;</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">&#8594;</span>
								</a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<?php
								if($product->new){
									echo Html::img('@web/images/home/new.png',['class'=>'newarrival']);
								}elseif($product->sale){
									echo Html::img('@web/images/home/sale.png',['class'=>'newarrival']);
								}
								?>
								<h2><?= $product->name ?></h2>
								<p>Код товара: <?= $product->id ?></p>
								<span>
									<span>Цена: <?= $product->price ?>грн</span>
									<label>Количество:</label>
									<input type="text" value="1" id="qty" />
									<a href="<?= \yii\helpers\Url::to(['cart/add','id'=>$product->id]) ?>" data-id="<?= $product->id ?>" type="button" class="btn btn-fefault add-to-cart cart">
										<i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
								</span>
								<p><b>Категория:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id'=>$product->category->id]) ?>"><?= $product->category->name ?></a></p>
								<?= $product->content ?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

<!--					<div class="category-tab shop-details-tab"><!--category-tab-->
<!--						<div class="col-sm-12">-->
<!--							<ul class="nav nav-tabs">-->
<!--								<li><a href="#details" data-toggle="tab">Details</a></li>-->
<!--								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>-->
<!--								<li><a href="#tag" data-toggle="tab">Tag</a></li>-->
<!--								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>-->
<!--							</ul>-->
<!--						</div>-->
<!--						<div class="tab-content">-->
<!--							<div class="tab-pane fade" id="details" >-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery1.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery2.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery3.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery4.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--							<div class="tab-pane fade" id="companyprofile" >-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery1.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery3.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery2.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery4.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--							<div class="tab-pane fade" id="tag" >-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery1.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery2.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery3.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								<div class="col-sm-3">-->
<!--									<div class="product-image-wrapper">-->
<!--										<div class="single-products">-->
<!--											<div class="productinfo text-center">-->
<!--												<img src="/images/home/gallery4.jpg" alt="" />-->
<!--												<h2>$56</h2>-->
<!--												<p>Easy Polo Black Edition</p>-->
<!--												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--							<div class="tab-pane fade active in" id="reviews" >-->
<!--								<div class="col-sm-12">-->
<!--									<ul>-->
<!--										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>-->
<!--										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>-->
<!--										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>-->
<!--									</ul>-->
<!--									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>-->
<!--									<p><b>Write Your Review</b></p>-->
<!---->
<!--									<form action="#">-->
<!--										<span>-->
<!--											<input type="text" placeholder="Your Name"/>-->
<!--											<input type="email" placeholder="Email Address"/>-->
<!--										</span>-->
<!--										<textarea name="" ></textarea>-->
<!--										<b>Rating: </b> <img src="/images/product-details/rating.png" alt="" />-->
<!--										<button type="button" class="btn btn-default pull-right">-->
<!--Submit-->
<!--										</button>-->
<!--									</form>-->
<!--								</div>-->
<!--							</div>-->
<!---->
<!--						</div>-->
<!--					</div>-->
					<!--/category-tab-->

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Рекомендуемые товары</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $cnt = count($hits); $i=0; foreach($hits as $hit){?>
									<?php if($i%3 == 0){ ?>
									<div class="item <?= ($i==0)? 'active' : '' ?>">
									<?php } ?>
										<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<?= Html::img("@web/images/products/{$hit->img}",['alt'=>$hit->name]) ?>
													<h2><?= $hit->price ?>грн</h2>
													<p><a href="<?= \yii\helpers\Url::to(['product/view','id'=>$hit->id]) ?>"><?= $hit->name ?></a></p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>
												</div>
											</div>
										</div>
									</div>
									<?php $i++; if($i%3 == 0 || $cnt == $i){ ?>
									</div>
									<?php } ?>
								<?php
								} ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>