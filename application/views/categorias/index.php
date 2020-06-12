<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Categorias Cadastradas</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Categorias Cadastradas</li>
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
                <a href="<?= base_url('categorias/add') ?>" title="Criar Nova Categoria" class="btn btn-success">
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
                                <th>Categoria</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($categorias as $categoria) : ?>


                            <tr>
                                <td><?= $categoria->id_categoria ?></td>
                                <td><?= $categoria->categoria ?></td>
                                <td class="text-center"><?= ($categoria->ativo == 1 ? '<a href="categorias/status/'.$categoria->id_categoria.'" title="Inativar Categoria" class="btn btn-success btn-xs">Ativo</a>' : '<a href="categorias/status/'.$categoria->id_categoria.'" title="Ativar Categoria" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                <td class="text-center"><a href="<?= base_url("categorias/edit/$categoria->id_categoria") ?>" title="Editar Categoria" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("categorias/del/$categoria->id_categoria") ?>" title="Excluir Categoria" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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