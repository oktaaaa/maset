@extends('layout.main')


@section('content')
    <div class="row">
        {{-- <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <h5 class="mt-4">Daftar Aset</h5>
                        <a href = "{{ route ('aset.create')}}" type="button" class="btn btn-info btn-rounded btn-fw">+ Tambah</a>
                        
                        <hr>
                        <div class="card-deck">
                            @foreach ($asets as $item)
                                <div class="card">
                                    <img class="img-fluid card-img-top" src="images/{{$item->foto}}" alt="foto">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['merk'] }}</h5>
                                        <p class="card-text">
                                            Jenis   : {{ $item['jenis_aset'] }} <br>
                                            Tipe    : {{ $item['tipe'] }}
                                        </p>
                                        <i class="mdi mdi-information"></i>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Last updated {{ $item['updated_at'] }} ago</small>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Aset</h4>
                @if(Session::get('success'))
                  <div class = "alert alert-success">
                    {{Session::get('success')}}
                  </div>
                @endif
                <div class="text-right">
                  <a href = "{{ route('aset.create')}}" type="button" class="btn btn-info btn-rounded btn-fw">Tambah</a>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                                <th>Foto</th>
                              <th>Jenis</th>
                              <th>Merk</th>
                              <th>Tipe</th>
                              <th>S/N</th>
                              <th>Tahun Produksi</th>
                              <th>#</th>
                          </tr>
                      </thead>
                  
                      <tbody>
                          @foreach ($asets as $item)
                              <tr>
                                <td><img src= img src="{{$item->foto ? asset('public/'. $item->foto) : asset('images/faces/face5.jpg')}}"></td>
                                  <td>{{ $item['jenis_aset'] }}</td>
                                 <td> {{ $item['merk'] }}</td>
                                 <td> {{ $item['tipe'] }}</td>
                                  <td>{{ $item['s_n'] }}</td>
                                  <td>{{ $item['th_produksi']}}</td>
                                  <td>
                                    <form action = "{{route('aset.destroy', $item->id)}}" method = "post">
                                      @csrf
                                      @method('DELETE')
                                      <button type = "submit" class = "btn btn-danger btn-rounded show_confirm">Hapus</button>
                                      <a href="{{route('aset.edit', $item->id)}}" class = "btn btn-warning btn-rounded">Ubah</a>
                                    </form>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>

    {{-- script sweealert --}}
    <script src = "//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection