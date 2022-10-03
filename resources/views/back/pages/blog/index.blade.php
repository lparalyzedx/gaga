@extends('back.layouts.master')
@section('title', 'Eğitimler')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card-fade">
            <div class="card-body">
                <div class="w-100 d-flex justify-content-between">
                    <h4 class="card-title">@yield('title')</h4>
                    <a href="{{ route('admin.egitimler.create') }}" class="btn btn-primary text-light">Eğitim ekle</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Resim
                                </th>
                                <th>
                                    Başlık
                                </th>
                                <th>
                                    Açıklama
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
                            @foreach ($trainings as $training)
                                <tr>
                                    <td class="">
                                        <img src="{{ asset('storage/trainings/' . $training->image) }}" alt="image">
                                    </td>
                                    <td>
                                        {{ $training->title }}
                                    </td>
                                    <td>
                                        {!! Str::limit($training->description,30) !!}
                                    </td>

                                    <td><button
                                            class="status btn btn-{{ $training->status == 1 ? 'success' : 'danger' }} text-light"
                                            data-id="{{ $training->id }}">{{ $training->status == 1 ? 'Aktif' : 'Pasif' }}</button>
                                    </td>

                                    <td class="m-auto">
                                        <div class="d-flex py-2 align-items-center m-auto">
                                            <a href="{{ route('admin.egitimler.edit', $training->id) }}"
                                                class="btn btn-warning btn-sm text-light me-2" title="Düzenle"><i
                                                    class="mdi mdi-grease-pencil"></i></a>
                                            <a href="{{ route('admin.egitimler.delete', $training->id) }}"
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
                url: `{{ route('admin.egitimler.status') }}`,
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
