@extends('admin.layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Yönetim Paneli</h1>
                </div>
                <div class="col-6 pt-5">
                    <div class="d-flex justify-content-center">
                        <form method="get" action="{{ route('post') }}" enctype="multipart/form-data">
                            <input type="text" name="gameid" id="" placeholder="Game ID" class="py-1">
                            <button type="submit button" class="btn btn-dark">Oyunu Ekle</button>
                        </form>
                    </div>
                </div>
                <div class="col-6 pt-5">
                    <div class="d-flex justify-content-center">
                        <form method="get" action="{{ route('patchnoteekle2') }}" enctype="multipart/form-data">
                            <button type="submit button" class="btn btn-dark">Patchnote Tara</button>
                        </form>
                    </div>
                </div>
                <div class="col-6 pt-5">
                    <div class="d-flex justify-content-center">
                        <form method="get" action="{{ route('steamdb') }}" enctype="multipart/form-data">
                            <button type="submit button" class="btn btn-dark">Steamdb Tara</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection
