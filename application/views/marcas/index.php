<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Marcas Cadastradas</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Marcas Cadastradas</li>
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
                <a href="<?= base_url('marcas/add') ?>" title="Criar Nova Marca" class="btn btn-success">
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
                                <th>Marca</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($marcas as $marca) : ?>


                            <tr>
                                <td><?= $marca->id_marca ?></td>
                                <td><?= $marca->marca ?></td>
                                <td class="text-center"><?= ($marca->ativo == 1 ? '<a href="marcas/status/'.$marca->id_marca.'" title="Inativar Marca" class="btn btn-success btn-xs">Ativo</a>' : '<a href="marcas/status/'.$marca->id_marca.'" title="Ativar Marca" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                <td class="text-center"><a href="<?= base_url("marcas/edit/$marca->id_marca") ?>" title="Editar Marca" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("marcas/del/$marca->id_marca") ?>" title="Excluir Marca" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
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