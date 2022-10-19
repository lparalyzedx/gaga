@extends('back.layouts.master')
@section('content')
@section('title', 'Ayarlar')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><strong>@yield('title')</strong></h6>

    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first() }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        @endif
        <form class="" action="{{ route('admin.ayarlar.update') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site logo</label>
                        <input type="file" name="logo" class="form-control" value="{{ $setting->logo }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site favicon</label>
                        <input type="file" name="favicon" class="form-control" value="{{ $setting->favicon }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Linkedin</label>
                        <input type="text" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-posta</label>
                        <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telefon numarası</label>
                        <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Adres</label>
                        <input type="text" name="address" class="form-control" value="{{ $setting->address }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Harita link</label>
                        <input type="text" name="map" class="form-control" value="{{ $setting->map }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Firma açıklaması</label>
                        <textarea cols="40" rows="6" type="text" name="company_description" class="form-control editor">{!! $setting->company_description !!}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>KVKK politikası</label>
                        <textarea cols="40" rows="6" type="text" name="policy" class="form-control editor2">{!! $setting->policy !!}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Kullanım koşulları</label>
                        <textarea cols="40" rows="6" type="text" name="terms" class="form-control editor3">{!! $setting->policy !!}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Neden Biz</label>
                        <textarea cols="40" rows="6" type="text" name="whyus" class="form-control editor4">{!! $setting->whyus !!}</textarea>
                    </div>
                </div>


                <button type="submit" class="btn  btn-block btn-primary text-white">Güncelle</button>

            </div>
        </form>

    </div>

</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('.editor'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('.editor2'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('.editor3'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('.editor4'))
        .catch(error => {
            console.error(error);
        });

</script>

@endsection
