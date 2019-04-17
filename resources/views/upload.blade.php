<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 17/04/2019
 * Time: 1:24 AM
 */
?>

<html>
    <head>
        <title>
            File Upload
        </title>
    </head>
    <body>
        Upload file here
        @include('flash::message')
        <form action="{{ route('upload.store') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <input type="file" name="file_upload">
            <input type="submit" value="submit">
        </form>
    </body>
</html>
