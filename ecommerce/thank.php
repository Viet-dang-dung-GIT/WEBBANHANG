<?php
    require("./includes/header.php")
?>

<body>
    <div id="icon-container"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('icon-container'), // required
            path: 'thank.json', // required
            renderer: 'svg', // required
            loop: true, // optional
            autoplay: true, // optional
            name: "Thank Animation", // optional
        });
    </script>


</body>

</html>