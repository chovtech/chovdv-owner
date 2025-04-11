
<nav class="navbar navbar-expand-lg navbar-light navbarstyle fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand navbar-brandimg" href="<?php echo $defaultUrl;?>">
			<img class="img-fluid" src="<?php echo $defaultUrl;?>assets/images/website_images/edumes-blue.png" />
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
				
				<li class="nav-item me-4">
					<a class="nav-link" aria-current="page" href="<?php echo $defaultUrl.'about';?>">
						<?php echo $website_about; ?>
					</a>
				</li>
				<li class="nav-item dropdown me-4">
					<span class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo $website_product; ?>
					</span>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li>
							<a class="dropdown-item" href="<?php echo $defaultUrl.'school-management-system';?>">
								<?php echo $website_k_12; ?>
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="<?php echo $defaultUrl.'tertiary';?>">
								<?php echo $website_tertiary; ?>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item me-4">
					<a class="nav-link" href="<?php echo $defaultUrl.'pricing';?>">
						<?php echo $website_pricing; ?>
					</a>
				</li>
				<li class="nav-item me-4">
					<a class="nav-link" href="<?php echo $defaultUrl.'franchise';?>">
						<?php echo $website_franchise; ?>
					</a>
				</li>
				<!--<li class="nav-item dropdown me-4">-->
				<!--	<span class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
				<!--		<?php echo $website_insight; ?>-->
				<!--	</span>-->
				<!--	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">-->
				<!--		<li>-->
				<!--			<a class="dropdown-item" href="<?php echo $defaultUrl.'blog';?>">-->
				<!--				<?php echo $website_blogs; ?>-->
				<!--			</a>-->
				<!--		</li>-->
				<!--		<li>-->
				<!--			<a class="dropdown-item" href="#">-->
				<!--				<?php echo $website_events; ?>-->
				<!--			</a>-->
				<!--		</li>-->
				<!--	</ul>-->
				<!--</li>-->
			</ul>
			<form class="d-flex">
				<a href="<?php echo $defaultUrl; ?>sign-in/" class="btn waves-effect waves-light me-4" style="border:1px solid #007bff;color:#007bff;font-size:13px;">
					<?php echo $website_login; ?>
				</a>
				<a href="<?php echo $defaultUrl; ?>signup/" class="btn waves-effect waves-light me-4" style="color:white;font-size:13px;background: linear-gradient(90deg, rgba(0,123,255,1) 35%, rgba(2,107,219,1) 100%, rgba(0,212,255,1) 100%);">
					<?php echo $website_signup; ?>
				</a>
				<select class="me-4" style="border:none;font-size:13px;cursor:pointer;" id="changelanguage">
					<?php

						$sql_language = "SELECT * FROM language";
						$query_language = mysqli_query($link, $sql_language);
						$fetch_language = mysqli_fetch_assoc($query_language);
						$cnt_language = mysqli_num_rows($query_language);
						
						
                        

						if ($cnt_language > 0) {

							do {

								echo '<option value="' . $fetch_language['Lang_Val'] . '">' . $fetch_language['Language'] . '</option>';

							} while ($fetch_language = mysqli_fetch_assoc($query_language));

						} else {
							echo '<option value="english">English</option>';
						}

					?>
				</select>
			</form>
		</div>
	</div>
</nav>
