<html>
<head>
    <title>Da-da-da-da-da-da-da</title>
    <style>
        * {
            margin-left: auto;
            margin-right: auto;
        }
        .buttons-div {
        }
        body {
            margin-left: auto;
            margin-right:auto;
            min-width: 800px;
            width: 50%;
        }
        h1, h2, h3, button, .buttons-div {
            width: fit-content;
        }
        button {
            display: inline-block;
            margin: auto .2em;
        }
        #content-div-status {
            margin-left: 0;
            width:100%;
        }
    </style>
</head>
<body>
    <?php
        require '/var/www/html/views/header.php';
    ?>

    <div id="content-div-authentication">
        <div class="buttons-div">
            <button id="iam">I Am</button><button id="iamnot">I Am Not</button>
        </div>
    </div>
    <div id="content-div-shouting">
        <h2>Are the people shouting?</h2>
        <div class="buttons-div">
            <button id="shoutingyes">They Are Shouting</button><button id="shoutingno">They Don't See Me Yet</button>
        </div>
    </div>
    <div id="content-div-confirmation">
        <h2>Are you sure?</h2>
        <div class="buttons-div">
            <button id="iknowshouting">Yes</button><button id="notsure">No</button>
        </div>
    </div>
    <div id="content-div-status">
        <h3>Status</h3>
        <div id="content-div-status-data">
        </div>
    </div>
<script type="application/javascript">
    <?php
        require '/var/www/html/js/jq.js';
    ?>
</script>
<script type="application/javascript">
    <?php
        require '/var/www/html/js/myapp.js';
    ?>
</script>
</body>
</html>