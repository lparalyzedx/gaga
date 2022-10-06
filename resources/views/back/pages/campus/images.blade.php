@extends('back.layouts.master')
@section('title', 'Kategoriler')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="{{route('admin.kampus.store')}}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Resim</label>
                            <input type="file" name="image"
                                class="form-control {{ $errors->has('image') ? 'border-danger' : '' }} "
                                id="exampleInputUsername1" name="name" placeholder="Resim ekle"
                                value="{{ old('image') }}">
                            @error('image')
                                <span class="text-danger mt-3">{{ $message }}
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary me-2 btn-block text-white">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card text-center">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Resim
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <td>
                                      <img src="{{ asset('storage/campus/' . $image->image) }}" alt="image"
                                            class="img-fluid">
                                    </td>

                                    <td class="m-auto">
                                        <a href="{{ route('admin.kampus.delete', $image->id) }}"
                                            class="btn btn-sm btn-danger text-light" title="Sil"><i
                                                class="mdi mdi-delete"></i></a>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <div class="container mt-2">
                  {{$images->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
@endsection
