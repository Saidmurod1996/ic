<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Image;
use Session;
use Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ports = Portfolio::orderBy('id', 'desc')->paginate(10);
        return view('admin.port.index')->withPorts($ports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.port.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'body' => 'required',
            'featured_image' => 'sometimes|image']);

        $portfolio = new Portfolio;

        $portfolio->title = $request->title;

        $slug = str_slug($request->title);
        if(($count = Portfolio::whereRaw("slug RLIKE '^{$slug}[0-9]*$'")->count())>0){
            $slug = $slug . $count;
        }
        
        $portfolio->slug=$slug;
        $portfolio->body = $request->body;

        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(300, 200)->save($location);
            $portfolio->image = $fileName;
        }

        $portfolio->save();

        Session::flash('success', 'The portfolio was successfully created');

        return redirect()->route('portfolio.show', $portfolio->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port = Portfolio::find($id);
        return view('admin.port.show')->withPort($port);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $port = Portfolio::find($id);
        return view('admin.port.edit')->withPort($port);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $port =Portfolio::find($id);

            $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'featured_image' => 'image'
            ]);


        $port->title = $request->input('title');
        
        $slug = str_slug($request->title);
        if(($count = Portfolio::whereRaw("slug RLIKE '^{$slug}[0-9]*$'")->count())>0){
            $slug = $slug . $count;
        }
        $port->slug=$slug;
        $port->body = $request->input('body');

        if(($request->hasFile('featured_image'))){
            $image = $request->file('featured_image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);

            Image::make($image)->resize(300, 200)->save($location);
            $oldFileName = $port->image;

            $port->image = $fileName;
            Storage::delete($oldFileName);
        }


        $port->save();

        Session::flash('success', 'The portfolio was successfully updated');

        return redirect()->route('portfolio.show', $port->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $port = Portfolio::find($id);

        Storage::delete($port->image);
        $port->delete();

        Session::flash('success', 'This portfolio was successfully deleted');

        return redirect()->route('portfolio.index');
    }
}
