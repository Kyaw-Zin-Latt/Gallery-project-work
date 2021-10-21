<div class="modal fade"  id="{{ $id }}">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Upload Photo</h4>

                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>

            </div>

            <form action="{{ $link }}" id="form-{{ $formId }}" method="post" enctype="multipart/form-data">
                @csrf
                @if($formId !== "profile")
                @method("put")
                @endif

                <div class="modal-body">

                    <div class="form-group">

                        <label class="form-control-label">Upload Photo</label>

                        <br/>

                        <input type="file" name="{{ $name }}">

                    </div>

                </div>

                <div class="modal-footer">

                    <input type="submit" value="Upload" form="form-{{ $formId }}" class="btn btn-sm btn-primary"/>

                    <a href='#' class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</a>

                </div>

            </form>

        </div>

    </div>

</div>
