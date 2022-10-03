@extends('back.layouts.master')
@section('title', 'Şifre değiştir')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Şifreyi değiştir</h6>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->all())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}

                </div>
            @endif
            <form method="post" action="{{ route('admin.password.post') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">E-posta adresi</label>
                    <input type="text" class="form-control" id="category" value="{{ auth()->user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="category">Eski şife</label>
                    <input type="password" name="password" class="form-control" id="category">
                </div>
                <div class="form-group">
                    <label for="category">Yeni şifre</label>
                    <input type="password" name="newPassword" class="form-control" id="category">
                </div>
                <div class="form-group">
                    <label for="category">Yeni şifre tekrar</label>
                    <input type="password" name="newPassword2" class="form-control" id="category">
                </div>

                <button type="submit" class="btn btn-primary text-light">kaydet</button>
            </form>
        </div>
    </div>
@endsection
