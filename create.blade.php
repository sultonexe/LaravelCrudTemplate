@extends('template.app') //Me-Load template dari folder views/template/app.blade.php

@section('title' , 'Create Product') //Section untuk title di file app.blade.php
@section('pagetitle' , 'Create Product') //Section untuk pagetitle di file app.blade.php

@push('csscustom') //Push untuk Stack csscustom di file app.blade.php
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <style>
        .label-required{
            font-size: 14px;
            color: red;
        }
    </style>
@endpush

@section('content') //Section untuk content di file app.blade.php
    
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <form action="{{ route('product.store') }}" method="POST" class="form" enctype="multipart/form-data">
                <div class="box-body">

                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="">Nama Product <span class="label-required">*</span></label>
                        <input type="text" name="product" class="form-control input-sm" placeholder="Nama Produk.."
                        required maxlength="60" value="{{ old('product') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Harga <span class="label-required">*</span></label>
                        <input type="number" name="price" class="form-control input-sm" placeholder="Harga Produk.."
                        required min="0" max="999999999" value="{{ old('price') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Stok <span class="label-required">*</span></label>
                        <input type="number" name="stock" class="form-control input-sm" placeholder="Stok Produk.."
                        required min="0" max="999999999" value="{{ old('stock') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" id="image" multiple name="image[]" id="image" accept="image/*">
                        <p class="help-block">Only File Images (.jpg/.jpeg/.png)</p>
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea id="description" class="form-control" name="description">{{ old('description') }}
                        </textarea>
                    </div>

                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-md btn-success">
                            <i class="fa fa-save mr-3"></i>  Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>  
    </div>
</div>

@endsection

@push('scriptcustom') //Push untuk Stack scriptcustom di file app.blade.php
    <script src="{{URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            //description
            $('#description').wysihtml5({
                toolbar : {
                    "image": false,
                    "blockquote": false,
                    "link": false,
                    "lists": false,
                }
            });
        });
    </script>
@endpush
