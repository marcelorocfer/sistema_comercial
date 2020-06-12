<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Listar Ordens de Serviços</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Listar Ordens de Serviços</li>
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
                <a href="<?= base_url('os/add') ?>" title="Inserir Nova Ordem de Serviço" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
                <a href="<?= base_url('relatorios/os') ?>" title="Gerar Relatório de Vendas" class="btn btn-primary">
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
                                <th class="text-center">Valor</th>
                                <th>Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($ordens as $os) : ?>

                                <tr>
                                    <td><?= $os->id_ordem ?></td>
                                    <td><?= formataDataView($os->data_emissao) ?></td>
                                    <td><?= $os->nome ?></td>
                                    <td class="text-center"><?= formatoMoeda($os->total_ordem) ?></td>
                                    <td><?= $os->status == 1 ? 'Aberta' : 'Finalizada' ?></td>
                                    <td class="text-center"><a href="<?= base_url("os/edit/$os->id_ordem") ?>" title="Editar Ordem de Serviço" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("os/del/$os->id_ordem") ?>" title="Excluir Ordem de Serviço" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="<?= base_url("os/pdf/$os->id_ordem") ?>" title="Imprimir Ordem de Serviço" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></a></td>
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