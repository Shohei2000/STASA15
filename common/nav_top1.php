<nav class="navbar fixed-top navbar-dark bg-dark"
	style="height: 10vh;">
	<div class="row">
        
<!--
		<div class="col-7 text-left">
			<p class="navbar-brand m-0 p-0 pl-3"><?php echo $_SESSION['user']['nickname']; ?></p>
		</div>
        
		<div class="col-4" style="display:flex; justify-content:right;">
			<span class="navbar-brand m-0 p-0 pr-3" style="">
                <?php echo $_SESSION['user']['user_point']; ?>pt
            </span>            
		</div>
        
        <div class="col-1">
            <a class="pr-3" style="display: flex; align-self: center;">
                <i class="fas fa-cog"
				style="color: white; height: 100%;"
				data-toggle="modal" data-target="#modal" data-backdrop="static"></i>
            </a>
        </div>
-->
        
        <div class="col-6 h-100 text-left">
            <span class="navbar-brand pl-3"><?php echo $_SESSION['user']['nickname']; ?></span>
        </div>
        
        <div class="col-6 h-100" style="text-align: right;">
            
            <span class="navbar-brand m-0 p-0 pr-2">
                <?php echo $_SESSION['user']['user_point']; ?>pt
            </span>
            
            <a class="navbar-brand m-0 p-0 pr-2">
                <i class="fas fa-cog"
				style="color: white; height: 100%;"
				data-toggle="modal" data-target="#modal" data-backdrop="static"></i>
            </a>
            
        </div>
                
	</div>
</nav>