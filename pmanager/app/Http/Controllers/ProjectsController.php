<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
              $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('projects.index', ['projects'=> $projects]);
        }
        return view('auth.login');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {

        $companies = null;
       if(!$company_id){
        $companies = Company::where('user_id', Auth::user()->id)->get();
       }
        return view('projects.create', ['company_id'=>$company_id, 'companies'=>$companies]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(Auth::check()){
            $project = Project::create([
                'p_name' => $request->input('p_name'),
                'p_description' => $request->input('p_description'),
                'company_id' => $request->input('company_id'),
                'days' => $request->input('days'),
                'user_id' => Auth::user()->id
            ]);
            if($project){
                return redirect()->route('projects.show', ['project'=> $project->id])
                ->with('success' , 'Project created successfully');
            }
        }
        
            return back()->withInput()->with('errors', 'Error creating new project');
        }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$project = Project::where('id', $project->id)->first();
        $project = Project::find($project->id);
        $comments = $project->comments;

        return view('projects.show', ['project'=> $project, 'comment'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
      $project = Project::find($project->id);


        return view('projects.edit', ['project'=> $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //update data

        $companyUpdate = Project::where('id', $project->id)->update([
            'p_name'=>$request->input('p_name'),
            'p_description'=>$request->input('p_description')

        ]);

        if($companyUpdate){
            return redirect()->route('projects.show', ['project'=> $project->id])->with('success', 'Project Information Updated Successfully.');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // dd($project);

         $findProject = Project::find( $project->id);
        if($findProject->delete()){
            
            //redirect
            return redirect()->route('projects.index')
            ->with('success' , 'Project deleted successfully');
        }
        return back()->withInput()->with('error' , 'Project could not be deleted');
    }
}
