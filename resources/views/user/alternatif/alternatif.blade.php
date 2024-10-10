@extends('user.layout.main')

@section('content')
<div class="container">
    <h1>Daftar Alternatif</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kriteria</th>
                <th>Nama Alternatif</th>
               
            </tr>
        </thead>
        <?php $no =1 ?>
        <tbody>
            @foreach($alternatifs as $alternatif)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $alternatif->kode_alternatif }}</td>
                    <td>{{ $alternatif->nama_alternatif }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
