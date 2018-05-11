<ul id="slide-out" class="sidenav">
	<li>
		<div class="user-view">
			<div class="background">
				<img src="imageset/dashboard-background.jpeg">
			</div>
			<a href="/profile"><img class="circle center" src="imageset/csi-logo.png"></a>
			<a href="/profile"><span class="white-text name">Test User</span></a>
			<a href="/profile"><span class="white-text email">test.user@gmail.com</span></a>
		</div>
	</li>

	<?php foreach($menu as $item => $url) { ?>
		<li><a id="button-<?php echo $item; ?>" class="waves-effect waves-grey" href="<?php echo $url; ?>"><?php echo $item; ?></a></li>
	<?php } ?>

	<li><div class="divider"></div></li>
	<li><a class="subheader">Actions</a></li>
	<li><a class="waves-effect" href="logout.php">Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav>
	<div class="nav-wrapper indigo darken-3 hoverable">
		<a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
		<a href="#" class="brand-logo center"><?php echo $heading; ?></a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li>
				<div id="timer">
				</div>
			</li>
		</ul>
	</div>
</nav>
</div>