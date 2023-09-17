<style>
	/* Remove list styles and padding for the UL */
	#footer_nav {
		list-style: none;
		padding: 0;
	}

	/* Style the list items */
	#footer_nav li {
		display: inline-block;
		/* Display the list items horizontally */
		margin-right: 10px;
		/* Add spacing between list items */
	}

	/* Add a bottom border to the list items to separate them */
	#footer_nav li.divider-vertical {
		border-bottom: 2px solid #ccc;
		margin: 0 5px;
		/* Adjust spacing as needed */
	}

	/* Style the links */
	#footer_nav a {
		text-decoration: none;
		color: #fff;
		/* Link color */
		font-weight: bold;
		font-size: 20px;
		transition: color 0.3s;
		/* Smooth color transition on hover */
	}

	/* Change link color on hover */
	#footer_nav a:hover {
		color: #007bff;
		/* Hover color */
	}
</style>
<ul class="nav" id="footer_nav">
	<li class="divider-vertical"></li>
	<li class="active"><a href="index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
	<li class="divider-vertical"></li>
	<li><a href="about.php"><i class="icon-info-sign"></i>&nbsp;About</a></li>
	<li class="divider-vertical"></li>
	<li><a href="developers.php"><i class="icon-user"></i>&nbsp;Developers</a></li>
	<li class="divider-vertical"></li>
</ul>