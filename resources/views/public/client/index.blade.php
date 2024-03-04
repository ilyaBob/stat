@php
    /**
    * @var \App\Models\Client[] $clients
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Клиенты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Клиенты</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-1">
                                        <a class="btn btn-success" href="{{ route('client.create') }}">Добавить</a>
                                    </div>
                                    <div class="col-11">
                                        <form action="" method="GET" class="d-flex">
                                            <input class="form-control flex-grow-1" name="title"/>
                                            <button type="submit" class="btn btn-primary mx-2">Поиск</button>
                                            <a href="/" class="btn btn-light">Сбросить</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>
                                                <a href="{{route('client.edit',$client->id)}}">{{$client->name}}</a>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{route('client.destroy', $client->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash nav-icon"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $clients->withQueryString()->links('includes.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
