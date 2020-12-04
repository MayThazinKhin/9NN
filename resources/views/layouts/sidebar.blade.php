<div class="sidebar">
    <div class="inner-sidebar" id="inner">

        <a href="{{route('staffs.index')}}" class="a-clear a-sidebar @yield('staff')">
            Staff
        </a>

        <a href="{{route('bars.index')}}" class="a-clear a-sidebar @yield('bar')">
            Bar & Kitchen
        </a>

        <a href="{{route('items.index')}}" class="a-clear a-sidebar @yield('item')">
            Shop
        </a>

        <a href="{{route('tables.index')}}" class="a-clear a-sidebar @yield('table')">
            Table
        </a>

        <a href="{{route('members.index')}}" class="a-clear a-sidebar @yield('member')">
            Member
        </a>

        <a href="{{route('inventory.index')}}" class="a-clear a-sidebar @yield('inventory')">
            Inventory
        </a>

        <a href="{{route('financial.index')}}" class="a-clear a-sidebar @yield('financial')">
            Financial
        </a>

        <a href="{{route('invoice')}}" class="a-clear a-sidebar @yield('invoice')">
            Invoices
        </a>

        <a href="{{route('cancel_items')}}" class="a-clear a-sidebar @yield('cancel')">
            Cancel Items
        </a>

    </div>
</div>
