@php
    /**
    * @var \App\Models\Product $products_am
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить продукт</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="/">Продукты</a></li>
                            <li class="breadcrumb-item active">Добавить продукт</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Заполните форму</h3>
                            </div>
                            <form
                                action="{{ route('admin.products-am.store') }}"
                                method="POST">
                                @csrf
                                @method("POST")
                                <div class="card-body">
                                    <x-input name="title" label="Название продукта" id="title" placeholder="Название продукта" />
                                    <x-input name="quantity_per_unit" label="Колличество за единицу" id="quantity_per_unit" placeholder="Колличество за единицу" />
                                    <x-input name="unit" label="Единица измерения" id="unit" placeholder="Единица измерения" />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
