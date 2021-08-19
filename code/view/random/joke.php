<html>
    <body>
        <h1>This is the Random Joke page!.</h1>
        <p>Enjoy the Joke Text:</p>
        <div>Setup:  <?php echo $_rc["httpResult"]->setup; ?></div>
        <div>Punchline:  <?php echo $_rc["httpResult"]->punchline; ?></div>
        <pre>
            <?php 
                krumo($_rc["httpResult"]);
            ?>
        </pre>
        <a href="/Prod">Home</a>
    </body>
</html>