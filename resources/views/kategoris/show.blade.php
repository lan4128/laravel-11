@extends('theme.default')

@section('content')


    <div class="container mt-5 mb-5">
        @include('kategoris.title')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $kategori->name }}</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
