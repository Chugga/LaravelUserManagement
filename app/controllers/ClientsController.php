<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of clients
	 *
	 * @return Response
	 */
	public function index()
	{
        Assets::add('theme');
		$clients = Client::all();

        return View::make('clients.index')
            ->with('clients', $clients);
	}

	/**
	 * Show the form for creating a new client
	 *
	 * @return Response
	 */
	public function create()
	{
        Assets::add('theme');
		return View::make('clients.create');
	}

	/**
	 * Store a newly created client in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $emails = $data['email'];
        unset($data['email']);

		$client = Client::create($data);

        foreach($emails as $email) {
            if(!empty($email)) {
                ClientEmailAddress::create(['client_id' => $client->id, 'email' => $email]);
            }
        }

		return Redirect::route('clients.index');
	}

	/**
	 * Display the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        Assets::add('theme');
		$client = Client::findOrFail($id);


		return View::make('clients.show')
                ->with('client', $client);
	}

	/**
	 * Show the form for editing the specified client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Assets::add('theme');
		$client = Client::find($id);
        $emails = ClientEmailAddress::where('client_id', '=', $id)->get();

		return View::make('clients.edit')
                ->with('client', $client)
                ->with('emails', $emails);
	}

	/**
	 * Update the specified client in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = Client::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Client::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $emails = $data['email'];
        unset($data['email']);
        ClientEmailAddress::where('client_id', '=', $id)->delete();

		$client->update($data);

        foreach($emails as $email) {
            if(!empty($email)) {
                ClientEmailAddress::create(['client_id' => $id, 'email' => $email]);
            }
        }

		return Redirect::route('clients.index');
	}

	/**
	 * Remove the specified client from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Client::destroy($id);

		return Redirect::route('clients.index');
	}

}
