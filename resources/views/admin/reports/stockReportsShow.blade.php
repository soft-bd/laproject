<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">

    <style type="text/css">

        th:after,
        th:before {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
        }

        th:before {
            top: -1px;
            border: 1px solid black;
        }

        th:after {
            bottom: -2px;
            border: 1px solid black;
        }









        table,  tr{
            border: 1px solid black;
            font: 13px "Trebuchet MS" ,Tahoma ;font-weight:normal;font-style:normal;


        }
        table{
            width: 99.4%;
            margin-left: 4px;
            margin-right: 4px;
            position: relative;


        }

        th, td{
            border-right: 2px solid black;
        }
        td:first-child, th:first-child{
            border-left: 2px solid black;
        }
        tr:nth-last-child(-n+2){
            border-bottom: 2px solid black;

        }
        tr:last-child{
            font-weight: bold;
        }


        th{
            position: -webkit-sticky;
            font: 15px "Trebuchet MS" ,Tahoma ;font-weight:bold ;font-style:normal;

            position: sticky;
            top: 0;
            background: #FFFFFF;
            padding: 6px 0;



        }

    </style>
    <link href="{{asset('CSS')}}/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('CSS')}}/font-awesome.css" rel="stylesheet" />


</head>
<body>
<input style="margin-left: 50%; margin-top: 2px; border-radius: 5px" type="submit" value="Print" onclick="window.print()">
<h5 style="text-align: center; "> Warehouse Present Stock</h5>

<table >
    <thead >
    <tr id="myHeader">
        <th >sl</th>
        <th >Group Name</th>
        <th >Sub Group Name</th>
        <th >Item Name</th>
        <th>Item Description</th>
        <th style="text-align: right">Final Stock</th>
        <th style="text-align: right">Cost Price</th>
        <th style="text-align: right">Stock Price</th>

    </tr>
    </thead>
    <tbody>
    <?php  $i=1; $totalamount=0; $final_stock=0;?>
    @foreach( $wo as $dt)
        <tr >
            <td>{{$i}}</td>
            <td >{{$dt->group_name ??''}}</td>
            <td >{{$dt->sub_group_name ??''}}</td>
            <td >{{$dt->item_name ??''}}</td>
            <td >{{$dt->item_description ??''}}</td>
            <td style="text-align: right" >{{$dt->stock??''}}</td>
            <td style="text-align: right">{{$dt->cost_price ??''}}</td>
            <td style="text-align: right" >{{number_format($dt->stock*$dt->cost_price,2)?? 0}}</td>




        </tr>

        <?php $g= $i++; $totalamount+=$dt->stock*$dt->cost_price; $final_stock+=$dt->stock ?>
    @endforeach
    <tr>
        <td style="" colspan="5"> Total</td>
        <td style="text-align: right" >{{ number_format($final_stock,2)?? 0}} </td>
        <td style="" > </td>


        <td  style="text-align: right"> {{number_format($totalamount,2)?? 0}}</td>


    </tr>

    </tbody>
</table>


<script src="{{asset('JS')}}/jquery.min.js"></script>
<script src="{{asset('JS')}}/bootstrap.min.js"></script>

<script>

</script>
</body>
</html>
