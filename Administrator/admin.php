<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/administratorStyle.css">

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    

    <script src="https://kit.fontawesome.com/aa867b86c2.js" crossorigin="anonymous"></script>
    <title>Administrator</title>
</head>
<body>
    <div class="side-bar-div">
        <div class="website-name-div">
          <!-- <img class="insignia-img" src="../PersonalInfo/images/deped-insignia_orig.png"> -->
          <!-- <p class="website-name">DepEd Panel</p> -->
        </div>
        <div class="side-bar-options-div">
          <div class="dashboard-option-div">
            <p>Administrator</p>
            <a href="superAdmin1Dashboard">
              <span class="link"></span>
            </a>
          </div>
        </div>
      </div>

      <div class="table-container-div">
            <!-- <div class="category-filter">
                <select id="categoryFilter" class="form-control">
                    <option value="">Show All</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Laptop/Tablet PC">Laptop/Tablet PC</option>
                    <option value="Tablet">Tablet</option>
                </select>
            </div> -->
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PACKAGE</th>
                        <th>YEAR</th>
                        <th>WARRANTY</th>
                        <th>DEVICE</th>
                        <th>SERIAL#</th>                     
                        <th>BRAND/MODEL</th>
                        <th>SPECIFICATION</th>
                        <th>UNIT COST</th>
                        <th>CONDITION</th>
                        <th>ACCOUNTABLE OFFICER</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
            </table>
    </div>
</body>
</html>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "order": [[ 0, "desc" ]],
            serverSide: true,
            ajax: 'adminServerSide.php',
            // "searching": true
        });

        // var table = $('#example').DataTable();
        // $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));
        // var categoryIndex = 0;
        // $("#example th").each(function (i) {
        // if ($($(this)).html() == "Device") {
        //     categoryIndex = i; return false;
        // }
        // });
        // $.fn.dataTable.ext.search.push(
        // function (settings, data, dataIndex) {
        //     var selectedItem = $('#categoryFilter').val()
        //     var category = data[categoryIndex];
        //     if (selectedItem === "" || category.includes(selectedItem)) {
        //     return true;
        //     }
        //     return false;
        // }
        // );
        // $("#categoryFilter").change(function (e) {
        // table.draw();
        // });

        // table.draw();
    });


//     $("document").ready(function () {

// $("#filterTable").dataTable({
//   "searching": true
// });

// //Get a reference to the new datatable
// var table = $('#filterTable').DataTable();

// //Take the category filter drop down and append it to the datatables_filter div. 
// //You can use this same idea to move the filter anywhere withing the datatable that you want.
// $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));

// //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
// //This tells datatables what column to filter on when a user selects a value from the dropdown.
// //It's important that the text used here (Category) is the same for used in the header of the column to filter
// var categoryIndex = 0;
// $("#filterTable th").each(function (i) {
//   if ($($(this)).html() == "Category") {
//     categoryIndex = i; return false;
//   }
// });

// //Use the built in datatables API to filter the existing rows by the Category column
// $.fn.dataTable.ext.search.push(
//   function (settings, data, dataIndex) {
//     var selectedItem = $('#categoryFilter').val()
//     var category = data[categoryIndex];
//     if (selectedItem === "" || category.includes(selectedItem)) {
//       return true;
//     }
//     return false;
//   }
// );

// //Set the change event for the Category Filter dropdown to redraw the datatable each time
// //a user selects a new filter.
// $("#categoryFilter").change(function (e) {
//   table.draw();
// });

// table.draw();
// });
</script>
