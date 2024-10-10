@extends('user.layout.main')

@section('content')
<h1>Data Sub Kriteria</h1>

<a class="btn btn-outline-primary" href="/subkriteria/create" role="button">Tambah</a>

@if ($message = Session::get('success'))
    <div class="alert alert-info" role="alert">
        {{ $message }}
    </div> 
@endif

@foreach ($kriterias as $kriteria)
    <h2>{{ ucwords($kriteria->nama_kriteria) }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Kode</th>
                <th scope="col">Bobot</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php $no =1 ?>

            @forelse ($kriteria->subKriterias as $subKriteria)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $subKriteria->kode_sub_kriteria }}</td>
                <td>{{ $subKriteria->nama_sub_kriteria }}</td>
                <td>{{ $subKriteria->bobot_sub_kriteria }}</td>
                <td>
                    <a class="btn btn-warning" href="/subkriteria/{{ $subKriteria->id }}/edit" role="button">edit</a>
                    <form action="{{ route('subkriteria.destroy', $subKriteria->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kriteria ini?');">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Tidak ada sub kriteria untuk kriteria ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endforeach

@endsection
