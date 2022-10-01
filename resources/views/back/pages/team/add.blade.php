@extends('back.layouts.master')
@section('title','Üye ekle')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">@yield('title')</h4>
        <form class="forms-sample" method="POST" action="{{route('admin.ekibimiz.store')}}" enctype="multipart/form-data">
            @csrf
        
         <div class="form-group">
            <label for="exampleInputName1">Ad Soyad</label>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'border-danger' : ''}}" id="exampleInputName1" placeholder="Ad soyad" value="{{old('name')}}">
            @error('name')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Unvan</label>
            <input type="text" name="rank" class="form-control  {{$errors->has('rank') ? 'border-danger' : ''}}" id="exampleInputEmail3" placeholder="Unvan" value="{{old('rank')}}">
            @error('rank')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="exampleInputEmail3">Hakkında</label>
            <textarea id="editor" cols="16" rows="23" type="text" name="about" class="form-control  {{$errors->has('about') ? 'border-danger' : ''}}" id="exampleInputEmail3" placeholder="Hakkında">{!!old('about')!!}</textarea>
            @error('about')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label>Fotoğraf</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info  {{$errors->has('image') ? 'border-danger' : ''}}" disabled="" placeholder="Resim yükle" value="{{old('image')}}">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary text-light" type="button">Yükle</button>
              </span>
            </div>
            @error('image')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary me-2 text-light">Oluştur</button>
          <a href="{{route('admin.slaytlar.index')}}" class="btn btn-light">Vazgeç</a>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script src="{{asset('back/js/file-upload.js')}}"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection