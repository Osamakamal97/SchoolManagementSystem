<div class="form-group">
    <label for="exampleFormControlTextarea1">{{ trans('dashboard.notes') }}
        :</label>
    <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('notes')
    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
    @enderror
</div>