@extends('layouts.app')

@section("content")
    <x-bread-crumb>

    </x-bread-crumb>
    <div class="row my-3">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-primary">
                        @lang('msg.welcome')
                    </h4>
                    <p>

                        <button class="btn btn-success" id="toast">Toast</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("foot")

    <script>

        $("#toast").click(function () {

        })

    </script>

@endsection
