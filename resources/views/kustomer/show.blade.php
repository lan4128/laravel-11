@extends('theme.default')

@section('content')


    <div class="container mt-5 mb-5">
        @include('kustomers.title')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $kustomer->name }}</h3>
                        <code>
                            <p>{!! $kustomer->descripsi !!}</p>
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
