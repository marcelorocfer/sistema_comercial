<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Imprimir Ordem de Serviço</h3>
                <hr>
                <ol class="breadcrumb">
                  <li><a href="<?= base_url(); ?>">Principal</a></li>
                  <li><a href="<?= base_url('os'); ?>">Listar Ordem de Serviços</a></li>
                  <li class="active">Imprimir Ordem de Serviço</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->        

        <!-- Lista de registro -->
        <div class="row">            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  
                <h4>Venda concluida com sucesso</h4>
                <p>
                    <a href="<?= base_url('os/pdf/'); ?><?php echo $dados->id_ordem ?>" title="Imprimir Ordem de Serviço" class="btn btn-default">Imprimir Ordem de Serviço</a>
                    <a href="<?= base_url('os/add'); ?>" title="Nova Ordem de Serviço" class="btn btn-default">Nova Ordem de Serviço</a>
                    <a href="<?= base_url('os'); ?>" title="Página listar Ordem de Serviços" class="btn btn-default">Página listar Ordem de Serviços</a>
                </p>

            </div>
        </div><!-- / Lista de registro -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->