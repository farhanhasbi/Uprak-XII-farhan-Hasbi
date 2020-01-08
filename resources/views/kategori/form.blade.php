@extends('layouts.app')

@push('meta')
    <meta name="content" content="kategori">
@endpush

@push('css')
    <link href="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/plugins/select2/select2.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/datatable-main.js') }}"></script>
    <script src="{{ asset('js/main.js')}}"></script>

    @if($kategoribr)
        <script>
            lastClick = 'edit-button';
            id = '{{ $kategoribr->id }}';
        </script>
    @else
        <script>
            lastClick = 'create-button';
        </script>
    @endif
@endpush


@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header font-weight-bold">
        </div>

        <div class="card-body">
            <form id="form">
                @if($kategoribr)
                <input type="hidden" value="{{ $kategoribr->id }}" id="idClass">
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Tipe Barang</label>
                                    <input type="text" class="form-control"  name="tipe_barang" value="{{ old('tipe_barang', $kategoribr['tipe_barang'] ?? null) }}">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> 
                </form>

                <div class="float-right mt-3">
                    <button type="button" class="btn btn-default mr-3"><a href="{{ url('kategori')}}" style="color:black;">Kembali</a></button>
                    <button type="submit" id="submit" class="btn create-button btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @endsection