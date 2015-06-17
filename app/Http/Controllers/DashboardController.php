<?php namespace App\Http\Controllers;

use App\Role;
use Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Online;
use Illuminate\Support\Facades\DB;
use Lava;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	protected $_partials = array('dashboard', 'stats', 'users', 'console', 'services', 'routes', 'sessions', 'roles');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth',['except'=>['getLogin','postLogin']]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $email = Input::get('email');
        $user = user::where('email', $email)->first();
        Auth::login($user);
        return redirect()->route('home');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function dashboard(Request $request)
	{
		$showpage = 'dashboard';
//		if($request->ajax()) {
//			return view('admin.dashboard.dashboard');
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => $showpage]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function users(Request $request)
	{
		$showpage = 'users';
		$users = User::with('sessions')->withTrashed()->get();
//		if($request->ajax()) {
//			return view('admin.dashboard.users', compact('users'));
//		}
		return view('admin.dashboard', ['users' => $users, 'pages' => $this->_partials, 'showpage' => $showpage]);
	}

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
//    public function showuser($id)
//    {
//        $user = User::find($id);
//        return view('admin.user.show', compact('user'));
//    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|string
     */
	public function destroyuser(Request $request, $id)
	{
		// User::find($id)->delete();
		if($request->ajax()) {
			return $id . ' deleted ok';
		}
		return redirect()->back()->with('success-message', 'Successfully deleted.');
	}

    /**
     * @param Request $request
     * @param $id
     * @return string
     */
	public function updateuser(Request $request, $id)
	{
		// $this->validate($request, $this->rules);
		$registrar = new \App\Services\Registrar;
		$validator = $registrar->validator($request->all());
		if($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		$roles = $request->get('roles');
		
		$already = DB::table('user_role')->where('user_id', $id)->lists('role_id');
		
		$toadd = array_diff($roles, $already); // delete the second array from the first array
		$torem = array_diff($already, $roles);
		
		// if(count($toadd)>0) {
			// User::find($id)->roles()->attach(array_unique($toadd));
		// }
		// if(count($torem)>0) {
			// User::find($id)->roles()->detach(array_unique($torem));
		// }
		return 'ok';
		// return redirect()->route('courses.show',$id)->with('success-message','Course updated');
	}

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
	public function userdetails($id) {
		// $data = User::find($id);
		 $data = User::with('roles')->where('id',$id)->first();
		
		return response()->json($data);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function stats(Request $request)
	{
		$showpage = 'stats';
		$online = Online::registered()->count();
		$active = User::all()->count();
//		if($request->ajax()) {
//			return view('admin.dashboard.stats', ['online' => $online, 'active' => $active]);
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => $showpage, 'online' => $online, 'active' => $active]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function console(Request $request)
	{
		$showpage = 'console';
//		if($request->ajax()) {
//			return view('admin.dashboard.console');
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => $showpage]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function services(Request $request)
	{
		$showpage = 'services';
//		if($request->ajax()) {
//			return view('admin.dashboard.services');
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => $showpage]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function routes(Request $request)
	{
		$showpage = 'routes';
		$routes = Route::getRoutes();
//		if($request->ajax()) {
//			return view('admin.dashboard.routes', compact('routes'));
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => $showpage, 'routes' => $routes]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function sessions(Request $request)
	{
		$showpage = __FUNCTION__;
		$sessions = Online::all();
		// print_r(Online::all()->first()->user()->id);
//		if($request->ajax()) {
//			return view('admin.dashboard.sessions', compact('sessions'));
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => $showpage, 'sessions' => $sessions]);
	}

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function roles(Request $request)
	{
        $roles = Role::all();
//		if($request->ajax()) {
//			return view('admin.dashboard.' . __FUNCTION__ , compact('roles'));
//		}
		return view('admin.dashboard', ['pages' => $this->_partials, 'showpage' => __FUNCTION__, 'roles' => $roles]);
	}

    public function profile($id)
    {
        $user = User::find($id);
        return view('admin.profile', compact('user'));
    }

    public function appRoutes()
    {
        $routes = Route::getRoutes();
//        print_r((array)$routes);

        $new = array();

        foreach ($routes as $key => $value) {
            $new[$key] = $value->getName();
        }

        $_routes = (array)$routes;

        return response()->json($new);
//        return response()->json(array($routes));
//        return response()->json($_routes);

//        return 'ok';
    }

    /**
     * @return \Illuminate\View\View
     */
	public function runonce()
	{
		$stocksTable = Lava::DataTable();

		$stocksTable->addDateColumn('Day of Month')
					->addNumberColumn('Projected')
					->addNumberColumn('Official');

		// Random Data For Example
		for ($a = 1; $a < 30; $a++)
		{
			$rowData = array(
			  "2014-8-$a", rand(800,1000), rand(800,1000)
			);

			$stocksTable->addRow($rowData);
		}
		
		// print_r($stocksTable);
		
		$chart = Lava::LineChart('myFancyChart');
		$chart->datatable($stocksTable);
		// echo Lava::render('LineChart', 'myFancyChart', 'myStocks', array('height' => 500, 'width' => 500));
		// echo $chart->render('myStocks');
		return view('admin.test.charts', compact('chart'));
	}
	
}
