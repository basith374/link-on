<?php namespace App\Http\Controllers;

use Lava;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		return view('admin.dashboard');
	}
	
	public function users()
	{
		$users = User::all();
		return view('admin.users', compact('users'));
	}
	
	public function stats()
	{
		return view('admin.stats');
	}
	
	public function console()
	{
		return view('admin.console');
	}
	
	public function services()
	{
		return view('admin.services');
	}
	
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
