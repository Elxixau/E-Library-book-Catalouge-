@extends('admin')

@section('content')
<div class="container-fluid mt-4">

    <div class="title-section mb-3 p-2" style="background-color: rgb(139, 150, 166); border-radius:0.25rem;  ">
        <h5 style="color:rgb(236, 255, 255);">Dashboard / Buku</h5>  
    </div>

    @include('includes.notification')
        
    <div class="card mb-3">
       <div class="card-body">
        <a href="{{ route('upload') }}" class="btn btn-success mb-2"><span><i class="fa fa-plus" aria-hidden="true"></i></span> Tambah Buku</a>         
            <hr>  
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <form action="{{ route('filter.buku') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control border-bottom" id="searchInput" placeholder="filter data" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                    </div>
                </form>
                <a href="{{ route('cetak.buku') }}" class="btn btn-secondary "><span> <i class="fa fa-print"></i></span> Cetak PDF</a>
            </div>
       </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mt-2">
                    <thead >
                        <tr>
                            <th scope="col">Aksi</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun_Terbit</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Url_buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $b)
                            <tr>
                                <td>
                                    <a href="{{ route('edit', $b->id) }}" class="btn btn-warning btn-sm mb-2" style="width: 70px;">Edit </a>
                                    <form action="{{ route('buku.delete', $b->id) }}" method="POST" class="d-inline" id="deleteForm{{ $b->id }}">
                                        @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" style="width: 70px;" onclick="confirmDelete('{{ $b->id }}')">Hapus</button>
                                    </form>
                                </td>
                                <td>{{ $b->judul }}</td>
                                <td>{{ $b->penulis }}</td>
                                <td>{{ $b->tahun_terbit }}</td>
                                <td>
                                    @php
                                        $kategoriArray = json_decode($b->id_kategori, true); // Decode JSON string to array
                                    @endphp
                                        
                                    @foreach ($kategoriArray as $kategoriId)
                                        @php
                                            $kategoriName = \App\Models\KategoriBuku::find($kategoriId);
                                        @endphp                
                                            {{ $kategoriName ? $kategoriName->kategori : 'Nama Kategori Tidak Ditemukan' }}
                                            {{-- Use the category name or display a message if category not found --}}
                                            @if (!$loop->last), @endif
                                            {{-- Add a comma after each category except for the last one --}}
                                    @endforeach</td>
                                <td>{{ $b->pdf_path }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(bukuId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak dapat mengembalikan tindakan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + bukuId).submit();
            }   
        });
    }
</script>
    
@endsection
