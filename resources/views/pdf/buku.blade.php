<!DOCTYPE html>
<html>
<head>
    <title>Buku PDF</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Daftar Anggota</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    font-size: 12px;
}


        table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}


        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1 style="text-align: center;">Daftar Buku</h1>

    <table>
        <thead>
            <tr>
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

</body>
</html>
