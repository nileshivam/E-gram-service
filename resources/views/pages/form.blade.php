@extends('layout')


@section('content')
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Birth Certificate 
                        <small>Form</small>
                    </h1>
                     </section>

                <?php
                if($msg==1)
                {
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:green;font-size:20px;">Your Form is accepted and Application ID: <?php echo $id ?></span>
                    <?php
                }
                ?>
                <!-- Main content -->
                <form method="post" action="{{ URL::route('pform') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <section class="content">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="box box-danger">
                                    <div class="margin">
                                        <div class="btn-group">
                                        
                                            <button type="button" class="btn btn-default">District</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Ahmedabad</a></li>
                                                <li><a href="#">Amreli</a></li>
                                                <li><a href="#">Surat</a></li>
                                            </ul>
                                        </div>
                                         <div class="btn-group">
                                        
                                            <button type="button" class="btn btn-default">Taluka</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Ahmedabad</a></li>
                                                <li><a href="#">Amreli</a></li>
                                                <li><a href="#">Surat</a></li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                        
                                            <button type="button" class="btn btn-default">Panchayat</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Ahmedabad</a></li>
                                                <li><a href="#">Amreli</a></li>
                                                <li><a href="#">Surat</a></li>
                                            </ul>
                                        </div>
                                         <div class="btn-group">
                                        
                                            <button type="button" class="btn btn-default">Village</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Ahmedabad</a></li>
                                                <li><a href="#">Amreli</a></li>
                                                <li><a href="#">Surat</a></li>
                                            </ul>
                                        </div>
                                       
                                       
                                        </div>
                      
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-xs-6">
                                       <label>Name of Child:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nm" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="btn-group">
                                                <div>
                                            <label>Gender:</label>
                                        </div>
                                            <button type="button" class="btn btn-default">Select</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Male</a></li>
                                                <li><a href="#">Female</a></li>
                                              
                                            </ul>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Date of Birth:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="dob" />
                                                    </div><!-- /.input group -->
                                            </div>
                                    
                                             <div class="col-xs-6">
                                                <label>Place of Birth:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="place" />
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Father's Name:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="fn" />
                                                    </div><!-- /.input group -->
                                            </div>
                                    
                                             <div class="col-xs-6">
                                                <label>Mother's Name:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"  name="mn" />
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Nationality:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="nation" />
                                                    </div><!-- /.input group -->
                                            </div>
                                    
                                             <div class="col-xs-6">
                                                <label>Religion:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="relig" />
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Doctor's Name:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="dname" />
                                                    </div><!-- /.input group -->
                                            </div>
                                    
                                             <div class="col-xs-6">
                                                <label>Doctor's Contact No:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"  name="dphone"/>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Type of Delivery:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" />
                                                    </div><!-- /.input group -->
                                            </div>
                                    
                                             <div class="col-xs-6">
                                                <label>Birth Treatment:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Contact No.:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="phone" />
                                                    </div><!-- /.input group -->
                                            </div>
                                    
                                             <div class="col-xs-6">
                                                <label>Address Line 1:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="addre" />
                                                    </div>
                                            </div>

                                            <div class="col-xs-6">
                                                <label>Id Proof:</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="pro" />
                                                    </div>
                                            </div>

                                            <div class="col-xs-6">
                                                <label>title of proof</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="doctype" />
                                                    </div>
                                            </div>

                                    </div>
                                    <div class="form-group">
                                    <br>
                                    <div>
                                    <button class="btn btn-primary">Submit</button>
                                    </div>
                                    
                                    

                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

            
                        </div><!-- /.col (left) -->
                    </div><!-- /.row -->                    

                </section><!-- /.content -->
                </form>
            </aside><!-- /.right-side -->
        


        <!-- jQuery 2.0.2 -->
        

        <!-- Page script -->
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>

@endsection