<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Imprimir venda</h3>
                <hr>
                <ol class="breadcrumb">
                  <li><a href="<?= base_url(); ?>">Principal</a></li>
                  <li><a href="<?= base_url('vendas'); ?>">Listar Vendas</a></li>
                  <li class="active">Imprimir venda</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->        

        <!-- Lista de registro -->
        <div class="row">            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  
                <h4>Venda concluida com sucesso</h4>
                <p>
                    <a href="<?= base_url('vendas/pdf/'); ?><?php echo $dados->id_venda ?>" title="Imprimir venda" class="btn btn-default">Imprimir venda</a> 
                    <a href="<?= base_url('vendas/add'); ?>" title="Nova Venda" class="btn btn-default">Nova Venda</a> 
                    <a href="<?= base_url('vendas'); ?>" title="Página listar vendas" class="btn btn-default">Página listar vendas</a>
                </p>

            </div>
        </div><!-- / Lista de registro -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->