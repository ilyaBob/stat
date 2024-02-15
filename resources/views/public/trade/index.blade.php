@php
    /**
    * @var \App\Models\Trade[] $trades
    */
@endphp

@extends('main.index')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Торговля</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Торговля</li>
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
                                        <a class="btn btn-success" href="{{ route('trade.create') }}">Добавить</a>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trades as $trade)
                                        <tr>
                                            <td>{{$trade->created_at}}</td>
                                            <td>
                                                @if($trade->status == 1)
                                                    <a class="btn btn-primary"
                                                       href="{{route('trade.edit', ['trade'=> $trade->id])}}">
                                                        В поцессе
                                                    </a>
                                                @else
                                                    <a class="btn btn-info"
                                                       href="{{route('trade.show', ['trade'=> $trade->id])}}">
                                                        Посмотреть итог
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $trades->withQueryString()->links('includes.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
