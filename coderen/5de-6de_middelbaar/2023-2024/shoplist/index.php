<!DOCTYPE HTML>
<html>

<head>
	<title>shoplist</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, 
user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<link rel="stylesheet" 
	href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>

<body>
    <header class="w3-bar w3-teal w3-top">
        <h1>My shoppinglist</h1>
    </header>
    
        <div class="class1">
            <span class="">My shoppinglist</span>
        </div>
            
        <div class="w3-container w3-margin">
        <?php include_once "../../connect2db.inc"; ?>
            <?php
                $query = "select * from shoplist order by naam";
                $shoppinglist = mysqli_query($conn,$query) or die ("Fout in sql: $query");
            ?>
                
            <?php 
                while ($list=mysqli_fetch_array($shoppinglist)) {
            ?>
                 <tr>
                    <td><?php echo $list["naam"];?></td>
                    <td><?php echo $list["code"];?></td>
                    <td><?php echo $list["doorstreept"];?></td>
                 </tr>
            <?php
                }
            ?>

        <div>
            
        <div class="class2">
            <p>
                2024 by
                <a href="http://kahuanng.com">kahuanng.com</a>
            </p>
        </div>
        
        
            <ul class="w3-ul w3-large">
                <li>Jill</li>
                <li>Eve</li>
                <li>Adam</li>
            </ul>

        
    <footer class="w3-bar w3-teal w3-bottom">
        <h1>2024 by @kahuanng</h1>
    </footer>
    
	<script src="script.js"></script>
</body>

</html>

