@extends('layout.main')


@section('content')
<body >
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
        <h4 class="card-title">Form Tambah Aset</h4>
        <p class="card-description">
            Tambah Aset
        </p>
        <form form action = "{{route('aset.store')}}" method = "POST" class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jenis_aset">Jenis Aset</label>
                <input type="text" class="form-control" name = "jenis_aset" placeholder="Jenis Aset">
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" class="form-control" name = "merk" placeholder="Merk Aset">
            </div>

            <div class="form-group">
                <label for="tipe">Tipe</label>
                <input type="text" class="form-control" name = "tipe" placeholder="Tipe Aset">
            </div>

            <div class="form-group">
                <label for = "foto">Foto Aset</label>
                <input type="file" class="form-control" name="foto" accept="image/">
            </div>

            <div class="form-group">
                <label for="s_n">S/N</label>
                <input type="text" class="form-control" name = "s_n" placeholder="S/N">
            </div>

            <div class="form-group">
                <label for="owner">Owner</label>
                <input type="text" class="form-control" name = "owner" placeholder="Owner Aset">
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="th_produksi">Tahun Produksi</label>
                    <input type="text" class="form-control" name = "th_produksi" placeholder="Tahun Produksi Aset">
                </div>

                <div class="form-group col-lg-4">
                    <label for="th_pengadaan">Tahun Pengadaan</label>
                    <input type="text" class="form-control" name = "th_pengadaan" placeholder="Tahun Pengadaan Aset">
                </div>

                <div class="form-group col-lg-4">
                    <label for="th_penggunaan">Tahun Penggunaan</label>
                    <input type="text" class="form-control" name = "th_penggunaan" placeholder="Tahun Penggunaan Aset">
                </div>

            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" name = "lokasi" placeholder="Lokasi aset">
            </div>

            <div class="form-group">
                <label for="koordinat">Koordinat</label>
                <input type="text" class="form-control" id = "coordinate"name="koordinat" value = "getLocation()" disabled>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                {{-- <input type="text" class="form-control" name="status" value = "" disabled> --}}
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" value="Normal">
                      Normal
                    <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" value="Tidak Normal">
                      Default
                    <i class="input-helper"></i></label>
                </div>
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi</label>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="kondisi" value="Baik">
                      Baik
                    <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="kondisi" value="Rusak">
                      Rusak
                    <i class="input-helper"></i></label>
                </div>
            </div>

            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggung_jawab" value = "user" disabled>
            </div>
            
            {{-- cooordinate appears --}}
            
            
            
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
        </div>
    </div>
</body>
@endsection


<script>
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition)
        }

        function showPosition(position){
            let lat = position.coords.latitude
            let lon = position.coords.longitude
            document.querySelector('.forms-sample input[name = "koordinat"]').value= `${lat}, ${lon}`
        }
    }


</script>

