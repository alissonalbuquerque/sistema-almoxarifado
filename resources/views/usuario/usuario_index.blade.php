@extends('templates.principal')

@section('title')
    Usuario
@endsection

@section('content')

    <div style="border-bottom: #949494 2px solid; padding-bottom: 5px; margin-bottom: 10px">
        <h2>USUÁRIOS CADASTRADOS</h2>
    </div>

    @if(session()->has('sucess'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>{{session('sucess')}}</strong>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <table id="tableUsuarios" class="table table-hover table-responsove-md">
        <thead style="background-color: #151631; color: white; border-radius: 15px">
        <tr>
            <th scope="col"> Nome</th>
            <th scope="col"> E-mail</th>
            <th scope="col"> Perfil</th>
            <th scope="col"> Ações</th>
        </tr>
        </thead>

        <tbody>
        @forelse($usuarios as $usuario)
            <tr>
                <td>
                {{ $usuario->nome }}</th>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->getCargo($usuario->cargo_id)->nome }}</td>
                <td style="text-align: center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ⋮
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a type="button" class="dropdown-item" onclick="location.href='{{ route('usuario.edit', ['usuario' => $usuario->id]) }}'">Editar</a>
                            <a type="button" class="dropdown-item" onclick="if(confirm('Tem certeza que deseja Remover o Usuário?')) location.href='{{route('usuario.destroy', $usuario->id)}}'">Remover</a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <td colspan="5">Sem usuários cadastrados ainda</td>
        @endempty
        </tbody>
    </table>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('js/usuario/index.js')}}"></script>
