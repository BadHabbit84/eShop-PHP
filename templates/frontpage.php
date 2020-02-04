<div class="row"> 
	<?php foreach ($all_items as $item): ?>
		<div class="col-md-3">
			<div class="card">
				<img class="card-img-top" src="images/tv_1.jpeg" />
				<div class="card-body">
					<h5 class="card-title"><?php echo $item->item_name; ?></h5>
					<p class="card-text"><?php echo $item->item_description; ?>					
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>	
	
	

<?php include_once 'templates/includes/footer.php'; ?>