 <?php 


if(isset($_SESSION['user_name'])){
    $user_name=$_SESSION['user_name'];
}

$file='';
$file=basename($_SERVER['REQUEST_URI'],'php');


 
 ?>
 
 
 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Home Page</a></li>
               
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_name;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="./includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class=<?php  if($file==='index.'){echo "active";}   ?>>
                        <a href="./index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    <li class=<?php  if($file==='post.php?source=view' || $file==='post.php?source=add'){echo "active";}   ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Post <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li >
                                <a href="./post.php?source=view">View All Posts</a>
                            </li>
                            <li>
                                <a href="./post.php?source=add">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li class='<?php  if($file==='categories.'){echo "active";}   ?>'>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>
                    
                    
                    
                   
                    <li class=<?php  if($file==='comment.php?source=view'){echo "active";}   ?>>
                        <a href="./comment.php?source=view"><i class="fa fa-fw fa-file"></i> Comment</a>
                    </li>

                     <li class=<?php  if($file==='user.php?source=view' || $file==='user.php?source=add_user'){echo "active";}   ?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="./user.php?source=view">View All Users</a>
                            </li>
                            <li>
                                <a href="./user.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>



                    <li class=<?php  if($file==='profile.'){echo "active";}   ?>>
                        <a href="./profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
                $('.admin-nav').click(function(){
                console.log("Admin Nav is clicked")
                $(this).addClass('active')
                const classes= $(this).attr('class');
                console.log('Class is '+classes)
                });
        </script>