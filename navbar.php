<style>
	.navBar {
		background: linear-gradient(to right, #343a40, #343a40, #23272b);
		height: 20px;
		position: fixed;
		top: 0;


	}
</style>
<div class="navbar navbar-fixed-top navbar-inverse navBar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<img src="admin/images/app-icon.png" width="20" height="20" class="d-inline-block align-top rounded-circle" alt="" loading="lazy">

			</a>
			<h4 class="header" style="color: white"><span class="navbar-brand">SmartDiary</span>
			</h4>
			<?php if (isset($_SESSION['id'])) { ?>
				<div class="nav-collapse collapse">
					<ul class="nav pull-right">
						<?php
						$query = mysqli_query($conn, "select * from tbluser where user_id = '$session_id'") or die(mysqli_error($conn));
						$row = mysqli_fetch_array($query);
						?>
						<li class="dropdown">
							<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-user icon-large"></i><?php echo $row['firstname'] . " " . $row['lastname'];  ?> <i class="caret"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="change_password.php"><i class="icon-circle"></i> Change Password</a></li>
								<li><a tabindex="-1" href="#myModal_student" data-toggle="modal"><i class="icon-picture"></i> Change Avatar</a></li>
								<li class="divider"></li>
								<li>
									<a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php include('avatar_modal_student.php'); ?>