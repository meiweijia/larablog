<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{

    /**
     * 获取相册列表
     */
    public function GetAlbumList()
    {
        $albumSrv = new Album();
        $result = $albumSrv->GetAlbumList();
        return view('mei.album')->with('albums', $result);
    }

    /**
     * 根据ID获取相册所有图片
     * @param $id
     * @return $this
     */
    public function GetPhoList($id)
    {
        $photoSrv = new Photo();
        $albumSrv = new Album();
        $result['photo'] = $photoSrv->GetPhoList($id);
        $result['album'] = $albumSrv->GetAlbumInfo($id);
        return view('mei.pholist')->with('result', $result);
    }


    public function update(Request $request)
    {

    }
}