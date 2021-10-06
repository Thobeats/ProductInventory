

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

  
       
        <div class="row p-3" id="book">
          
        </div>
        <div class="row p-3" id="disc">
          
        </div>
        <div class="row p-3" id="furniture">
          
        </div>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


    <script>

        let check = [];
        function loadPage(){
            let bookurl = "get_products.php?type=book";

            $.get(bookurl, function(data){
              //  console.log(data);
                let book = document.getElementById("book");

                book.innerHTML = '';

                for(datum in data){
                  //  console.log(datum);
                    book.innerHTML += `
                    <div class="col-lg-3 col-md-4 col-sm-6 card-body">
                        <div class="check text-left">
                                <input type="checkbox" name="delete-${data[datum].product_id}" class="delete-checkbox" value= "${data[datum].product_id}">
                        </div>
                        ${data[datum].product_sku}</br>
                        ${data[datum].product_name}</br>
                        ${data[datum].product_price}$</br>
                        Weight: ${data[datum].weight}Kg</br>                          
                    </div>                     
                    
                `; 
                }
            }, 'json');

            let discurl = "get_products.php?type=disc";

            $.get(discurl, function(data){
               // console.log(data);
                let disc = document.getElementById("disc");

                disc.innerHTML = '';

                for(datum in data){
                    //console.log(datum);
                    disc.innerHTML += `
                    <div class="col-lg-3 col-md-4 col-sm-6 card-body">
                        <div class="check text-left">
                                <input type="checkbox" name="delete-${data[datum].product_id}" class="delete-checkbox" value= "${data[datum].product_id}">
                        </div>
                        ${data[datum].product_sku}</br>
                        ${data[datum].product_name}</br>
                        ${data[datum].product_price}$</br>
                        Size: ${data[datum].size}MB</br>                          
                    </div>                    
                    
                `; 
                }
            }, 'json');

            let furnurl = "get_products.php?type=furniture";

            $.get(furnurl, function(data){
                //console.log(data);
                let furniture = document.getElementById("furniture");

                furniture.innerHTML = '';

                for(datum in data){
                    //console.log(datum);
                    furniture.innerHTML += `
                    <div class="col-lg-3 col-md-4 col-sm-6 card-body">
                        <div class="check text-left">
                                <input type="checkbox" name="delete-${data[datum].product_id}" class="delete-checkbox" value= "${data[datum].product_id}">
                        </div>
                        ${data[datum].product_sku}</br>
                        ${data[datum].product_name}</br>
                        ${data[datum].product_price}$</br>
                        Dimension: ${data[datum].dimension}</br>                          
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