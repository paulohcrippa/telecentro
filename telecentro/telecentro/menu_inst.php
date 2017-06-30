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
        <a class="navbar-brand" href="principalinst.php?link=56">CTC - Instrutor</a>
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
					<li><a href="principalinst.php?link=5">Cadastrar Pessoas</a></li>
				</ul>
            </li>
            <li>                   
                <a href="javascript:;" data-toggle="collapse" data-target="#atendimento">
					<i class="glyphicon glyphicon-education"></i> Atendimentos <i class="fa fa-fw fa-caret-down"></i>
				</a>
                <ul id="atendimento" class="collapse">
                    <li><a href="principalinst.php?link=8">Controle de Atendimento</a></li>
                </ul>
            </li>
            <li><a href="agendainst.php"><i class="glyphicon glyphicon-calendar"></i> Agenda</a></li>
         	
            <li>
				<a href="javascript:;" data-toggle="collapse" data-target="#manutencao">
					<i class="glyphicon glyphicon-wrench"></i> Manutenção <i class="fa fa-fw fa-caret-down"></i>
				</a>
                <ul id="manutencao" class="collapse">
                    <li><a href="principalinst.php?link=49">Equipamento</a></li>
					<li><a href="principalinst.php?link=58">Controle de Manutenção</a></li>
                </ul>
            </li>
        </ul>
    </div>
<!-- /.navbar-collapse -->
</nav>
<!-- Fim Navigation -->

