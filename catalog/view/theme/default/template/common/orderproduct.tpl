<?php echo $header; ?>
<div class="container">
	<h3>OrderProduct</h3>
	<div class="row" style="margin-top:20px;margin-bottom:20px;">			
		<?php foreach($latestOrderProducts as $latestOrderProduct){?>
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
			  <img src="<?php echo $latestOrderProduct["pattern"];?>">
			  <div class="caption">
				<p><strong>Technology:</strong><?php echo $latestOrderProduct["technology"];?></p>
				<p><strong>Material:  </strong><?php echo $latestOrderProduct["material"];?></p>
				<p><strong>Describe:  </strong><?php echo $latestOrderProduct["describe"];?></p>
				<p>create by <i><?php echo $latestOrderProduct["name"];?></i> at <i><?php echo $latestOrderProduct["date_added"];?></i></p>
			  </div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php if($pages>1){?>
		<nav>
		  <ul class="pagination">
			<?php for($i=1;$i<=$pages;$i++){?>
				<li <?php if($i == $currentpage) echo "class='active'";?>><a href="<?php echo $orderproduct."&page=".$i;?>"><?php echo $i;?></a></li>
			<?php }?>
		  </ul>
		</nav>
	<?php }?>
</div>
<?php echo $footer; ?>