@extends('user.layout.main')

@section('content')
<h1 class="text-center mb-4">Tambah Kriteria</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
      <div class="card">
      <div class="card-body">
        <form action="/kriteria" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="NamaKriteria" class="form-label">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" required>
          </div>
          
            <div class="mb-3">
             <label for="bobot" class="form-label">Bobot</label>
             <input class="form-control" type="number" name="bobot_kriteria" id="bobot_kriteria" placeholder="isi 0-100" aria-label="default input example" required>
            </div>

            <div class="mb-3">
             <label for="tipe" class="form-label">Tipe</label>
              <select class="form-select" name="tipe" required>
                <option selected disabled>Pilih Tipe</option>
                <option value="cost">Cost</option>
                <option value="benefit">Benefit</option>
              </select>
            </div>
           <input class="btn btn-primary" type="submit" value="Submit">
           <a class="btn btn-danger" href="/kriteria"> Kembali</a>
        
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
    <!-- Form field -->
          </form>

        
        
      </div>
      </div>
      </div>
    </div>
  </div>

@endsection