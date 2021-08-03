<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indus Stock Bot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        table{
            position: relative;
            border-collapse: collapse;
            background: black;
        }
        th {
            background: black;
            /* position: sticky; */
            /* top: 0; Don't forget this, required for the stickiness */
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <!-- <div class="container-fluid"> -->
        <table id="stockDataTable" class="table table-bordered pb-0 mb-0 text-white font-weight-bold">
                <tr id="stockDataTableHead" class="text-white">
                    <th>Sr.No.</th>
                    <th>Company Name</th>
                    <th>Stock Name</th>
                    <th>Current Price</th>
                    <th>Previous Close</th>
                    <th>Today's Change (₹)</th>
                    <th>Today's Change (%)</th>
                    <th>Status</th>
                </tr>
        </table>
    <!-- </div> -->
</body>
</html>

<script>
    $.ajax({
              url:"/stockDataForWeb.json",
              method:"POST",
              data:{1:1},
              success:function(data) {
                    // console.log(data[0]['company_name']);
                    var stockDataTable = document.getElementById('stockDataTable');
                    $('#stockDataTableHead').nextAll().remove();
                    // if(data.length == 50){
                        for (var i =0; i < data.length; i++) {
                            
                                var x = stockDataTable.insertRow();
                                if(data[i]['status'] == 'Bullish'){
                                    x.insertCell(0);
                                    stockDataTable.rows[i+1].cells[0].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[0].innerHTML = i+1;  

                                    x.insertCell(1);
                                    stockDataTable.rows[i+1].cells[1].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[1].innerHTML = data[i]['company_name'];

                                    x.insertCell(2);
                                    stockDataTable.rows[i+1].cells[2].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[2].innerHTML = data[i]['stock_name'];  

                                    x.insertCell(3);
                                    stockDataTable.rows[i+1].cells[3].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[3].innerHTML = "₹ "+data[i]['current_price']; 

                                    x.insertCell(4);
                                    stockDataTable.rows[i+1].cells[4].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[4].innerHTML = "₹ "+data[i]['previous_close']; 

                                    x.insertCell(5);
                                    stockDataTable.rows[i+1].cells[5].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[5].innerHTML = "₹ "+data[i]['diff_curr_open']; 

                                    x.insertCell(6);
                                    stockDataTable.rows[i+1].cells[6].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[6].innerHTML = data[i]['today_change_per']+"%"; 

                                    x.insertCell(7);
                                    stockDataTable.rows[i+1].cells[7].style.backgroundColor = "green";
                                    stockDataTable.rows[i+1].cells[7].innerHTML = "<span class='font-weight-bold'>"+data[i]['status']+"</span>";
                                }
                                else{
                                    x.insertCell(0);
                                    stockDataTable.rows[i+1].cells[0].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[0].innerHTML = i+1;  

                                    x.insertCell(1);
                                    stockDataTable.rows[i+1].cells[1].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[1].innerHTML = data[i]['company_name'];

                                    x.insertCell(2);
                                    stockDataTable.rows[i+1].cells[2].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[2].innerHTML = data[i]['stock_name'];  

                                    x.insertCell(3);
                                    stockDataTable.rows[i+1].cells[3].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[3].innerHTML = "₹ "+data[i]['current_price']; 

                                    x.insertCell(4);
                                    stockDataTable.rows[i+1].cells[4].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[4].innerHTML = "₹ "+data[i]['previous_close']; 

                                    x.insertCell(5);
                                    stockDataTable.rows[i+1].cells[5].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[5].innerHTML = "₹ "+data[i]['diff_curr_open']; 

                                    x.insertCell(6);
                                    stockDataTable.rows[i+1].cells[6].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[6].innerHTML = data[i]['today_change_per']+"%"; 

                                    x.insertCell(7);
                                    stockDataTable.rows[i+1].cells[7].style.backgroundColor = "red";
                                    stockDataTable.rows[i+1].cells[7].innerHTML = "<span class=' font-weight-bold'>"+data[i]['status']+"</span>";
                                }
                        }
                    // }

            }
        });
</script>