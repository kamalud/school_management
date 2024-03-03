@extends('layouts.app')
@section('content')

  <section class="content mt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 m-auto">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admin List Table</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Admin Type</th>
                    <th style="width:192px">Button</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->user_type }}</td>
                        <td>
                            <a href="" class="btn btn-primary" style="width: 80px">Edit</a>
                            <a href="" class="btn btn-danger" class="btn btn-primary" style="width: 80px">Delete</a>
                        </td>
                      </tr>             
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->

        <!-- /.col -->
      </div>

      <!-- /.row -->

      <!-- /.row -->

  
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection