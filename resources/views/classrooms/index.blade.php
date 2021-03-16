@extends('layouts.master')
@section('css')
@section('title',__('dashboard.classrooms'))
@toastr_css
@endsection
@section('page-header')
<!-- breadcrumb -->
<x-page-title :title="__('dashboard.classrooms')" />
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
                <div class="row">
                    <x-buttons.create :name="'classroom'" />
                    <form action="{{ route('classrooms.gradeFilter') }}" method="post" id="grades-filter">
                        @csrf
                        <select class="fancyselect mr-2 ml-2" style="display: none;" name="grade_id"
                            onchange="document.getElementById('grades-filter').submit()">
                            <option value="">{{ __('dashboard.choose grade') }}</option>
                            @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <x-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dashboard.name') }}</th>
                            <th>{{ __('dashboard.grade') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $classroom->name }}</td>
                            <td>{{ $classroom->grade->name }}</td>
                            <td>{{ $classroom->status }}</td>
                            <td>
                                <x-buttons.edit :id="$classroom->id" />
                                <x-buttons.delete :id="$classroom->id" />
                            </td>
                        </tr>
                        <x-modals.edit :route="'classrooms'" :id="$classroom->id">
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('dashboard.name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="name" class="form-control"
                                        value="{{ $classroom->getTranslation('name','ar') }}">
                                    @error('name')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('dashboard.name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ $classroom->getTranslation('name','en') }}">
                                    @error('name_en')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="mr-sm-2">{{ trans('dashboard.grades') }}
                                    :</label>
                                <select class="custom-select" name="grade_id">
                                    <option value="0">Open this select menu</option>
                                    @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}"
                                        {{ $classroom->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                @enderror
                            </div>
                        </x-modals.edit>
                        <x-modals.delete :route="'classrooms'" :id="$classroom->id" :item="$classroom->name" />
                        @endforeach
                    </tbody>
                </x-table>
            </div>
        </div>
    </div>
</div>
<!-- add_modal_Grade -->
<x-modals.create :route="'classrooms'" large="true">
    <div class="repeater">
        <div data-repeater-list="classrooms_list">
            <div data-repeater-item>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name" class="mr-sm-2">{{ trans('dashboard.name_ar') }}
                                :</label>
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="name_en" class="mr-sm-2">{{ trans('dashboard.name_en') }}
                                :</label>
                            <input id="name_en" type="text" class="form-control" name="name_en">
                        </div>
                        <div class="col-md-4">
                            <label for="Name" class="mr-sm-2">{{ trans('dashboard.grades') }}
                                :</label>
                            <select class="custom-select" name="grade_id">
                                <option value="0">Open this select menu</option>
                                @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">
                                    {{ $grade->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- add_form -->
            </div>
        </div>
        <div class="row mt-20 mb-2">
            <div class="col-12">
                <input class="button" data-repeater-create="" type="button" value="Add new"
                    onclick="classroomsIncrement()">
            </div>
        </div>
    </div>
</x-modals.create>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection