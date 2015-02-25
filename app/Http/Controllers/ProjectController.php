<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Project;
use Validator;

class ProjectController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('projects.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *  @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'project_name' => 'required|max:255',
            'short_key' => 'required|max:255',
        ]);

        if ($v->fails()) {
            return redirect('/projects/create')->withErrors($v->errors());
        } else {
            $projects = Project::create(array('project_name' => $request->input('project_name'),
                'short_key' => $request->input('short_key'),
                'url' => $request->input('url'),
                'project_type' => $request->input('project_type')
            ));

            return redirect('/projects');
        }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
