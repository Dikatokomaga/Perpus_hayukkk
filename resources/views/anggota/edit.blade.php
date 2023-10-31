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
                   Editkan Lalu Hitamkan 
                </h4>
            </div>

            <div class="card-body">
                <form action="{{route('anggota.update', $anggota->id )}}" method="POST">
                    @csrf 
                    @method('put')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="{{$anggota->kode}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{$anggota->nama}}" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{$anggota->jenis_kelamin}}">
                                <option value="laki-laki">Lelaki Rauli</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{$anggota->tempat_lahir}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{$anggota->tanggal_lahir}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="telpon">Telphone</label>
                            <input type="number" name="telpon" id="telpon" class="form-control" value="{{$anggota->telpon}}">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="alamat">Alamat</label>
                           <textarea  name="alamat" id="alamat" class="form-control" cols="30" rows="10" >{{$anggota->alamat}}</textarea>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                        </div>
                        
                    </div>
                    <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-book-">Simpan Data </button> -->
                    <button type="submit" class="btn btn-md btn-success"><i class="fa fa-otter"> Update</i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection