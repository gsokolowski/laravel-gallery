<?php

namespace App\Http\Controllers\Gallery;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


// optimisation


class GalleryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // get http://laravel-gallery.local/api/gallery/active
    public function active()
    {
        $galleries = Gallery::all();
        return $this->showAll($galleries, 200); // using trait
    }

    // get http://laravel-gallery.local/api/gallery/deleted
    public function deleted()
    {
        // Model::withTrashed()->get();
        $galleries = Gallery::onlyTrashed()->get();
        return $this->showAll($galleries, 200); // using trait
    }

    // delete http://laravel-gallery.local/api/gallery/4
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return $this->showOne($gallery, 200); // using trait
    }

    // put http://laravel-gallery.local/api/gallery/4/restore
    public function restore($id)
    {
        $gallery = Gallery::withTrashed()->find($id);
        Gallery::withTrashed()->find($id)->restore();
        return $this->showOne($gallery, 200); // using trait
    }


}
