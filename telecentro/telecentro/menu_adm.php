<!-- Inicio Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="principal.php?link=3">CTC - Administrativo</a>
    </div>
	<!-- Itens Menu Topo lado direito-->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i> <?php echo $_SESSION['usuarioNome'];?><b class="caret"></b>
			</a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa fa-fw fa-gear"></i>Configuração</a></li>
                <li class="divider"></li>
                <li><a href = "login/sair.php"><i class="fa fa-fw fa-power-off"></i> Sair</a></li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
				<a href="javascript:;" data-toggle="collapse" data-target="#pessoa" >
					<i class="glyphicon glyphicon-user"></i> Pessoas <i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="pessoa" class="collapse">
					<li><a href="principal.php?link=5">Cadastrar Pessoas</a></li>
					<!--<li><a href="principal.php?link=55">Termo de Autorização</a></li>-->
				</ul>
            </li>
            <li>                   
                <a href="javascript:;" data-toggle="collapse" data-target="#atendimento">
					<i class="glyphicon glyphicon-education"></i> Atendimentos <i class="fa fa-fw fa-caret-down"></i>
				</a>
                <ul id="atendimento" class="collapse">
                    <li><a href="principal.php?link=8">Controle de Atendimento</a></li>
                    <li><a href="principal.php?link=16">Tipo de Atendimento</a></li>
                    <li><a href="principal.php?link=31">Tipo de Impressão</a></li>
                    
                </ul>
            </li>
            <li><a href="agenda.php"><i class="glyphicon glyphicon-calendar"></i> Agenda</a></li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#relatorios">
                    <i class="glyphicon glyphicon-stats"></i> Relatórios <i class="fa fa-fw fa-caret-down"></i>
                </a>

                <ul id="relatorios" class="collapse">
                    <li><a href="principal.php?link=61">Relatório Pessoas</a></li>
                    <li><a href="principal.php?link=62 ">Relatório Atendimento</a></li>
                    <li><a href="principal.php?link=63">Relatório Impressão</a></li>
                    <!--<li><a href="principal.php?link=64">Relatório Programas</a></li>-->
                </ul>

			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#tabelas">
					<i class="glyphicon glyphicon-list-alt"></i> Tabelas <i class="fa fa-fw fa-caret-down"></i>
				</a>
                <ul id="tabelas" class="collapse">
					<li class="dropdown-submenu">
                        <a href="principal.php?link=34">Escolaridade</a>
						<a href="principal.php?link=37">Estado Civil</a>
						<a href="principal.php?link=40">Grau Parentesco</a>	
                        <li><a href="principal.php?link=22">Escolas</a></li>
                        <li><a href="principal.php?link=27">Profissões</a></li>
                        <li><a href="principal.php?link=46">Programas Sociais</a></li>							                                  
                    </li>
                </ul>
            </li>
            <li>
				<a href="javascript:;" data-toggle="collapse" data-target="#seguranca">
					<i class="glyphicon glyphicon-lock"></i> Segurança <i class="fa fa-fw fa-caret-down"></i>
				</a>
                <ul id="seguranca" class="collapse">
                    <li><a href="principal.php?link=9">Perfil</a></li>
                    <li><a href="principal.php?link=1">Usuários</a></li>
                </ul>
            </li>
			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#manutencao">
					<i class="glyphicon glyphicon-wrench"></i> Manutenção <i class="fa fa-fw fa-caret-down"></i>
				</a>
                <ul id="manutencao" class="collapse">
                    
					<li><a href="principal.php?link=58">Manutenção</a></li>
                    <li><a href="principal.php?link=49">Equipamento</a></li>
                    <li><a href="principal.php?link=52">Fornecedor</a></li> 
                </ul>
            </li>
        </ul>
    </div>
<!-- /.navbar-collapse -->
</nav>
<!-- Fim Navigation -->

