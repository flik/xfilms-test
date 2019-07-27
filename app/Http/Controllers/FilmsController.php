<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
//use App\Http\Requests; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Session;
use Auth; 

use App\Film;
use App\Comment;
use App\Genre;
use App\Http\Controllers\Controller;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return Response|array
     */
    public function index()
    {
        $films = Film::paginate(1);
       
         // echo '<pre>'; print_r( $films); echo '</pre>'; exit;  
        return view('films.index', compact('films'));
        // return $films;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id');
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required|max:128',
            'description' => 'required|max:512',
            'release_date' => 'required',
            'rating' => 'required|digits_between:1,5',
            'ticket_price' => 'required|max:128',
            'country' => 'required|max:128',
            'genres' => 'required',
            'photo_url' => 'required|image',
        );
        $validator = Validator::make($request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('films/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $img = Request::file('photo_url');
            $filename = uniqid() . '-' . $img->getClientOriginalName();

            // store
            $film = new Film;
            $film->name = Request::get('name');
            $film->slug = $this->getUniqueSlug($film, Request::get('name'));
            $film->description = Request::get('description');
            $film->release_date = date('Y-m-d',strtotime(Request::get('release_date')));
            $film->rating = Request::get('rating');
            $film->ticket_price = Request::get('ticket_price');
            $film->country = Request::get('country');
            $film->photo_url = '/xfilms-test/img/' . $filename;
            $film->save();

            $film->genres()->sync(Request::get('genres'));

            //Move Uploaded File
            $destinationPath = 'img';
            $img->move($destinationPath, $filename);

            // redirect
            Session::flash('message', 'Successfully created');
            return Redirect::to('films');
        }
    }

    /**
     * Generate a unique slug.
     * @param Illuminate\Database\Eloquent\Model $model
     * @param string $value
     * @return string
     */
    function getUniqueSlug($model, $value)
    {
        $slug = str_slug($value);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Response
     * @internal param int $id
     */
    public function show($slug)
    {

        $film = Film::where('slug', $slug)->firstOrFail();;
        $guest = !Auth::check();

        return view('films.show', compact('film', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::pluck('name', 'id');

        return view('films.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        $rules = array(
            'name' => 'required|max:128',
            'description' => 'required|max:512',
            'release_date' => 'required',
            'rating' => 'required|digits_between:1,5',
            'ticket_price' => 'required|max:128',
            'country' => 'required|max:128',
            'genres' => 'required',
            'photo_url' => 'image',
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('films/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $film = Film::find($id);
            $film->name = Request::get('name');
            $film->slug = $this->getUniqueSlug($film, Request::get('name'));
            $film->description = Request::get('description');
            $film->release_date = Request::get('release_date');
            $film->rating = Request::get('rating');
            $film->ticket_price = Request::get('ticket_price');
            $film->country = Request::get('country');

            if (Request::hasFile('photo_url')) {
                $img = Request::file('photo_url');
                $filename = uniqid() . '-' . $img->getClientOriginalName();

                //Move Uploaded File
                if ($film->photo_url != '/img/nopic.jpg') {
                    File::delete(public_path() . $film->photo_url);
                }

                $film->photo_url = '/img/' . $filename;

                $destinationPath = 'img';
                $img->move($destinationPath, $filename);
            }

            $film->save();

            $film->genres()->sync(Request::get('genres'));

            // redirect
            Session::flash('message', 'Film updated');
            return Redirect::to('films');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id);

        //Move Uploaded File
        if ($film->photo_url != '/img/nopic.jpg') {
            File::delete(public_path() . $film->photo_url);
        }

        $film->delete();
        Session::flash('delete', "Successfully Deleted");

        return Redirect::route('films.index');
    }

    /**
     * @param $film_id
     * @return
     */
    public function comment($film_id)
    {
        $film = Film::findOrFail($film_id);

        $rules = array(
            'author_name' => 'required|max:128',
            'comment_body' => 'required|max:512',
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::route('films.show', ['slug' => $film->slug])
                ->withErrors($validator);
        } else {

            // store
            $comment = new Comment;
            $comment->film_id = $film_id;
            $comment->author_name = Request::get('author_name');
            $comment->comment_body = Request::get('comment_body');

            $comment->save();


            return Redirect::route('films.show', $film->slug);
        }
    }


}
