@extends('back.layouts.master')
@section('title', 'Kategoriler')
@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method='POST' action="{{ route('admin.kategoriler.store') }}">
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
                        <div class="form-group">
                            <label class="col-sm-3 col-form-label">Görünürlük</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="visibility"
                                            id="membershipRadios1" value="blog">
                                        Blog
                                        <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="visibility"
                                            id="membershipRadios2" value="studio">
                                        Atölye
                                        <i class="input-helper"></i></label>
                                </div>
                            </div>
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
                                    Görünürlük
                                </th>
                                <th>
                                    Durum
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
                                    <td>
                                        {{ $categorie->visibility == 'blog' ? 'Blog' : 'Atölye' }}
                                    </td>
                                    <td><button
                                            class="status btn btn-{{ $categorie->status == 1 ? 'success' : 'danger' }} text-light"
                                            data-id="{{ $categorie->id }}">{{ $categorie->status == 1 ? 'Aktif' : 'Pasif' }}</button>
                                    </td>

                                    <td class="m-auto">
                                            <a href="{{ route('admin.kategoriler.delete', $categorie->id) }}"
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

    @section('js')
    <script>
        $('.status').click(function() {
            const self = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: `{{ route('admin.kategoriler.status') }}`,
                data: {
                    id: self.data('id')
                },
                success: function(response) {
                    if (response.status == 1) {
                        self.removeClass('btn-danger');
                        self.addClass('btn-success');
                        self.text('Aktif');
                    } else {
                        self.removeClass('btn-success');
                        self.addClass('btn-danger');
                        self.text('Pasif');
                    }
                }
            });
        });
    </script>
@endsection

