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
        #form-bot-honeypot-input {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        require WEBROOT . '/views/header.php';
    ?>

    <div id="content-div-authentication">
        <div class="buttons-div">
            <button id="content-button-iam">I Am</button><button id="content-button-iamnot">I Am Not</button>
        </div>
    </div>
    <div id="content-div-quote">
        <h2>About our trip</h2>
        <form id="content-div-quote-form">

            <div class="form-group">
                <label for="trip-start-date">From:</label>
                <input type="datetime-local" name="trip-start-date" id="form-start-date">
                <label for="trip-end-date">To:</label>
                <input type="datetime-local" name="trip-end-date" id="form-end-date">
            </div>
            <div class="form-group">
                <!-- I considered turning these into Date of Birth inputs then doing math. -->
                <!-- Everyone old enough to seek this form knows when they were born. -->
                <label for="form-bot-honeypot-input">Please tell us your age(s):</label>
                <input type="text" name="honeypot" id="form-bot-honeypot-input">
                <div>
                    <button>-</button>
                    <!-- Slider does not have a visible numeric indicator by default, nor do the fine adjustment buttons work.-->
                    <!-- Just using it to show I am aware of the cool "new" features in HTML5. -->
                    <!--  ¯\_(ツ)_/¯ time constraints, good enough to demonstrate a value. Defaulting to age 50. Ship it.-->
                    <input type="range" name="age[]" id="form-age-range" class="form-age-range" min="0" max="130" value="50">
                    <button>+</button>
                    <button class="form-remove-traveller-button">X</button>
                </div>
                <!-- Pretend there is logic that appends a group of age elements. -->
                <button id="form-add-travellers-button">Add Another Traveller</button>
            </div>
            <div class="form-group">
                <label for="country">Choose your country for payment:</label>

                <select name="country" id="form-country-select">
                    <option value="">--Please choose an option--</option>
                    <option value="CAD">Canada</option>
                    <option value="ETB">Ethiopia</option>
                    <option value="ISK">Iceland</option>
                    <option value="MDL" selected="selected">Moldovia</option>
                    <option value="DOG">Dogecoin</option>
                    <option value="BTC">Bitcoin</option>
                </select>
            </div>
        </form>
        <div>
            <!-- "Four bells, Captain Drayton, go ahead. Jouett, full speed." is a famous navy battle quote.-->
            <!-- Four bells was the communication code for releasing mines. So, full speed ahead-- with protection. -->
            <button id="content-button-four-bells">Get Quote</button>
        </div>
    </div>
    <div id="content-div-status">
    </div>
<pre><?php //var_dump($_SERVER); ?></pre>
<script type="application/javascript">
<?php
    require WEBROOT . '/js/jq.js';
?>
</script>
<script type="application/javascript">
<?php
    require WEBROOT . '/js/myapp.js';
?>
</script>
</body>
</html>