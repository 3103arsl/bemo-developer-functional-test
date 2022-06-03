<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Board</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: WorkSans;
            src: url("https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/Work_Sans/WorkSans-Regular.ttf");
        }
        @font-face {
            font-family: Poppins;
            src: url("https://s3.amazonaws.com/codecademy-content/courses/learn-css-grid/project-ii/Resources/Poppins/Poppins-Regular.ttf");
        }

        html {
            height: 100%;
        }
        body {
            height: 100%;
            margin: 0;
            background-image: linear-gradient(359deg, #3023ae, #eb7f7b);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .navbar {
            display: grid;
            grid-template-columns: 10px 1fr 3fr 1fr;
            position: absolute;
            width: 100%;
            height: 60px;
            background-color: rgba(120,70,154, 0.2);
            text-align: center;
            top: 0;
            left: 0;
            justify-content: space-around;
        }

        .navbar h1 {
            font-family: Poppins;
            color: #ffffff;
            margin: 0;
            align-self: center;
        }

        .container {
            /* width: 1000px;
             display: grid;
             grid-template-columns: repeat(3, 1fr);
             grid-column-gap: 20px;*/

            max-width: 1350px;
            display: flex;
            /* flex-wrap: wrap; */
            margin: 0 auto;
            width: 100%;
            overflow-x: scroll;
        }

        .search-bar {
            display: inline-block;
            width: 23%;
            height: 40px;
            background-color: rgba(255,255,255, 0.35);
            left: 50px;
            top: 8px;
            position: absolute;
        }

        input, textarea {
            display: inline-block;
            border: none;
            background: transparent;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ddd;
            height: 35px;
            padding: 10px;
        }
        button {
            cursor: pointer;
            margin-right: 10px;
        }
        .search-bar input {
            float: left;
            height: 18px;
            margin-top: 9px;
            margin-left: 7px;
        }

        .card-column input {
            height: 18px;
            margin-left: 15px;

        }

        .search-icon {
            float: left;
            margin-top: 9px;
            margin-left: 7px;
        }

        .card-column {
            background-color: #ffffff;
            min-height: 700px;
            margin-left: 15px;
            margin-bottom: 15px;
            width: calc(25% - 30px);
            min-width: 20%;
        }

        .card-column h2 {
            padding: 0;
            margin: 0 auto;
            font-family: WorkSans;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.2px;
            text-align: left;
            color: #2f2f2f;
            display: inline-block;
        }

        .taskgroup-heading {
            margin-left: 15px;
            margin-top: 7px;
            margin-bottom: 20px;
        }

        .site-body {
            /*position: absolute;
            top: 100px;
            margin-left: 50px;*/
            max-width: 1350px;
            margin: 10px auto;
        }
        .creat-col-btn {
            cursor: pointer;
            margin-left: 15px;
            margin-bottom: 10px;
        }
        .txt-area{
            height: 100px;
        }
    </style>



</head>
<body class="antialiased">
<div id="app">
<!--    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">-->
        <task-board/>
<!--    </div>-->
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
