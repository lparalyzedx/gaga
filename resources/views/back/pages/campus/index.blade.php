@extends('back.layouts.master')
@section('title', 'Kampüs')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Kampüs</h6>
            </div>
            <div>
                <a class="btn btn-sm btn-primary text-white" href="{{route('admin.kampus.create')}}" >Resim ekle</a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->all())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="post" action="{{ route('admin.kampus.update',$campus->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">Başlık</label>
                    <input type="text" name="title" class="form-control {{$errors->has('title') ? 'border-danger' : ''}}" value="{{$campus->title}}">
                </div>
                <div class="form-group">
                    <label for="category">Açıklama</label>
                    <textarea type="text {{$errors->has('description') ? 'border-danger' : ''}}" name="description" class="form-control editor" id="category">{{$campus->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary text-light">kaydet</button>
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
</script>
@endsection
