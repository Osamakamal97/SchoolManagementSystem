@extends('layouts.master')
@section('css')
@section('title',__('dashboard.grades'))
@toastr_css
@endsection
@section('page-header')
<!-- breadcrumb -->
<x-page-title :title="__('dashboard.grades')" />
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
@error('exception_error')
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <p style="color: red;direction: ltr">
                    {{ $message }}
                </p>
            </div>
        </div>
    </div>
</div>
@enderror
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <x-buttons.create :name="'grade'" />
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dashboard.name') }}</th>
                            <th>{{ __('dashboard.notes') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $grade->name }}</td>
                            <td>{{ $grade->notes }}</td>
                            <td>{{ $grade->status }}</td>
                            <td>
                                <x-buttons.edit :id="$grade->id" />
                                <x-buttons.delete :id="$grade->id" />
                            </td>
                        </tr>
                        <x-modals.edit :route="'grades'" :id="$grade->id">
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="name" class="form-control"
                                        value="{{ $grade->getTranslation('name','ar') }}">
                                    @error('name')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ $grade->getTranslation('name','en') }}">
                                    @error('name_en')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                            </div>
                            <x-inputs.edit.notes :row="$grade" />
                        </x-modals.edit>
                        <x-modals.delete :route="'grades'" :id="$grade->id" :item="$grade->name" />
                        @endforeach
                    </tbody>
                </x-table>
            </div>
        </div>
    </div>
</div>
{{-- @livewire('grades.create') --}}
<x-modals.create :route="'grades'">
    <div class="row">
        <div class="col">
            <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                :</label>
            <input id="Name" type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
            <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
            @enderror
        </div>
        <div class="col">
            <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                :</label>
            <input type="text" class="form-control" name="name_en" value="{{ old('name_en') }}">
            @error('name_en')
            <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
            @enderror
        </div>
    </div>
    <x-inputs.create.notes />
</x-modals.create>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection