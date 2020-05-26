<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://kit.fontawesome.com/yourcode.js"></script>
</head>
<style type="text/css">
        .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #e04b11;
        overflow-x: hidden;
        padding-top: 20px;
        }

        .sidenav a {
        padding: 4px 0px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
    </style>
   <!--Sidebar -->
    <div class="sidenav">
            <ul style="list-style: none;">
                <li>
                    <a href="../index.php"><i class="fas fa-home"></i><span> Home</span></a>
                </li>
                <hr>
                <li>
                    <a href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                </li>
                <hr>
                <li>
                    <a href="create.php"><i class=""></i><span>Create</span></a>
                </li>
                <hr>
                <li>
                    <a href="read.php"><i class=""></i><span>Read</span></a>
                </li>
                <hr>
                <li>
                    <a href="update.php"><i class=""></i><span>Update</span></a>
                </li>
                <hr>
                <li>
                    <a href="delete.php"><i class=""></i><span>Delete</span></a>
                </li>
            </ul>
            <br>
            <br>
            <ul class="logout" style="list-style: none;">
                <li>
                    <a href="../logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                </li>
            </ul>
        </div>