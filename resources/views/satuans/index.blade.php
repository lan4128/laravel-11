@extends('theme.default')

@section('content')

<div class="container-fluid px-4">
    @include('satuans.title')

    <div class="card mb-4">
        <div class="card-body">
        <a href="{{ route('satuans.create') }}" class="btn btn-md btn-success mb-3">ADD SATUAN</a>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">DESCRIPSI</th>
                        <th scope="col" style="width: 20%">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($satuans as $satuan)
                        <tr>
                            <td>{{ $satuan->name }}</td>
                            <td>{{ $satuan->descripsi }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('satuans.destroy', $satuan->id) }}" method="POST">
                                    <a href="{{ route('satuans.show', $satuan->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('satuans.edit', $satuan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data satuan belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
            {{ $satuans->links() }}
        </div>
    </div>
</div>

@endsection
@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
//message with sweetalert
@if(session('success'))
    Swal.fire({
        icon: "success",
        title: "BERHASIL",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
@elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
@endif

</script>

@endsection
