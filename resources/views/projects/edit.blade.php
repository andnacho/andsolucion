@extends('layouts.app')

@section('content')


<div class="w-full max-w-sm justify-center mx-auto mt-6">
  
  
  <h1 class="mb-4">Edit your project</h1>
  
  <form 
      action="{{ $project->path() }}"
      method="POST"
      class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

      @method('PATCH')

      @include('projects.form',[
        'buttonText' => 'Update Project'
         ])
    
  </form>
  <p class="text-center text-grey text-xs">
    ©2019 Andsolucion
  </p>
    </div>
    

  @endsection