<div class="modal fade"  id="myModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Delete {{ $title }}</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Do you want to delete all the wallpapers under that {{ $name }} together?</p>
            </div>

            <div class="modal-footer">

{{--                <?php if ( isset( $yes_all_btn )): ?>--}}

{{--                <a class="btn btn-sm btn-primary btn-yes" href='<?php echo $module_site_url ."/delete_all/";?>'>--}}
{{--                    <?php echo $yes_all_btn; ?></a>--}}

{{--                <?php endif; ?>--}}

                <form action="" method="post">
                    @method("delete")
                    @csrf

                    <button class="btn btn-sm btn-primary btn-no" type="submit">
                        Only {{ $delOnly }}
                    </button>
                </form>
{{--                <a class="btn btn-sm btn-primary btn-yes" href="">--}}
{{--                    Only {{ $delOnly }}--}}
{{--                </a>--}}

                <a href='#' class="btn btn-sm btn-primary" data-dismiss="modal">
                    Cancel
                </a>
            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
