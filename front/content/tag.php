		<main>
			
			<!-- ============================================================= SECTION – PORTFOLIO ============================================================= -->
		
			<section id="portfolio">
				
				<div class="container inner">
					<div class="row">
						<div class="col-md-8 col-sm-9 center-block text-center">
							<header>
								<h1>4 Columns grid portfolio</h1>
								<p>Magnis modipsae voloratati andigen daepeditem quiate re porem que aut labor. Laceaque eictemperum quiae sitiorem rest non restibusaes.</p>
							</header>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container -->
				
				<div class="container inner-bottom">
					<div class="row">
						<div id="ulSrc" class="col-sm-12 portfolio">
							
							<ul class="filter text-center">
								<li><a href="#" data-filter="*" class="active">All</a></li>
								<li><a href="#" data-filter=".font">Font</a></li>
								<li><a href="#" data-filter=".template">Template</a></li>
								<li><a href="#" data-filter=".product1">Product 1</a></li>
								<li><a href="#" data-filter=".product2">Product 2</a></li>
							</ul><!-- /.filter -->
							
								<!-- NOWO TTEtet -->
								<ul  class="items col-4" id="item_by_tags">
										<!-- Javascript request -->

										<li class="item thumb identity">
										<a href="portfolio-post2">
										<figure>
											<figcaption class="text-overlay">
												<div class="info">
													<h4>Grand Motel</h4>
													<p>Identity</p>
												</div><!-- /.info -->
											</figcaption>
											<img src="<?php echo MAIN_URL;?>assets/images/art/Penguins.jpg" alt="">
										</figure>
									</a>
									
								</li>

								</ul>
               	
						            
						</div><!-- /.col -->
								<input type="hidden" id="hddnPage" value="1" />

						            <nav class="row">
						                <div class="col-md-14">
						                    <ul class="pagination pull-right"></ul>
						                </div>
						            </nav>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>
			
			<!-- ============================================================= SECTION – PORTFOLIO : END ============================================================= -->
			

			
		</main>
			<script>
			$(document).ready(function(){ 
				Tags.show_item_by_tags('<?php echo CONTENT_SUBPAGE;?>',{page: 1});
				// $(".changecolor").switchstylesheet( { seperator:"color"} );
			});
		</script>