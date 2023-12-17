<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>ADMIN PANNEL</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            margin: 0;
            min-height: 100vh;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
            background-color: #f4f4f4;
        }

        a {
            color: #34495e;
            text-decoration: none;

        }

        .logo {
            margin: 0;
            font-size: 1.45em;
        }

        .logo a,
        .main-nav a {
            padding: 10px 15px;
            text-transform: uppercase;
            text-align: center;
            display: block;
            width: max-content;
        }

        .main-nav a {
            color: #34495e;
            font-size: .99em;
        }

        .main-nav a:hover {
            color: #718daa;
        }

        .header {
            height: 3em;
            ;
            padding-top: 2em;
            padding-bottom: 2em;
            background-color: #f4f4f4;
            -webkit-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        * {
            margin: 0px;
            padding: 0px;
            font-family: Avenir, sans-serif;
        }

        nav {
            width: 100%;
            margin: 0 auto;
            background-color: white;
            position: sticky;
            top: 0px;
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            float: left;
            text-align: center;
            position: relative;
        }

        nav ul::after {
            content: "";
            display: table;
            clear: both;
        }

        nav a {
            display: block;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            padding: 10px 0px;
            background-color: #f4f4f4;
            width: 10em;
            text-align: center;
        }

        nav a:hover {
            border-bottom: 2px solid #c8c8c81a;
            cursor: pointer;
            background-color: #34495e;
            color: white;
            font-weight: bold;
        }

        .under {
            display: none;
            box-shadow: 0px 1px 2px #CCC;
            background-color: white;
            position: absolute;
            width: 100%;
            z-index: 1000;
        }

        nav>ul li:hover .under {
            display: block;
        }

        .under li {
            float: none;
            width: 100%;
            text-align: left;
        }

        .list>a::after {
            content: " ▼";
            font-size: 12px;
            background-color: #c8c8c81a;

        }

        .conteneur {
            margin: 50px 20px;
            height: 1500px;
        }

        .button {
            color: #CCC;
            background-color: #34495e;
            border-radius: 0.5rem;
            font-size: 1rem;
            line-height: 2rem;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            text-align: center;
            margin-right: 0.5rem;
            display: inline-flex;
            align-items: center;
            border: none;
        }

        .button:hover {
            background-color: #CCC;
            color: #34495e;
        }

        .clickable-row {
            color: #34495e;
            border-top: 1px solid #34495e;

        }
        .clickable-row:hover {
            background-color: #34495e;
            color: #CCC ;
            cursor: pointer;
        }

        .user-table {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        .user-table-row {
            width: auto;
        }

        td {
            width: 1000px;
            text-align: center ;
            border-top: 1px outset;

        }
        .message-container {
            min-height: 50px;
            text-align: center;
            font-size: 25px;
        }
        /* =================================
  Media Queries
==================================== */

        @media (min-width: 769px) {

            .header,
            .main-nav {
                display: flex;

            }

            .header {
                flex-direction: column;
                align-items: center;

                .header {
                    width: 80%;
                    margin: 0 auto;
                    max-width: 1150px;
                }
            }

        }

        @media (min-width: 1025px) {
            .header {
                flex-direction: row;
                justify-content: space-between;
            }

        }
    </style>
</head>
<header class="header">
    <h1 class="logo"><a href="/header">Admin pannel</a></h1>
    <nav>
        <ul>
            <li class="list"><a href="#">Users</a>
                <ul class="under">
                    <li><a href="{{ route('users.index') }}">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Plants</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Missions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Advices</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Sessions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Addresses</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            <li class="list"><a href="#">Settings</a>
                <ul class="under">
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Informations</a></li>
                    <li><a href=/log-viewer>Logs Dashboard</a></li>
                    <li><a href="#">Log out</a></li>
                </ul>
            </li>
            </li>
        </ul>
    </nav>
</header>
