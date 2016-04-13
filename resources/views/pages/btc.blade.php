<!DOCTYPE html>
<html>
@include('includes.head');
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        @include('includes.header');
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

                    <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                         SERVICES
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">SERVICES </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">--
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>TYPES OF SERVICES</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a style="font-size: 14px;" href="{{ URL::route('login') }}">LOGIN FOR G2C APPLICATION</a></td>
                                            </tr>
                                            <tr>
                                                  <td><a style="font-size: 14px;" title="સોલવન્સી સર્ટીફીકેટ મેળવવા બાબત" href="https://gandhinagar.gujarat.gov.in/showpage.aspx?contentid=237">સોલવન્સી સર્ટીફીકેટ મેળવવા બાબત</a>
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a style="font-size: 14px;" title="આવક અંગેનું પ્રમાણપત્ર મેળવવા બાબત" href="https://gandhinagar.gujarat.gov.in/showpage.aspx?contentid=239">આવક અંગેનું પ્રમાણપત્ર મેળવવા બાબત</a>
                                                </td>
                                             </tr>      
                                              <tr>
                                                <td>
                                                   <a style="font-size: 14px;" title="પછાત વગના ઉમેદવારોએ ર્નોન ક્રીમીલેયર પ્રમાણપત્ર મેળવવા અંગે અરજી" href="https://gandhinagar.gujarat.gov.in/showpage.aspx?contentid=390">પછાત વગના ઉમેદવારોએ ર્નોન ક્રીમીલેયર પ્રમાણપત્ર મેળવવા અંગે અરજી</a> 
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                    <a style="font-size: 14px;" title="ધાર્મિક અને ભાષાકીય લઘુમતી અંગેનું પ્રમાણપત્ર મેળવવા બાબત" href="https://gandhinagar.gujarat.gov.in/showpage.aspx?contentid=243">ધાર્મિક અને ભાષાકીય લઘુમતી અંગેનું પ્રમાણપત્ર મેળવવા બાબત</a>
                                                </td>
                                             </tr> 
                                             <tr>
                                                <td>
                                                    <a style="font-size: 14px;" title="સામાજીક અને શૈક્ષણિક રીતે પછાત વર્ગનું પ્રમાણપત્ર મેળવવા બાબત" href="https://gandhinagar.gujarat.gov.in/showpage.aspx?contentid=245">સામાજીક અને શૈક્ષણિક રીતે પછાત વર્ગનું પ્રમાણપત્ર મેળવવા બાબત</a>
                                                </td>
                                             </tr> 
                                            <tr>
                                                <td>
                                                  <a style="font-size: 14px;" title="PASSPORT" href="http://passportindia.gov.in/AppOnlineProject/welcomeLink">PASSPORT</a>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>
                                                  <a style="font-size: 14px;" title="MOBILE RECHARGE" href="https://paytm.com/mobile">MOBILE RECHARGE</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <a style="font-size: 14px;" title="INSURANCE PAYMENT" href="http://www.licindia.in/online_payment.htm">INSURANCE PAYMENT</a></td>
                                            </tr>
                                             <tr>
                                                <td><a style="font-size: 14px;" title="SMART ADHAR CARD" href="http://www.smartcardindia.in/">SMART ADHAR CARD</a></td>
                                            </tr>
                                             <tr>
                                                <td><a style="font-size: 14px;" title="DTH RECHARGE" href="https://paytm.com/dth">DTH RECHARGE</a></td>
                                            </tr>
                                            <tr>
                                                <td><a style="font-size: 14px;" title="DIGITAL LOCKER" href="https://digitallocker.gov.in/">DIGITAL LOCKER</a></td>
                                            </tr>
                                            <tr>
                                                <td><a style="font-size: 14px;" title="PANCARD APPLICATION" href="https://tin.tin.nsdl.com/pan/">PANCARD APPLICATION</a></td>
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

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>        

    </body>
</html>