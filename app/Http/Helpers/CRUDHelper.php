<?php

use App\Actions\Image\Image;

if (!function_exists('UpdateImage')) {
    function UpdateImage($request, $data)
    {
        $image_name = (new Image())->save($request['image']);
        if ($data->image != null) {
            (new Image())->delete($data->image);
        }
        return $image_name;
    }
}

if (!function_exists('StoreImage')) {
    function StoreImage($request)
    {
        return (new Image())->save($request['image']);
    }
}

if (!function_exists('PaginateData')) {
    function PaginateData($model)
    {
        //return $model::orderBy('id', 'desc')->paginate(20);
        return $model::paginate(20);
    }
}

if (!function_exists('CreateData')) {
    function CreateData($request, $model, $route)
    {
        StoreData($request, $model);
        return redirect(route($route));
    }
}


if (!function_exists('StoreData')) {
    function StoreData($request, $model)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $data['image'] = StoreImage(collect($data));
        }
        return $model::create($data);
    }
}

if (!function_exists('DeleteData')) {
    function DeleteData($data, $route)
    {
        if ($data->image != null) {
            (new Image())->delete($data->image);
        }
        $data->delete();
        return redirect(route($route));
    }
}

if (!function_exists('UpdateData')) {
    function UpdateData($request, $data, $route)
    {
        $input = $request->all();
        if ($request->has('image')) {
            $input['image'] = UpdateImage($input, $data);
        }
        $data->update($input);
        return redirect(route($route));
    }
}
