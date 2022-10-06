@extends('back.layouts.master')
@section('title', 'Kategoriler')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method='POST'>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Kategori adı</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'border-danger' : '' }} "
                                id="exampleInputUsername1" name="name" placeholder="Kategori adı" value="{{old('name')}}">
                            @error('name')
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
                                    Kategori adı
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td>
                                        {{ $categorie->name }}
                                    </td>

                                    <td class="m-auto">
                                            <a href="{{ route('admin.blog.category.delete', $categorie->id) }}"
                                                class="btn btn-sm btn-danger text-light" title="Sil"><i
                                                    class="mdi mdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

  

