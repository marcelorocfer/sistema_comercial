<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Listar Vendas</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('principal') ?>">Principal</a></li>
                    <li class="active">Listar Vendas</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php 
                    get_msg('msgsuccess');
                    get_msg('msgerro'); 
                ?>
            </div>
        </div>

        <div class="row margin-bottom10">     
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">  
                <a href="<?= base_url('vendas/add') ?>" title="Inserir Nova Venda" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a> 
                <a href="<?= base_url('relatorios/vendas') ?>" title="Gerar Relatório de Vendas" class="btn btn-primary">
                    Relatórios
                </a> 
            </div>
        </div>   
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <table class="table table-bordered table-striped" id="datatable">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Vendedor</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($vendas as $venda) : ?>

                                <tr>
                                    <td><?= $venda->id_venda ?></td>
                                    <td><?= formataDataView($venda->data_emissao) ?></td>
                                    <td><?= $venda->nome ?></td> 
                                    <td><?= $venda->nome_vendedor ?></td>
                                    <td class="text-center"><?= formatoMoeda($venda->valor_total) ?></td>
                                    <td class="text-center"><a href="<?= base_url("vendas/edit/$venda->id_venda") ?>" title="Editar Venda" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("vendas/del/$venda->id_venda") ?>" title="Excluir Venda" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="<?= base_url("vendas/pdf/$venda->id_venda") ?>" title="Imprimir Venda" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></a></td>
                                </tr>
                            
                            <?php endforeach; ?>
                         
                        </tbody>                        

                    </table>
                    
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->