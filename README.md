# jrPaginator
It is a very simple and effective utility build in jQuery &amp; PHP to implement pagination on html table.
Introduction
A simple jQuery plugin to paginate the large HTML table that you can specify the number of rows, custom table head and can select columns to show per page. It is compatible with the set of PHP and MySQLi database server.

#Using the plugin

1. Download jrPaginator plugin. 
2. Add jrPaginator.min.css & jrPaginator.min.js to your project. 
3. Edit jrPaginationHandler.php (set the database details) and place it at your preferred location. 
4. Initialise the jrPaginate for the table you want to paginate as below:

$(document).ready(function(){
    $('#yourTableId').jrPaginate({
        dbTableName: 'yourDbTableName',
        filePath: 'pathOfPHPFile'
        //optional parameters
    });
});

    Example:

$(document).ready(function(){
    $('#contact-list').jrPaginate({
        dbTableName: 'contact_list',
        filePath: 'assets/user/contacts/jrPaginationHandler.php'
        //optional parameters
    });
});

#5. Parameters:

#dbTableName     Compulsory
Name of the mysql database table.
Ex: 
dbTableName: 'contact_list'
#filePath     Compulsory
Path of jrPaginationHandler.php, you can place it at your preffered location. You can also change the file name or you can copy paste the code from this file to another php file just care the $link variable which holds the mysqli connection. Ex: 
filePath: 'assets/user/contacts/jrPaginationHandler.php<sup><sub>​</sub></sup>
#tableHead
Provide your own custom table head row. Ex:
tableHead : '<tr><th>Id</th><th>Name</th><th>Email</th><th>Contact</th><th>Address</th></tr>'​​
#columnList
List of columns you want to fetch from the database table.
columnList: {a: 'id', b: 'name', c: 'contact', d: 'email'}
#listLength
Length of list, i.e. no. of rows you want to display at a time in the table
listLength: 15      //Default is 20
#showPageBtn
no. of page buttons you want to display at a time
showPageBtn: 4      //Default is 5
#showLastPage
User can not see the no. of total pages if set to 'false'
showLastPage: false      //Default is 'true'
#rowAddOn
This parameter can be used to add any new common data column in the rows that is not in the database table. such as delete or edit button.
rowAddOn: '<td><input type='button' value='Delete' onclick='delete(this);'></td>
#6. Full fledge example: 

$(document).ready(function(){
    $('#entity-list').jrPaginate({
        dbTableName     :   'pagination_test',
        filePath    :   'src/jrPaginationHandler.php',
        listLength  :   5,
        showPageBtn :   4,
        rowAddOn    :   '<td><input type='button' value='delete'></td>',
        tableHead   :   '<tr><th>id</th><th>name</th><th>contact</th><th>email</th></tr>',
        columnList  :   {a : 'id', b : 'name', c : 'contact', d : 'email'},
        showLastPage:   true
    });
});
 

#Points to remember
Don't forget to add jQuery library

It is mendatory to give unique 'id' to each html table

 

#Demo
Visit http://sybero.in/jrpaginator to see the live demo of jrPaginator.

#More Tips
The design of buttons can be customised using below classes:

jr-top-btn
To edit the numbered buttons
jr-scroll-btn-left & jr-scroll-btn-left
To edit the left and right buttons
jr-focus
To edit the current page button
If you have variable table names for database table (Ex: each user has different table name for the activity log), you can edit jrPaginationHandler.php .

Ex:

//default code
$tableName=$_POST['dbTableName'];

//change it to  
$tableName= 'yourTableName'; //Ex: $_SESSION['user_id'].'_log'
 
