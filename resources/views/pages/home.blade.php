<!DOCTYPE html>
<html>
<head>
    <title>New Page</title>

    <script src="/js/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body> <!--onload="loadProvinces()"-->

<header>
    <div class="wrapper">

        @yield('header')

    </div>
</header>
<div class="wrapper">

    @yield('content')


</div>

<footer>
    <div class="footer">
        <div class="wrapper">
            <nav>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="gallery.html">GALLERY</a></li>
                    <li><a href="downlaod.html">DOWNLOAD</a></li>
                    <li><a href="contact.html">CONTACT</a></li>

                </ul>
            </nav>

            {{--<span>&copy darshana rulz <br> this is my production  <br> 077-7753598 <br> darshana.14@cse.mrt.ac.lk</span>--}}
        </div>
    </div>
</footer>

</body>