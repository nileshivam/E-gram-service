<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{!! URL::asset('images/avatar.png') !!}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                        <?php
                        $b=Auth::user()->username;
                        ?>
                            <p>Hello, <?php echo $b ?></p>

                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                        <?php
                        if(!Auth::check())
                        {
                            ?>
                            <a href="#">
                                <i class="fa fa-table"></i> <span>List of Application</span>
                            </a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="{{ URL::route('logout') }}">
                                    <i class="fa fa-table"></i> <span>Log out</span>
                            </a>
                            <?php
                            if(Auth::user()->did==1)
                            {
                                ?>
                                <a href="{{ URL::route('index') }}">
                                    <i class="fa fa-table"></i> <span>List of Application</span>
                                </a>
                                <a href="{{ URL::route('list') }}">
                                    <i class="fa fa-calendar"></i> <span>Track Application</span>
                                    <small class="badge pull-right bg-red">3</small>
                                </a>
                                <?php
                            }
                            else
                            {
                                 ?>
                                <a href="{{ URL::route('index') }}">
                                    <i class="fa fa-table"></i> <span>List of Application</span>
                                </a>
                                <?php
                            }

                        }
                        ?>
                         <a href="{{ URL::route('btc') }}">
                                <i class="fa fa-table"></i> <span>For B2C</span>
                            </a>
                        </li>
                        <li>
                            
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
</aside>
