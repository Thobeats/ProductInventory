

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>



   
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
  <form>
    <div class="row p-0 w-100">
        <div class="col-8 p-0">
            <h2 class="pt-4 pl-4 display-4">Product List</h2>        
        </div>
        <div class="col-4 p-0">
            <div class="button text-right mt-5">
                <a href="add-product.php" id="add-product-btn">ADD</a>
                <button type="submit" id="delete-product-btn">MASS DELETE</button>

            </div>
        </div>
    </div>
      <hr>
        <div id="container" class="row">

        </div>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


    <script>

        let check = [];
        function loadPage(){
            let geturl = "get_products.php";

            $.get(geturl, function(data){
              //  console.log(data);
                let container = document.getElementById("container");

                container.innerHTML = '';

                for(datum in data){
                  //  console.log(datum);
                    container.innerHTML += `
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="check text-left">
                                        <input type="checkbox" name="delete-${data[datum].id}"  class="delete-checkbox" value= "${data[datum].id}">
                                </div>
                                <div class="content text-center">
                                        <p> ${data[datum].sku} </p>
                                        <p> ${data[datum].name} </p>
                                        <p> ${data[datum].price}$ </p>
                                        <p> ${data[datum].type}: ${data[datum].type_value}${data[datum].symbol} </p>
                                </div>

                            </div>
                        </div>
                    </div>                    
                    
                `; 

                }
            }, 'json');         


            
        }

        $(document).ready(loadPage());


        function addCheck(event){
            let id = event.target.value;
            event.target.setAttribute("onclick", "removeCheck(event)");

            check.push(id);
        }

        $("form").submit(function(event){
            event.preventDefault();
            let data = $('form').serializeArray();

            $.post("delete_products.php", { delete : data} , function(data, status){

                loadPage();
                console.log("data: " + data + "status: " + status);
            });
        })
    
    </script>
      
</body>
</html>