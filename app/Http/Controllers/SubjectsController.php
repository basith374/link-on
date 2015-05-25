<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Course;
use App\Subject;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SubjectsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subjects = Subject::all();
		return view('subjects.index', compact('subjects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$course = Input::get('course');
		$subject = Input::get('subject');
		$data = [$course, $subject];
		return view('subjects.admin.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		Subject::create($input);
		
		return Redirect::route('courses.index')->with('success-message', 'Subject created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request, $id)
	{
		$subject = Subject::find($id);
		$course = Course::find($request->get('course'));
		$data = ['course' => $course, 'subject' => $subject];
		return view('subjects.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		$course = Course::find($request->get('course'));
		$subject = Subject::find($id);
		$data = ['course' => $course, 'subject' => $subject];
		return view('subjects.admin.edit', $data);
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
		// Subject::find($id)->delete();
		return Redirect::route('courses.index')->with('success-message', 'Subject Deleted');
	}
	
	/**
	 * Fetch all the subjects array as JSON.
	 *
	 * @return Response
	 */
	public function allSubjects()
	{
		$data = Subject::all();
		return response()->json(['data' => $data]);
	}
	
	public function subjectDetails($id)
	{
		$data = Subject::find($id);
		return response()->json($data);
	}
}
