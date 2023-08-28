
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
        <h4 class="card-title">Cek Rutin</h4>
        
        <form form action = "{{route('rutinaset.store')}}" method = "POST" class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tipe">Tipe</label>
                <select name="tipe_aset" class = "form-control" id = "tipe_aset">
                    @foreach($aset as $item)
                        <option value="{{$item->id}}" selected="selected"> {{$item -> tipe}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="merk">Merk</label>
                <select id='merk_aset' name='merk_aset' class="form-control">
                    <option value='0'>-- Merk --</option>
                </select>
                {{-- <input type="text" class="form-control" name = "merk" placeholder="Merk Aset" id = "merk"> --}}
                {{-- <select name="merk" class = "form-control" id = "merk">
                    @foreach($aset as $item)
                        <option value="{{$item->id}}"> {{$item -> merk}}</option>
                    @endforeach
                </select> --}}
            
            </div>

            <div class="form-group">
                <label for="aset">Jenis Aset</label>
                {{-- <input type="text" class="form-control" name = "jenis_aset" placeholder="Jenis Aset"> --}}
                <select name="jenis" class = "form-control" id = "jenis">
                    @foreach($aset as $item)
                        <option value="{{$item->id}}"> {{$item -> jenis_aset}}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for = "fotoInput">Foto Aset</label>
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
                    {{-- <input type="text" class="form-control" name = "th_produksi" placeholder="Tahun Produksi Aset"> --}}
                    <select name="th_produksi" class = "form-control" id = "th_produksi">
                        @foreach($aset as $item)
                            <option value="{{$item->id}}"> {{$item -> th_produksi}}</option>
                        @endforeach
                    </select>
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
                <input type="text" class="form-control" id = "coordinate"name="koordinat" value = "" readonly= "readonly">
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
                      Tidak Normal
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
                <input type="text" class="form-control" name="penanggung_jawab" value = "user">
            </div>
            
            {{-- cooordinate appears --}}
            
            
            
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#tipe_aset').change(function(){
          
                var id = $(this).val();
                
                // Empty the dropdown
                $('#merk_aset').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                url: 'findTipe/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    console.log(response.);
                    
                }
            });
            });
            });
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
        // here





       
        // input autofilled

           
            // $(document).ready(function(){
            //     $("#aset_id").change(
            //         function(){
            //             $("input[name=merk]").val();

            //             $.ajax({
            //                 type: "POST",
            //                 url: 'index.blae'
            //             })
            //         }
            //     )
            // })

            // $("#aset_id").change(function(){
            //     $.ajax({
            //         url: '/api/aset/',
            //         type: 'GET',
            //         data: $(this).val(),
            //         success: function(response){
            //             var Vals = JSON.parse(response)
    
            //             $("input[name=merk]").val(Vals.merk);
            //         }
            //     })
            // })
       
    
    
    </script>
</body>
@endsection





