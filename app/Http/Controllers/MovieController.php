<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get('http://127.0.0.1:8000/api/movie');
        $json = json_decode($res->getBody(), true);
        $Collection = collect($json);
        return view('index')->with('data',$Collection);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kk ='';
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://127.0.0.1:8000/api/movie', [
            'form_params' => [
                'title' => $request->input('title'),
                'trailer' => $request->input('trailer'),
                'poster' => $request->input('poster'),
                 'year' => $request->input('year')]]);




        $client2 = new \GuzzleHttp\Client();
        $response2 = $client->request('POST', 'http://127.0.0.1:8000/api/genres', [
            'form_params' => [
            'genre' => $request->input('genre'),]]);


        $client4 = new \GuzzleHttp\Client();
        $response4 = $client4->request('POST', 'http://127.0.0.1:8000/api/actor', [
            'form_params' => [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'gender' => $request->input('gender')
            ]]
        );







        $clientid =  new \GuzzleHttp\Client();
        $genreid = $clientid->get('http://127.0.0.1:8000/api/getgenreid');
        $movieid = $clientid->get('http://127.0.0.1:8000/api/getmoviesid');
        $genrestring =  $genreid->getBody()->getContents();
        $moviestring = $movieid->getBody()->getContents();
        $response4 = $clientid->request('POST','http://127.0.0.1:8000/genres_list',[
            'form_params' => [
                'genreid' => $genrestring,
                'moviesid' =>$moviestring

            ]
        ]);


        $clientid2 =  new \GuzzleHttp\Client();
        $actorid = $clientid->get('http://127.0.0.1:8000/api/getactorid');
        $actoridstring = $actorid->getBody()->getContents();
        $response5 = $clientid2->request(
            'POST','http://127.0.0.1:8000/cast',[
                'form_params' => [
                    'ActorsId' => $actoridstring,
                    'MoviesId' =>$moviestring

                ]
            ]
        );

        $client5 = new \GuzzleHttp\Client();
        $response5 = $client4->request('POST', 'http://127.0.0.1:8000/api/rating', [
                'form_params' => [
                    'rating' => $request->input('rating'),
                    'MoviesId'=>$moviestring


                ]]
        );


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = 'http://127.0.0.1:8000/api/movie';
        $url  .='/';
        $url .= $id;
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET',$url);
        $json = json_decode($res->getBody(), true);
        $Collection = collect($json);
        return view('m')->with('data',$Collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = 'http://127.0.0.1:8000/api/movie';
        $url  .='/';
        $url .= $id;
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET',$url);
        $json = json_decode($res->getBody(), true);
        $Collection = collect($json);

        return view('edit')->with('data',$Collection)->with('id',$id);



      return view('edit',compact('res'));
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
        $url = 'http://127.0.0.1:8000/api/movie';
        $url  .='/';
        $url .= $id;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', $url, [
            'form_params' => [
                'title' => $request->input('title'),
                'trailer' => $request->input('trailer'),
                'poster' => $request->input('poster'),
                'year' => $request->input('year')]]);

        return Redirect()->route('movie.index')->with('success','movie update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = 'http://127.0.0.1:8000/api/movie';
        $url  .='/';
        $url .= $id;
        $client = new \GuzzleHttp\Client();
        $res = $client->request('DELETE',$url);
        return Redirect()->route('movie.index')->with('success','movie update successfully');
    }
}
