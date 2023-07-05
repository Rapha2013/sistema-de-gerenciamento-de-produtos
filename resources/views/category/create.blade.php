@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @if (session('erro'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Erro!</h5>
            {{ session('erro') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Erro!</h5>
            {{ implode('', $errors->all()) }}
        </div>
    @endif

@endsection

@section('content')
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Criar Categoria</h3>
            </div>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" id="name" required name="name"
                            class="form-control @error('name') is-invalid @enderror">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </form>
        </div>
    @endsection

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @endsection

    @section('js')
    @endsection
