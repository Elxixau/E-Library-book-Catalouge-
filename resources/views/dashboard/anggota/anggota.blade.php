@extends('admin')

@section('content')
<div class="container-fluid mt-4">   
  
    <div class="title-section mb-3 p-2" style="background-color: rgb(139, 150, 166); border-radius:0.25rem;  ">
        <h5 style="color:rgb(236, 255, 255);">Dashboard / Anggota</h5>  
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ route('cetak.anggota') }}" class="btn btn-secondary"> <i class="fa fa-print"></i></span> Cetak PDF</a>
                <form action="{{ route('filter.anggota') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control border-bottom" id="searchInput" placeholder="filter data" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
    @include('includes.notification')

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mt-2">
                    <thead >
                        <tr>
                            <th scope="col">Aksi</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Waktu Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $a)
                            @if($a->role != 'admin')
                                <tr>
                                    <td>
                                        <a href="{{ route('edit.anggota', $a->id) }}" class="btn btn-warning btn-sm mb-2" style="width: 80px;" data-toggle="modal" data-target="#editAnggotaModal{{ $a->id }}">Edit</a>
                                        <form action="{{ route('hapus.anggota', $a->id) }}" method="POST" class="d-inline" id="deleteForm{{ $a->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm mb-2" style="width: 80px;" onclick="confirmDelete('{{ $a->id }}')">Hapus</button>
                                        </form>
                                    </td>
                                    <td>{{ $a->username }}</td>
                                    <td>{{ $a->name }}</td>
                                    <td>{{ $a->jabatan }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>{{ $a->created_at }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    function confirmDelete(anggotaId) {
        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: 'Anda tidak dapat mengembalikan tindakan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengonfirmasi
                document.getElementById('deleteForm' + anggotaId).submit();
            }
        });
    }
</script>

@endsection
