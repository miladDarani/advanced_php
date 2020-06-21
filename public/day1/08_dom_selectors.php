<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DOM and JS</title>
    <script>
        window.onload = function (e){
            console.log(e);

            var h1 = document.getElementById('title');
            var header = document.getElementById('header');
            var sidebar =   document.getElementById('sidebar');
            var content  = document.getElementById('content');

            console.log(h1);
            console.log(header);
            console.log(sidebar);
            console.log(content);
                    var links = document.getElementsByTagName('a');
        for (var i = 0; i < links.length ; i++) {
            links[i].addEventListener('click', function (e) {
                e.preventDefault();
                console.log(e);
                console.log(this);
            })
        }
        }



    </script>
</head>
<body>
    <h1 id="title">Dom and JS</h1>

    <div id="header">
        <p>This contennt is in the header.</p>
    </div>

    <div id="sidebar">
        <ul class="nav">
            <li><a href="http://google.com">Google</a></li>
            <li><a href="http://yahoo.com">Yahoo</a></li>
            <li><a href="http://bing.com">Bing</a></li>
            <li><a href="http://duckduckgo.com">Duck Duck Go</a></li>
        </ul>
    </div>

    <div id="content">
        <img src="https://i.insider.com/5e220ea524306a016e4f2012?width=1100&format=jpeg&auto=webp" alt="img">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, earum, repellat! Deleniti possimus nostrum animi nemo sunt quaerat, accusamus non quasi, fugit! Ratione possimus fugiat beatae ea voluptates molestiae nam!</p>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, earum, repellat! Deleniti possimus nostrum animi nemo sunt quaerat, accusamus non quasi, fugit! Ratione possimus fugiat beatae ea voluptates molestiae nam!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, earum, repellat! Deleniti possimus nostrum animi nemo sunt quaerat, accusamus non quasi, fugit! Ratione possimus fugiat beatae ea voluptates molestiae nam!</p>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, earum, repellat! Deleniti possimus nostrum animi nemo sunt quaerat, accusamus non quasi, fugit! Ratione possimus fugiat beatae ea voluptates molestiae nam!</p>

    </div>
</body>
</html>