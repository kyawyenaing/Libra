@extends('layouts.admin')
@section('content')
    <div class="container">
        <!-- <div class="col-sm-offset-2 col-sm-8"> -->
        <div class="col-md-10 col-md-offset-1 col-md-outset-1">
            <!-- Books -->
            @if ( Auth::user()->is_admin )
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	Books
                    </div>
                    <div class="panel-body">
	                    <div>
                        	<a href="{{ url('admin/books/create') }}" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus"></i>Add New Book
                            </a>
                        </div>

                        <table class="table table-striped book-table">
                            <thead>
                                <th>Book</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Quantity</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
	        @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	My Borrowed Books
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped book-table">
                            <thead>
                                <th>Book</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Borrowed Date</th>
                                <th>Expiry Date</th>
                                <th>Penalty</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
	        @endif
        </div>
    </div>
@endsection
