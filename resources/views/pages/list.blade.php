@extends('layout')


@section('content')

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
             <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Application
                        <small>#007612</small>
                    </h1>
                   
                </section>

               
                <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Application Type
                                <small class="pull-right"><?php echo $a->created_at ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            
                          
                                <strong>Personal Details</strong><br><br>
                                Name of Child: <?php echo $a->name ?><br>
                                Father's Name: <?php echo $a->fn ?><br>
                                Mother's Name: <?php echo $a->mn ?><br>
                                Date of Birth: <?php echo $a->dob ?><br>
                                Gender: Male<br>
                               
                            
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                           
                                <strong>Hospital Details</strong><br><br>
                                Name of Doctor: <?php echo $a->dname ?><br>
                                Name of Hospital: Sanjeevni Hospital<br>
                                Type of Birth: Normal<br>
                                Phone:  <?php echo $a->dphone ?><br/>
                          
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                                <b>Others</b><br><br>
                                Religion: <?php echo $a->Religion ?><br>
                                Nationality:    <?php echo $a->nationality ?><br>
                                Phone: <?php echo $a->phone ?><br/>  
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Document Type</th>
                                        <th>Description</th>
                                        
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $a->doctype ?></td>
                                        <td><a target="_blank" href="{{ URL::route('getdoc',['id'=>$a->id]) }}"><button class="btn btn-primary">View</button></a></td>
                                        
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"  action="{{{ URL::route('reg',['it'=>$a['id']]) }}}" />
                    <!--div id="df" style=" visibility: hidden;">

                        <textarea cols="150"> </textarea>
                    </div-->
                    <br /><br /><br />
                    <!-- this row will not appear when printing -->
                    <?php
                    if($pa==0)
                    {
                        ?>
                    <div class="row no-print">
                        <div class="col-xs-12">
                      
                            <a href="{{{ URL::route('acc',['it'=>$a['id']]) }}}"><button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Accept</button>  </a>
                            <a href="{{{ URL::route('reg',['it'=>$a['id']]) }}}"><button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="myfun()"><i class="fa fa-download"></i> Reject</button></a>
                        </div>
                    </div>
                    <?php
                }
                    ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
  
         </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <script type="text/javascript">
            function myfun()
            {
               document.getElementById("df").style.visibility = "visible";
               //alert("hgtrfd");
            }
        </script>
@endsection
        