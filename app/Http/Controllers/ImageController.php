<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function getImages(Request $request)
    {
        return view('images')->with('images', $this->getUserImagesList($request->user_id));
    }

    public function apiGetImages($user_id)
    {
        return json_encode($this->getUserImagesList($user_id));
    }

    public function apiGetImage($user_id, $image_id)
    {
        return json_encode($this->getUserImage($user_id, $image_id));
    }

    public function postUpload(StoreImage $request)
    {
        try {
            $path = Storage::disk('s3')->put('images/originals', $request->file, 'public');

            $request->merge([
                'size' => $request->file->getSize(),
                'path' => $path,
                'user_id' => $request->user_id
            ]);
            $this->image->create($request->only('path', 'title', 'size', 'user_id'));
            return back()->with('success', 'Image Successfully Saved');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function apiUpload(StoreImage $request)
    {
        $response = [
            'status' => 'error'
        ];
        try {
            $path = Storage::disk('s3')->put('images/originals', $request->file);

            $request->merge([
                'size' => $request->file->getSize(),
                'path' => $path,
                'user_id' => $request->user_id
            ]);
            $image = $this->image->create($request->only('path', 'title', 'size', 'user_id'));
            $response['status'] = 'success';
            $response['image'] = $image;
        } catch (\Exception $e) {
        }

        return json_encode($response);
    }

    public function getUserImagesList($user_id)
    {
        return Image::where('user_id', $user_id)->get();
    }

    public function getUserImage($user_id, $image_id)
    {
        return Image::where('id', $image_id)->where('user_id', $user_id)->first();
    }
}
