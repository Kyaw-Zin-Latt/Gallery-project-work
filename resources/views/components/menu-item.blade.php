<li class="nav-item">
    <a href="{{ $link }}" class="nav-link {{ Request::url() == $link ? 'active' : '' }}">
        <i class="fa fa-caret-right"></i>
        <p>
            {{ $title }}
        </p>
    </a>
</li>
