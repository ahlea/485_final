<!DOCTYPE html>
<html style= "background-image: url('https://img.freepik.com/premium-photo/nostalgic-background-with-old-books-wooden-shelf-ray-light_795881-9356.jpg'); background-size: cover; background-repeat: no-repeat; color: white;">

    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ahlea, Angie">
        <title>Book Search Page</title>
        <link rel="stylesheet" href="design.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <?php
            include("menuBar.php")
        ?>
        <form method="POST">
			<div id="filters">
				<pre id="labels"><h2> Filter by -			</h2></pre>
				<pre id="labels"><h3> Genre:</h3></pre>
				
 				<input type="radio" id="mystery" name="genre" value="Mystery">
 				<label for="mystery"> Mystery</label><br>
 				<input type="radio" id="romance" name="genre" value="Romance">
  				<label for="romance"> Romance</label><br>
  				<input type="radio" id="fantasy" name="genre" value="Fantasy">
  				<label for="Fantasy"> Fantasy</label><br>

				<pre id="labels"><h3> Availability:</h3></pre>
 				<input type="radio" id="avail" name="availability" value="Available">
 				<label for="avail"> Available</label><br>
 				<input type="radio" id="ch-out" name="availability" value="Checked Out">
  				<label for="ch-out"> Checked Out</label><br>

				<pre id="labels"><h3> Format:</h3></pre>
 				<input type="radio" id="hcopy" name="format" value="Hardcopy">
 				<label for="hcopy"> Hardcopy</label><br>
 				<input type="radio" id="ecopy" name="format" value="Electronic">
  				<label for="ecopy"> Electronic</label><br>
				<input type="radio" id="audio" name="format" value="Audio">
  				<label for="audio"> Audio</label><br>
				<br>
			</div>
        <div id="search">
            <h1>Search for a Book</h1>
                <input id ="inputBox" placeholder="Search... " type="text" name="searchBox" value=""><br>
                <input id ="inputButton" type="submit" name="enterSearch" value="Search"><br>
                <p id="hint"> *Press the Search button to view available books* </p>
                <p id="data"></p>


            <script>
                $("form").submit(
                    function(e){
                        // prevent jQuery refresh the whole page after appending the new element. See the following page for more detail
                        // https://stackoverflow.com/questions/31357050/jquerypage-refreshes-after-appending-html-with-html
                        e.preventDefault();
                        
                        $.post("searchResults.php", $(this).serialize(),
                            function(data){ // callback function
                                $("#data").html(data);
                            }, 
                        );
                    }
                );
            </script>
        </div>
        </form>
    </body>
</html>