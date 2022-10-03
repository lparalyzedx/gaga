@extends('back.layouts.master')
@section('title','Eğitim ekle')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">@yield('title')</h4>
        <form class="forms-sample" method="POST" action="{{route('admin.egitimler.store')}}" enctype="multipart/form-data">
            @csrf
        
         <div class="form-group">
            <label for="exampleInputName1">Eğitim adı</label>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'border-danger' : ''}}" id="exampleInputName1" placeholder="Eğitim adı" value="{{old('name')}}">
            @error('title')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>


          <div class="form-group">
            <label for="exampleInputEmail3">Açıklama</label>
            <textarea id="editor" cols="16" rows="23" type="text" name="description" class="form-control  {{$errors->has('description') ? 'border-danger' : ''}}" id="exampleInputEmail3" placeholder="Açıklama">{!!old('description')!!}</textarea>
            @error('description')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label>Resim</label>
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
          <a href="{{route('admin.egitimler.index')}}" class="btn btn-light">Vazgeç</a>
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