<div class="d-flex justify-content-between">
    <nav style="margin-top: 8px">
        <a href="#" class="a-clear text-dark fm-roboto fs17">@yield('content_title') </a>
    </nav>
    <div>

        @yield('select_box')
        <form action=@yield('route') id="search" method="post" class="d-inline-block mb-0">
            @csrf
            <label class="search-box-container">
                <input type="text" class="search-box py-1 " id="myInput" placeholder=" Search..." autocomplete="off">
                <i class="fal fa-search search-icon"></i>
            </label>
        </form>
        <div class="d-inline-block ml-3">
            @hasSection('add_route')
                <a class="btn btn-danger py-1 px-5 rounded-0" href=@yield('add_route')>Add</a>
            @else
                <button type="button" class="btn btn-danger py-1 px-5 rounded-0"  data-toggle="modal" data-target=@yield('add')>
                    Add
                </button>
            @endif

        </div>
    </div>
</div>
