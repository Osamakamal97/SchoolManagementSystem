<!-- add_modal_Grade -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('dashbaord.create_'.$route) }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route($route.'.store') }}" method="POST">
                    @csrf
                    {{ $slot }}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ trans('dashboard.submit') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('dashboard.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>