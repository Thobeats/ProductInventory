<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        #add-product-btn{
            padding : 7px;
            background-color : green;
            color : white;
            border : none;
        }
        #delete-product-btn, #cancel-product-btn{
            border : none;
            padding : 7px;
            background-color : red;
            color : white;
        }

    </style>
<form method="" action="" id="product_form">
    <div class="row p-0 w-100">
        <div class="col-8 p-0">
            <h2 class="pt-4 pl-4 display-4">Add Product</h2>        
        </div>
        <div class="col-4 p-0">
            <div class="button text-right mt-5">
                <button type="submit" id="add-product-btn">Save</button>
                <button type="reset" id="cancel-product-btn">Cancel</button>
            </div>
        </div>
    </div>
      <hr>


    <div class="row p-4">
       <div class="col-6">
            <div class="form-group row">
                <label for="" class="col-3 text-right">SKU</label>
                <input type="text" class="col-9" name="sku" id="sku" placeholder="Enter Store Keeping Unit" pattern="[A-Za-z0-9_@./#&+-]{,14}" title="length should be 6 or greater">
            </div>
            <div class="form-group row">
                <label for="" class="col-3 text-right">Name</label>
                <input type="text" class="col-9" name="name" id="name" placeholder="Enter Product Name" pattern="[A-Za-z 0-9]{1,}" title="Please, provide the data of indicated type">
            </div>
            <div class="form-group row">
                <label for="" class="col-3 text-right">Price</label>
                <input type="number" class="col-9" name="price" id="price" placeholder="Enter Product Price" pattern="[0-9]{1,}" title="Please, provide the data of indicated type">
            </div>
            <div class="form-group row">
                <label for="" class="col-3 text-right">Type Switcher</label>
                <select name="selectProduct" id="productType" class="col-9">
                    <option value="0" class="text-muted">Type Switcher</option>
                    <option  value="1" >DVD</option>
                    <option value="2">Furniture</option>
                    <option  value="3">Book</option>
                </select>
            </div>
            <div class="form-group row" id="optionContainer">
                
            </div>
       </div>
    </div>
</form>


<script>

    $(document).ready(function(){   
        let options = document.getElementById("optionContainer");
        let url ="";

        //Functions  
        let arrayFunctions = [
            function optionOne(){
                url = "";
                options.innerHTML = "";
            },
            function optionTwo(){
                url = "";
                url = "disc_process.php";
                options.innerHTML = "";

                options.innerHTML += `
                    <label for="" class="col-3 text-right">Size</label>
                    <input type="number" class="col-9" name="size" id="size" placeholder="Please provide Size" pattern="[0-9]{1,}"" title="Please, provide the data of indicated type">
                `;
            },
            function optionThree(){
                url = "";
                url = "furniture_process.php";
                options.innerHTML = "";

                options.innerHTML += `
                    <label for="" class="col-3 text-right">Height</label>
                    <input type="number" class="col-9 mb-1" name="height" id="height" placeholder="Please provide Dimension" pattern="[0-9]{1,}"" title="Please, provide the data of indicated type">
                    <label for="" class="col-3 text-right">Width</label>
                    <input type="number" class="col-9 mb-1" name="width" id="width" placeholder="Please provide Dimension" pattern="[0-9]{1,}"" title="Please, provide the data of indicated type">
                    <label for="" class="col-3  text-right">Length</label>
                    <input type="number" class="col-9 mb-1" name="length" id="length" placeholder="Please provide Dimension" pattern="[0-9]{1,}"" title="Please, provide the data of indicated type">
                `;
            },
            function optionFour(){
                url = "";
                url = "book_process.php";
                options.innerHTML = "";

                options.innerHTML += `
                    <label for="" class="col-3 text-right">Weight</label>
                    <input type="number" class="col-9" name="weight" id="weight" placeholder="Please provide Weight"pattern="[0-9]{1,}"" title="Please, provide the data of indicated type" >
                `;
            }
        ]
        let productType = document.getElementById("productType");

        productType.addEventListener("change", function(){        
            arrayFunctions[this.value]();
        });
        

        $("#product_form").submit(function(event){
            event.preventDefault();
            let formDetails = $(this).serialize();
            let ur = url;
            let form = $(this);
            ur += "?" + formDetails;

           // console.log(ur);

            $.get(ur,function(){
                //console.log(data);
                form[0].reset();
                url = '';
                window.location = 'product_list.php';
            });
        });

        $("#cancel-product-btn").click(function(){
            window.location.href = "/";
        });

       
    });
   

</script>
</body>
</html>