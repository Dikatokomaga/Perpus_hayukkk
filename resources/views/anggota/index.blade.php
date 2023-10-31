@extends('layout.app')

@section('title', 'Anggota')

@section('content')
 <section class="section">
    <div class="section-header">
        <h4>Anggota Sui</h4>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Anggota Kebersamaan</h4>
                <div class="card-header-form">
                    <a href="{{route('anggota.create')}}" class="btn btn-success btn-sm"><i class="fa fa-spider"></i>Tambah data </a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Kode</th>
                            <th >Nama</th>
                          
                            <th>Telphone</th>
                            <th>Alamat</th>
                            <th  >Foto</th>
                            <th style="width:11%" >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($anggota as $ag)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ag->kode}}</td>
                            <td>{{$ag->nama}}</td>
                           
                            <td>{{$ag->telpon}}</td>
                            <td>{{$ag->alamat}}</td>
                            <td><img src="{{asset('/storage/anggota/'.$ag->foto)}}" class="rounded" style="width: 50px"></td>
                            <td>
                                    <form action="/anggota/{{$ag->id}}" method="GET"  id="delete-form">
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger fa fa-frog" onclick="confirmDelete()">  </button>
                                        <a href="{{route('anggota.edit',$ag->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    </form>
                                </td>
                           
                           
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
 </section>

@endsection

@push('script')
<script>
    function confirmDelete()
    {
    event.preventDefault();
    swal({
           title: 'Yakin ?',
           text: 'Data ini akan Adios',
           icon: 'warning',
           buttons: true,
           dangerMode: true,
        })
        .then((willDelete)=>{
            if(willDelete){
                document.getElementById('delete-form').submit()
            }
        });

    }
</script>
@endpush

