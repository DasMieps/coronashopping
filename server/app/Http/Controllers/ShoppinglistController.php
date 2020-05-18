<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers ;
use Illuminate\Http\Request ;
use Illuminate\Http\JsonResponse ;
use Illuminate\Database\Eloquent ;
use Illuminate\Support\Facades\DB ;
use App\Shoppinglist;
use App\Item;
use App\Comment;


class ShoppinglistController extends Controller
{
    public function index(){
        $shoppinglists = Shoppinglist::with ([ 'creator' , 'shopper' , 'comments', 'items'])
            -> get ();
        return $shoppinglists;
    }

    public function show( $shoppinglist){
        $shoppinglist = Shoppinglist::find ( $shoppinglist );
        return view( 'shoppinglists.show', compact ( 'shoppinglist' ));
    }

    public function findById(string $id) : Shoppinglist {
        $shoppinglist = Shoppinglist::where('id', $id)->
        with([ 'creator' , 'shopper' , 'comments', 'items' ])
            ->first();
        return $shoppinglist;
    }

    public function checkId(string $id){
        $shoppinglist = Shoppinglist::where('id',$id)->first();
        return $shoppinglist != null ? response()->json('book with '.$id.' exists',200) :
            response()->json('book with '.$id.' does not exist',404);
    }

    public function findBySearchTerm (string $searchTerm){
        $shoppinglist = Shoppinglist::with(['creator', 'shopper', 'comments', 'items'])
            -> where ( 'name' , 'LIKE' , '%' . $searchTerm . '%')->get();

            return $shoppinglist;
    }


    /**
     * create new Shoppinglist
     */

    public function save (Request $request):JsonResponse{
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try{
            $shoppinglist = Shoppinglist::create($request->all());
            //save items
            if(isset($request['items']) && is_array($request['items'])){
                foreach($request['items'] as $ite){
                    $item = new \App\Item;
                    $item->name = $ite['name'];
                    $item->quantity = $ite['quantity'];
                    $item->max_price = $ite['max_price'];
                    $shoppinglist->items()->save($item);
                }
            }
            //save comments
            if(isset($request['comments']) && is_array($request['comments'])){
                foreach($request['comments'] as $ite){
                    $comments = new \App\Comment;
                    $comments->text = $ite['text'];
                    $shoppinglist->comments()->save($comments);
                }
            }
            //save creator
            if(isset($request['creator']) && is_array($request['creator'])){
                foreach($request['creator'] as $cre){
                    $creator = User::firstOrNew(['firstName'=>$cre['firstName'],
                        'lastName'=>$cre['lastName'], 'email'=>$cre['email'], 'password'=>$cre['password'],
                        'city'=>$cre['city'], 'plz'=>$cre['plz'], 'street'=>$cre['street']]);
                    $shoppinglist->creator()->save($creator);
                }
            }

            DB::commit();
            return response()->json($shoppinglist,201);
        } catch (\Exception $e){
            DB::rollback();
            return response()->json("saving shoppinglist failed: ".$e->getMessage(),420);
        }
    }
    private function parseRequest(Request $request):Request {
        //get date and convert it - ISO 8601, e.g., "2020-01-01T21:00:00.000Z"
        $date = new \DateTime($request->published);
        $request['published'] = $date;
        return $request;
    }

    public function update(Request $request, string $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $shoppinglist = Shoppinglist::with([ 'creator', 'shopper', 'comments', 'items'])
                ->where('id', $id)->first();
            if ($shoppinglist != null) {
                $request = $this->parseRequest($request);
                $shoppinglist->update($request->all());

                //delete all old items and comments
                $shoppinglist->items()->delete();

                $shoppinglist->comments()->delete();
                // save items
                if (isset($request['items']) && is_array($request['items'])) {
                    foreach ($request['items'] as $ite) {
                        $item = Item::firstOrNew(['name'=>$ite['name'],'quantity'=>$ite['quantity'], 'max_price'=>$ite['max_price']]);
                        $shoppinglist->items()->save($item);
                    }
                }
                $shoppinglist->save();


                // save comments
                if (isset($request['comments']) && is_array($request['comments'])) {
                    foreach ($request['comments'] as $com) {
                        $comment = Comment::firstOrNew(['text'=>$com['text']]);
                        $shoppinglist->comments()->save($comment);
                    }
                }
                $shoppinglist->save();

            }
            DB::commit();
            $shoppinglist1 = Shoppinglist::with(['creator', 'shopper', 'comments', 'items'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($shoppinglist1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating shoppinglist failed: " . $e->getMessage(), 420);
        }
    }

    public function delete(string $id) : JsonResponse
    {
        $shoppinglist = Shoppinglist::where('id', $id)->first();
        if ($shoppinglist != null) {
            $shoppinglist->delete();
        }
        else
            throw new \Exception("shoppinglist couldn't be deleted - it does not exist");
        return response()->json('shoppinglist (' .$id. ') successfully deleted', 200);

    }
}
