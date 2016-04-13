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
                                                <th>Serial No.</th>
                                                <th>Application No.</th>
                                                <th>Status</th>
                                                <th>Type of Application </th>
                                                <th>Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
                                        foreach ($a as $b) {
                                            ?>
                                            <a href="{{ URL::route('vie',['id'=>$b->id]) }}">
                                           <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><a href="{{ URL::route('vie',['id'=>$b->id]) }}"><?php echo $b->id ?></a></td>
                                                <td><?php  
                                                if($b->status == 0) {echo '<p style="color:red">Rejected</p>'; } 
                                                elseif ($b->status == 5) {echo '<p style="color:green">Accepted ( <a href="/myapp/public/getpdf">Click to download </a> )</p>';}
                                                else {echo '<p style="color:blue">Pending</p>';}



                                                ?></td>
                                                <td>Birth Certificate</td>
                                                <td><?php echo $b->created_at ?></td>

                                            </tr>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                             
                                        
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                          
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
    

            <!-- Right side column. Contains the navbar and content of the page -->
        </div>

@endsection