<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3><?= $titulo ?></h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('categorias') ?>">Listar Categorias</a></li>
                    <li class="active"><?= $titulo ?></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                <?php erros_validacao(); ?>
                <?php get_msg('msgerro'); ?>
                <?php get_msg('msgsuccess'); ?>
                    
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   

                <form class="" id="form" name="form" method="POST" action="<?= base_url('categorias/store') ?>">

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Nome da Categoria</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="categoria" 
                                value="<?= set_value('categoria', $categoria) ?>" 
                                required
                            >
                        </div>
                    </div>     

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group pf">
                            <label>Status</label>
                            <select name="ativo" class="form-control">
                                <option value="1" <?= ($ativo == 1 ? 'selected=""' : '') ?>>Ativo</option>
                                <option value="2" <?= ($ativo == 2 ? 'selected=""' : '') ?>>Inativo</option>
                            </select>
                        </div>
                    </div>   

                    <?php if (isset($id) && $id != NULL): ?>

                        <?= '<input type="hidden" value="'.$id.'" name="id">'; ?>
                        
                    <?php endif ?>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                           <button class="btn btn-primary" form="form" type="submit">Cadastrar Categoria</button>
                        </div> 
                    </div>                                                              

                </form>
                
            </div>
        </div>

    </div>
</div>