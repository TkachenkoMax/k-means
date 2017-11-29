<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>K-means</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>K-means</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="km-form">
                <div class="form-group">
                    <label for="dataset">Dataset</label>
                    <select class="form-control" id="dataset" required>
                        <option selected disabled>Choose...</option>
                        <option value="1">#1</option>
                        <option value="2">#2</option>
                        <option value="3">#3</option>
                        <option value="4">#4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="iterations">Clusters amount</label>
                    <input type="number" min="1" max="20" class="form-control" id="clusters" placeholder="Clusters" required>
                </div>
                <div class="form-group">
                    <label for="iterations">Iterations amount</label>
                    <input type="number" min="1" max="20" class="form-control" id="iterations" placeholder="Iterations" required>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Start</button>
            </form>
        </div>
    </div>
    <hr/>
    <div class="row">
        <canvas id="chart" width="200" height="200"></canvas>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="javascript/libs/parsley.js"></script>
<script src="javascript/MainController.js"></script>
</body>
</html>