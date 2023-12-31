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

            <button style="" class="btn-clear btn-collapse a-sidebar m-0 text-left w-100 @yield('inventory')"
                    type="button"
                    data-toggle="collapse" data-target="#inventory"
                    aria-expanded="false" aria-controls="inventory"
            >
                <i class="fal fa-inventory fs17 pr-2"> </i> Inventory
            </button>
            <div class="collapse multi-collapse " id="inventory" style="background-color: #f8f8f8">
                <a href="{{route('inventory.list')}}" class="a-clear a-sidebar m-0" inventory.list
                   style="padding-left: 56px">
                    Management
                </a>
                <a href="{{route('inventory.index')}}"
                   class="a-clear a-sidebar m-0 " style="padding-left: 56px">
                    History
                </a>
            </div>

            <a href="{{route('financial.index')}}" class="a-clear a-sidebar @yield('daily_transition')">
                <i class="fal fa-exchange fs17"></i> Cash Book
            </a>

            <a href="{{route('bank_book')}}" class="a-clear a-sidebar @yield('bank_box')">
                <i class="fal fa-exchange fs17"></i> Bank  Book
            </a>


            <a href="{{route('daily_cash')}}" class="a-clear a-sidebar @yield('daily_cash')">
                <i class="fal fa-exchange fs17"></i> Daily Cash
            </a>

            <a href="{{route('daily_bank')}}" class="a-clear a-sidebar " @yield('daily_bank')>
                <i class="fal fa-sack-dollar fs17"> </i> Daily Bank
            </a>

            <a href="{{route('transaction.index')}}" class="a-clear a-sidebar @yield('advance_transition')">
                <i class="fal fa-exchange fs17"></i> Advanced Transition
            </a>

            <a href="{{route('monthly_financial.index')}}" class="a-clear a-sidebar @yield('monthly_transition')">
                <i class="fal fa-exchange fs17"></i> Monthly Transition
            </a>


            <a href="{{route('withdraw')}}" class="a-clear a-sidebar " @yield('withdraw')>
                <i class="fal fa-sack-dollar fs17"> </i> Withdraw
            </a>






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
            @can('isInventoryStaff')
                <a href="{{route('kitchen_items')}}" class="a-clear a-sidebar @yield('kitchen')">
                    <i class="fal fa-knife-kitchen fs17"></i> Kitchen Items
                </a>
                <a href="{{route('cancel_items')}}" class="a-clear a-sidebar @yield('cancel')">
                    <i class="fal fa-minus-circle fs17"></i> Cancel Items
                </a>
            @endcan
            <button style="" class="btn-clear btn-collapse a-sidebar m-0 text-left w-100" type="button"
                    data-toggle="collapse" data-target="#bar_inventory"
                    aria-expanded="false" aria-controls="bar_inventory"
            >
                <i class="fal fa-inventory fs17 pr-2"> </i> Inventory
            </button>
            <div class="collapse multi-collapse" id="bar_inventory" style="background-color: #f8f8f8">
                <a href="{{route('item.list')}}" class="a-clear a-sidebar m-0"
                   style="padding-left: 56px">
                    Stock List
                </a>
                <a href="{{route('transfer.item')}}" class="a-clear a-sidebar m-0" style="padding-left: 56px">
                    Transfer List
                </a>
            </div>
        @elsecanany(['isInventoryStaff' || 'isKitchenStaff']))


        @endcan


        {{--         <a href="{{route('staff_logout')}}" class="a-clear a-sidebar @yield('cancel')">--}}
        {{--            <i class="fal fa-minus-circle fs17"></i> logout--}}
        {{--         </a>--}}
    </div>
</div>
