<?php

namespace App\Http\Controllers;

use App\Flyer;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\FlyerRequest;


class FlyersController extends Controller
{

    public function __construct() {

        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('flyers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FlyerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        //validate the form in FlyerRequest

        //save flyer to database with the user_id
        $flyer = $this->user->publish(new Flyer($request->all()));

        //flash messaging
        flash()->success('Success!','Your flyer has been created!');

        //redirect
        return redirect(flyer_path($flyer));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $item) {

        $flyer = Flyer::whereIdAndItemAre($id, $item);

        return view('flyers.show', compact('flyer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function edit($id, $item)
    {
        $flyer = Flyer::whereIdAndItemAre($id, $item);

        return view('flyers.edit', compact('flyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlyerRequest $request, $id)
    {

        $flyer = Flyer::where(compact('id'))->firstOrFail();
        $flyer->update($request->all());

        flash()->success('Success!','Your flyer has been updated!');

        //redirect
        return redirect(flyer_path($flyer));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
