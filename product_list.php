

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        #add-product-btn{
            padding : 10px;
            background-color : green;
            color : white;
            text-decoration: none;
        }
        #delete-product-btn{
            border : none;
            padding : 7px;
            background-color : red;
            color : white;
        }
    </style>
    <div class="row p-0 w-100">
        <div class="col-8 p-0">
            <h2 class="pt-4 pl-4 display-4">Product List</h2>        
        </div>
        <div class="col-4 p-0">
            <div class="button text-right mt-5">
                <a href="addproduct.php" id="add-product-btn">ADD</a>
                <button id="delete-product-btn">MASS DELETE</button>
            </div>
        </div>
    </div>
      <hr>

      <div class="row p-3">
          <div class="col-3">
              <div class="card">
                  <div class="card-body">
                      <div class="check text-left">
                            <input type="checkbox" name="delete-check[]" class="delete-checkbox" id="">
                      </div>
                      <div class="content text-center">
                            <p>JCCVVBSBSBSBSB</p>
                            <p>Movie Disc</p>
                            <p>1.00$</p>
                            <p>Size: 700MB</p>
                      </div>

                  </div>
              </div>
          </div>
      </div>
</body>
</html>