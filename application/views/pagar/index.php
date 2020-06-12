<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Contas a Pagar</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Contas a Pagar</li>
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
                <a href="<?= base_url('contas_pagar/add') ?>" title="Criar Nova Conta a Pagar" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
                <a href="<?= base_url('relatorios/pagar') ?>" title="Relatórios de Contas a Pagar" class="btn btn-primary">
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
                                <th>Data de Vencimento</th>
                                <th>Fornecedor</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($contas as $conta) : ?>

                                <tr>
                                    <td><?= $conta->id_fornecedor ?></td>
                                    <td><?= formataDataView($conta->vencimento) ?></td>
                                    <td><?= $conta->razao ?><?= ($conta->nome_fantasia) != NULL ? ' - '. $conta->nome_fantasia : '' ?></td> 
                                    <td class="text-center"><?= formatoMoeda($conta->valor) ?></td> 
                                    <td class="text-center">
                                        <?php 
                                            if ($conta->status == 0) :
                                                echo '<b class="text-success">Quitada</b>'; 
                                            elseif ($conta->status == 1 && $conta->vencimento < dataDiaDB()) :
                                                echo '<b class="text-danger">Vencida</b>'; 
                                            elseif ($conta->status == 1 && $conta->vencimento > dataDiaDB()) :
                                                echo '<b class="text-warning">A Vencer</b>'; 
                                            endif;
                                        ?> 
                                    </td>                           
                                    <td class="text-center"><a href="<?= base_url("contas_pagar/edit/$conta->id_conta") ?>" title="Editar Serviço" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("contas_pagar/del/$conta->id_conta") ?>" title="Excluir Serviço" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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