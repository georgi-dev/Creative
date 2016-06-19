
		
		<!-- ============================================================= HEADER : END ============================================================= -->
		
		
		<!-- ============================================================= MAIN ============================================================= -->
		
		<main>
			
			<!-- ============================================================= SECTION вЂ“ PORTFOLIO POST ============================================================= -->
			
			<section id="portfolio-post">
				<div class="container inner-top-md">
					<div class="row">
						
						<div class=" col-md-6">

							<div id="owl-work" style="height:380px;overflow:hidden;"class="owl-carousel owl-inner-pagination owl-inner-nav owl-ui-md">
								
								<?php
								$img_obj = new Scraper_creative();

								$img = $img_obj->get_image();

								echo $img;

								?>
										
								
							</div><!-- /.item -->
								
							<div class="col-md-12">
								<h3 class="sidelines text-left"><span><i class="icon-doc-text"></i>Author Items</span></h3>
								<ul class="row border" id="author_items">


								</ul>
								<h3 class="sidelines text-left"><span><i class="icon-doc-text"></i>View Fonts</span></h3>
								<div class="col-md-12">	

									<div class="form-group col-md-7">
										<form>
											<input type="text" class="form-control" style="margin-top: 20px;border:1px solid #73879C;" value="When zombies arrive, quickly fax judge Pat" />
										</form>
									</div>

									<div class = "col-md-5" style="margin-top:40px;">

										<div class = "pull-right">
											<a href="javascript:0" id="size_24pt"class="button_size" data-size="24" style="font-size:0.6em;"><em>24pt</em><span style="position:absolute;top:-10px;left:53px;">A</span></a>
											<a href="javascript:0" id="size_36pt"class="button_size" data-size="36"><em>36pt</em><span style="position:absolute;top:-23px;left:10px;">A</span></a>
											<a href="javascript:0" id="size_48pt"class="button_size" data-size="48"><em>48pt</em><span style="position:absolute;top:-27px;left:13px;">A</span></a>
											<a href="javascript:0" id="size_72pt"class="button_size" data-size="72"><em>72pt</em><span style="position:absolute;top:-27px;left:20px;">A</span></a>

										</div>

									</div>

								</div>	

								<ul class="border" id="fonts">
									<span class="fonts_name"></span>

								</ul>
								<!-- <span style="border:1px solid red;"class="field_item_name"></span><br/>
								<span style="border:1px solid red;"class="field_author_name"></span> -->
							</div>
								<div class="text-small">
								
								<a href="#" class="txt-btn">View more in Creative Market</a>
							</div>
						</div><!-- /.col -->
							
						<div class="right-column col-md-6 inner-left-sm">
							
							<header>
								<h2 class="field_products_name"></h2>
								
								<em class="small">by</em>
									<a class="field_products_author"></a>
								<em class="small"> in </em>
									<a class="field_products_cat"></a><i class="icon-right-open"></i><a class="field_products_sub_cat"></a>

								<em class="icon-heart"><strong class="field_products_likes"></strong></em> 
							</header>
							
							<section class="light-bg outer-top-xs outer-bottom-xs bordered inner-xs inner-left-xs inner-right-xs clearfix">	
		
								<div class="col-md-6">
									<button class="btn btn btn-large" data-url="?u=saimana"><i class="icon-down-circle2"></i> <small> Buy only for</small> <span class="field_products_price"></span></button>
								</div>

								<div class="col-md-6 social-share">
									<strong class="small">share this in:</strong><br>
									<a class="pinterest btn btn-small btn-gray" href="https://pinterest.com/pin/create/button/?url=http%3A//img.url.com&media=http%3A//img.url.com&description=fasdfasd%20fasd%20fsadf%20asdf%20ads"><i class="icon-s-pinterest"></i></a>
									<a class="facebook btn btn-small btn-gray" href="https://pinterest.com/pin/create/button/?url=http%3A//img.url.com&media=http%3A//img.url.com&description=fasdfasd%20fasd%20fsadf%20asdf%20ads"><i class="icon-s-facebook"></i></a>	
									<a class="google btn btn-small btn-gray" href="https://pinterest.com/pin/create/button/?url=http%3A//img.url.com&media=http%3A//img.url.com&description=fasdfasd%20fasd%20fsadf%20asdf%20ads"><i class="icon-s-gplus"></i></a>
									<a class="twitter btn btn-small btn-gray" href="https://pinterest.com/pin/create/button/?url=http%3A//img.url.com&media=http%3A//img.url.com&description=fasdfasd%20fasd%20fsadf%20asdf%20ads"><i class="icon-s-twitter"></i></a>
									
								</div>	
								
							</section>

							<div class="text-small">
								<p id="field_products_desc"></p>
								<a href="#" class="txt-btn">Go to Creative Market</a>
							</div>

							<section class="row outer-top-xs clearfix">	

								<h3 class="sidelines text-left"><span><i class="icon-doc-text"></i> Product details</span></h3>
								
								<div class="light-bg bordered inner-xs inner-top-xs inner-left-xs inner-right-xs clearfix">
									<div class="col-md-6 div1">		
							
										<ul class="item-details">
										
											<li class="date">
												<span>Price</span><a class="pull-right field_products_price"></a>
											</li>
											<li class="date">
												<span>Date</span><a class="pull-right field_products_date"></a>
											</li>
											<li  class="categories">
												<span>Category</span><a class="pull-right categories field_products_cat"></a>
											</li>
											<li  class="categories">
												<span>Sub-category</span><a class="pull-right categories field_products_sub_cat"></a>
											</li>
											<li  class="categories">
												<span>Licenses Offered</span><a class="pull-right categories field_products_license"></a>
											</li>
										</ul>

									</div>

									<div class="col-md-6 div2">
										<ul class="item-details">
											<li class="categories">
												<span>File Types</span><a class="pull-right categories field_products_type"></a>
											</li>
											<li class="categories">
												<span>File Size</span><a class="pull-right categories field_products_size"></a>
											</li>
											<li class="categories">
												<span>Vector</span><a class="pull-right categories field_products_vector"></a>
											</li>
											<li class="categories">
												<span>Web Font</span><a class="pull-right categories field_products_web_font"></a>
											</li>

											<li class="categories">
												<span>Requirements</span><a class="pull-right categories field_products_requirements"></a>
											</li>
											<li class="categories">
												<span>Layered</span><a class="pull-right categories field_products_layered"></a>
											</li>
											<li class="categories">
												<span>DPI</span><a class="pull-right categories field_products_dpi"></a>
											</li>
											<li class="categories">
												<span>Dimensions</span><a class="pull-right categories field_products_dimensions"></a>
											</li>
										</ul>
									</div>	
								</div>

							 </section>	

							<section class="tags row outer-top-xs">

								<h3 class="sidelines text-left"><span><i class="icon-tag-1"></i> Product Tags</span></h3>
								
								<div class="tags_style text-justify field_product_tags"></div>
							</section>
							

						</div><!-- /.col -->
						
					</div><!-- /.row -->
				</div><!-- /.container -->
				
			</section>
			
			<section id="more-works">
				<div class="container inner-top-sm inner-bottom">

					<div class="row">
						<div class="col-sm-12">

							<div id="accordion" class="panel-group blank">
								<div class="panel panel-default">			  
									
									<div class="panel-heading text-center">
										<h4 class="panel-title">
											<a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#content">
												<span>Similar Design Goodies</span>
											</a>
										</h4>
									</div><!-- /.panel-heading -->
									
									<div id="content" class="panel-collapse collapse in">
										<div class="row panel-body">
											<div id="ulSrc" class="col-sm-12 portfolio">
						
												<ul class="filter text-center">
													<li><a href="#" data-filter="*" class="active">All</a></li>
													<li><a href="#" data-filter=".font">Font</a></li>
													<li><a href="#" data-filter=".template">Template</a></li>
													<li><a href="#" data-filter=".product1">Product 1</a></li>
													<li><a href="#" data-filter=".product2">Product 2</a></li>
												</ul><!-- /.filter -->
				
												<ul class="items col-4" id="ul2">
														<!-- Javascript request -->

														<li class="item thumb identity">
														<a href="portfolio-post2">
														<figure>
															<figcaption class="text-overlay">
																<div class="info">
																	<h4>Title</h4>
																	<p>Decription</p>
																</div><!-- /.info -->
															</figcaption>
															<img src="/assets/images/art/Penguins.jpg" alt="">
														</figure>
													</a>
													</li>

												</ul>
										</div><!-- /.col -->

										<input type="hidden" id="hddnPage" value="1" />

										</div><!-- /.panel-body -->

										<nav class="row">
										    <div class="col-md-14">
										        <ul class="pagination text-center"></ul>
										    </div>
										</nav>

									</div><!-- /.content -->


									
								</div><!-- /.panel -->
							</div><!-- /.accordion -->

						</div><!-- /.col -->
					</div><!-- /.row -->

				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION вЂ“ MORE WORKS : END ============================================================= -->
			
			
			<!-- ============================================================= SECTION вЂ“ SHARE ============================================================= -->
			
			<section id="share" class="light-bg">
				<div class="container">
					
					<div class="col-sm-4 reset-padding">
						<a href="#" class="btn-share-md">
							<p class="name">Facebook</p>
							<i class="icon-s-facebook"></i>
							<p class="counter">1080</p>
						</a>
					</div><!-- /.col -->
					
					<div class="col-sm-4 reset-padding">
						<a href="#" class="btn-share-md">
							<p class="name">Twitter</p>
							<i class="icon-s-twitter"></i>
							<p class="counter">1263</p>
						</a>
					</div><!-- /.col -->
					
					<div class="col-sm-4 reset-padding">
						<a href="#" class="btn-share-md">
							<p class="name">Google +</p>
							<i class="icon-s-gplus"></i>
							<p class="counter">963</p>
						</a>
					</div><!-- /.col -->
					
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION вЂ“ SHARE : END ============================================================= -->
			
		</main>
		
		<!-- ============================================================= MAIN : END ============================================================= -->
		
		
		<!-- ============================================================= FOOTER ============================================================= -->

		
		<?php 
		

		?>
		
		<script>
			$(document).ready(function(){
				
        Creatives.getOne('<?php echo CONTENT_SUBPAGE;?>');
        Creatives.show_home_products({page: 1});
         Creatives.show_authors_products('<?php $obj = new Scraper_creative; 
         	echo $obj->get_author();?>');
    });
		</script>
		<!-- For demo purposes вЂ“ can be removed on production : End -->
