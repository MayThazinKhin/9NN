<div class="d-flex justify-content-between">
    <nav style="margin-top: 8px">
        <a href="#" class="a-clear text-dark fm-roboto fs17">@yield('content_title') </a>
    </nav>
    <div>

        @yield('select_box')
        <form action={{route('monthly_financial.filter')}} id="search" method="post" class="d-inline-block mb-0">
            @csrf
            <label class="">
                <input type="date" name="start_date" title="Start Date" class="search-box py-1" id="myInput" placeholder="" autocomplete="off">
                <i class="fal fa-search search-icon"></i>
            </label>
            <label class="">
                <input type="date" name="end_date" title="End Date" class="search-box py-1" id="myInput" placeholder="" autocomplete="off">
                <i class="fal fa-search search-icon"></i>
            </label>

            <div class="d-inline-block ml-3">
                <button type="submit" class="btn btn-danger py-1 px-5 rounded-0">
                    Submit
                </button>
            </div>
        </form>

    </div>
</div>
