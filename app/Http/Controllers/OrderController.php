<?php

namespace App\Http\Controllers;

use App\Order;
use App\Post;
use App\Categorie;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'delete','show']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $data=Categorie::all();
        return view('orders.create',compact('data','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $order=new Order();
        $order->user_id=auth()->user()->id;
        $order->post_id=$request->post_id;
        $order->duree=$request->duree;
        $order->accepted=false;
        $order->payed=false;
        $order->save();
        return redirect()->route('home');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=Categorie::all();

        $orders= Order::where('user_id', '=', Auth()->user()->id)->get();
        if( count($orders) > 0)
            return view('orders.show',compact('data','orders'));
        else{
            $message="Aucun resultat a été trouvé";
            return view ('orders.show',compact('data','message'));
        }
    }
    public function reshow()
    {
        $data=Categorie::all();

       $user=Auth()->user();


            return view('orders.reshow',compact('data','user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $id)
    {
        $req = Order::find($id->id);

        $req->accepted = true;
        $req->save();
        $data=Categorie::all();

        $user=Auth()->user();


             return view('orders.reshow',compact('data','user'));

    }
    public function  reupdate(Order $id)
    {
        $req = Order::find($id->id);

        $req->payed = true;
        $req->save();
        $data=Categorie::all();

        $orders= Order::where('user_id', '=', Auth()->user()->id)->get();
        if( count($orders) > 0)
            return view('orders.show',compact('data','orders'));
        else{
            $message="Aucun resultat a été trouvé";
            return view ('orders.show',compact('data','message'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
