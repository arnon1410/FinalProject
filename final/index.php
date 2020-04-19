<?php session_start(); ?>
<?php
include('h.php');
?>
<img class="wave" src="img/wave.png">
<div class="container">
	<div class="img">
		<img src="img/bg.svg">
	</div>
	<div class="login-content">

		<form name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
		<form action="index.html">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
			
			<div class="input-div one">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="div">
					<input type="text" name="username" class="form-control" required placeholder="Username" />
				</div>
			</div>
			<div class="input-div pass">
				<div class="i">
					<i class="fas fa-lock"></i>
				</div>
				<div class="div">
					<input type="password" name="password" class="form-control" required placeholder="Password" />
				</div>
			</div>
			<div class="div">
				<button type="submit" class="btn btn-success" id="btn">
					Login </button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>
		</form>
	</div>
	</form>
</div>
<script type="text/javascript" src="js/main.js"></script>