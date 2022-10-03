@extends('back.layouts.master')
@section('title',"Eğitim'i güncelle")
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">@yield('title')</h4>
        <form class="forms-sample" method="POST" action="{{route('admin.egitimler.update',$training->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
         <div class="form-group">
            <label for="exampleInputName1">Başlık</label>
            <input type="text" name="title" class="form-control {{$errors->has('name') ? 'border-danger' : ''}}" id="exampleInputName1" placeholder="Eğitim adı" value="{{$training->name}}">
            @error('title')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>


          <div class="form-group">
            <label for="exampleInputEmail3">Açıklama</label>
            <textarea id="editor" cols="16" rows="23" type="text" name="description" class="form-control  {{$errors->has('description') ? 'border-danger' : ''}}" id="exampleInputEmail3" placeholder="Açıklama">{!!$training->description!!}</textarea>
            @error('description')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label>Resim</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info  {{$errors->has('image') ? 'border-danger' : ''}}" disabled="" placeholder="Resim yükle" value="{{$training->image}}">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary text-light" type="button">Yükle</button>
              </span>
            </div>
            @error('image')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect3">Durum</label>
            <select class="form-control form-control-sm" name="status" id="exampleFormControlSelect3">
              <option {{$training->status== 1 ? 'selected' : ''}} value="1">Aktif</option>
              <option {{$training->status== 0 ? 'selected' : ''}} value="0">Pasif</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-2 text-light">Güncelle</button>
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