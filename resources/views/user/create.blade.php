<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dev-folio Form</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="A survey form used by a hotel to get the satisfaction level of visitors">

    <meta name="author" content="Edward Mc Evoy 2019">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
       crossorigin="anonymous">
    <style>
        .container {
            margin-bottom: 5%;
        }

        #form-header {
            margin-top: 5%;
            text-align: center;
        }

        #form-tagline {
            background: #ff6d00;
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            color: #ffffff;
            margin-top: 5%;
            padding: 4%;
            text-align: left;
        }

        #form-tagline .fa {
            margin-bottom: 15%;
        }

        #form-tagline h2 {
            margin-bottom: 15%;
        }

        #form-content {
            background: #f4f4f4;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            margin-top: 5%;
            padding: 3%;
        }

        .form-group {
            margin-top: 5%;
        }

        .contact {
            padding: 4%;
            height: 400px;
        }

        .control-label {
            font-size: 16px;
            font-weight: 600;
        }

        div .submit-button {
            margin-top: 3%;
            text-align: right;
        }

        button#submit {
            white-space: normal;
            width: auto;
            background: #ff6d00;
            color: #ffffff;
            font-weight: 600;
            width: 25%;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- open container -->
        <div class="row">
            <!--  open row -->
            <div id="form-header" class="col-12">
                <h1 id="title">Hotel Survey Form</h1>
            </div>
        </div> <!--  close row -->
        <div class="row">
            <!--  open row -->
            <div id="form-tagline" class="col-md-4">
                <div class="form-tagline">
                    <i class="fa fa-envelope fa-5x"></i>
                    <h2>How Are We Doing?</h2>
                    <p id="description" class="lead">We really value your opinion</p>
                </div>
            </div>
            <div id="form-content" class="col-md-8">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- open form -->
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label id="name-label" class="control-label" for="name">*Name:</label>
                        </div>

                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-name"><i class="fa fa-user"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control"
                                placeholder="Please Enter Your Name" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label id="email-label" class="control-label" for="email">*Email:</label>
                        </div>

                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-mail"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label id="number-label" class="control-label" for="email">Image:</label>
                        </div>
                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-room"><i
                                        class="fa fa-door-open"></i></span>
                            </div>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label id="number-label" class="control-label" >*{{ __('Password') }}:</label>
                        </div>
                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-room"><i
                                        class="fa fas fa-user-secret"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
                                <span class="error error_password"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label id="number-label" class="control-label" >*{{ __('Confirm Password') }}:</label>
                        </div>
                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-room"><i
                                        class="fa fas fa-user-secret"></i></span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 submit-button">
                            <button type="submit" id="submit" class="btn btn-default" aria-pressed="true">Submit Form</button>
                        </div>
                    </div>
                </form> <!-- close form -->
            </div> <!-- close form content div -->
        </div> <!-- close row -->
    </div><!--  close container -->
</body>

</html>
