<!-- add_modal_Grade -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('dashbaord.create_grades') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                            @error('name')
                            <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="name_en" required>
                            @error('name_en')
                            <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('dashboard.notes') }}
                            :</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                        @error('notes')
                        <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info"
                            data-dismiss="modal">{{ trans('dashboard.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('dashboard.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>