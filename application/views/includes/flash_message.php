<div class="row-fluid">
	<div class="area-top clearfix">
		<div class="pull-left header">
			<h3 class="title">
				<i class="icon-info-sign"></i><?=$name?></h3>
		</div>
		<ul class="inline pull-right sparkline-box">
			<li class="sparkline-row">
				<h4 class="blue"><span>Logged in as</span><?php echo $this->session->userdata('username'); ?></h4>
			</li>
		</ul>
	</div>
</div>