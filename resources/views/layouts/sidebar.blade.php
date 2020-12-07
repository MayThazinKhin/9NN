<div class="sidebar">
    <div class="inner-sidebar" id="inner">

        <a href="{{route('staffs.index')}}" class="a-clear a-sidebar @yield('staff')">
            <i class="fas fa-user-tie fs17"></i> &nbsp;Staff
        </a>

        <a href="{{route('bars.index')}}" class="a-clear a-sidebar @yield('bar')">
            <i class="fal fa-cocktail fs17"></i> Bar & Kitchen
        </a>
        <a href="{{route('items.index')}}" class="a-clear a-sidebar @yield('item')">
            <i class="fal fa-shopping-cart fs17"></i> Shop
        </a>

        <a href="{{route('tables.index')}}" class="a-clear a-sidebar @yield('table')">
            &nbsp;<i class="fas fa-table"></i> Table
        </a>

        <a href="{{route('members.index')}}" class="a-clear a-sidebar @yield('member')">
            &nbsp;<i class="fal fa-user fs17"></i> &nbsp;Member
        </a>

        <a href="{{route('inventory.index')}}" class="a-clear a-sidebar @yield('inventory')">
            <i class="fal fa-inventory fs17"></i> Inventory
        </a>

        <a href="{{route('financial.index')}}" class="a-clear a-sidebar @yield('financial')">
            <i class="fal fa-coins fs17"></i>  &nbsp;Financial
        </a>

        <a href="{{route('invoice')}}" class="a-clear a-sidebar @yield('invoice')">
            &nbsp;<i class="fal fa-file-invoice-dollar fs17"></i> &nbsp;Invoices
        </a>

        <a href="{{route('cancel_items')}}" class="a-clear a-sidebar @yield('cancel')">
            <i class="fal fa-minus-circle fs17"></i> Cancel Items
        </a>

        <a href="{{route('kitchen_items')}}" class="a-clear a-sidebar @yield('kitchen')">
            <i class="fal fa-knife-kitchen fs17"></i> Kitchen Items
        </a>

        <a href="{{route('credits')}}" class="a-clear a-sidebar @yield('credit')">
          Credit
        </a>
    </div>
</div>
