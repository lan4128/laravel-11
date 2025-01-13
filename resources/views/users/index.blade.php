@extends('theme.default')

@section('content')

<div class="container-fluid px-4">
    @include('users.title')

    <div class="card mb-4">
        <div class="card-header">
            <div class="float-end">
                <a href="{{route('printuser') }}" class="btn btn-md btn-warning mb-3">PRINT USER</a>
                <a href="{{route('exportuser') }}" class="btn btn-md btn-success mb-3">Export USER</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">CREATED_AT</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data User belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
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
