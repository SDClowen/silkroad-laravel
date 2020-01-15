@extends('backend.layouts.app')

@section('backend-content')
    @include('backend.layouts.navbar')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('backend/downloads.title-edit') }}</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ __('backend/downloads.edit') }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('downloads-update-backend', ['download' => $download->id]) }}">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name">{{ __('backend/downloads.name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                                   aria-describedby="nameHelp" name="name"
                                                   value="{{ $download->name }}">
                                            <small id="nameHelp" class="form-text text-muted">
                                                {{ __('backend/downloads.name-help') }}
                                            </small>
                                            @if($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-2">
                                            <img class="img-fluid" src="{{ asset('storage/web/downloads/' . $download->image->filename) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <div class="form-group">
                                            <label for="link">{{ __('backend/downloads.link') }}</label>
                                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                                                   aria-describedby="linkHelp" name="link"
                                                   value="{{ $download->link }}">
                                            <small id="linkHelp" class="form-text text-muted">
                                                {{ __('backend/downloads.link-help') }}
                                            </small>
                                            @if($errors->has('link'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('link') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <div class="form-group">
                                            <label for="file_size">{{ __('backend/downloads.table.file-size') }}</label>
                                            <input type="text" class="form-control @error('file_size') is-invalid @enderror" id="file_size"
                                                   aria-describedby="fileSizeHelp" name="file_size"
                                                   value="{{ $download->file_size }}">
                                            <small id="fileSizeHelp" class="form-text text-muted">
                                                {{ __('backend/downloads.size-help') }}
                                            </small>
                                            @if($errors->has('file_size'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('file_size') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <input class="btn btn-primary" type="submit" value="{{ __('backend/downloads.submit') }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection