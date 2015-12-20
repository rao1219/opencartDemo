<?php echo $header; ?>
<div class="container">
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?><?php echo $content_bottom; ?>
		<div class="row" style="margin-top:20px;margin-bottom:20px;">
			<h2>Latest Order <a class="btn btn-primary btn-ls pull-right" href="<?php echo $orderproduct;?>">More<a></h2>
			<?php foreach($latestOrderProducts as $latestOrderProduct){?>
			<div class="col-sm-6 col-md-4">
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
	</div>
  </div>
</div>
<?php echo $footer; ?>