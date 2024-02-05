@php
    /**
    * @var \App\Models\Product[] $products
    */
@endphp

@extends('main.index')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Продукты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Продукты</li>
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
                                        <a class="btn btn-success" href="{{ route('admin.products-am.create') }}">Добавить</a>
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
                                        <th>Наименование</th>
                                        <th>Кол. за ед.</th>
                                        <th>Ед. изм</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <a href="{{route('admin.products-am.edit', ['products_am' => $product->id])}}">{{$product->title}}</a>
                                            </td>
                                            <td>{{$product->quantity_per_unit}}</td>
                                            <td>{{$product->unit}}</td>
                                            <td>
                                                <form
                                                    action="{{route('admin.products-am.destroy', ['products_am' => $product->id])}}"
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
                                {{ $products->withQueryString()->links('includes.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
