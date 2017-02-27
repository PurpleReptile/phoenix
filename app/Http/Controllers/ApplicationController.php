<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Application;
use Illuminate\Http\Request;
use Session;

class ApplicationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$applications = Application::orderBy('id', 'desc')->paginate(10);
		return view('applications.index')->withApplications($applications);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('applications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// validate the data
		$this->validate($request, array(
			'name' => 'required|max:300',
			'theme' => 'required|max:500',
			'author_post' => 'required|max:300',
			'author_application' => 'required|max:300',
			'image' => 'required',
			'description' => 'required',
			'link' => 'required|max:700',
			'view_link' => 'required|max:700',
		));

		// store in the database
		$application = new Application;

		$application->name = $request->name;
		$application->theme = $request->theme;
		$application->author_post = $request->author_post;
		$application->author_application = $request->author_application;
		$application->image = $request->image;
		$application->description = $request->description;
		$application->link = $request->link;
		$application->view_link = $request->view_link;

		$application->save();

		Session::flash('success', 'Новое приложение было успешно сохранено!');

		return redirect()->route('applications.show', $application->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$application = Application::find($id);
		return view('applications.show')->withApplication($application);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		// find the post in the database and save as a var
		$application = Application::find($id);

		// return the view and pass in the var we previously created
		return view('applications.edit')->withApplication($application);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// Validate the data
		$this->validate($request, array(
			'name' => 'required|max:300',
			'theme' => 'required|max:500',
			'author_post' => 'required|max:300',
			'author_application' => 'required|max:300',
			'image' => 'required',
			'description' => 'required',
			'link' => 'required|max:700',
			'view_link' => 'required|max:700',
		));

		// Save the data to the database
		$application = Application::find($id);

		$application->name = $request->name;
		$application->theme = $request->theme;
		$application->author_post = $request->author_post;
		$application->author_application = $request->author_application;
		$application->image = $request->image;
		$application->description = $request->description;
		$application->link = $request->link;
		$application->view_link = $request->view_link;

		$application->save();

		// set flash data with success message
		Session::flash('success', 'Это приложение было успешно сохранено.');

		// redirect with flash data to applications.show
		return redirect()->route('applications.show', $application->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$application = Application::find($id);

		$application->delete();

		Session::flash('success', 'Приложение №' . $application->id . ' было успешно удалёно.');
		return redirect()->route('applications.index');
	}

}
