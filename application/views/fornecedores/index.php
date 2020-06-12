<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Fornecedores Cadastrados</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Fornecedores Cadastrados</li>
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
                <a href="<?= base_url('fornecedores/add') ?>" title="Criar Novo Fornecedor" class="btn btn-success">
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
                        <?php foreach ($fornecedores as $fornecedor) : ?>


                            <tr>
                                <td><?= $fornecedor->id_fornecedor ?></td>
                                <td><?= $fornecedor->razao ?> - <?= $fornecedor->nome_fantasia ?></td>
                                <td><?= $fornecedor->email ?></td>
                                <td class="text-center"><?= $fornecedor->telefone ?></td>     
                                <td class="text-center"><?= ($fornecedor->ativo == 1 ? '<a href="fornecedores/status/'.$fornecedor->id_fornecedor.'" title="Inativar Fornecedor" class="btn btn-success btn-xs">Ativo</a>' : '<a href="fornecedores/status/'.$fornecedor->id_fornecedor.'" title="Ativar Fornecedor" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                <td class="text-center"><a href="<?= base_url("fornecedores/edit/$fornecedor->id_fornecedor") ?>" title="Editar Fornecedor" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("fornecedores/del/$fornecedor->id_fornecedor") ?>" title="Excluir Fornecedor" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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