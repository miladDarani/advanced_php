<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Axios - Ajax Library</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

    <style>

        #results {
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-width: 320px;
            box-shadow: 4px 4px 12px #666;
        }

    </style>

</head>
<body>

    <div class="container mt-5 mb-5">

        <div class="row">

            <div class="col-sm-12">

                <form id="search" novalidate autocomplete="off">

                    <div class="form-group">

                        <input class="form-control" type="text" name="s" id="s" placeholder="search" />

                    </div>

                </form>

                <ul class="list-group" id="results"></ul>

            </div>
        </div><!-- /end .row -->

        <div class="row">

            <div class="col-sm-6" id="list">

            </div><!-- /list -->

            <div class="col-sm-6" id="detail">

            </div><!-- /detail -->

        </div>

    </div>

<!-- Javascripts -->

 <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

  <script src="axios-search.js"></script>

</body>
</html>
