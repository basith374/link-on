<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Course;
use App\Subject;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller {

	protected $rules = [
		'slug' => 'required',
		'title' => 'required',
		'acronym' => 'required',
		'description' => 'required',
		'subjects' => 'required',
	];
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
		return view('courses.index', compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$course = Input::get('course');
		$from = Input::get('from');
		$data = [$course, $from];
		return view('courses.admin.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);
		var_dump(Input::all());
		// Course::create(array_except($request->all(),['_token']));
		
		// return Redirect::route('courses.index')->with('success-message', 'Course created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::find($id);
		$subjects = $course->subjects;		
		$data = ['course' => $course, 'subjects' => $subjects];
		return view('courses.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);
		$subjects = $course->subjects;
		$subjectnames = DB::table('subjects')->lists('title');
		return view('courses.admin.edit', ['course' => $course, 'subjects' => $subjects, 'subjectnames' => $subjectnames]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$this->validate($request, $this->rules);
		$subjects = $request->get('subjects');
		
		// var_dump(DB::table('course_subject')->where('course_id', $id)->whereIn('subject_id', $subjects));
		$already = DB::table('course_subject')->where('course_id', $id)->lists('subject_id');
		
		$toadd = array_diff($subjects, $already);
		echo 'to add : ';
		print_r(array_unique($toadd));
		$torem = array_diff($already, $subjects);
		echo '<br/> to rem : ';
		print_r(array_unique($torem));
		
		if(count($toadd)>0) {
			Course::find($id)->subjects()->attach(array_unique($toadd));
		}
		if(count($torem)>0) {
			Course::find($id)->subjects()->detach(array_unique($torem));
		}
		// return redirect()->route('courses.show',$id)->with('success-message','Course updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Course::find($id)->delete();
	
		return Redirect::route('courses.index')->with('success-message', 'Course Deleted');
	}
	
	public function subjects($id)
	{
		return Course::find($id)->subjects;
	}

}
