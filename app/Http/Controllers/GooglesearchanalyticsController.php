<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Googlesearchconsole, Googleanalytics};

class GooglesearchanalyticsController extends Controller
{


    public function editsearchconsole(){

        $googlesearchconsole = Googlesearchconsole::get()->first();
        if($googlesearchconsole !== null){
            return view('seo.searchconsole', compact('googlesearchconsole'));
        }
        else{
            return view('seo.searchconsole');
        }
        
    }

    public function searchconsolestore(Request $request){

        $googlesearchconsole = Googlesearchconsole::get()->first();

        if($googlesearchconsole !== null){

            $googlesearchconsole->name = $request->name;
            $googlesearchconsole->save();
            return redirect()->back()->with('success', 'Script updated successfully');

        }
        else{

            $googlesearchconsole = new Googlesearchconsole();
            $googlesearchconsole->name = $request->name;
            $googlesearchconsole->save();
            return redirect()->back()->with('success', 'Script added successfully');

        }

        

    }


    public function editanalytics(){

        $analytics = Googleanalytics::get()->first();
        if($analytics !== null){
            return view('seo.analytics', compact('analytics'));
        }
        else{
            return view('seo.analytics');
        }
        
    }


    public function analyticstore(Request $request){

        $analytics = Googleanalytics::get()->first();

        if($analytics !== null){

            $analytics->name = $request->name;
            $analytics->save();
            return redirect()->back()->with('success', 'Script updated successfully');

        }
        else{

            $analytics = new Googleanalytics();
            $analytics->name = $request->name;
            $analytics->save();
            return redirect()->back()->with('success', 'Script added successfully');

        }

        

    }
}
