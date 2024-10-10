@extends('user.layout.main')

@section('content')
<h1 class="text-center mb-4">Edit Kriteria</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <!-- Menampilkan error di bagian atas form -->
            @if ($errors->any())            
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="/updatekriteria/{{ $kriteria->id }}" method="POST">
              @csrf
              @method('PUT')  
                            <div class="mb-3">
                <label for="NamaKriteria" class="form-label">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}" required>
              </div>
              
              <div class="mb-3">
                <label for="bobot" class="form-label">Bobot</label>
                <input class="form-control" type="integer" name="bobot_kriteria" id="bobot_kriteria" placeholder="isi 0-100" aria-label="default input example" required>
              </div>

              <div class="mb-3">
                <label for="tipe" class="form-label">Tipe</label>
                <select class="form-select" name="tipe" required>
                  <option value="benefit" {{ $kriteria->tipe == 'benefit' ? 'selected' : '' }}>Cost</option>
                  <option value="cost" {{ $kriteria->tipe == 'cost' ? 'selected' : '' }}>Benefit</option>
                </select>
              </div>

              <input class="btn btn-primary" type="submit" value="Update">
              <a class="btn btn-danger" href="/kriteria">Kembali</a>
            
            </form>   
    
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
