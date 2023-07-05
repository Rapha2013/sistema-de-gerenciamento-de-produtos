@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@endsection

@section('content')
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Criar Produto</h3>
            </div>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" id="name" required name="name"
                            class="form-control @error('name') is-invalid @enderror">
                        {{-- @error('name')
                            <span class="error invalid-feedback">{{ error('name') }}</span>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Valor</label>
                        <input type="text" id="value" required name="value"
                            class="form-control @error('value') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Categoria</label>
                        <select id="category_id" required name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
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
