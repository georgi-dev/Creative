			
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification01" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						
						<div class="modal-header">
							<h4 class="modal-title">Login form</h4>
						</div><!-- /.modal-header -->
						
						<!-- ============================================================= MODAL CONTENT ============================================================= -->
					
						<div class="modal-body">
							
							<div class="container inner-xs text-center">
								<form>
								  <div class="form-group">
								    <label for="un">Username</label>
								    <input type="text" class="form-control" id="username" placeholder="Your admin Username">
								  </div>
								  <div class="form-group">
								    <label for="up">Password</label>
								    <input type="password" class="form-control" id="password" placeholder="Your Admin Password">
								  </div>
								</form>

							</div><!-- /.container -->
							
						</div><!-- /.modal-body -->
						<?php 
						// $obj = new Admins();
						// $tr = $obj->loginAdmin();
						//   print_r($tr);
						?>
						<!-- ============================================================= MODAL CONTENT : END ============================================================= -->
						
						<div class="modal-footer">
							<button type="button" id="lgn_submit" class="btn btn-default"><i class="icon-key"></i> Login</button>
						</div><!-- /.modal-footer -->
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<script>
    // $(document).ready(function(){
    //     Admins.login();
    // });
</script>