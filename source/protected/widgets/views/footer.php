<div class="ft-widget">
	<div class="wrr-ft">
		<div class="table <?php echo $style_class;?>">
			<div class="table-row">
				<?php for ($i=0; $i<$numbercell; $i++){?>
				<div class="table-cell" style="width:<?php echo $per;?>">
					<div class="wrr-cell">
						<h3 class="title"><?php echo $data[$i]['title']?></h3>
						<div class="wg-html"><?php echo $data[$i]['html']?></div>
					</div>
				</div>
				<?php if($i<$numbercell-1){?>
				<div class="table-cell" style="width: 2%"></div>
				<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
</div>