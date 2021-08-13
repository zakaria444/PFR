<?php require APPROOT . '/views/inc/headeruser.php'; ?>
<div id="fh5co-main">
<div class="fh5co-narrow-content animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
				
				<div class="row">
					<div class="col-md-4 col-md-offset-1">
						<h1>Contact MBM Here</h1>
					</div>
          
				</div>
        <br /><br />
        <?php
        var_dump($_SESSION)
        ?>
				<form action="<?php echo URLROOT; ?>/contacts/contactme" method="POST">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="sujet" class="form-control" placeholder="Sujet">
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary btn-md" value="Send Message">
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</form>
			</div>
</div>
