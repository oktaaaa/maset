@extends('layout.main')


@section('content')
<body onload = "getLocation()">
    @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Ubah Data Aset</h4>
        <p class="card-description">
            Ubah Aset
        </p>
        <form form action = "{{route('aset.update', $asets -> id)}}" method = "POST" class="forms-sample" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="jenis_aset">Jenis Aset</label>
                <input type="text" class="form-control" 
                name = "jenis_aset" 
                placeholder="Jenis Aset"
                value = "{{$asets->jenis_aset}}">

                @error('npm')
                    <span class = "txt-danger">{{$message}} </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" class="form-control" name = "merk" placeholder="Merk Aset"
                value = "{{$asets -> merk}}">

                @error('merk')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tipe">Tipe</label>
                <input type="text" class="form-control" name = "tipe" placeholder="Tipe Aset"
                value = "{{$asets -> tipe}}"
                >

                @error('tipe')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for = "foto">Foto Aset</label>
                <input type="file" class="form-control" name="foto" accept="image/">
            </div>

            <div class="form-group">
                <label for="s_n">S/N</label>
                <input type="text" class="form-control" name = "s_n" placeholder="S/N"
                value = "{{$asets -> s_n}}"
                >

                @error('s_n')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner">Owner</label>
                <input type="text" class="form-control" name = "owner" placeholder="Owner Aset"
                value = "{{$asets -> owner}}">

                @error('owner')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="th_produksi">Tahun Produksi</label>
                    <input type="text" class="form-control" name = "th_produksi" 
                    placeholder="Tahun Produksi Aset"
                    value = "{{$asets -> th_produksi}}">

                    @error('th_produksi')
                    <span class = "txt-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-4">
                    <label for="th_pengadaan">Tahun Pengadaan</label>
                    <input type="text" class="form-control" name = "th_pengadaan" placeholder="Tahun Pengadaan Aset"
                    value = "{{$asets -> th_pengadaan}}">

                    @error('th_pengadaan')
                    <span class = "txt-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col-lg-4">
                    <label for="th_penggunaan">Tahun Penggunaan</label>
                    <input type="text" class="form-control" name = "th_penggunaan" placeholder="Tahun Penggunaan Aset"
                    value = "{{$asets -> th_penggunaan}}">

                    @error('th_penggunaan')
                    <span class = "txt-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" name = "lokasi" placeholder="Lokasi aset"
                value = "{{$asets -> lokasi}}">

                @error('lokasi')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="koordinat">Koordinat</label>
                <input type="text" class="form-control" id = "coordinate"name="koordinat"
                value = "{{$asets -> koordinat}}">

                @error('koordinat')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                {{-- <input type="text" class="form-control" name="status" value = "" disabled> --}}
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" 
                      value="Normal" {{ $asets->status == "Normal" ? 'checked' : '' }}>
                      Normal
                    <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" 
                      value="Tidak Normal" {{ $asets->status == "Tidak Normal" ? 'checked' : '' }}>
                      Tidak Normal
                    <i class="input-helper"></i></label>
                </div>
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi</label>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="kondisi" value="Baik"
                      value="Baik" {{ $asets->kondisi == "Baik" ? 'checked' : '' }}>
                      Baik
                    <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="kondisi" value="Rusak"
                      value="Rusak" {{ $asets->status == "Rusak" ? 'checked' : '' }}
                      >
                      Rusak
                    <i class="input-helper"></i></label>
                </div>
            </div>

            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggung_jawab" value = "user"
                value = "{{$asets -> penanggung_jawab}}">

                @error('penanggung_jawab')
                    <span class = "txt-danger">{{$message}}</span>
                @enderror
            </div>
          
            
            
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
        </div>
    </div>
</body>
@endsection


