@extends('partials._navbar')

@section('content')



    <link href="{{ asset('css/RecipeTable.css') }}" rel="stylesheet">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pridėti naują receptą</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('openRecipeListView', ['categoryID'=>$categoryID]) }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="dropdown" >
        <p type="button" onclick="myFunction()" class="dropbtn">Ingredientai</p>
        <div id="myDropdown" class="dropdown-content">
            <input placeholder="Ieškoti.." id="myInput" onkeyup="filterFunction()">
            @foreach($ingredients as $ingredient )
                <a id="{{$ingredient->id}}" onclick="clickList(this.id, {{$ingredient}})"> {{$ingredient->name}}</a>

            @endforeach
            <p href="#" hidden id="noIngredient"> Kurti ingredientą</p>
        </div>

    </div>

    <table  id="myTable" class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Kiekis</th>
            <th>Baltymai</th>
            <th>Riebalai</th>
            <th>Angliavandeniai</th>
            <th></th>
        </tr>
        </thead>

        <form action="{{ route('createRecipe', ['categoryID'=>$categoryID]) }}" method="POST"  enctype="multipart/form-data">
            @csrf



                <tbody name="table" id="myTableBody">
                </tbody>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>

        <tfoot>
        <tr style="background-color: lightgray; color: #a52a2a;" >
            <th>Viso</th>
            <th></th>
            <th id="quantity"></th>
            <th id="proteins"></th>
            <th id="fats"></th>
            <th id="carbs"></th>
            <th></th>
        </tr>
        </tfoot>
    </table>

    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            var dropbtn =  document.getElementById("myDropdown").classList.toggle("show");
        }

        var num = 1;
        function clickList(id, ingred) {
            var ingredient = ingred;
            var text = document.getElementById(id).innerText;
            var quantity = prompt("Įveskite kiekį", 100);
            var table = document.getElementById("myTableBody");
            var row = table.insertRow(-1);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            var cell5 = row.insertCell(5);
            var cell6 = row.insertCell(6);
            cell6.setAttribute('class','w3-hover-text-red default' );


            cell0.setAttribute('id', num);
            cell0.setAttribute('class', 'form-control');
            cell0.setAttribute('name', 'iddasd');


            cell0.innerHTML = num;
            cell1.innerHTML = text;
            cell2.innerHTML = quantity;
            cell3.innerHTML = ingred.proteins*quantity/100;
            cell4.innerHTML = ingred.fats*quantity/100;
            cell5.innerHTML = ingred.carbs*quantity/100;
            cell6.innerHTML = "Pakeisti";
            cell6.setAttribute('onclick', "changeQuantity("+ num + ","+ ingred.proteins + "" +
                ","+ ingred.fats + ","+ ingred.carbs + ")");
            num++;
            recalculateAll();
        }

        function recalculateAll() {

            var rows = document.getElementById('myTableBody').rows;
            var quantity =0 ;
            var proteins= 0;
            var fats=0;
            var carbs=0;
            for (var i=0; i < rows.length; i++)
            {
                if(rows[i].cells[2].innerHTML != "")
                {
                    quantity = quantity + parseInt(rows[i].cells[2].innerHTML);
                }
                proteins += parseInt(rows[i].cells[3].innerHTML);
                fats += parseInt(rows[i].cells[4].innerHTML);
                carbs += parseInt(rows[i].cells[5].innerHTML);
            }
            document.getElementById('quantity').innerHTML=quantity;
            document.getElementById('proteins').innerHTML=proteins;
            document.getElementById('fats').innerHTML=fats;
            document.getElementById('carbs').innerHTML=carbs;

        }


        function changeQuantity(num, proteins, fats, carbs){

            var table = document.getElementById("myTableBody").rows[num-1];
            var quantity = prompt("Įveskite kiekį", 100);
            table.cells[2].innerHTML = quantity;
            table.cells[3].innerHTML = proteins*quantity/100;
            table.cells[4].innerHTML = fats*quantity/100;
            table.cells[5].innerHTML = carbs*quantity/100;
            recalculateAll()
        }

        function filterFunction() {

            var input, filter, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
            var temp = [];
            for (i = 0; i < a.length; i++){
                if (a[i].style.display == "")
                {
                    temp.push(1);
                } else {
                    temp.push(0);
                }
            }


            if (temp.every(notEmpty))
            {
                document.getElementById('noIngredient').removeAttribute('hidden');
            }else {
                document.getElementById('noIngredient').setAttribute('hidden', true);
            }

        }
        function notEmpty(el)
        {
            return el == 0;
        }


    </script>



@endsection
