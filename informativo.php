<?php
include("./assets/php/main_header.php");
?>
<div class="banner-top-interno">
    <div class="container">
        <div class="row">
            <h1>Informativos</h1>
        </div>
    </div>
</div>

<div class="container">
<div class="row">
        <br />
        <h4><i class="fa fa-home" aria-hidden="true"></i> <a href="#" onclick="window.history.back();">Voltar</a></h4>
    </div>
	<div class="row">
		<br />
		<div class="informativos"></div>
	</div>
</div>

<!-- Modal - PDF CAMPANHA -->
<div class="modal fade" id="pdf_campanha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Informativo ativo</h4>
            </div>
            <div class="modal-body">
					<div class="pdf_campanha"></div>
        </div>
    </div>
</div>
</div>

<?php include("./assets/php/footer.php"); ?>

<script>
$(document).ready(function() {
	exibirInformativos();
});

</script>