<a href="{{ $link }}" class="nav-link ">
    <i class="nav-icon {{ $class }}"></i>
    <p>
        {{ $title }}

        @if($link == "#")
        <i class="right fa fa-angle-left"></i>
        @endif
    </p>
</a>
