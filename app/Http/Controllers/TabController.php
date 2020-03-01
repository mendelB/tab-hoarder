<?php

namespace App\Http\Controllers;

use App\Tab;
use Illuminate\Http\Request;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = Tab::all();

        return response()->view('tabs.index', [
        	'tabs' => $tabs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'url' => 'required|url',
        ]);

        $url = $request->query('url');

        $title;
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);

        if ($dom->loadHTMLFile($url)) {
    			$list = $dom->getElementsByTagName("title");
    			
    			if ($list->length > 0) {
        		$title = $list->item(0)->textContent;
    			}
				}

				$tab = new Tab;
				$tab->url = $url;
				$tab->title = $title;
				$tab->save();

				return redirect('/tabs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function show(Tab $tab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function edit(Tab $tab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tab $tab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tab  $tab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tab $tab)
    {
        //
    }
}
