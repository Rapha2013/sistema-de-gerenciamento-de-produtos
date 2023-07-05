@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @if (session('sucesso'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ session('sucesso') }}
        </div>
    @endif
@endsection

@section('content')

    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Produto</h3>
            </div>
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" id="name" required name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Valor</label>
                        <input type="text" id="value" required name="value"
                            class="form-control @error('value') is-invalid @enderror" value="{{ $product->value }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Categoria</label>
                        <select id="category_id" required name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
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
        <script>
            document.addEventListener("DOMContentLoaded", function() {

            });
        </script>
    @endsection
