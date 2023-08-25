@extends('layout.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Pengecekkan Aset Rutin</h4>
               
                <div class="text-right">
                  <a href = "{{ route('aset.create')}}" type="button" class="btn btn-info btn-rounded btn-fw">Tambah</a>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Tipe</th> 
                              <th>Jenis</th>
                              <th>Merk</th>
                              <th>S/N</th>
                              <th>Tahun Produksi</th>
                              <th>Tahun Pengadaan</th>
                              <th>Tahun Penggunaan</th>
                              <th>Lokasi</th>
                              <th>Status</th>
                              <th>Kondisi</th>
                              <th>Penanggung Jawab</th>
                              <th>#</th>
                          </tr>
                      </thead>
                  
                      <tbody>
                          @foreach ($rutinasets as $item)
                              <tr>
                                {{-- <td><img src="{{$item->foto ? asset('storage/'. $item->foto) : asset('images/faces/face5.jpg')}}"></td> --}}
                                <td> {{ $item['tipe'] }}</td>
                                <td>{{ $item['jenis_aset'] }}</td>
                                 <td> {{ $item['merk'] }}</td>
                                  <td>{{ $item['s_n'] }}</td>
                                  <td>{{ $item['th_produksi']}}</td>
                                  <td>{{ $item['th_pengadaan']}}</td>
                                  <td>{{ $item['th_penggunaan']}}</td>
                                <td>{{ $item['lokasi']}}</td>
                                <td>{{ $item['koordinat']}}</td>
                                <td>{{ $item['status']}}</td>
                                <td>{{ $item['kondisi']}}</td>
                                <td>{{ $item['penanggung_jawab']}}</td>

                                  <td>
                                    <form action = "{{route('aset.destroy', $item->id)}}" method = "POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type = "submit" class = "btn btn-danger btn-rounded show_confirm" >Hapus</button>
                                      <a href="{{route('aset.edit', $item->id)}}" class = "btn btn-warning btn-rounded ">Ubah</a>
                                      <a href="">
                                        <i class = "mdi mdi-information menu-icon mdi-lg" width="16" height="16"> </i>                                
                                      </a>
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