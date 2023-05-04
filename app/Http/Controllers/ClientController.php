<?php

namespace App\Http\Controllers;

use Gate;
use function view;
use App\Models\Quiz;
use App\Models\Client;
use function abort_if;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('client.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('client.create');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('client.edit', compact('client'));
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('client.show', compact('client'));
    }
}
