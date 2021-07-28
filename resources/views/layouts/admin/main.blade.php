<!DOCTYPE html>
<html>
<head>

    <title>Lapidando Vitórias</title>

    <!-- Metas -->
    @php
        $basepath = URL('/');
        $name = ucfirst( \Auth::user()->name );
        $token = base64_encode(\Auth::user()->api_token);
        $modulo = isset(explode('.',\Request::route()->getName())[0]) 
            ? explode('.',\Request::route()->getName())[0] : '';
        $view = isset(explode('.',\Request::route()->getName())[1]) 
         ? explode('.',\Request::route()->getName())[1] : '';
        if(isset(explode('/', Request::url())[4])) 
            $id = explode('/', Request::url())[4];
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="{{$token}}" >
    <meta name="modulo" content="{{$modulo}}" >
    <meta name="view" content="{{$view}}" >
    @isset( $entidade )
        <meta name="entidade" content="{{$entidade->id}}" >
    @endisset 

    <!-- Links -->
    <link href="{{ asset('css/ext_libs/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ext_libs/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ext_libs/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/ext_libs/datatable.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/ext_libs/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ext_libs/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body id="page-top">

    <div class="loading" style="display: none"></div>

    <div id="wrapper">

        <!-- Menu -->
        @include('layouts.admin.menu')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin.topbar',['nome' => $name])

                <!-- Conteúdo -->
                <div class="container-fluid">
                
                    <!-- Cabeçalho -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-bottom: 10px;">
                        <h1 class="h3 mb-0 text-gray-800" style="display: inline;">               

                            @switch($modulo)

                                

                                @case('alunos')
                                    <i class="fas fa-users"></i>
                                    {{ $registro->nome ?? 'Alunos' }} 
                                    @break

                                @case('pagamentos')
                                    <i class="fas fa-dollar-sign"></i>                                    
                                    Pagamentos
                                    @break

                                @case('presencas')
                                    <i class="fas fa-clipboard-check"></i>
                                    Presença
                                    @break

                                @case('relatorios')
                                    <i class="fas fa-chart-bar"></i>                                    
                                    Relatórios
                                    @break

                                @case('turmas')
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    Turmas
                                    @break

                                @case('user')
                                    <i class="fas fa-fw fa-users mr-1"></i>
                                    {{ $registro->nome ?? 'User' }} 
                                    @break

                            @endswitch
                            
                        </h1>

                        <!-- Botões -->
                        <div class="float-right">                           

                            <!-- Turmas e Módulos não possuem Botões -->
                            @if($modulo != 'turmas' && $modulo != 'relatorios' && $modulo !== 'presencas' && $modulo !== 'pagamentos')

                                @if( $view == 'show' || $view == 'edit' || $view == 'create')
                                    <a href="{{ route($modulo.'.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-list fa-sm text-white-50"></i> Listar Registros
                                    </a>
                                @endif
                            
                                @if( $view == 'show')
                                    <a href="{{ route($modulo.'.edit', $id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-pencil-alt fa-sm text-white-50"></i> Editar Registro
                                    </a>
                                @endif
                            
                                @if( ($view == 'index' || $view == 'edit' || $view == 'show') && $modulo != 'categoria')
                                    <a href="{{ route($modulo.'.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-plus fa-sm text-white-50"></i> Novo Registro
                                    </a>
                                @endif

                            @endif
                            
                        </div>
                    </div>  
                    
                    @yield('conteudo')
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/ext_libs/jquery.min.js')}}"></script>
    <script src="{{ asset('js/ext_libs/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('js/ext_libs/datatable.min.js')}}"></script>
    <script src="{{ asset('js/ext_libs/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery-validate.min.js') }}"></script>
    
    <script src="{{ asset('js/admin/main.js') }}"></script>
    
    @yield('js')

</body>
