<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\tasks;
use Illuminate\Http\Request;



class tasksController extends Controller
{
    public function store(project $project)
    {
        $data = request()->validate([
            'body' => 'required'
        ]);

        $data['project_id'] = $project->id;

        tasks::create($data);

        return back();
    }

    public function update(project $project , tasks $tasks)
    {
        $tasks->update([
            'done' => request()->has('done')
        ]);

        return back();
    }

    public function destroy(project $project ,tasks $tasks)
    {
        $tasks->delete();

        return redirect('/project/' . $project->id);
    }

}
