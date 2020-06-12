<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Clientes Cadastrados</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Clientes Cadastrados</li>
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
                <a href="<?= base_url('clientes/add') ?>" title="Criar Novo Usuário" class="btn btn-success">
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
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($clientes as $cliente) : ?>


                            <tr>
                                <td><?= $cliente->id_cliente ?></td>
                                <td><?= $cliente->nome ?></td>
                                <td><?= $cliente->email ?></td>
                                <td class="text-center"><?= $cliente->telefone ?></td>     
                                <td class="text-center"><?= ($cliente->ativo == 1 ? '<a href="clientes/status/'.$cliente->id_cliente.'" title="Inativar Cliente" class="btn btn-success btn-xs">Ativo</a>' : '<a href="clientes/status/'.$cliente->id_cliente.'" title="Ativar Cliente" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                <td class="text-center"><a href="<?= base_url("clientes/edit/$cliente->id_cliente") ?>" title="Editar Cliente" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("clientes/del/$cliente->id_cliente") ?>" title="Excluir Cliente" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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