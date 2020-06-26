<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AXIOS</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>
        #results{
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-width: 320px;
            box-shadow: 4px 4px 12px #666;
        }
    </style>
    

</head>
<body>

    <h1 class="text-center">AXIOS - Ajax library</h1>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-12">
                <form id="search" novalidate autocomplete='off'>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="s" id="s" placeholder="Search">
                    </div>

                </form>
                <ul class="list-group" id="results">
                    <!-- item will be displyed here -->
                  <!--   <li class="list-group-item"><a href="">Under the Dome</a></li>
                    <li class="list-group-item"><a href="">Carrie</a></li> -->
                </ul>
            </div>
        </div>

        <div class="row">
            
            <div class="col-sm-6" id="list">
                <h2 class="text-center">List view</h2>
                <img  class="loader-gif" src="images/load1.gif" alt=""> 

            </div> <!-- List -->

            <div class="col-sm-6" id="detail">
                
                <h2 class="text-center">Detail View </h2>

            </div> <!-- detail -->

        </div>
    </div>





<!-- SCRIPTS -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"> 
    </script>
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <!-- milad script -->
    <script src="axios-search.js"></script>
</body>
</html>