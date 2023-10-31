@extends('layout.app')

@section('title', 'Tambah')

@section('content')

<section class="section">
    <div class="section-header">
        <h4>
            Anggota
        </h4>
    </div>
    
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Tambah Data Anggota
                </h4>
            </div>

            <div class="card-body">
                <form action="{{route('anggota.store')}}"  enctype="multipart/form-data" method="POST">
                    @csrf 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="laki-laki">Lelaki Rauli</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telpon">Telphone</label>
                            <input type="number" name="telpon" id="telpon" class="form-control">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="alamat">Alamat</label>
                           <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-book-">Simpan Data </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection