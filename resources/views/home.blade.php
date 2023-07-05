@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1># Desafio</h1>
@stop

@section('content')
<p>Um cliente nos pediu para criar um sistema de gerenciamento de produtos. O sistema deve permitir usuários
    cadastrarem seus produtos. Um usuário só pode ter acessso aos produtos que ele cadastrou, ou seja,
    um usuário não pode ver os produtos que outro usuário cadastrou. O sistema deve ter um endpoint
    que mostre todos os produtos cadastrados do sistema. O sistema também deve ter um endpoint
    que mostre os produtos que um usuário cadastrou.
</p>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
</script>
@stop