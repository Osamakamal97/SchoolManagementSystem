<!-- add_modal_Grade -->
<div class="modal fade" id="deleteModal({{ $id }})" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('dashbaord.delete '.$route) }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route($route.'.destroy', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{ __('messages.are you suer delete') }} {{ $item }}?
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ trans('dashboard.delete') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('dashboard.cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>