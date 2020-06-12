<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Contas a Receber</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('principal') ?>">Principal</a></li>
                    <li class="active">Contas a Receber</li>
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
                <a href="<?= base_url('contas_receber/add') ?>" title="Criar Nova Conta a Receber" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
                <a href="<?= base_url('relatorios/receber') ?>" title="Relatórios de Contas a Receber" class="btn btn-primary">
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
                                <th>Nome do Cliente</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($contas as $conta) : ?>

                                <tr>
                                    <td><?= $conta->id_receber ?></td>
                                    <td><?= formataDataView($conta->vencimento) ?></td>
                                    <td><?= $conta->nome ?></td> 
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
                                    <td class="text-center"><a href="<?= base_url("contas_receber/edit/$conta->id_receber") ?>" title="Editar Serviço" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("contas_receber/del/$conta->id_receber") ?>" title="Excluir Serviço" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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