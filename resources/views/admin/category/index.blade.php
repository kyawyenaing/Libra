@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- categories -->
            @if ( Auth::user()->is_admin )	        	
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                    	Categories
	                    </div>
	                    <div class="panel-body">
		                    <div>
	                        	<a href="{{ url('admin/categories/create') }}" class="btn btn-primary">
	                                <i class="fa fa-btn fa-plus"></i>Add New category
	                            </a>
	                        </div>
	                        @if (count($categories) > 0)
	                        <table class="table table-striped category-table">
	                            <thead>
	                                <th>Name</th>
	                                <th>Description</th>
	                                <th colspan="2" class="text-center">Options</th>
	                            </thead>
	                            <tbody>	                            
	                                @foreach ($categories as $category)
	                                    <tr>
	                                        <td class="table-text"><div>{{ $category->name }}</div></td>
	                                        <td class="table-text"><div>{{ $category->desc }}</div></td>

	                                        <!-- category Edit Button -->
	                                        <td>
	                                            <form action="{{url('admin/categories/' . $category->id . '/edit')}}" method="GET">
	                                                <button type="submit" id="edit-category-{{ $category->id }}" class="btn btn-primary">
	                                                    <i class="fa fa-btn fa-pencil"></i>Edit
	                                                </button>
	                                            </form>
	                                        </td>

	                                        <!-- category Delete Button -->
	                                        <td>
	                                            <form action="{{url('admin/categories/' . $category->id)}}" method="POST">
	                                                {{ csrf_field() }}
	                                                {{ method_field('DELETE') }}

	                                                <button type="submit" id="delete-category-{{ $category->id }}" class="btn btn-danger">
	                                                    <i class="fa fa-btn fa-trash"></i>Delete
	                                                </button>
	                                            </form>
	                                        </td>
	                                    </tr>
	                                @endforeach	                                
	                            </tbody>
	                        </table>
	                        @endif
	                    </div>
	                </div>	            
	        @endif
        </div>
    </div>
@endsection
