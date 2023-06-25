<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">

    <style>
        .footer ul {
            display: inline-grid;
            grid-auto-flow: row;
            grid-gap: 30px;
            justify-items: center;
            margin: auto;
            list-style: none;
            text-transform: uppercase;
        }

        @media (min-width: 500px) {
            .footer ul {
                grid-auto-flow: column;
            }
        }

        .footer a:hover {
            box-shadow: inset 0 -1.5em 0 hsla(24, 85%, 49%, 0.4);
        }

        .footer li:last-child {
            grid-column: 1 / 2;
            grid-row: 1 / 2;
        }

        div.footer {
            display: flex;
            height: 300px;
            width: 100%;
            background-image: linear-gradient(135deg, #f9cffc 10%, #4515f3 100%);
        }
        
        .footer ul li>a{
            font-weight: bold;
            color: black;
            text-decoration: none;
            box-shadow: inset 0 -1px 0 hsla(303, 95%, 36%, 0.4);
        }
    </style>

</head>
<body>
    <?php
    echo '<div class="footer">
        <ul>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Email</a></li>
          <li><a href="#">Company Details</a></li>
        </ul>
    </div>';
    ?>
</body>
</html>