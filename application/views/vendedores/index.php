<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Vendedores Cadastrados</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Vendedores Cadastrados</li>
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
                <a href="<?= base_url('vendedores/add') ?>" title="Criar Novo Vendedor" class="btn btn-success">
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
                        <?php foreach ($vendedores as $vendedor) : ?>


                            <tr>
                                <td><?= $vendedor->id_vendedor ?></td>
                                <td><?= $vendedor->nome_vendedor ?></td>
                                <td><?= $vendedor->email ?></td>
                                <td class="text-center"><?= $vendedor->telefone ?></td>     
                                <td class="text-center"><?= ($vendedor->ativo == 1 ? '<a href="vendedores/status/'.$vendedor->id_vendedor.'" title="Inativar Vendedor" class="btn btn-success btn-xs">Ativo</a>' : '<a href="vendedores/status/'.$vendedor->id_vendedor.'" title="Ativar Vendedor" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                <td class="text-center"><a href="<?= base_url("vendedores/edit/$vendedor->id_vendedor") ?>" title="Editar Vendedor" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("vendedores/del/$vendedor->id_vendedor") ?>" title="Excluir Vendedor" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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