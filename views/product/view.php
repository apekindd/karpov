<?php
use yii\helpers\Html;
?>
<section>
		<div class="container">
			<div class="row">
				<?php
				if(Yii::$app->session->hasFlash('success')){?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php echo Yii::$app->session->getFlash('success'); ?>
					</div>
				<?php } ?>
				<?php if(Yii::$app->session->hasFlash('error')){?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php  echo Yii::$app->session->getFlash('error'); ?>
					</div>
				<?php  }  ?>
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
								</span>
								<div>
									<a href="<?= \yii\helpers\Url::to(['cart/add','id'=>$product->id]) ?>" data-id="<?= $product->id ?>" type="button" class="btn btn-fefault add-to-cart cart">
										<i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
								</div>
								<p><b>Категория:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'alias'=>$product->category->alias]) ?>"><?= $product->category->name ?></a></p>
								<?= $product->content ?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
<?php $reviews = $product->reviews; ?>
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Отзывы (<?=count($reviews)?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php
									if(!empty($reviews)){
										foreach($reviews as $review){
											$date = strtotime($review->date);
											?>
											<ul style="margin-bottom:0px">
												<li><a href=""><i class="fa fa-user"></i><?= $review->name ?></a></li>
												<li><a href=""><i class="fa fa-clock-o"></i><?= date("H:i", $date) ?></a></li>
												<li><a href=""><i class="fa fa-calendar-o"></i><?= date("d.m.Y", $date) ?></a></li>
											</ul>
											<p style="margin-bottom:20px"><?= nl2br($review->message) ?></p>
										<?php }
									}?>

									<p style="padding-top:30px"><i>Все публикуемые комментарии проходят премодерацию. Ваш комментарий будет опубликован сразу после проверки нашими модераторами. Администрация сайта оставляет за собой право не публиковать сообщения.</i></p>
									<p><b>Напишите свой комментарий</b></p>


									<form action="/product/review" id="msg" method="post">
										<?php echo Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
										<input type="hidden" value="<?= $product->id ?>" name="product">
										<span>
											<input type="text" name="name" required placeholder="Ваше Имя"/>
											<input type="email" name="email" required placeholder="Ваш Email"/>
										</span>
										<textarea name="message" required placeholder="Комментарий"></textarea>
										<button type="submit" id="send_msg" class="btn btn-default pull-right">
Отправить
										</button>
									</form>
								</div>
							</div>

						</div>
					</div>
					<!--/category-tab-->
				<?php $cnt = count($hits); if($cnt > 0){?>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Рекомендуемые товары</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $i=0; foreach($hits as $hit){?>
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
				<?php } ?>
				</div>
			</div>
		</div>
	</section>