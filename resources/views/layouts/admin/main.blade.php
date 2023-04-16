<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>  a elle :: dashboard  </title>
    <link rel="icon" href="{{ url('/') }}/cp/favicon.ico" type="image/x-icon"> <!-- Favicon-->
    @notifyCss



{{-- 

<style>/* The modal */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto; /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }
    
    /* Close Button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    
    .form-group {
      margin-bottom: 10px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="file"] {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }
    
    #edit-preview {
      max-width: 100%;
      height: auto;
    }
    
    .save-btn {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    </style>
////////////////////////////////////////////////////////////// --}}

<style>

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: Arial, sans-serif;
}

header {
	background-color: #333;
	color: #fff;
	padding: 20px;
}

header h1 {
	font-size: 24px;
}

main {
	max-width: 800px;
	margin: 50px auto;
	padding: 20px;
	border: 1px solid #ccc;
	background-color: #fff;
}

.form-group {
	margin-bottom: 20px;
}
.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
		}
		.image-preview {
			max-width: 200px;
			max-height: 200px;
			margin-bottom: 20px;
		}
label {
	display: block;
	margin-bottom: 5px;
	font-size: 16px;
	font-weight: bold;
}

input[type="text"], input[type="file"] {
	width: 100%;
	padding: 10px;
	font-size: 16px;
	border: 1px solid #ccc;
	border-radius: 5px;
}

.btn-save {
	background-color: #333;
	color: #fff;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	transition: background-color 0.3s ease-in-out;
}

.btn-save:hover {
	background-color: #666;
}



.image-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.image-card {
    position: relative;
    width: 250px;
    height: 250px;
    border: 2px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
}

.image-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-card .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 10px;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.image-card:hover .overlay {
    transform: translateY(0);
}

.image-details {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.image-details h3 {
    margin: 0;
    font-size: 18px;
    margin-bottom: 10px;
}

.image-actions {
    display: flex;
    align-items: center;
}

.image-actions a {
    display: inline-block;
    margin-left: 10px;
    color: #fff;
    font-size: 16px;
    text-decoration: none;
}

.image-actions a:hover {
    color: #f00;
}


</style>
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ url('/') }}/cp/assets/css/ebazar.style.min.css">
</head>
<body class="rtl_mode">
    <div id="ebazar-layout" class="theme-blue">
        
        
    @include('layouts.admin.menu')
        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
        @include('layouts.admin.nav')



           

            <!-- Body: Body -->
            <x:notify-messages />

            @yield('content')
            <!-- Modal Custom Settings-->
             
            
        </div>
    
    </div>
    @notifyJs

        @stack('js')

    @include('layouts.admin.footer')
    
</body>
</html> 