@php
    /**
    * @var \App\Models\Product[] $products
    */
@endphp

@extends('layouts.admin')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Настройки</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Настройки</li>
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
                            <div class="card-body">
                                <form action="{{route('setting.store')}}" method="post">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Продукты</label>
                                            <select name="products[]" multiple class="form-control">
                                                @foreach($products as $product)
                                                    <option
                                                        @if(in_array($product->id, auth()->user()->refresh()->products->pluck('id')->toArray()) )
                                                            selected
                                                        @endif
                                                        value="{{$product->id}}">{{$product->title}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-success">Сохранить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
