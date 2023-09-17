<?php include('header.php'); ?>

<body id="login">
	<div class="container">
		<div class="row">
			<!-- Left Column for title_index.php -->
			<div class="col-md-6">
				<div class="title_index">
					<?php include('title_index.php'); ?>
				</div>
			</div>
			<!-- Login Form -->
			<div class="align-right" style="margin-bottom: 60px"></div>
			<?php include('login_form.php'); ?>
		</div>
		<!-- Right Column for login form and link.php -->
		<div class="col-md-6">
			<div class="text-right text-center mt-3">
				<center><?php include('link.php'); ?></center>
			</div>

		</div>
	</div>
	</div>

	<?php include('script.php'); ?>
</body>

</html>