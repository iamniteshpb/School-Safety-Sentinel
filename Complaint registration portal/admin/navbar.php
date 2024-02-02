
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="index.php?page=complaints" class="nav-item nav-complaints"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Complainants</a>
				<div class="mx-2 text-white">Master List</div>
				<a href="index.php?page=complainants" class="nav-item nav-complainants"><span class='icon-field'><i class="fa fa-user-secret "></i></span> Complainants</a>
				<a href="index.php?page=responders" class="nav-item nav-responders"><span class='icon-field'><i class="fa fa-user-shield "></i></span> Responders</a>
				<a href="index.php?page=stations" class="nav-item nav-stations"><span class='icon-field'><i class="fa fa-building "></i></span> Stations</a>
				<div class="mx-2 text-white">Report</div>
				<a href="index.php?page=complaints_report" class="nav-item nav-complaints_report"><span class='icon-field'><i class="fa fa-th-list"></i></span> Complaints Report</a>
				
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
