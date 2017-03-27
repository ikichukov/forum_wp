<!DOCTYPE html>
<html><head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>The Forum</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('sidebar/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('sidebar/dashboard.css')}}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://getbootstrap.com/examples/dashboard/#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="">Edit your details</a></li>
                <li><a href="">Edit avatar</a></li>
                <li><a href="">Edit signature</a></li>
                <li><a href="">Edit e-mail & password</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">List messages</a></li>
                <li><a href="">Send new message</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="page-header">Edit your details</h2>
            <div class="row">
                <form>
                <div class="col-sm-6">
                        <div class="form-group">
                            <label>Home page URL</label>
                            <input type="text" placeholder="http://www.example.com" class="form-control"/> <br/>
                        </div>
                        <div class="form-group">
                            <label>Social media and WWW</label>
                            <div class="row">
                                <div class="col-sm-1 text-right">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-sm-11">
                                    <input type="text" placeholder="Facebook" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 text-right">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-sm-11">
                                    <input type="text" placeholder="Skype" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 text-right">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-sm-11">
                                    <input type="text" placeholder="Spotify" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 text-right">
                                    <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <div class="col-sm-11">
                                    <input type="text" placeholder="LinkedIn" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Your job</label>
                            <input type="text" class="form-control"/> <br/>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control"/> <br/>
                        </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Your hobbies and interests</label>
                        <textarea class="form-control" rows="8" style="overflow-y: scroll;">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>About yourself</label>
                        <textarea class="form-control" rows="8" style="overflow-y: scroll;">

                        </textarea>
                    </div>
                </div>
                </form>
                <button class="btn btn-success form-control" type="submit">Edit info</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('sidebar/jquery.min.js')}}"></script>
<script src="{{asset('sidebar/bootstrap.min.js')}}"></script>

</body></html>