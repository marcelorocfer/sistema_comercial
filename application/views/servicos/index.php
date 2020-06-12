<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Serviços Cadastrados</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Serviços Cadastrados</li>
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
                <a href="<?= base_url('servicos/add') ?>" title="Criar Novo Serviço" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <table class="table table-bordered table-striped" id="datatable">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Serviço</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($servicos as $servico) : ?>

                                <tr>
                                    <td><?= $servico->id_servico ?></td>
                                    <td><?= $servico->nome_servico ?></td>
                                    <td class="text-center">R$ <?= $servico->valor_servico ?></td></td>   
                                    <td class="text-center"><?= ($servico->ativo == 1 ? '<a href="servicos/status/'.$servico->id_servico.'" title="Inativar Serviço" class="btn btn-success btn-xs">Ativo</a>' : '<a href="servicos/status/'.$servico->id_servico.'" title="Ativar Serviço" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                    <td class="text-center"><a href="<?= base_url("servicos/edit/$servico->id_servico") ?>" title="Editar Serviço" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("servicos/del/$servico->id_servico") ?>" title="Excluir Serviço" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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