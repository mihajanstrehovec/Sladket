<link rel ="stylesheet" href ="<?= CSS_URL . "modalsUrediArtikel.css" ?>">
<!-- Modal HTML -->
<div id="global-modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				
				<div class="icon-box">
					<i class="material-icons" id = "error">&#xE5CD;</i>
				</div>						
				
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			
			<div class="modal-body">
				<p><?= $msg?> </p>
			</div>
			
		</div>
	</div>
</div>     


