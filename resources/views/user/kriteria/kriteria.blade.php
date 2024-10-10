@extends('user.layout.main')

@section('content')
 <h1 class="text-center mb-4">Data Kriteria</h1>
  
 <a class="btn btn-outline-primary" href="/kriteria/create" role="button">Tambah</a>
 

   @if ($message = Session::get('success'))
    <div class="alert alert-info" role="alert">
      {{ $message }}
    </div>
   @endif

 <table class="table">
    <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kriteria</th>
      <th scope="col">Kode</th>
      <th scope="col">Bobot</th>
      <th scope="col">Tipe</th>
      <th scope="col">Aksi</th>
    
    </tr>
  </thead>
  <tbody>
    <?php $no =1 ?>
        
    @foreach ($data as $d)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ ucwords($d->nama_kriteria) }}</td>
      <td>{{ $d->kode_kriteria }}</td>
      <td>{{ $d->bobot_kriteria }}</td>
      <td>{{ $d->tipe }}</td>
      <td>
         <a class="btn btn-warning" href="/kriteria/{{ $d->id }}/edit" role="button">edit</a>
         <form action="{{ route('kriteria.destroy', $d->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kriteria ini?');">Hapus</button>
        </form>
      </td>
    </tr>  
    @endforeach
    
  </tbody>
</table>
@endsection
