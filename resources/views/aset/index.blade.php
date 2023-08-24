@extends('layout.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <h5 class="mt-4">Daftar Aset</h5>
                        <a href = "{{ route ('aset.create')}}" type="button" class="btn btn-info btn-rounded btn-fw">+ Tambah</a>
                        
                        <hr>
                        <div class="card-deck">
                            @foreach ($asets as $item)
                                <div class="card">
                                    <img class="img-fluid card-img-top" src="/images/mikrotik.jpg" alt="Card image cap">
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
        </div>
    </div>
@endsection