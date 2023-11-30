@extends('layout.app')

@section('title', 'Buku')

@section('content')
    <section class="section">

        <div class="section-header">
            <h4>Data Buku</h4>
            <div class="card-header-form">
               
            </div>
        </div>


        <div class="section-body">

            <div class="card-body">
                <table class="table table-striped" id="table">`
                <a href="{{route('buku.create')}}" class="btn btn-success btn-sm"><i class="fa fa-spider"></i>Tambah data </a>
                        <thead>
                            <tr>
                                <th style="width:5%" >#</th>
                                <th >Kode</th>
                                <th >Judul</th>
                                <th>Pengarang</th>
                                <th>Jumlah-Halaman</th>
                                <th>Foto</th>
                                <th style="width:11%" >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $b)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{!! DNS1D::getBarcodeHTML('$' .$b->kode, 'C39+',1,25)!!}</td>
                                    <td>{{$b->judul}}</td>
                                    <td>{{$b->pengarang}}</td>
                                    <td>{{$b->jumlah_halaman}}</td>
                                    <td><img src="{{asset('/storage/buku/'.$b->gambar)}}" class="rounded" style="width: 50px"></td>
                                    <td>
                                    <form action="/buku/{{$b->id}}" method="POST"  id="delete-form{{$b->id}}">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('buku.edit',$b->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger fa fa-frog" onclick="confirmDelete('delete-form{{$b->id}}')"></button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection


@push('script')
<script>
    function confirmDelete(formId)
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
                document.getElementById(formId).submit()
            }
        });

    }
</script>
@endpush

@push('script')
 <script>
    $(document).ready(function() {
        $('#table').dataTable();
    })
 </script>
@endpush

