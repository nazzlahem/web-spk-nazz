@extends('user.layout.main')

@section('content')
<h1 class="text-center mb-4">Tambah Sub Kriteria</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
      <div class="card">
      <div class="card-body">
        <form action="/subkriteria" method="POST" enctype="multipart/form-data">
        @csrf
          
          <div class="mb-3">
            <label for="kriteria_id" class="form-label">Pilih Kriteria</label>
            <select name="kriteria_id" class="form-select" required>
              <option value="" selected disabled>Pilih Kriteria</option>
              
              @foreach ($kriterias as $kriteria)
              <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="mb-3">
            <label for="nama_sub_kriteria" class="form-label">Nama Sub Kriteria</label>
            <input type="text" name="nama_sub_kriteria" class="form-control" required>
          </div>
          
          <div class="mb-3">
            <label for="bobot_sub_kriteria" class="form-label">Bobot</label>
            <input type="number" name="bobot_sub_kriteria" class="form-control" min="1" max="5" required>
          </div>
          
          <!-- Menampilkan error jika ada -->
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>
           @endif
          
          <input class="btn btn-primary" type="submit" value="Submit">
           <a class="btn btn-danger" href="/kriteria"> Kembali</a>
    <!-- Form field -->
          </form>

        
        
      </div>
      </div>
      </div>
    </div>
  </div>

@endsection