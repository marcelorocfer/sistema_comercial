<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema comercial - ismweb cursos on-line</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('css/sb-admin.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- DataTable -->
    <link href="<?= base_url('jquery/jquery.datatable/css/datatables.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('jquery/jquery.datatable/css/datatables_bootstrap.css') ?>" rel="stylesheet" type="text/css">

    <!-- Auto Complete CSS --> 
    <link href="<?= base_url('jquery/jquery.ui/jquery-ui.css') ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('css/estilo.css') ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<input type="hidden" id="base_url" value="<?= base_url() ?>">
<div id="wrapper">

        <?php 
            if ($this->ion_auth->logged_in())
            {
        ?>

    <input type="hidden">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">            

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header text-center">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/ismweb">Sistema Comercial</a>                
            </div>            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/ismweb"><i class="fa fa-home"></i> Visão Geral</a>
                    </li>  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#vendas"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Vendas <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="vendas" class="collapse">
                            <li>
                                <a href="<?= base_url('vendas') ?>">Venda de Produtos</a>
                            </li>     
                            <li>
                                <a href="<?= base_url('os') ?>">Ordens de Serviço</a>
                            </li>
                            <li>
                                <a href="#">Lista de Preços</a>
                            </li>                        
                        </ul>
                    </li>                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#clientes"><i class="fa fa-group"></i> Cadastro <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="clientes" class="collapse">
                            <li>
                                <a href="<?= base_url('clientes') ?>">Clientes</a>
                            </li> 
                            <li>
                                <a href="<?= base_url('fornecedores') ?>">Fornecedores</a>
                            </li> 
                            <li>
                                <a href="<?= base_url('vendedores') ?>">Vendedores</a>
                            </li> 
                            <li>
                                <a href="<?= base_url('servicos') ?>">Serviços</a>
                            </li> 
                            <li>
                                <a href="#">Transportadora</a>
                            </li>                            
                        </ul>
                    </li>   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#produtos"><i class="fa fa-truck"></i> Controle de Estoque <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="produtos" class="collapse">
                            <li>
                                <a href="<?= base_url('produtos') ?>">Cadastro de Produtos</a>
                            </li> 
                            <li>
                                <a href="<?= base_url('categorias') ?>">Categorias</a>
                            </li> 
                            <li>
                                <a href="<?= base_url('marcas') ?>">Marcas</a>
                            </li>                           
                        </ul>
                    </li>   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#contas"><i class="fa fa-dollar"></i> Financeiro <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="contas" class="collapse">
                            <li>
                                <a href="<?= base_url('contas_receber') ?>">Contas a Receber</a>
                            </li>                                                       
                            <li>
                                <a href="<?= base_url('contas_pagar') ?>">Contas a Pagar</a>
                            </li> 
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#relatorios"><i class="fa fa-file-text-o"></i> Relatórios <i class="fa fa-angle-down pull-right"></i></a>
                        <ul id="relatorios" class="collapse">
                            <li>
                                <a href="<?= base_url('relatorios/vendas') ?>">Vendas</a>
                            </li> 
                            <li>
                                <a href="<?= base_url('relatorios/os') ?>">Ordens de Serviço</a>
                            </li>
                            <li>
                                <a href="<?= base_url('relatorios/listar_produtos') ?>">Produtos</a>
                            </li>                                                       
                            <li>
                                <a href="<?= base_url('relatorios/lista_conferencia') ?>">Conferência de Produtos</a>
                            </li>
                            <li>
                                <a href="<?= base_url('relatorios/lista_lucro') ?>">Lucros</a>
                            </li>
                            <li>
                                <a href="<?= base_url('relatorios/receber') ?>">Contas a Receber</a>
                            </li>
                            <li>
                                <a href="<?= base_url('relatorios/pagar') ?>">Contas a Pagar</a>
                            </li>
                        </ul>
                    </li>      
                    <?php if ($this->ion_auth->in_group(1)) : ?>       
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#config"><i class="fa fa-cog"></i> Configuração <i class="fa fa-angle-down pull-right"></i></a>
                            <ul id="config" class="collapse">
                                <li>
                                    <a href="<?= base_url('config') ?>">Sistema</a>
                                </li> 
                                <li>
                                    <a href="<?= base_url('usuarios') ?>">Usuários</a>
                                </li>                                                       
                            </ul>
                        </li>     
                    <?php endif; ?>                                                                 
                    <li>
                        <a href="<?= base_url('login/logout') ?>"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <?php 

            } //Fim do if (!$this->ion_auth->logged_in())

        ?>