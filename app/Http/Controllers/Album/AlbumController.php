<?php

namespace App\Http\Controllers\Album;
use App\Http\Requests\Requests\AlbumRequest;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;
use App\Traits\albumTrait;
class AlbumController extends Controller
{
    use albumTrait;
    //update photos in specific album
    public function editAlbum($id){
       $offer= Album::find($id);
       if(!$offer)
          return redirect()->back();

       $detail= Album::select('id','album_name')->find($id);
       return view('edit',compact('detail'));
    }
    public function update(Request $request,$id){
        $album= Album::find($id);//search in given table id only
        if(!$album)
           return redirect()->back();

        $album->picture()->delete();
        $this->saveImage($request->photos,'images/albums',$id);
        return redirect()-> route('all')->with(['success'=>'Successfully Updated']);

    }
    //--------------------------------------------------------------------------------

    //Move Photo To Another Album And Delete Album
    public function changeForm($id){
       $offer= Album::find($id);
       if(!$offer)
          return redirect()->back();

    if(count(Album::select("*")->where('id',"!=",$id)->get())==1){
        $detail= Album::select("*")->where('id',"!=",$id)->get();
        return view('ChangeAlbums',compact('detail','id'));
    }else{
        return redirect()
        -> route('all')
        ->with(['error' =>'not Another Albums Founded']);

    }
    }
    public function deleteAndChangeAlbum(Request $request,$old_album_id){
        $album= Album::with('Picture')->find($old_album_id);
        $a2=$album->picture;
        foreach( $a2 as $pic){
            // return $pic;
            $pic->update([
                'album_id'=> $request->sel,
            ]);
        }
        return redirect()-> route('all')->with(['success'=>'Change Album Successfully']);
    }
//--------------------------------------------------------------------------------------------
//Show all albums with pictures
    public function allAlbum()
    {
         $album = Album::with('Picture')->get();
         $idd=Album::select('id')->get();
         return view('allAlbums', compact('album','idd'));


    }
    //--------------------------------------------------------------------------
    //create a new album
    public function create1()
    {
        return view('createAlbum');
    }
    public function uploadSubmit(AlbumRequest $request){
        $a=Album::create([
        'album_name'=>$request->album_name,
        ]);
       $album_id = $a->id;
       if(!$album_id)
          return redirect()->back();

       $this->saveImage($request->photos,'images/albums',$album_id);
       return redirect()->back()->with(['success'=>'Successfully created album']);
    }
   //-----------------------------------------------------------------------------------------
   //Delete Pictures in specific album
    public function deleteAlbum($album_id)
    {
        $album = Album::with('Picture')->find($album_id);
        if (!$album)
            return abort('404');

        if($album->whereDoesntHave('Picture')->find($album_id)){
            return redirect()
            -> route('all')
            ->with(['error' =>'not have Images']);
        }else{
            $album->picture()->delete();
            return redirect()
            -> route('all')
            ->with(['success' =>'Album Deleted successfully']);

        }
    }

  //--------------------------------------------------------------------------------------
  public function deleteAlbumWithPictures($album_id)
  {
      $album = Album::with('Picture')->find($album_id);
      if (!$album)
          return abort('404');
      $album->picture()->delete();
      $album->delete();
      return redirect()
            -> route('all')
            ->with(['success' =>'Deleted successfully']);
  }
}
