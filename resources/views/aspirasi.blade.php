@extends('layouts.main')
@section('container')
<section id="input" style="height: 100vh;">
    <div class="row d-flex  justify-content-center">
        <div class=" col-sm-12 col-md-8 col-lg-6">
            @if (request('id') != null)
            <div class="alert mt-3 alert-warning alert-dismissible fade show" role="alert">
                <strong>Terimakasih Telah Melakukan Pengaduan <br>
                    Nomor Pengaduan : {{ request('id') }}</strong><br>
                <small class="">Silahkan Di Ingat Nomor pengaduannya!!</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          
            @endif
            @if (request('nik') != null)
            <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
               <strong> NIK Anda Belum Terdaftar!! </strong><br>
               <small>Silahkan Isi Datanya Kembali Dengan Benar</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          
            @endif
            <div class="card">
                <div class="card-body p-5">
                    <form action="/aspirasi/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Pelapor</label>
                            <input type="text" name="id" class="form-control bg-primary text-light fw-bold" readonly
                                value="{{ $no }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nomor Induk Kependudukan</label>
                            <input type="number" name="nik" value="{{ old('nik') }}"
                                class="form-control @error('nik') is-invalid @enderror">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <div class=" container row d-flex justify-content-center">
                                <div class="col-12 bg-warning rounded-4 bg-gradient p-3">
                                    <div class="row ">
                                        @foreach ($kategori as $kat)
                                        <div class="col-sm-12 col-lg-4 col-md-12 ">
                                            <input class="form-check-input" value="{{ $kat->id }}" type="radio"
                                                name="kategori_id" id="id_kategori1">
                                            <label class="form-check-label" for="id_kategori1">
                                                {{ $kat->ket_kategori }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                class="form-control  @error('lokasi') is-invalid @enderror">
                            @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Keterangan</label>
                            <textarea name="ket" id="" value="{{ old('ket') }}"
                                class="form-control @error('ket') is-invalid @enderror" rows="2"></textarea>
                            @error('ket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
          
            </div>
        </div>
    </div>
</section>

<section id="aspirasi" class=" py-4 justify-content-center" style="height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <nav class="navbar navbar-expand-lg bg-light shadow border-bottom rounded-4 p-lg-3 p-sm-0 p-md-3">
                <div class="container">
                    <a class="navbar-brand fw-bold text-primary fs-3" href="/aspirasi">Lihat Pengaduan</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-8 mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pb-3 border-bottom">
                            <form action="/" class="" method="get">
                                <label class="form-label fw-bold">Nomor Pengaduan</label>
                                <div class="input-group">
                                    <input type="text" required name="search" value="{{ request('search') }}"
                                        class="form-control" placeholder="Masukkan Nomor Pengaduan"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @if (request('search') != null)
                        <div class="col-12 px-4  py-3">
                            @foreach ($aspirasi as $as)
                            <div class="d-flex">
                                <p class="fw-bold p-0 m-0 me-2">Nomor Pengaduan : </p>
                                <p class="p-0 m-0">{{ $as->id }}</p>
                            </div>
                            <div class="d-flex">
                                <p class="fw-bold p-0 m-0 me-2">Status : </p>
                                <p class="p-0 m-0">{{ $as->status }}</p>
                            </div>
                            <div class="d-flex">
                                <p class="fw-bold p-0 m-0 me-2">Kategori : </p>
                                <p class="p-0 m-0">{{ $as->kategori->ket_kategori }}</p>
                            </div>
                            <div class="d-flex">
                                <p class="fw-bold p-0 m-0 me-2">Alamat : </p>
                                <p class="p-0 m-0">{{ $as->input_aspirasi->lokasi }}</p>
                            </div>
                            <div class="d-block">
                                <p class="fw-bold p-0 m-0 me-2">Keterangan : </p>
                                <p class="p-0 m-0">{{ $as->input_aspirasi->ket }}</p>
                            </div>

                            @if ($as['status'] == 'Selesai' and $as['feedback'] == null)
                            <form action="/aspirasi/feedback" method="POST" class=" p-2  rounded-2 text-center">
                                @csrf
                                <div class="btn btn-dark">
                                    <input type="hidden" name="id_aspirasi" value="{{ $as->id  }}">
                                    <input type="radio" class="" required name="feedback" value="1" id="">
                                    <label class="form-check-label">
                                        1
                                    </label>
                                </div>
                                <div class="btn-danger btn">
                                    <input type="radio" name="feedback" required value="2" id="">
                                    <label class="form-check-label">
                                        2
                                    </label>
                                </div>
                                <div class="btn btn-warning">
                                    <input type="radio" name="feedback" required value="3" id="">
                                    <label class="form-check-label">
                                        3
                                    </label>
                                </div>
                                <div class="btn btn-success">
                                    <input type="radio" name="feedback" required value="4" id="">
                                    <label class="form-check-label">
                                        4
                                    </label>
                                </div>
                                <div class="btn btn-primary"> <input type="radio" required name="feedback" value="5"
                                        id="">
                                    <label class="form-check-label">
                                        5
                                    </label></div>
                                <button type="submit" class="btn btn-secondary text-light"><i
                                        class="bi bi-send-fill"></i> </button>
                            </form>
                            @endif
                    
                        </div>
                        @endforeach
                        @else
                        @endif
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection