<div class="sidebar">
    <div style="padding-left: 20px; padding-top: 10px; font-size: 18px;">
        <span><b>9 Snookers & Billiard</b></span>
    </div>

    <div class="inner-sidebar pb-4" style="overflow-y: auto" id="inner">
        @can('isAdmin')
        <a href="{{route('staffs.index')}}" class="a-clear a-sidebar @yield('staff')">
            <i class="fas fa-user-tie fs17"></i> &nbsp;Staff
        </a>

        <a href="{{route('bars.index')}}" class="a-clear a-sidebar @yield('bar')">
            <i class="fal fa-cocktail fs17"></i> Bar & Kitchen
        </a>

        <a href="{{route('items.index')}}" class="a-clear a-sidebar @yield('item')">
            <i class="fal fa-shopping-cart fs17"></i> Shop
        </a>

        <a href="{{route('general.index')}}" class="a-clear a-sidebar @yield('general_item')">
            <i class="fal fa-shopping-cart fs17"></i> General Item
        </a>

        <a href="{{route('tables.index')}}" class="a-clear a-sidebar @yield('table')">
            &nbsp;<i class="fas fa-table"></i> Table
        </a>

        <a href="{{route('members.index')}}" class="a-clear a-sidebar @yield('member')">
            &nbsp;<i class="fal fa-user fs17"></i> &nbsp;Member
        </a>

            {{--             inventory--}}

            <button style="" class="btn-clear btn-collapse a-sidebar m-0 text-left w-100 @yield('inventory')" type="button"
                    data-toggle="collapse" data-target="#inventory"
                    aria-expanded="false" aria-controls="inventory"
            >
                <i class="fal fa-inventory fs17 pr-2"> </i>  Inventory
            </button>
            <div class="collapse multi-collapse " id="inventory" style="background-color: #f8f8f8">
                <a href="#" class="a-clear a-sidebar m-0"
                   style="padding-left: 56px">
                    Management
                </a>
                <a href="{{route('inventory.index')}}"
                   class="a-clear a-sidebar m-0 " style="padding-left: 56px">
                    History
                </a>
            </div>

        <a href="{{route('financial.index')}}" class="a-clear a-sidebar @yield('daily_transition')">
            <i class="fal fa-exchange fs17"></i> Daily Transition
        </a>

        <a href="{{route('transaction.index')}}" class="a-clear a-sidebar @yield('advance_transition')">
            <i class="fal fa-exchange fs17"></i> Advanced Transition
       </a>

        <a href="{{route('monthly_financial.index')}}" class="a-clear a-sidebar @yield('monthly_transition')">
            <i class="fal fa-exchange fs17"></i> Monthly Transition
        </a>
        <a href="{{route('cash.index')}}" class="a-clear a-sidebar "  @yield('cash')>
            <i class="fal fa-sack-dollar fs17"> </i> Cash
        </a>

        <a href="{{route('withdraw')}}" class="a-clear a-sidebar "  @yield('withdraw')>
          <i class="fal fa-sack-dollar fs17"> </i> Withdraw
        </a>

{{--        bar inventory--}}
            <button style="" class="btn-clear btn-collapse a-sidebar m-0 text-left w-100" type="button"
                    data-toggle="collapse" data-target="#bar_inventory"
                    aria-expanded="false" aria-controls="bar_inventory"
            >
                <i class="fal fa-inventory fs17 pr-2"> </i> Bar Inventory
            </button>
            <div class="collapse multi-collapse" id="bar_inventory" style="background-color: #f8f8f8">
                <a href="{{route('bar.inventory')}}" class="a-clear a-sidebar m-0"
                     style="padding-left: 56px">
                    List
                </a>
                <a href="{{route('bar.inventory.confirm')}}" class="a-clear a-sidebar m-0" style="padding-left: 56px">
                    Confirm
                </a>
            </div>

{{--            shop inventory--}}

            <button style="" class="btn-clear btn-collapse a-sidebar m-0 text-left w-100" type="button"
                    data-toggle="collapse" data-target="#shop_inventory"
                    aria-expanded="false" aria-controls="shop_inventory"
            >
                <i class="fal fa-inventory fs17 pr-2"> </i> Shop Inventory
            </button>
            <div class="collapse multi-collapse pl-4" id="shop_inventory" style="background-color: #f8f8f8">
                <a href="{{route('item.inventory')}}" class="a-clear a-sidebar cycle m-0"
                   style="padding-left: 56px">
                    List
                </a>
                <a href="{{route('item.inventory.confirm')}}" class="a-clear a-sidebar cycle m-0" style="padding-left: 56px">
                    Confirm
                </a>
            </div>

            {{--            kitchen inventory--}}

            <button style="" class="btn-clear btn-collapse a-sidebar m-0 text-left w-100" type="button"
                    data-toggle="collapse" data-target="#kitchen_inventory"
                    aria-expanded="false" aria-controls="kitchen_inventory"
            >
                <i class="fal fa-inventory fs17 pr-2"> </i> Kitchen Inventory
            </button>
            <div class="collapse multi-collapse" id="kitchen_inventory" style="background-color: #f8f8f8">
                <a href="{{route('kitchen.inventory')}}" class="a-clear a-sidebar m-0"
                   style="padding-left: 56px">
                    List
                </a>
                <a href="{{route('kitchen.inventory.confirm')}}" class="a-clear a-sidebar m-0" style="padding-left: 56px">
                    Confirm
                </a>
            </div>


        @elsecan('isCashier')
        <a href="{{route('invoice')}}" class="a-clear a-sidebar @yield('invoice')">
           <i class="fal fa-file-invoice-dollar fs17"></i> &nbsp;Invoices
        </a>

        <a href="{{route('done_invoice')}}" class="a-clear a-sidebar @yield('done_invoice')">
            <i class="fal fa-file-invoice-dollar fs17"></i> Done Invoices
        </a>

        <a href="{{route('receipt')}}" class="a-clear a-sidebar @yield('receipt')">
             <i class="fal fa-file-invoice-dollar fs17"></i> &nbsp;Shop Invoices
        </a>

            <a href="{{route('done_receipt')}}" class="a-clear a-sidebar @yield('done_receipt')">
                <i class="fal fa-file-invoice-dollar fs17"></i> Done&nbsp;Shop Invoices
            </a>

        <a href="{{route('credits')}}" class="a-clear a-sidebar @yield('credit')">
            <i class="fal fa-file-invoice-dollar fs17"></i> Credit
        </a>

       <a href="{{route('financial.index')}}" class="a-clear a-sidebar @yield('financial')">
            <i class="fal fa-exchange fs17"></i> Daily Transition
       </a>


        @elsecan('isKitchenStaff')
        <a href="{{route('kitchen_items')}}" class="a-clear a-sidebar @yield('kitchen')">
           <i class="fal fa-knife-kitchen fs17"></i> Kitchen Items
        </a>
        <a href="{{route('cancel_items')}}" class="a-clear a-sidebar @yield('cancel')">
           <i class="fal fa-minus-circle fs17"></i> Cancel Items
        </a>
        @endcan
{{--         <a href="{{route('staff_logout')}}" class="a-clear a-sidebar @yield('cancel')">--}}
{{--            <i class="fal fa-minus-circle fs17"></i> logout--}}
{{--         </a>--}}
    </div>
</div>
