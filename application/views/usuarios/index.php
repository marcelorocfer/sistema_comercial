<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Usuários Cadastrados</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Usuários Cadastrados</li>
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
                <a href="<?= base_url('usuarios/add') ?>" title="Criar Novo Usuário" class="btn btn-success">
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
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($users as $user) : ?>

                        <?php if ($user->id != 1) : ?>

                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td class="text-center"><?= $user->active == 1 ? '<a href="usuarios/active/'.$user->id.'" title="Inativar Usuário" class="btn btn-success btn-xs">Ativo</a>' : '<a href="usuarios/active/'.$user->id.'" title="Ativar Usuário" class="btn btn-danger btn-xs">Inativo</a>' ?></td>
                                <td class="text-center"><a href="<?= base_url("usuarios/edit/$user->id") ?>" title="Editar Usuário" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("usuarios/del/$user->id") ?>" title="Excluir Usuário" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
                            </tr>

                        <?php elseif ($this->session->user_id == 1) : ?>

                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td class="text-center">Root</td>
                                <td class="text-center"><a href="<?= base_url("usuarios/edit/$user->id") ?>" title="Editar Usuário" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("usuarios/del/$user->id") ?>" title="Excluir Usuário" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
                            </tr>

                        <?php endif; ?>
                        
                        <?php endforeach; ?>

                        </tbody>

                        

                    </table>
                    
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->