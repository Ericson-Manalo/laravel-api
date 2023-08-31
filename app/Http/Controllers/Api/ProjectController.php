<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function index(){

    $projects = Project::with('type', 'technologies')->paginate(50);

        return response()->json(
        [
            'success' => true,
            'results' => $projects,
        ]);
    }


    // public function show(Project $project){

    // $project = Project::all();

    //     return response()->json([
    //         'success' => true,
    //         'results' => $project,
    //     ]);
    // }

    public function show($id){
        $project = Project::with('type', 'technologies')->findOrFail($id);

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
