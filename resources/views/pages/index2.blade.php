@extends('layout')


@section('content')

    <div class="wrapper row-offcanvas row-offcanvas-left">

                    <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        List of Applications
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">List of Applications</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type of Application</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="{{ URL::route('form') }}">Birth Certificate</a></td>
                                            </tr>
                                             <tr>
                                                <td>Income Certificate</td>
                                            </tr>
                                            <tr>
                                                <td>Cast Certificate</td>
                                            </tr>
                                        
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                          
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
    

            <!-- Right side column. Contains the navbar and content of the page -->
        </div><!-- ./wrapper -->

@endsection