@extends('layouts.master')
@section('content_title', 'Admin Management')
@section('add','#add_modal')
@include('admin.create')
@include('admin.edit')
@section('content')
    <div>
        <form class="position-relative w-100 h-100 bg-white p-3 mt-3">
        <table class="table table-borderless" id="myTable">
            <thead>
            <tr class="" style="border-bottom: 2px solid #dee2e6">
                <th class="table-header font-weight-normal">Id</th>
                <th class="table-header font-weight-normal">Name</th>
                <th class="table-header font-weight-normal">Role</th>
                <th class="table-header font-weight-normal"> &nbsp;</th>
            </tr>
            </thead>
            <tbody>

            @foreach($admins as $i=>$admin)
            <tr>
                <th scope="row" class="padding-table-row">
                    <span class="text-td font-weight-normal">
                        {{ $admins->perPage()*($admins->currentPage()-1)+ (++$i) }}
                    </span>
                </th>
                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$admin->name}}
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$admin->role}}
                    </div>
                </td>

                <td class="padding-table-row w88px">
                    <button type="button" class="btn-clear " title="Edit"  id="edit-button" data-toggle="modal" data-target="#edit_modal">
                        <a class="a-clear">
                            <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>
                        </a>
                    </button>
                    <button type="button" id="delete-button" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                        <i class="fal fa-times text-danger fw300"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
            <nav aria-label="Page navigation example">
                {{$admins->links()}}
            </nav>
    </form>
    </div>
@endsection
