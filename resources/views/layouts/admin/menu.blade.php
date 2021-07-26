<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Usuários</span>
        </a>
    </li>    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('alunos.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Alunos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('turmas.edit') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Turmas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('relatorios.index') }}">
            <i class="fas fa-chart-bar"></i>
            <span>Relatórios</span>
        </a>
    </li>
    
</ul>