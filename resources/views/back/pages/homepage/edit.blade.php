@extends('back.layouts.master')
@section('title',"Slayt'ı düzenle")
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">@yield('title')</h4>
        <form class="forms-sample" method="POST" action="{{route('admin.slaytlar.update',$slide->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
         <div class="form-group">
            <label for="exampleInputName1">Başlık</label>
            <input type="text" name="title" class="form-control {{$errors->has('title') ? 'border-danger' : ''}}" id="exampleInputName1" placeholder="Başlık" value="{{$slide->title}}">
            @error('title')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Açıklama</label>
            <input type="text" name="text" class="form-control  {{$errors->has('text') ? 'border-danger' : ''}}" id="exampleInputEmail3" placeholder="Açıklama" value="{{$slide->text}}">
            @error('text')
            <span class="text-danger mt-3">{{$message}}
          </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Arkaplan</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info  {{$errors->has('image') ? 'border-danger' : ''}}" disabled="" placeholder="Resim yükle" value="{{$slide->image}}">
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
              <option {{$slide->status== 1 ? 'selected' : ''}} value="1">Aktif</option>
              <option {{$slide->status== 0 ? 'selected' : ''}} value="0">Pasif</option>
            </select>
          </div>
          <input type="hidden" name="id" value="{{$slide->id}}">
          <button type="submit" class="btn btn-primary me-2 text-light">Güncelle</button>
          <a href="{{route('admin.slaytlar.index')}}" class="btn btn-light">Vazgeç</a>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{asset('back/js/file-upload.js')}}"></script>
@endsection