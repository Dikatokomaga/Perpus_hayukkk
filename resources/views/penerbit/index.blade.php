@extends ('layout.app')

@section('title','penerbit')

@section('content')
    <section class="section">
            <div class="section-header">
                <h1>penerbit cik</h1>
            </div>
            <div class="section-body">
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>penerbit</h4>

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
                                @foreach($penerbit as $p)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->kode}}</td>
                                <td>{{$p->nama}}</td>
                                <td>
                                    <form action="/penerbit/{{$p->id}}" method="GET"  id="delete-form">
                                        @method('delete')
                                        <button class="btn btn-sm btn-success fa fa-frog" onclick="confirmDelete()">  </button>
                                        <a href="/penerbit/{{$p->id}}/edit" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i></a>

                                    </form>
                                    
                                    
                                </td>
                                </tr>

                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </section>
            @include('penerbit.form')
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