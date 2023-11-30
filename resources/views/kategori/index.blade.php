@extends ('layout.app')

@section('title','kategori')

@section('content')
    <section class="section">
            <div class="section-header">
                <h1>Kategori cik</h1>
            </div>
            <div class="section-body">
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Kategori</h4>

                        <div class="card-header-form">
                        <button class="btn-sm btn-success" data-toggle="modal" data-target="#modal-form">Tambah Data</button>
                    </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            
                            <thead>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($kategori as $k)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{!! DNS1D::getBarcodeHTML('$' .$k->kode, 'C39+',1,25)!!}</td>
                                <td>{{$k->nama}}</td>
                                <td>
                                    <form action="/kategori/{{$k->id}}" method="GET" id="delete-form">
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger fa fa-frog" onclick="confirmDelete()">  </button>
                                        <a href="/kategori/{{$k->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                    </form>
                                    
                                    <!-- <a href="/kategori/{{$k->id}}/edit" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i></a> -->
                                </td>
                                </tr>

                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </section>
            @include('kategori.form')
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