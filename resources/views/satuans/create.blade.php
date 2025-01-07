@extends('theme.default')

@section('content')
    <div class="container mt-5 mb-5">
        @include('satuans.title')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('satuans.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Satuan">

                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPSI</label>
                                <textarea class="form-control @error('descripsi') is-invalid @enderror" name="descripsi" rows="5" placeholder="Masukkan Deskripsi Satuan">{{ old('descripsi') }}</textarea>

                                <!-- error message untuk descripsi -->
                                @error('descripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'descripsi' );
    </script>
@endsection
