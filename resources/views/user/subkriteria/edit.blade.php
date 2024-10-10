@extends('user.layout.main')

@section('content')
<h1 class="text-center mb-4">Edit Sub Kriteria</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">

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

            <!-- Form Update Sub Kriteria -->
            <form action="/updatesubkriteria/{{ $subKriteria->id }}" method="POST">
              @csrf
              @method('PUT')

              <!-- Pilihan Kriteria (bisa diubah) -->
              <div class="mb-3">
                <label for="kriteria_id" class="form-label">Kriteria</label>
                <select class="form-select" name="kriteria_id" required>
                  @foreach ($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" {{ $kriteria->id == $subKriteria->kriteria_id ? 'selected' : '' }}>
                      {{ ucwords($kriteria->nama_kriteria) }}
                    </option>
                  @endforeach
                </select>
              </div

              <!-- Nama Sub Kriteria -->
              <div class="mb-3">
                <label for="nama_sub_kriteria" class="form-label">Nama Sub Kriteria</label>
                <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-control" value="{{ $subKriteria->nama_sub_kriteria }}" required>
              </div>

              <!-- Bobot Sub Kriteria -->
              <div class="mb-3">
                <label for="bobot_sub_kriteria" class="form-label">Bobot Sub Kriteria</label>
                <input type="number" name="bobot_sub_kriteria" id="bobot_sub_kriteria" class="form-control" value="{{ $subKriteria->bobot_sub_kriteria }}" required min="1" max="5">
              </div>

              <!-- Kode Sub Kriteria (readonly) -->
              <div class="mb-3">
                <label for="kode_sub_kriteria" class="form-label">Kode Sub Kriteria</label>
                <input type="text" name="kode_sub_kriteria" id="kode_sub_kriteria" class="form-control" value="{{ $subKriteria->kode_sub_kriteria }}" readonly>
              </div>

              <!-- Tombol Submit -->
              <input class="btn btn-primary" type="submit" value="Update">
              <a class="btn btn-danger" href="/subkriteria">Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
