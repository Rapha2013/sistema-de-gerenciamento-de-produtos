@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Categorias</h1>
    @if (session('sucesso'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ session('sucesso') }}
        </div>
    @endif
    @if (session('erro'))
        <div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Erro!</h5>
            {{ session('erro') }}
        </div>
    @endif
@endsection

@section('content')
    <div class="box box-info" id="box-collapse">
        <div class="box-body">
            <div class="row" style="margin-bottom: 0px;">
                <div class="form-group col-1">
                    <a href="{{ route('categories.create') }}"><button type="button"
                            class="btn btn-block btn-primary">Novo</button></a>
                </div>
                <div class="form-group col-md-12">
                    <table id="tabela" class="table table-bordered table-hover" style="width:100%; font-size: 13px;">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-user-edit"></i></button>
                                        </a>

                                    </td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="this.parentNode.submit();">
                                                <button type="button" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#tabela').DataTable({
                destroy: true,
                order: [0, 'desc'],
                dom: 'Bfrtp',
                pageLength: 10,
            });
        });
    </script>
@endsection
